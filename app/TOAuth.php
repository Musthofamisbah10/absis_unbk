<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\TanggalUjian;

class TOAuth //extends Model
{

    public $link_ujian="";
    private $username;
    public $error;
    public $kode_to_auth;
    public $errorDebug="";
    //private $database="to_auth_temp";

    public function __construct($username=null){

        $this->username=$username;

        //$this->cek();

    }

    public function deleteAuth($kode_to,$id_mapel,$id_kelas){

        $toauth = DB::table('to_auth_temp')
                ->where('kode_to', $kode_to)
                ->where('id_mapel', $id_mapel)
                ->where('id_kelas', $id_kelas)
                ->get();

        $jumlah_user = sizeof($toauth);

        $jo1= DB::table('to_auth_temp')
            ->where('kode_to', $kode_to)
            ->where('id_mapel', $id_mapel)
            ->where('id_kelas', $id_kelas)
            ->delete();

        // for ($i=0; $i < $jumlah_user; $i++) { 

        //     $username = $toauth[$i]->username; 

        //     $jo2= DB::table('users')
        //     ->where('username', $username)
        //     ->delete();
        // }

        //return $jo1." ".$jo2;




    }

    public function cekAuth($kode_to,$id_mapel,$id_kloter,$id_siswa){

        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $time_stamp = date('Y-m-d H:i:s');

        $auth = DB::table('to_auth_temp')
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->where('id_siswa',$id_siswa)
                        ->first();

        $tanggal_ujian = DB::table('tanggal_ujian')
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->first();

        $kloter_ujian = DB::table('kloter')
                        ->where('id',$id_kloter)
                        ->first();

        $waktu_mapel = DB::table('mapel')
                        ->where('id',$id_mapel)
                        ->first();

        if ($auth->waktu_mulai_kerja != 0) {

            $waktu_akhir = strtotime($auth->waktu_mulai_kerja.' + '.$waktu_mapel->waktu_menit.' minute');

            if ($time_stamp<$waktu_akhir) {
                $cek_waktu = true;
            } else {
                $cek_waktu= false;
            }
            
        } else {

            $cek_waktu= false;

        }

        if (isset($tanggal_ujian->tanggal)) {

        	if ($tanggal_ujian->tanggal == $date) {

        		$cek_tanggal = true;
        		$this->errorDebug .= "tanggal sukses";

        	} else {

        		$cek_tanggal = false;
        		$this->errorDebug .= "tanggal ngga masuk sekarang".$date." dibuka".$tanggal_ujian->tanggal;

        	}
        	
        } else {

        	$cek_tanggal = false;
        	$this->errorDebug .= "tanggal belum di set";

        }

        if (($time > $kloter_ujian->waktu_dibuka) AND ($time < $kloter_ujian->waktu_ditutup)) {
        	
        	$cek_kloter = true;
        	//$this->errorDebug .= "waktu sukses, dibuka ".$kloter_ujian->waktu_dibuka." waktu waktu_ditutup ".$kloter_ujian->waktu_ditutup." sekarang".$time;

        } else {

        	$cek_kloter = false;
        	$this->errorDebug .= "waktu ngga masuk";

        }
        


        if (isset($auth->kode_to_auth)) {

        	if ($auth->status==0) {

        		if ($cek_tanggal) {

        			if ($cek_kloter OR $cek_waktu) {

        				if ($auth->dikunci==0) {
        					
        					$waktu_mapel = DB::table('mapel')
				                ->where('id',$id_mapel)
				                ->first();

				            $waktu=$waktu_mapel->waktu_menit;


				            // $currentDate = strtotime($date);
				            // $futureDate = $currentDate+(60*$waktu);
				            // $formatDate = date("Y-m-d H:i:s", $futureDate);

				            // $jo1= DB::table('to_auth_temp')
				            // ->where('kode_to_auth', $this->kode_to_auth)
				            // ->update(['waktu_mulai_kerja' => date('Y-m-d H:i:s')]);

				            $this->kode_to_auth=$auth->kode_to_auth;

				            return true;  

        				} else {

        					$this->error="Ujian ini masih terkunci, buka dengan memasukkan kode kunci/aktivasi ".$auth->dikunci;

            				return false;

        				}

        			} else {

        				$this->error="Kloter Anda Tidak sesuai, tunggu waktu kloter anda";

        				return false;

        			}

        		} else {

        			$this->error="Tanggal Ujian Anda tidak sesuai, tunggu sesuai tanggal ujian";

        			return false;

        		}

        	} else {

        		$this->error="Anda telah selesai mengerjakan ujian ini, hub admin bila anda butuh untuk perpanjangan waktu atau mengerjakan ulang";

        		return false;

        	}
            

        } else {

            $this->error="Access Denied - TOKEN tidak dikenal atau Waktu anda sudah habis atau Tanggal Ujian Anda tidak sesuai <a href='/'>Klik untuk kembali</a>";

            return false;
        }
    }

    private function getLink(){

        $toauth = DB::table('to_auth_temp')
                        ->where('username',$this->username)
                        ->where('status','1')
                        ->first();

        $this->link_ujian = "/admin/tryout/ujian/".$toauth->kode_to."/".$toauth->id_mapel;

    }

    public function createAuth($kode_to,$id_mapel,$id_kloter,$id_siswa,$id_kelas){

        $auth = DB::table('to_auth_temp')
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->where('id_siswa',$id_siswa)
                        ->where('id_kelas',$id_kelas)
                        ->first();

        if (isset($auth->kode_to_auth)) {

            //$this->e="sudah ada data";

            $this->kode_to_auth=$auth->kode_to_auth;

            return true;      

        } else {

            //membuat username dan password unik untuk mengerjakan soal, unik tiap username, to, dan mapel
            // $token = new Token($this->username,$kode_to,$id_mapel);

            // $token->buatToken();

            // $username = $token->username_token;

            $siswa = DB::table('siswa')
                        ->where('id',$id_siswa)
                        ->first();

            $nisn = $siswa->nisn;

            $password = strrev($nisn);

            $kode_to_auth = hash('sha256',$id_siswa.$kode_to.$id_mapel);

            $id1 = DB::table("to_auth_temp")->insert(
                    ['kode_to_auth'=> $kode_to_auth, 
                     'id_mapel' => $id_mapel,
                     'id_kloter'=> $id_kloter,
                     'kode_to' => $kode_to,
                     'id_kelas' => $id_kelas,
                     'password'=> $password,
                     'username'=> $nisn,
                     'id_siswa' => $id_siswa]);

            if ($id_siswa=='99999999') {
                # code... 

            } else {

            	$cek_users = DB::table('users')
                        ->where('username',$nisn)
                        ->first();

                if (isset($cek_users->username)) {


                	# code...


                } else {


                	$id1 = DB::table("users")->insert(
                    	['role' => 'siswa',
	                     'username'=> $nisn,
	                     'password'=> bcrypt($password)]);

                }

                

            }

            if($id1<>0){

                $this->kode_to_auth=$kode_to_auth;
                return true;

            } else {

                $this->error = $id1->errorInfo;

               return false;
            }

        }

    }
}
