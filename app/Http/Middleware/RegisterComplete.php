<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterComplete
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
        if(auth()->guest()){
            return redirect('/login_warning');
        }else{
            if(is_null(Auth::user()->gender)){
                return redirect('/after_register');
            }else{
                return $next($request);
            }
        }


    }
}
