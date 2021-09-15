<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard("admin")->check()) {
            return redirect() -> route('permision');
        }elseif(Auth::guard("teacher")->check()){
            return $next($request);
        }elseif(Auth::user() == null) {
            return redirect() -> route('permision');
        }else{
            return redirect() -> route('permision');
        }

    }
}
