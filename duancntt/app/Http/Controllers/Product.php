<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class Product extends Controller
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

    public function add_Product()
    {
        $this -> AuthLogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin/add_product')->with('category_product',$category_product)->with('brand_product',$brand_product);
    }

    public function all_Product()
    {
        $this -> AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();

        $manager_product = view('admin/all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin/all_product', $manager_product);
    }

    public function save_Product(Request $request){
        $this -> AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/sc_admin/add-product');
        }
        $data['product_image'] = null;
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('/sc_admin/add-product');
    }

    //bỏ kích hoạt product
    public function unactive_Product($product_id){
        $this -> AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('message','Bỏ kích hoạt sản phẩm');
        return Redirect::to('/sc_admin/all-product');
    }

    //kích hoạt product
    public function active_Product($product_id){
        $this -> AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm');
        return Redirect::to('/sc_admin/all-product');
    }

    //edit product
    public function edit_Product($product_id)
    {
        $this -> AuthLogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin/edit_product')->with('edit_product', $edit_product)->with('category_product',$category_product)->with('brand_product',$brand_product);;
        return view('admin_layout')->with('admin/edit_product', $manager_product);
    }

    public function update_Product(Request $request, $product_id)
    {
        $this -> AuthLogin();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhập sản phẩm thành công');
            return Redirect::to('/sc_admin/all-brandproduct');
        }

        //  $image = DB::table('tbl_product')->where('product_id', $product_id)->first();
        //  $data['product_image'] = $image->product_image;

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhập sản phẩm thành công');
        return Redirect::to('/sc_admin/all-product');
    }

    public function delete_Product($product_id)
    {
        $this -> AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xoá sản phẩm thành công');
        return Redirect::to('/sc_admin/all-product');
    }
    // End admin function

    
    public function product_detail($product_id)
    {
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $product_detail = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        //sản phẩm gợi ý
        foreach ($product_detail as $key => $value) {
            $category_id = $value->category_id;
        }
        $recommended_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages/product/show_product_detail')->with('category',$category_product)->with('brand',$brand_product)
        ->with('product_detail',$product_detail)->with('recommended_product',$recommended_product);
    }
}
