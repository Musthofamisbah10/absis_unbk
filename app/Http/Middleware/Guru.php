<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Guru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('role')) {
            if (session()->get('role')=="guru") {
                return $next($request);   
            }else{
                return redirect('home');     
            }
        }else{
            return redirect('home');            
        }
    }
}
