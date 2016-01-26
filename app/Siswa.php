<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Siswa //extends Model
{   
    public $username;
    public $nama;
    public $kelas;
    public $bidang;
    public $nis;
    public $nisn;
    private $insert_status=true;
    private $id_siswa;
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

    public function listAll(){

        $siswa = DB::table('siswa')
                    ->get();

        return $siswa;

    }

    public function listAllKelas(){

        $siswa = DB::table('siswa')
                    ->select('nickname_kelas')
                    ->distinct()
                    ->get();

        return $siswa;

    }

    public function searchSiswa($query, $page){
        if ($page != 0){

            $skip = $page*50;
            $siswa = DB::table('siswa')
                    ->where('nama', 'LIKE',"%{$query}%")
                    ->orderBy('nickname_kelas', 'ASC')
                    ->skip($skip)
                    ->take(100000)
                    ->get();
        } else {

            $siswa = DB::table('siswa')
                    ->where('nama', 'LIKE',"%{$query}%")
                    ->orderBy('nickname_kelas', 'ASC')
                    ->get();
        }
        

        return $siswa;
    }

    public function listPaged($query, $page){

        $result = $this ->  searchSiswa($query,$page);
        $count = sizeof($result);

        return array_slice($result, $page, 50);

    }

    public function listSortedKelas($query){

        $siswa = DB::table('siswa')
                    ->where('nickname_kelas', $query)
                    ->get();

	return $siswa;

    }

    public function listPagedKelas($query){

        $result = $this ->  searchSiswa($query,$page);
        $count = sizeof($result);

        return array_slice($result, $page, 50);

    }

    public function listPagedTerakhir($query){

        $result = $this -> searchSiswa($query, $page);
        $count = sizeof($result);

        $total_pages = ceil($count/50);

        return array_slice($result, $total_pages, 50);

    }

    private function cariUsername($username)
    {
        $siswa = DB::table('siswa')->where('username', $username)->first();
        if (isset($siswa->username)){
            $this->id_siswa=$siswa->id;
            $this->kelas=$siswa->kelas;
            $this->bidang=$siswa->bidang;
            $this->nis=$siswa->nis;
            $this->nisn=$siswa->nisn;
            $this->nama=$siswa->nama;
            $this->username=$siswa->username;

            $siswa = DB::table('users')->where('username', $username)->first(); 

            if (isset($siswa->username)) 
            {
                $this->id_users=$siswa->id;
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
        $jo1= DB::table('siswa')
            ->where('id', $this->id_siswa)
            ->update(['nama' => $this->nama,
                      'kelas' => $this->kelas,
                      'bidang' => $this->bidang,
                      'nis' => $this->nis,
                      'nisn' => $this->nisn
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
        $id1 = DB::table('siswa')->insertGetId(
            ['username'=> $this->username, 
             'nisn' => $this->nisn,
             'nis'=> $this->nis,
             'nama'=> $this->nama,
             'kelas'=> $this->kelas,
             'bidang'=> $this->bidang]
        );

        $id2 = DB::table('users')->insertGetId(
            ['username'=> $this->username, 
             'password' => bcrypt($this->password),
             'role'=> 'siswa',
            ]
        );
        if (isset($id1) && isset($id2)){
            return true;
        }
    }

    public function delete()
    {
        DB::table('siswa')->where('id', $this->id_siswa)->delete();
        DB::table('users')->where('id', $this->id_users)->delete();
   
    }



}
