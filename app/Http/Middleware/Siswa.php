<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Siswa
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
            if (session()->get('role')=="siswa") {
                return $next($request);   
            }else{
                return redirect('home');     
            }
        }else{
            return redirect('home');            
        }
    }
}
