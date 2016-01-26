<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TO //extends Model
{	
	public $nama;
	public $kode_to;
	public $tanggal_dikunci;
	private $insert_status=true;
	private $database = 'to';

    public function __construct($kode_to=null){

    	if($this->cariKode($kode_to)){
    		$this->insert_status=false;
    	} else {
    		$this->insert_status=true;    
    	}
    		
    }

    public function listAll(){

    	$to = DB::table('to')->get();

    	return $to;

    }

    public function save()
    {
    	if ($this->insert_status){
    		return $this->insert();
    	} else {
    		return $this->update();
    	}
    }

	private function update()
    {
    	$jo1= DB::table('to')
            ->where('kode_to', $this->kode_to)
            ->update(['nama' => $this->nama,
            	      'tanggal_dikunci' => $this->tanggal_dikunci
            	      ]);


            if(isset($jo1))
            {
            	return true;

            } else {

            	return false;

            }
    }

    private function insert()
    {	
    	$kode_to_temp="HelloJonny".$this->nama;

    	$id1 = DB::table('to')->insertGetId(
		    ['nama'=> $this->nama, 
		     'kode_to'=>$kode_to_temp,
		     'tanggal_dikunci' => $this->tanggal_dikunci]
		);

		$kode_to_encrypt ="to".$id1;

		$jo2= DB::table('to')
            ->where('id', $id1)
            ->update(['kode_to' => sha1('to'.$id1)])
            ;

		if (isset($id1)){
			return true;
		}
    }

    public function hapus()
    {
    	DB::table('to')->where('kode_to', $this->kode_to)->delete();
   
    }

    private function cariKode($kode_to){

    	$to = DB::table('to')->where('kode_to', $kode_to)->first();
    	if (isset($to->kode_to)){
    		$this->kode_to=$to->kode_to;
    		$this->nama=$to->nama;
    		$this->tanggal_dikunci=$to->tanggal_dikunci;

    		return true;

    	} else {

    		return false;
    	}

    }
    




}

