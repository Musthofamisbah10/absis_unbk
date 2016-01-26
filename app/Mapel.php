<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mapel 
{
	private $tingkat; 
	private $bidang;
	private $database = 'mapel';
    private $id_mapel;

    public function __construct($tingkat,$bidang=null,$id_mapel=null){
    	if ($tingkat == 'SMA' && $bidang == null) {
    		
    	} else{

    		if ($tingkat == 'SMP' OR $tingkat == 'SD') {
    			$this->tingkat=$tingkat;
    			$this->bidang="";
    		}else {
    			$this->tingkat=$tingkat;
    			$this->bidang=$bidang;
    		}
    		


    	}

        if($id_mapel<>null){
            $this->id_mapel=$id_mapel;
        }
    }

    public function listMapel(){

    	$mapel = DB::table($this->database)
    		->where('tingkat', $this->tingkat)
    		->where('bidang',$this->bidang)
    		->orderBy('mapel', 'asc')
    		->get();
    		
    	return $mapel;
    }

    public function getNama(){

        $mapel = DB::table($this->database)
            ->where('id', $this->id_mapel)
            ->first();
            
        return $mapel->mapel;
    }
}
