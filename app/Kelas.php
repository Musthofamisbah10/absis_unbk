<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kelas //extends Model
{   
    public $nama;

    private $id_kelas;
    private $database = 'kelas';

    public function __construct($id_kelas=null){

        if ($id_kelas <> null) {

            $this->id_kelas = $id_kelas;

        }

            
    }

    public function listAll(){

        $kelas = DB::table($this->database)
                    ->get();

        return $kelas;

    }

    public function get(){

        if ($this->id_kelas <> null) {

            $kelas = DB::table($this->database)
                    ->where('id',$id_kelas)
                    ->first();

            return $kelas;
        }


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

