<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('sc_admin/dashboard');
        }else{
            return Redirect::to('/sc_admin')->send();
        }
    }

    public function showdashboard(){
        $this -> AuthLogin();
        return view('admin/dashboard');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password',$admin_password)->first();
        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect('sc_admin/dashboard');
        }
        else{
            Session::put('message','Tên đăng nhập hoặc mật khẩu không đúng');
            return Redirect('/sc_admin');
        }
    }

    public function logout(Request $request)
    {
        $this -> AuthLogin();
        Auth::logout();
        Session::flush();
        return Redirect('/sc_admin');
    }
}
