<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index(){
        if (Auth::guard('parent')->check()!=null){
            return view('dashboard.dashboard.parent');

        }elseif (Auth::guard('student')->check()){
            return view('dashboard.dashboard.student');
        }
        else{
            return view('dashboard.dashboard.student');

        }
    }
}
