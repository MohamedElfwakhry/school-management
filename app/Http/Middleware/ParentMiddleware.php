<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentMiddleware
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
            return $next($request);
        }elseif(Auth::guard("parent")->check()){
            return $next($request);
        }elseif(Auth::user() == null) {
            return redirect() -> route('get.admin.login');
        }else{
            return redirect() -> route('permision');
        }

    }
}
