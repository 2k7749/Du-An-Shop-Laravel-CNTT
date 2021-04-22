<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class BrandProduct extends Controller
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

    public function add_BrandProduct()
    {
        $this ->AuthLogin();
        return view('admin/add_brand_product');
    }

    public function all_BrandProduct()
    {
        $this ->AuthLogin();
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin/all_brand_product')->with('all_brandproduct', $all_brand_product);
        return view('admin_layout')->with('admin/all_brand_product', $manager_brand_product);
    }

    public function save_BrandProduct(Request $request){
        $this ->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return Redirect::to('/sc_admin/add-brandproduct');
    }

    //bỏ kích hoạt brand
    public function unactive_BrandProduct($brand_product_id){
        $this ->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Bỏ kích hoạt thương hiệu');
        return Redirect::to('/sc_admin/all-brandproduct');
    }

    //kích hoạt brand
    public function active_BrandProduct($brand_product_id){
        $this ->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Kich hoat thương hiệu');
        return Redirect::to('/sc_admin/all-brandproduct');
    }

    //edit brand
    public function edit_BrandProduct($brand_product_id)
    {
        $this ->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin/edit_brand_product')->with('edit_brandproduct', $edit_brand_product);
        return view('admin_layout')->with('admin/edit_brand_product', $manager_brand_product);
    }

    public function update_BrandProduct(Request $request, $brand_product_id)
    {
        $this ->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhập thương hiệu sản phẩm thành công');
        return Redirect::to('/sc_admin/all-brandproduct');
    }

    public function delete_BrandProduct($brand_product_id)
    {
        $this ->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xoá thương hiệu sản phẩm thành công');
        return Redirect::to('/sc_admin/all-brandproduct');
    }
    //End admin function

    public function show_brand_home($brand_id)
    {
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $category_slide = DB::table('tbl_category_product')->where('category_status','1')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_brand.brand_id', '=','tbl_product.brand_id')
        ->where([ ['tbl_product.brand_id',$brand_id], ['tbl_product.product_status', '1'] ])->get();

        $brand_name = DB::table('tbl_brand')->where('brand_id',$brand_id)->limit(1)->get();

        return view('pages/brand/show_brand')->with('category',$category_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('slide',$category_slide);
    }
}
