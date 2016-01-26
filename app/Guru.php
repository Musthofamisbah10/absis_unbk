<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Guru //extends Model
{	
	public $username;
	public $nama;
	public $bidang;
	public $nip;
	private $insert_status=true;
	private $id_guru;
	private $id_users;
	public $password;

    public function __construct($username=null)
    {
    	if($this->cariUsername($username)){
    		$this->insert_status=false;
    	} else {
    		$this->insert_status=true;    
    	}
    
    		
    }

    private function cariUsername($username)
    {
    	$guru = DB::table('guru')->where('username', $username)->first();
    	if (isset($guru->username)){
    		$this->id_guru=$guru->id;
    		$this->bidang=$guru->bidang;
    		$this->nip=$guru->nip;
    		$this->nama=$guru->nama;
    		$this->username=$guru->username;

    		$guru = DB::table('users')->where('username', $username)->first(); 

    		if (isset($guru->username)) 
    		{
    			$this->id_users=$guru->id;
    			return true;

    		} else {

    			return false;
    		}

    	} else {

    		return false;
    	}

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
    	$jo1= DB::table('guru')
            ->where('id', $this->id_guru)
            ->update(['nama' => $this->nama,
            	      'bidang' => $this->bidang,
            	      'nip' => $this->nip
            	      ]);

        $jo2= DB::table('users')
            ->where('id', $this->id_users)
            ->update(['password' => bcrypt($this->password)])
            //->update(['deleted_at' => 1])
            //->update(['nis' => null])
            //->update(['nisn' => null])
            //->update(['updated_at' => $this->nisn])
            ;

            if(isset($jo1) && isset($jo2))
            {
            	return true;

            } else {

            	return false;

            }
    }

    private function insert()
    {
    	$id1 = DB::table('guru')->insertGetId(
		    ['username'=> $this->username, 
		     'nip' => $this->nip,
		     'nama'=> $this->nama,
		     'bidang'=> $this->bidang]
		);

		$id2 = DB::table('users')->insertGetId(
		    ['username'=> $this->username, 
		     'password' => bcrypt($this->password),
		     'role'=> 'guru',
		    ]
		);
		if (isset($id1) && isset($id2)){
			return true;
		}
    }

    public function delete()
    {
    	DB::table('guru')->where('id', $this->id_guru)->delete();
    	DB::table('users')->where('id', $this->id_users)->delete();
   
    }



}
