<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('sc_admin/dashboard');
        }else{
            return Redirect::to('/sc_admin')->send();
        }
    }

    public function add_CategoryProduct()
    {
        $this ->AuthLogin();
        return view('admin/add_category_product');
    }

    public function all_CategoryProduct()
    {
        $this ->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin/all_category_product')->with('all_categoryproduct', $all_category_product);
        return view('admin_layout')->with('admin/all_category_product', $manager_category_product);
    }

    public function save_CategoryProduct(Request $request){
        $this ->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['category_action'] = $request->category_action;

        $get_image = $request->file('category_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/category',$new_image);
            $data['category_image'] = $new_image;
            DB::table('tbl_category_product')->insert($data);
            Session::put('message','Them danh muc sp thanh cong');
            return Redirect::to('/sc_admin/add-categoryproduct');
        }

        $data['category_image'] = null;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Them danh muc sp thanh cong');
        return Redirect::to('/sc_admin/add-categoryproduct');
    }

    //bỏ kích hoạt category
    public function unactive_CategoryProduct($category_product_id){
        $this ->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>0]);
        Session::put('message','Khong kich hoat danh muc');
        return Redirect::to('/sc_admin/all-categoryproduct');
    }

    //kích hoạt category
    public function active_CategoryProduct($category_product_id){
        $this ->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>1]);
        Session::put('message','Kich hoat danh muc');
        return Redirect::to('/sc_admin/all-categoryproduct');
    }

    //edit category
    public function edit_CategoryProduct($category_product_id)
    {
        $this ->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin/edit_category_product')->with('edit_categoryproduct', $edit_category_product);
        return view('admin_layout')->with('admin/edit_category_product', $manager_category_product);
    }

    public function update_CategoryProduct(Request $request, $category_product_id)
    {
        $this ->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_action'] = $request->category_action;

        $get_image = $request->file('category_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/category',$new_image);
            $data['category_image'] = $new_image;
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
            Session::put('message','Cập nhập danh mục sản phẩm thành công 1');
            return Redirect::to('/sc_admin/all-categoryproduct');
        }
         
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhập danh mục sản phẩm thành công');
        return Redirect::to('/sc_admin/all-categoryproduct');
    }

    public function delete_CategoryProduct($category_product_id)
    {
        $this ->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xoá danh mục sản phẩm thành công');
        return Redirect::to('/sc_admin/all-categoryproduct');
    }
    //end admin function

    public function show_category_home($category_id)
    {
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id', '=','tbl_product.category_id')
        ->where([ ['tbl_product.category_id',$category_id], ['tbl_product.product_status', '1'] ])->get();

        $category_name = DB::table('tbl_category_product')->where('category_id',$category_id)->limit(1)->get();

        return view('pages/category/show_category')->with('category',$category_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }
}
