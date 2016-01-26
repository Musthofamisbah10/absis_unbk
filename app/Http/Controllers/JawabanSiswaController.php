<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\TOAuthController;
use App\JawabanSiswa;

class JawabanSiswaController extends Controller
{
 	public function updateJawaban(Request $request,$kode_to,$id_mapel,$kode_soal){

 		$toauth = $request->kode_to_auth;

 		//$jawabansiswa = new JawabanSiswa($kode_to,$id_mapel,$kode_soal);

 		return $toauth;
 	}   
}
