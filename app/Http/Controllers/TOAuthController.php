<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TOMapelController;
use App\Http\Controllers\UjianController;
use App\Soal;
use App\TOAuth;
use DB;

class TOAuthController extends Controller
{
    public function aksesAdmin($kode_to,$id_mapel){

    	$toauth = new TOAuth(session()->get('username'));

    	$id_kloter="9999";
    	$id_siswa="99999999";

        if($toauth->cekAuth($kode_to,$id_mapel,$id_kloter,$id_siswa)){

    		//buat daftar soal dulu~~ termasuk validasi

            $soal = new Soal($kode_to,$id_mapel);

            $val = $soal->createAcakSoal($toauth->kode_to_auth);

            if ($val){

                $ujian = new UjianController;

                return $ujian->viewUjian($kode_to,$id_mapel,$toauth->kode_to_auth);

            } elseif($val==false) {

                return $soal->error;

            } else {

                return "unexpected error";
                
            }

    	} else {
    		
    		return $toauth->error;
           //return $toauth->errorDebug;
    	}

    }

    public function baruAdmin($kode_to,$id_mapel){

    	$toauth = new TOAuth(session()->get('username'));

    	$id_kloter="9999";
    	$id_siswa="99999999";
        $id_kelas = "999999";

        $jo1= DB::table('to_auth_temp')
            ->where('kode_to', $kode_to)
            ->where('id_mapel', $id_mapel)
            ->where('id_kelas', $id_kelas)
            ->where('id_siswa', $id_siswa)
            ->delete();

    	if($toauth->createAuth($kode_to,$id_mapel,$id_kloter,$id_siswa,$id_kelas)){

    		$ujian = new UjianController;

    		return $ujian->viewCoba($kode_to,$id_mapel,$toauth->kode_to_auth);

    	} else {

    		return $toauth->error;
    	}
    	
    }

    public function aksesSiswa($kode_to,$id_mapel,$username_siswa){

    	$toauth = new TOAuth($username_siswa);

    	// $id_kloter="9999";
    	// $id_siswa="99999999";

        if($toauth->cekAuth($kode_to,$id_mapel,$id_kloter)){

    		$ujian = new UjianController;

    		return $ujian->viewUjian($kode_to,$id_mapel,$toauth->kode_to_auth);

    	} else {
    		
    		return $toauth->error;
    	}

    }

    private function baruSiswa($kode_to,$id_mapel,$id_kloter,$id_kelas){

    	$toauth = new TOAuth(session()->get('username'));

    	//$id_kloter="9999";

    	if($toauth->createAuth($kode_to,$id_mapel,$id_kloter,$id_siswa)){

    		$ujian = new UjianController;

    		return $ujian->viewCoba($kode_to,$id_mapel,$toauth->kode_to_auth);

    	} else {

    		return $toauth->error;
    	}
    	
    }

    public function baruKelas($kode_to,$id_mapel,$id_kloter,$id_kelas){

    }

}
