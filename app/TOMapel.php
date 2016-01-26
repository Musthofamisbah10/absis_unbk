<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TOMapel
{	
	private $database = 'to_mapel';

    public function __construct($kode_to,$id_mapel){
    	if($this->cek($kode_to,$id_mapel)){

    	} else {
    		$this->buatTOMapel($kode_to,$id_mapel);
    	}
    }

    public function cek($kode_to,$id_mapel){

    	$TOMapel = DB::table($this->database)
    					->where('kode_to',$kode_to)
    					->where('id_mapel',$id_mapel)
    					->first();

    	if (isset($TOMapel->kode_to)){
    		return true;
    	} else {
    		return false;
    	}
    }

    private function buatTOMapel($kode_to,$id_mapel){
    	$id = DB::table($this->database)->insertGetId(
		    [
		     'kode_to'=> $kode_to, 
		     'id_mapel' => $id_mapel]
		);

		$TOMapel = DB::table($this->database)
			->where('id', $id)
            ->update(['kode_to_mapel' => sha1('to_mapel'.$id),
            	      ]);
    }


}
