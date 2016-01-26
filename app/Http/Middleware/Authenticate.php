<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\TOAuth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        //2 Lini dibawah hasil oprek, buat ngisi role di session
        $role = Auth::user()->role;
        $username = Auth::user()->username;
        session(['role'=>$role]);
        session(['username'=>$username]);

        //ngecek dulu, masih di mode test soal atau ngga?
        $toauth = new TOAuth(Auth::user()->username);

       // if($toauth->cek()){

            //return view('main.admin.ada-ujian')->with('link',$toauth->link_ujian);
            return $next($request);

        // } else{

        //     return $next($request);

        // }

    }
}
