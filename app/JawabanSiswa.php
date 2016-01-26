<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanSiswa extends Model
{	
	private $kode_to_auth;
	private $kode_jawaban;
	private $kode_soal;

    public function __construct($kode_to_auth,$kode_jawaban,$kode_soal){

    	$this->kode_to_auth=$kode_to_auth;
    	$this->kode_jawaban->$kode_jawaban;
    	$this->kode_soal=$kode_soal;

    }
}
