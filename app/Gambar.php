<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gambar //extends Model
{	
	public $id_soal;
	private $database = 'gambar';

    public function __construct($id_soal)
    {
    	$this->id_soal=$id_soal;	
    }

    public function set(){

    }

    public function listAll(){

    }

    public function save(){

    }

    public function insert(){

    }

    public function update(){

    }

    public function delete(){

    }



}
