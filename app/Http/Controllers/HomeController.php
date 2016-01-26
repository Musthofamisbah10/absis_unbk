<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Siswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        if (session()->has('role')) {
            if (session()->get('role')=="admin") {
                return view('main.admin.home');
            }elseif (session()->get('role')=="guru") {
                return view('main.guru.home');
            }elseif (session()->get('role')=="siswa") {
                return view('main.siswa.home');
            }else{
                return redirect('logout');                
            }
        }else{
            return redirect('logout');            
        }
        
    }

    public function hello()
    {
        $siswa = new Siswa();
        echo $siswa->hello();
        $siswa->nama="Aria";
        $siswa->save();
    }
}
