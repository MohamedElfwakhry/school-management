<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function index(){
        return view('dashboard.login');
    }

    public function login(Request $request){

        if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect() -> route('dashboard');
        }elseif (auth()->guard('teacher')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect() -> route('dashboard');
        }elseif (auth()->guard('parent')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect() -> route('students-classroom');
        }elseif(auth()->guard('student')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

            return redirect() -> route('dashboard');
        }
        else
            return redirect()->back()->with(['error'=> 'هناك خطا ما'])->withInput($request->all());

    }

    public function logOut(){
        auth()->logout();
        return redirect()-> route('get.admin.login');
    }
    public function save(){
        $admin = new App\Models\Admin();
        $admin -> name = "Mohamed Magdy";
        $admin -> email = "mohamed@gmail.com";
        $admin -> password = bcrypt("12345678");
        $admin ->save();
    }
}
