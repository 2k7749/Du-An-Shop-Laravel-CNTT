<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $new_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

        return view('pages/home')->with('category',$category_product)->with('brand',$brand_product)->with('product',$new_product);
    }
}
