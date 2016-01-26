<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GambarController extends Controller
{
    public function __construct(){

    }

    public function get($kode_soal,$file_gambar){

    	if(auth()){

    		return "kirim file gambar";

    	} else {

    		return "access denied";

    	}
    	

    }
}
