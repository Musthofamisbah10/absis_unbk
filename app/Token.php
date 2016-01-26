<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Token 
{
    private $database = "to_auth_temp";
    //private $nis;
    private $kode_to;
    private $id_kloter;
    private $id_kelas;

    private $username;

    public $username_token;
    public $password_token;


    protected $token_username = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    protected $token_password1 = array('tugu','muda','tiga','hero','pahwalan','pemuda','sukses','imam','bonjol','gajah','rusa','polo','kipas','angin','tanah','wow');
    //protected $token_password2 = array('');

    public function __construct($username,$kode_to,$id_mapel){

    	$this->username=$username;
        $this->kode=$kode_to;
        $this->id_mapel=$id_mapel;

    }

    private function cekPassword($password){

        $token = DB::table($this->database)
                    ->where('password',$password)
                    ->first();

        if (isset($token->kode_to_auth)) {

            return true;

        } else {

            return false;

        }

    }

    private function cekUsername($username){

        $token = DB::table($this->database)
                    ->where('username',$username)
                    ->first();

        if (isset($token->kode_to_auth)) {

            return true;

        } else {

            return false;

        }

    }     

    public function buatToken(){

    	$this->buatUsername();
        $this->buatPassword();

    }



    private function buatUsername(){

        $username= $this->username.$this->token_username[mt_rand(0,25)].$this->token_username[mt_rand(0,25)].$this->token_username[mt_rand(0,25)];

        if ($this->cekUsername($username)) {

            $this->buatUsername();

        } else {

            $this->username_token = $username;

        }

    }

    private function buatPassword(){

        $password= $this->token_password1[mt_rand(0,15)].mt_rand(1000,9999);

        if ($this->cekPassword($password)) {

            $this->buatPassword();

        } else {

            $this->password_token = $password;  

        }

    }
}
