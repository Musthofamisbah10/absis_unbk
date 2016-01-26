<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mapel;
use App\Soal;
use App\TOMapel;
use App\TO;
use App\Token;
use App\Ujian;
use DB;
use App\TOAuth;

class UjianController extends Controller
{

	public function viewCoba($kode_to,$id_mapel,$kode_to_auth){

        $this->kode_to = $kode_to;
        $this->id_mapel = $id_mapel;

        $get_to_auth = DB::table('to_auth_temp')
            ->where('kode_to_auth',$kode_to_auth)
            ->first();

        $kloter = DB::table('kloter')
            ->where('id',$get_to_auth->id_kloter)
            ->first();

        $tanggal_ujian = DB::table('tanggal_ujian')
            ->where('kode_to',$kode_to)
            ->where('id_mapel',$id_mapel)
            ->first();

        $toMapel = new TOMapel($kode_to,$id_mapel);
        $mapel = new Mapel('SMA',null,$id_mapel);
        $to = new TO($kode_to);

        $data['kode']=$kode_to." ".$id_mapel;
        $data['kode_to']=$kode_to;
        $data['id_mapel']=$id_mapel;
        $data['nama_mapel']=$mapel->getNama();
        $data['nama_to']=$to->nama;
        $data['nisn']="99999999999";
        $data['nama_user']="Admin";
        $data['waktu']="120 menit";

        $auth = new TOAuth(session()->get('username'));

       // $data['status']=$auth->cekAuth($kode_to,$id_mapel,$get_to_auth->id_kloter,$get_to_auth->id_siswa);

        if ($auth->cekAuth($kode_to,$id_mapel,$get_to_auth->id_kloter,$get_to_auth->id_siswa)) {
           $data['status']="AKTIVASI SUKSES, ANDA BISA MENGERJAKAN UJIAN";
        } else {
           $data['status']=$auth->error;
        }

        $data['waktu_kloter']=$kloter->waktu_dibuka." s/d ".$kloter->waktu_ditutup;
        $data['tanggal_ujian']=$tanggal_ujian->tanggal;

        //$data['status']="120 menit";
        
        $data['previous']="/admin/tryout/edit/".$kode_to."/".$id_mapel;
        $data['next']="/admin/tryout/ujian/".$kode_to."/".$id_mapel;

        return view('main.siswa.start')->with('data',$data);
    }    

    public function viewUjian($kode_to,$id_mapel,$kode_to_auth){

        $toMapel = new TOMapel($kode_to,$id_mapel);
        $mapel = new Mapel('SMA',null,$id_mapel);
        $to = new TO($kode_to);

        $soal = new Ujian($kode_to_auth);

        $get_to_auth = DB::table('to_auth_temp')
            ->where('kode_to',$kode_to)
            ->where('id_mapel',$id_mapel)
            ->where('username','admin')
            ->first();

        $daftarSoal =  $soal -> listAll();
        $data['jml_soal']=sizeof($daftarSoal);

        if ($data['jml_soal']<>0) {
        	# code...

        $html = "";

        $data['isi_jawaban'] ="";
            
            $huruf = array("A","B","C","D","E");

            $soalA = new Soal($kode_to,$id_mapel,$daftarSoal[0]->kode_soal);

            $jawaban=$soalA->getJawaban();
            $isi=$soalA->getIsiSoal();
////\\


            $get_kode_soal = DB::table('jawaban_siswa')
                    ->where('kode_to_auth',$kode_to_auth)
                    ->orderBy('no_soal', 'asc')
                    ->first();

            $kode_jawaban = $get_kode_soal->kode_jawaban;

                if ($kode_jawaban<>null) {

                    $get_jawaban = DB::table('soal_jawaban')
                        ->where('kode_jawaban',$kode_jawaban)
                        ->first();

                    $jawab=$get_jawaban->urutan_untuk_guru;
                    # code...
                } else {

                    $jawab=null;

                }


            for ($i=0; $i < 5; $i++) { 

                    if ($i==$jawab) {

                        $checked='checked="1"';
                        # code...
                    } else {
                        $checked="";
                    }


                    

                    $data['isi_jawaban'] .= '<table>
                                                <tr>
                                                    <td ><input '.$checked.' kode-jawaban="'.$jawaban[$i]->kode_jawaban.'" type="radio" name="radio" id="kodeJawaban'.$huruf[$i].'" class="jawab" value="'.$huruf[$i].'" />&nbsp;&nbsp;</td>
                                                    <td >'.$huruf[$i].'.&nbsp;</td>
                                                    <td id="jawabanIsi'.$huruf[$i].'">'.$jawaban[$i]->isi_jawaban.'</td>
                                                </tr>
                                            </table>
                                     ';
                 
            }

        $data['html_nav']='<table width="100%">';

        $jumlah_baris = floor($data['jml_soal']/3);

        if (($data['jml_soal'] % 3) ==2) {
                $kolom1=$jumlah_baris+1;
                $kolom2=$jumlah_baris+1;
                $kolom3=$jumlah_baris;
            } elseif (($data['jml_soal'] % 3) ==1) {
                $kolom1=$jumlah_baris+1;
                $kolom2=$jumlah_baris;
                $kolom3=$jumlah_baris;
            } else {
                $kolom1=$jumlah_baris;
                $kolom2=$jumlah_baris;
                $kolom3=$jumlah_baris;
            }

        $a=1;
        $b=1;
        $c=1;

        for ($i=0; $i < $kolom1;$i++) { 
            
            $no_kolom1=$a;
            $no_kolom2=$a+$kolom1;
            $no_kolom3=$a+$kolom1+$kolom2;

            $no_soal_array = array($no_kolom1,$no_kolom2,$no_kolom3);
            $jawaban_huruf_array = array ("A","B","C","D","E");

            $data['html_nav'].='<tr>';


                if ($a<=$kolom1) {
                    $data['html_nav'].='<td><a href="#" class="get" no-soal="'.$no_kolom1.'" alt="01" id="soalno-'.$no_kolom1.'">'.$no_kolom1.'</a> : <span class="jawaban_user" id="no'.$no_kolom1.'" no-soal="'.$no_kolom1.'" id-jawaban=""></span></td>';
                    $a++;
                }

                if ($b<=$kolom2) {
                    $data['html_nav'].='<td><a href="#" class="get" no-soal="'.$no_kolom2.'" alt="01">'.$no_kolom2.'</a> : <span class="jawaban_user" id="no'.$no_kolom2.'" no-soal="'.$no_kolom2.'" id-jawaban=""></span></td>';
                    $b++;
                }

                if ($c<=$kolom3) {
                    $data['html_nav'].='<td><a href="#" class="get" no-soal="'.$no_kolom3.'" alt="01">'.$no_kolom3.'</a> : <span class="jawaban_user" id="no'.$no_kolom3.'" no-soal="'.$no_kolom3.'" id-jawaban=""></span></td>';
                    $c++;
                }


            }

        $data['html_nav'].='</tr>';

        $data['html_nav'].='</table>';

        $data['isi_soal'] = $isi->isi_soal;
        $data['kode_soal'] = $daftarSoal[0]->kode_soal;

        $data['kode']=$kode_to." ".$id_mapel;
        $data['kode_to']=$kode_to;
        $data['id_mapel']=$id_mapel;
        $data['nama_mapel']=$mapel->getNama();
        $data['nama_to']=$to->nama;
        $data['nisn']="99999999999";
        $data['nama_user']="Admin";




        $waktu_mapel = DB::table('mapel')
                    ->where('id',$id_mapel)
                    ->first();

        $waktu=$waktu_mapel->waktu_menit;

        if ($get_to_auth->waktu_mulai_kerja == 0) {

            $date = $daftarSoal[0]->created_at;
            $currentDate = strtotime($date);
            $futureDate = $currentDate+(60*$waktu);
            $formatDate = date("Y-m-d H:i:s", $futureDate);

            date_default_timezone_set("Asia/Bangkok");

            $to_start_finish = DB::table('to_auth_temp')
                        ->where('username','admin')
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->update(['waktu_mulai_kerja' => date("Y-m-d H:i:s")]);

            if ($id_mapel==7) {

                $data['audio'] = '<audio autoplay id="audio">
                  <source src="/mp3/mp3.mp3" type="audio/mp3">
                 
                    Your browser does not support the audio element.
                </audio>';

                $data['peringatan_audio'] = 'window.onbeforeunload = function ()
                 {
                     return "Apakah anda yakin ingin merefresh halaman ini? Jika anda refresh maka audio akan berhenti dan tidak akan diputar ulang";
                 };';
                # code...
            } else {
                $data['audio'] ="";
                $data['peringatan_audio']="";
            }

            
            # code...
        } else {

            $date = $get_to_auth->waktu_mulai_kerja;
            $currentDate = strtotime($date);
            $futureDate = $currentDate+(60*$waktu);
            $formatDate = date("Y-m-d H:i:s", $futureDate);

            $data['audio'] = '';
            $data['peringatan_audio']="";

        }


        $data['waktu_selesai']=$formatDate;

        $data['kode_to_auth']=$kode_to_auth;


        
        $data['kembali']='<li><a href="/admin/tryout/edit/'.$kode_to.'/'.$id_mapel.'" >Kembali</a></li>';
        //'';

        return view('main.siswa.ujian')->with('data',$data);

    } else {

    	return '    tidak ada soal <a href="/">keluar</a>';
    }

    }

    public function get(Request $request,$kode_to,$id_mapel,$no_soal){

        $toauth = $request->kode_to_auth;

        $get_kode_soal = DB::table('jawaban_siswa')
                    ->where('kode_to_auth',$toauth)
                    ->where('no_soal',$no_soal)
                    ->first();

        $kode_soal = $get_kode_soal->kode_soal;

        $get_soal = DB::table('soal')
                    ->where('kode_soal',$kode_soal)
                    ->first();

        $isi_soal = $get_soal ->isi_soal;

        $get_jawaban = DB::table('soal_jawaban')
                    ->where('kode_soal',$kode_soal)
                    ->orderBy('urutan_untuk_guru', 'asc')
                    ->get();


        $data['isi_soal']=$isi_soal;
        $data['kode_soal']=$kode_soal;

        $jawabansiswa = $get_kode_soal->kode_jawaban;

        for ($i=0; $i < 5; $i++) { 

            $data[$i]['isi_jawaban']=$get_jawaban[$i]->isi_jawaban;
            $data[$i]['kode_jawaban']=$get_jawaban[$i]->kode_jawaban;
            if ($jawabansiswa==null) {

               $data[$i]['jawaban']='0';

            } elseif ($jawabansiswa==$data[$i]['kode_jawaban']){

               $data[$i]['jawaban']='1';

            }
            
        }


        return json_encode($data,JSON_PRETTY_PRINT);
    }    

    public function update(Request $request,$kode_to,$id_mapel,$kode_soal){

        $toauth = $request->kode_to_auth;

        $jo1= DB::table('jawaban_siswa')
            ->where('kode_soal', $kode_soal)
            ->where('kode_to_auth', $toauth)
            ->update(['kode_jawaban' => $request->kode_jawaban]);

        //$jawabansiswa = new JawabanSiswa($kode_to,$id_mapel,$kode_soal);

        return $jo1;//
    }    

    public function selesai(Request $request,$kode_to,$id_mapel,$kode_soal){

        $toauth = $request->kode_to_auth;

        //$dt = new DateTime();

        date_default_timezone_set('Asia/Jakarta');

        $data = array('isi_soal' => date('Y-m-d H:i:s'),
                      'kode_soal' => "joss");

         return json_encode($data,JSON_PRETTY_PRINT);
    } 

    public function getDaftarJawaban(Request $request,$kode_to,$id_mapel,$kode_soal){

        $toauth = $request->kode_to_auth;

        //$array_huruf = array ("A","B","C","D","E");

        $get_kode_soal = DB::table('jawaban_siswa')
                    ->where('kode_to_auth',$toauth)
                    ->orderBy('no_soal', 'asc')
                    ->get();

        $jumlah_soal = sizeof($get_kode_soal);

        for ($i=0; $i < $jumlah_soal; $i++) { 

            $kode_jawaban = $get_kode_soal[$i]->kode_jawaban;

            if ($kode_jawaban<>null) {

                $get_jawaban = DB::table('soal_jawaban')
                    ->where('kode_jawaban',$kode_jawaban)
                    ->first();

                $jawaban[$i]=$get_jawaban->urutan_untuk_guru;
                # code...
            } else {

                $jawaban[$i]="";

            }

            

            //if (($get_jawaban->urutan_untuk_guru)<>null) {

                //$jawaban[$i]=$array_huruf[$get_jawaban->urutan_untuk_guru];

           // } else {

               // $jawaban[$i]="";
                

            //}

            
        }

        return json_encode($jawaban,JSON_PRETTY_PRINT);
    }

    public function cekKunciUjian(Request $request,$kode_to,$id_mapel){ 

        $username = session()->get('username');

        $to_mapel = DB::table('to_mapel')
            ->where('kode_to',$kode_to)
            ->where('id_mapel',$id_mapel)
            ->first();  

        $toauth = new TOAuth($username);

        $get_to_auth = DB::table('to_auth_temp')
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->where('username',$username)
                    ->first();

        $id_kloter=$get_to_auth->id_kloter;
        $id_siswa=$get_to_auth->id_siswa;

        

        if ($to_mapel->kunci==$request->kunci_ujian) {

            $to_auth = DB::table('to_auth_temp')
            ->where('id_siswa',$id_siswa)
            ->where('kode_to',$kode_to)
            ->where('id_mapel',$id_mapel)
            ->update(['dikunci' => 0]);
            # code...
        } else {

            $to_auth=0;
        }

        if ($toauth->cekAuth($kode_to,$id_mapel,$id_kloter,$id_siswa)) {
           $data['error']="AKTIVASI SUKSES, KLIK KERJAKAN UNTUK MEMULAI UJIAN";
        } else {
            $data['error']=$toauth->error;
        }

        $data['status']=$to_auth;
        

        return json_encode($data,JSON_PRETTY_PRINT);
    }

    public function authUjianSiswa($kode_to,$id_mapel){

        $this->kode_to = $kode_to;
        $this->id_mapel = $id_mapel;

        $toMapel = new TOMapel($kode_to,$id_mapel);
        $mapel = new Mapel('SMA',null,$id_mapel);
        $to = new TO($kode_to);

        $username= session()->get('username');

        $siswa = DB::table('siswa')
                    ->where('username',$username)
                    ->first();

        $get_to_auth = DB::table('to_auth_temp')
            ->where('username',$username)
            ->where('kode_to',$kode_to)
            ->where('id_mapel',$id_mapel)
            ->first();

        $kloter = DB::table('kloter')
            ->where('id',$get_to_auth->id_kloter)
            ->first();

        $tanggal_ujian = DB::table('tanggal_ujian')
            ->where('kode_to',$kode_to)
            ->where('id_mapel',$id_mapel)
            ->first();

        $data['kode']=$kode_to." ".$id_mapel;
        $data['kode_to']=$kode_to;
        $data['id_mapel']=$id_mapel;
        $data['nama_mapel']=$mapel->getNama();
        $data['nama_to']=$to->nama;
        $data['nisn']=$siswa->nisn;
        $data['nama_user']=$siswa->nama;
        $data['waktu']="120 menit";

        $auth = new TOAuth(session()->get('username'));

       // $data['status']=$auth->cekAuth($kode_to,$id_mapel,$get_to_auth->id_kloter,$get_to_auth->id_siswa);

        if ($auth->cekAuth($kode_to,$id_mapel,$get_to_auth->id_kloter,$get_to_auth->id_siswa)) {
           $data['status']="AKTIVASI SUKSES, ANDA BISA MENGERJAKAN UJIAN";
        } else {
           $data['status']=$auth->error;
        }

        $data['waktu_kloter']=$kloter->waktu_dibuka." s/d ".$kloter->waktu_ditutup;
        $data['tanggal_ujian']=$tanggal_ujian->tanggal;

        //$data['status']="120 menit";
        
        $data['previous']="/".$kode_to."/".$id_mapel;
        $data['next']="/siswa/ujian/".$kode_to."/".$id_mapel."/start";

        return view('main.siswa.start-siswa')->with('data',$data);
    }

    public function finishUjianSiswa($kode_to,$id_mapel){

        $this->kode_to = $kode_to;
        $this->id_mapel = $id_mapel;

        $toMapel = new TOMapel($kode_to,$id_mapel);
        $mapel = new Mapel('SMA',null,$id_mapel);
        $to = new TO($kode_to);

        $username= session()->get('username');

        $siswa = DB::table('siswa')
                    ->where('username',$username)
                    ->first();

        $to_auth_cek = DB::table('to_auth_temp')
                    ->where('username',$username)
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->first();

        if ($to_auth_cek->status==1) {
             return "anda sudah pernah mengerjakan ujian ini atau anda sudah selesai mengerjakan, hub admin apabila ingin mengerjakan ujian ini lagi
                    <a href='/'>Kembali</a>";
        } else {

            date_default_timezone_set("Asia/Bangkok");

            $to_auth_finish = DB::table('to_auth_temp')
                        ->where('username',$username)
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->update(['status' => 1,'waktu_selesai_kerja' => date("Y-m-d H:i:s")]);

            $data['kode']=$kode_to." ".$id_mapel;
            $data['kode_to']=$kode_to;
            $data['id_mapel']=$id_mapel;
            $data['nama_mapel']=$mapel->getNama();
            $data['nama_to']=$to->nama;
            $data['nisn']=$siswa->nisn;
            $data['nama_user']=$siswa->nama;
            $data['waktu']="120 menit";
            
            $data['previous']="/admin/tryout/edit/".$kode_to."/".$id_mapel;
            $data['next']="/admin/tryout/ujian/".$kode_to."/".$id_mapel;

            return view('main.siswa.finish')->with('data',$data);
        }
    }

    public function viewUjianSiswa($kode_to,$id_mapel){

        $toMapel = new TOMapel($kode_to,$id_mapel);
        $mapel = new Mapel('SMA',null,$id_mapel);
        $to = new TO($kode_to);

        $username= session()->get('username');

        $toauth = new TOAuth($username);

        $get_to_auth = DB::table('to_auth_temp')
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->where('username',$username)
                    ->first();

        $id_kloter=$get_to_auth->id_kloter;
        $id_siswa=$get_to_auth->id_siswa;

        if($toauth->cekAuth($kode_to,$id_mapel,$id_kloter,$id_siswa)){

            //buat daftar soal dulu~~ termasuk validasi

            $soal = new Soal($kode_to,$id_mapel);

            $val = $soal->createAcakSoal($toauth->kode_to_auth);

            if ($val){

               // $ujian = new UjianController;

                

            } elseif($val==false) {

                echo($soal->error);


            } else {

                echo "unexpected error";
                
            }

        } else {
            
            echo $toauth->error;
            //echo "    </br> ".$toauth->errorDebug;
        }

        $kode_to_auth = $toauth->kode_to_auth;

        $soal = new Ujian($kode_to_auth);

        $daftarSoal =  $soal -> listAll();
        $data['jml_soal']=sizeof($daftarSoal);

        if ($data['jml_soal']<>0) {
            # code...

        $html = "";

        $data['isi_jawaban'] ="";
            
            $huruf = array("A","B","C","D","E");

            $soalA = new Soal($kode_to,$id_mapel,$daftarSoal[0]->kode_soal);

            $jawaban=$soalA->getJawaban();
            $isi=$soalA->getIsiSoal();
////\\


            $get_kode_soal = DB::table('jawaban_siswa')
                    ->where('kode_to_auth',$kode_to_auth)
                    ->orderBy('no_soal', 'asc')
                    ->first();

            $kode_jawaban = $get_kode_soal->kode_jawaban;

                if ($kode_jawaban<>null) {

                    $get_jawaban = DB::table('soal_jawaban')
                        ->where('kode_jawaban',$kode_jawaban)
                        ->first();

                    $jawab=$get_jawaban->urutan_untuk_guru;
                    # code...
                } else {

                    $jawab=null;

                }


            for ($i=0; $i < 5; $i++) { 

                    if ($i==$jawab) {

                        $checked='checked="1"';
                        # code...
                    } else {
                        $checked="";
                    }


                    

                    $data['isi_jawaban'] .= '<table>
                                                <tr>
                                                    <td ><input '.$checked.' kode-jawaban="'.$jawaban[$i]->kode_jawaban.'" type="radio" name="radio" id="kodeJawaban'.$huruf[$i].'" class="jawab" value="'.$huruf[$i].'" />&nbsp;&nbsp;</td>
                                                    <td >'.$huruf[$i].'.&nbsp;</td>
                                                    <td id="jawabanIsi'.$huruf[$i].'">'.$jawaban[$i]->isi_jawaban.'</td>
                                                </tr>
                                            </table>
                                     ';
                 
            }

        $data['html_nav']='<table width="100%">';

        $jumlah_baris = floor($data['jml_soal']/3);

        if (($data['jml_soal'] % 3) ==2) {
                $kolom1=$jumlah_baris+1;
                $kolom2=$jumlah_baris+1;
                $kolom3=$jumlah_baris;
            } elseif (($data['jml_soal'] % 3) ==1) {
                $kolom1=$jumlah_baris+1;
                $kolom2=$jumlah_baris;
                $kolom3=$jumlah_baris;
            } else {
                $kolom1=$jumlah_baris;
                $kolom2=$jumlah_baris;
                $kolom3=$jumlah_baris;
            }

        $a=1;
        $b=1;
        $c=1;

        for ($i=0; $i < $kolom1;$i++) { 
            
            $no_kolom1=$a;
            $no_kolom2=$a+$kolom1;
            $no_kolom3=$a+$kolom1+$kolom2;

            $no_soal_array = array($no_kolom1,$no_kolom2,$no_kolom3);
            $jawaban_huruf_array = array ("A","B","C","D","E");

            $data['html_nav'].='<tr>';


                if ($a<=$kolom1) {
                    $data['html_nav'].='<td><a href="#" class="get" no-soal="'.$no_kolom1.'" alt="01" id="soalno-'.$no_kolom1.'">'.$no_kolom1.'</a> : <span class="jawaban_user" id="no'.$no_kolom1.'" no-soal="'.$no_kolom1.'" id-jawaban=""></span></td>';
                    $a++;
                }

                if ($b<=$kolom2) {
                    $data['html_nav'].='<td><a href="#" class="get" no-soal="'.$no_kolom2.'" alt="01">'.$no_kolom2.'</a> : <span class="jawaban_user" id="no'.$no_kolom2.'" no-soal="'.$no_kolom2.'" id-jawaban=""></span></td>';
                    $b++;
                }

                if ($c<=$kolom3) {
                    $data['html_nav'].='<td><a href="#" class="get" no-soal="'.$no_kolom3.'" alt="01">'.$no_kolom3.'</a> : <span class="jawaban_user" id="no'.$no_kolom3.'" no-soal="'.$no_kolom3.'" id-jawaban=""></span></td>';
                    $c++;
                }


            }

        $data['html_nav'].='</tr>';

        $data['html_nav'].='</table>';

        $data['isi_soal'] = $isi->isi_soal;
        $data['kode_soal'] = $daftarSoal[0]->kode_soal;

        $data['kode']=$kode_to." ".$id_mapel;
        $data['kode_to']=$kode_to;
        $data['id_mapel']=$id_mapel;
        $data['nama_mapel']=$mapel->getNama();
        $data['nama_to']=$to->nama;


        $siswa = DB::table('siswa')
                    ->where('username',$username)
                    ->first();


        $data['nisn']=$siswa->nisn;
        $data['nama_user']=$siswa->nama;


        $waktu_mapel = DB::table('mapel')
                    ->where('id',$id_mapel)
                    ->first();

        $waktu=$waktu_mapel->waktu_menit;

        

        if ($get_to_auth->waktu_mulai_kerja == 0) {

            $date = $daftarSoal[0]->created_at;
            $currentDate = strtotime($date);
            $futureDate = $currentDate+(60*$waktu);
            $formatDate = date("Y-m-d H:i:s", $futureDate);

            date_default_timezone_set("Asia/Bangkok");

            $to_start_finish = DB::table('to_auth_temp')
                        ->where('username',$username)
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->update(['waktu_mulai_kerja' => date("Y-m-d H:i:s")]);

            if ($id_mapel==7) {


                $data['audio'] = '<audio autoplay id="audio">
                  <source src="/mp3/mp3.mp3" type="audio/mp3">
                 
                    Your browser does not support the audio element.
                </audio>';

                $data['peringatan_audio'] = 'window.onbeforeunload = function ()
                 {
                     return "Apakah anda yakin ingin merefresh halaman ini? Jika anda refresh maka audio akan berhenti dan tidak akan diputar ulang";
                 };';
                # code...
            } else {
                $data['audio'] ="";
                $data['peringatan_audio']="";
            }
            # code...
        } else {

            $date = $get_to_auth->waktu_mulai_kerja;
            $currentDate = strtotime($date);
            $futureDate = $currentDate+(60*$waktu);
            $formatDate = date("Y-m-d H:i:s", $futureDate);

            $data['audio'] ="";
            $data['peringatan_audio']="";

        }

        $data['waktu_selesai']=$formatDate;

        $data['kode_to_auth']=$kode_to_auth;
        
        $data['kembali']='<li><a href="/admin/tryout/edit/'.$kode_to.'/'.$id_mapel.'" >Kembali</a></li>';
        //'';

        return view('main.siswa.ujian-siswa')->with('data',$data);

    } else {

        return 'ngga ada soal <a href="/">keluar</a>';
    }

    }
}
