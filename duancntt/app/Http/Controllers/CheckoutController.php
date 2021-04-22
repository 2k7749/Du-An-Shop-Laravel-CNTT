<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

//use paypal services
use App\Services\PayPalService as PayPalSvc;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('pages/checkout/login_checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        
        $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('user_name', $result->customer_name);
            return Redirect::to('/trang-chu');
        }else{
            Session::put('mess', 'Email đăng nhập hoặc mật khẩu không đúng');
            return Redirect::to('/login-checkout');
        }
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $result = DB::table('tbl_customer')->where('customer_email',$request->customer_email)->first();
        if ($result) {
            Session::put('mess', 'email đăng kí đã tồn tại');
            return Redirect('/login-checkout');
        }else{
            $customer_id = DB::table('tbl_customer')->insertGetId($data);
            Session::put('customer_id', $customer_id);
            Session::put('customer_name', $request->customer_name);
    
            return Redirect('/trang-chu');
        }

    }

    public function checkout(Type $var = null)
    {
        return view('pages/checkout/show_checkout');
    }

    public function save_infor_shipping(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        
        Session::put('shipping_id', $shipping_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect('/payment');
    }

    public function payment()
    {
        return view('pages/checkout/payment');
    }

    public function order_place(Request $request){

        
        $data = array();
        $data['payment_method'] = $request->payment_option;

        if($data['payment_method']==""){
            return Redirect('/payment');
        }


        if($data['payment_method']==1){
            //insert payment_options
            $data['payment_status'] = 'Đang chờ xử lý';
            $payment_id = DB::table('tbl_payment')->insertGetId($data);

            //insert order
            $order_data = array();
            $order_data['customer_id'] = Session::get('customer_id');
            $order_data['shipping_id'] = Session::get('shipping_id');
            $order_data['payment_id'] = $payment_id;
            $order_data['order_total'] = Cart::subtotal();
            $order_data['order_status'] = 'Đang chờ xử lý';
            $order_id = DB::table('tbl_order')->insertGetId($order_data);

            //insert order_details
            $content = Cart::content();
            
            foreach($content as $v_content){
                $order_d_data['order_id'] = $order_id;
                $order_d_data['product_id'] = $v_content->id;
                $order_d_data['product_name'] = $v_content->name;
                $order_d_data['product_price'] = $v_content->price;
                $order_d_data['product_sales_quantity'] = $v_content->qty;
                DB::table('tbl_order_details')->insert($order_d_data);
            }

            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);

        }else if($data['payment_method']==3){
            //insert payment_options
            $data['payment_status'] = 'Đã thanh toán';
            $payment_id = DB::table('tbl_payment')->insertGetId($data);

            //insert order
            $order_data = array();
            $order_data['customer_id'] = Session::get('customer_id');
            $order_data['shipping_id'] = Session::get('shipping_id');
            $order_data['payment_id'] = $payment_id;
            $order_data['order_total'] = Cart::subtotal();
            $order_data['order_status'] = 'Đang chờ xử lý';
            $order_id = DB::table('tbl_order')->insertGetId($order_data);

            //insert order_details
            $content = Cart::content();
            
            foreach($content as $v_content){
                $order_d_data['order_id'] = $order_id;
                $order_d_data['product_id'] = $v_content->id;
                $order_d_data['product_name'] = $v_content->name;
                $order_d_data['product_price'] = $v_content->price;
                $order_d_data['product_sales_quantity'] = $v_content->qty;
                DB::table('tbl_order_details')->insert($order_d_data);
            }
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);

        }else{
            echo 'Thanh toán online';
        }
        
    }

    public function show_cart_checkout()
    {
        Session::put('message','Thanh toán giỏ hàng thành công');
        return view('pages/cart/cart');
    }

    public function update_to_cart(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart;
        Cart::update($rowId,$qty);
        return Redirect::to('/payment');
    }

}
