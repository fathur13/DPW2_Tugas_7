<?php
namespace App\Http\Controllers;
use Auth;

class AuthController extends Controller{

    function showLogin(){
        return view('login');
    }
    function loginProcess(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            return redirect('admin/beranda')->with('success', 'WELCOM BEK');
        }else{
            return back()->with('danger', 'login gagal');
        }
    }
    function logout(){

    }
    function registration(){

    }
    function forgetPassword(){

    }

}