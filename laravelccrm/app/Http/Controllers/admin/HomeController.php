<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        
         // $admin = Auth::guard('admin')->user();
         // echo 'wel '.$admin->name.'<a href="'.route('admin.logout').'">Logout</a>'; 
         // return redirect()->route('admin.dashboard');  
         return view('admin.dashboard');     
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

//return redirect()->route('admin.dashboard');
 // return Redirect::to('http://heera.it');
        // $admin = Auth::guard('admin')->user();
        // echo 'Welcome '.$admin->name.' <a href="'.route('admin.logout').'">Logout</a>';