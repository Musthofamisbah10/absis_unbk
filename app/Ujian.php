<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ujian //extends Model
{
	private $database = 'jawaban_siswa';
    public $kode_to;
    public $id_mapel;
    public $kode_kd;
    public $kode_soal;
    public $kode_to_auth;
    public $isi_soal;
    public $isi_jawab_a;
    public $isi_jawab_b;
    public $isi_jawab_c;
    public $isi_jawab_d;
    public $isi_jawab_e;
    public $jawaban;
    public $error;

    public function __construct($kode_to_auth){

    	$toauth = DB::table('to_auth_temp')
    				->where('kode_to_auth',$kode_to_auth)
    				->first();

        if (isset($toauth->kode_to_auth)) {

            $this->kode_to=$toauth->kode_to;
            $this->id_mapel=$toauth->id_mapel;
            $this->kode_to=$toauth->kode_to;
            $this->kode_to_auth=$kode_to_auth;
            # code...
        } else {

            // $this->kode_to=$toauth->kode_to;
            // $this->id_mapel=$toauth->id_mapel;
            // $this->kode_to=$toauth->kode_to;
            // $this->kode_to_auth=$kode_to_auth;
            return "";

        }
    	
    		
    }

    public function listAll(){

        $soal = DB::table($this->database)
                    ->where('kode_to_auth',$this->kode_to_auth)
                    ->orderBy('no_soal', 'asc')
                    ->get();

        return $soal;

    }

    public function first(){

        $soal = DB::table($this->database)
                    ->where('kode_to',$this->kode_to)
                    ->where('id_mapel',$this->id_mapel)
                    ->first();

        return $soal;

    }


    public function getJawaban(){

        $soal = DB::table('soal_jawaban')
                    ->where('kode_soal',$this->kode_soal)
                    ->get();

        return $soal;

    }

    public function getIsiSoal(){

        $soal = DB::table('soal')
                    ->where('kode_soal',$this->kode_soal)
                    ->get();

        return $soal;

    }


}
