<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mapel;
use App\Soal;
use App\TOMapel;
use App\TO;
use DB;
use App\TOAuth;

class TOMapelController extends Controller
{
    private $kode_to;
    private $id_mapel;

	public function viewAdmin($kode_to){

        $this->kode_to = $kode_to;
        $to=new TO($kode_to);

		$data['ipa'] = $this ->createListMapel('ipa');
        $data['ips'] = $this ->createListMapel('ips');
        $data['bahasa'] = "";//$this ->createList('bahasa');
        $data['nama_to']=$to->nama;
        $data['kode_to']=$kode_to;

		return view('main.admin.tryout-lanjut')->with('data',$data);
	}

    public function viewEdit($kode_to,$id_mapel){

        $this->kode_to = $kode_to;
        $this->id_mapel = $id_mapel;

        $toMapel = new TOMapel($kode_to,$id_mapel);
        $mapel = new Mapel('SMA',null,$id_mapel);
        $to = new TO($kode_to);

        $soal = new Soal($kode_to,$id_mapel);

        $daftarSoal =  $soal -> listAll();
        $data['jml_soal']=sizeof($daftarSoal);


        

        if (isset($soal->first()->kode_soal)) {
           $data['isi_soal']=$this->createSoalAwal($kode_to,$id_mapel,$soal->first()->kode_soal);
        //     $data['isi_soal']='<iframe src="'.$link.'" style="height:100%;width:100%;margin-right:0px;margin-left:0px"></iframe>';
        } else {
           $data['isi_soal']="soal kosong, klik tombol tambah";
         }

        
        $data['list_soal']=$this->createListSoal($kode_to,$id_mapel);
        $data['kode']=$kode_to." ".$id_mapel;
        $data['kode_to']=$kode_to;
        $data['id_mapel']=$id_mapel;
        $data['nama_mapel']=$mapel->getNama();
        $data['nama_to']=$to->nama;





        return view('main.admin.to-mapel')->with('data',$data);
    }


    private function createListMapel($mapel){



        switch ($mapel) {
            case 'ipa':
                $mapelTO= new Mapel('sma','ipa');
                $mapel = $mapelTO -> listMapel();
                break;

            case 'ips':
                $mapelTO= new Mapel('sma','ips');
                $mapel = $mapelTO -> listMapel();
                break;

            case 'bahasa':
                //$mapel = array("Matematika","Fisika","Biologi","Kimia","Bahasa Indonesia","Bahasa Inggris");
                break;
            
            default:
                # code...
                break;
        }

        
        
        $html='';

        for ($i=0; $i < sizeof($mapel); $i++) { 

            $data = array('mapel' => $mapel[$i]->mapel, 
                          'kode_to' => $this->kode_to,
                          'id_mapel' => $mapel[$i]->code);

            $html .= view('main.admin.tryout-lanjut-isi')->with('data',$data);
        }
        return $html;
        
    }

    private function createListSoal(){

        $soal = new Soal($this->kode_to,$this->id_mapel);

        $daftarSoal =  $soal -> listAll();

        // $daftarSoal  = array(0 => array('kode_soal' => '090909d0as9dasodjja', 
        //                                   'isi_soal' => "hello".sizeof($isi_soal)),//print_r($isiSoal)." ".$this->kode_to." ".$this->id_mapel),
        //                     1 => array('kode_soal' => '090909d0as9dasodjja', 
        //                                   'isi_soal' => 'Hallo semuanya~'));

        $html='';

        for ($i=0; $i < sizeof($daftarSoal); $i++) { 

            $data = array('kode_soal' => $daftarSoal[$i]->kode_soal, 
                          'no_soal' => $i+1,
                          'kode_to' => $this->kode_to,
                          'id_mapel' => $this->id_mapel,
                          'isi_soal' => $daftarSoal[$i]->isi_soal);//)$daftarSoal[$i]->isi_soal);

            $html .= view('main.admin.to-mapel-listsoal')->with('data',$data);
        }
        return $html;
    }

    private function createSoalAwal($kode_to,$id_mapel,$kode_soal){
        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $daftarSoal =  $soal -> listAll();
        $data['jml_soal']=sizeof($daftarSoal);

        $data['isi_soal']=$soal->isi_soal;
        $data['kode_soal']=$soal->kode_soal;
        $data['kode_kd']=$soal->kode_kd;
        $data['kode_to']=$soal->kode_to;
        $data['id_mapel']=$soal->id_mapel;   

        $data['isi_jawaban']= $this->createJawabanAwal($kode_to,$id_mapel,$kode_soal);//view('main.admin.to-mapel-soal-jawaban')->with('jawaban',$jawaban);

        return view('main.admin.to-mapel-soal')->with('data',$data);
    }

    private function createJawabanAwal($kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $jawaban=$soal->getJawaban();

        $html="";

        for ($i=0; $i < 5; $i++) { 

            if ($jawaban[$i]->status_benar) {
                $checked='checked=""';
            } else {
                $checked='';
            }

            $jawaban_array = array('isi_jawaban'=>$jawaban[$i]->isi_jawaban,
                                   'no_jawaban'=>$i+1,
                                   'kode_jawaban'=>$jawaban[$i]->kode_jawaban,
                                   'status_benar'=>$checked);

            $html .= view('main.admin.to-mapel-soal-jawaban')->with('jawaban',$jawaban_array);

        }

        return $html;

    }

    public function getModalToken($kode_to,$id_mapel){

        $mapel = DB::table('mapel')
                ->where('id',$id_mapel)
                ->first();

        $tanggal_db=DB::table('tanggal_ujian')
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->first();

        $kunci_ujian_db=DB::table('to_mapel')
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->first();

        $data['kunci_ujian']=$kunci_ujian_db->kunci;



        if (isset($tanggal_db->tanggal)){
            $data['tanggal_ujian']=$tanggal_db->tanggal;
        } else {
            $data['tanggal_ujian']="";
        }
      

      

        $kloter_db = DB::table('kloter')
                ->whereIn('id',[0,1,2])
                ->get();

        $data['kloter'][0]['dibuka']=$kloter_db[0]->waktu_dibuka;
        $data['kloter'][0]['ditutup']=$kloter_db[0]->waktu_ditutup;
        $data['kloter'][1]['dibuka']=$kloter_db[1]->waktu_dibuka;
        $data['kloter'][1]['ditutup']=$kloter_db[1]->waktu_ditutup;
        $data['kloter'][2]['dibuka']=$kloter_db[2]->waktu_dibuka;
        $data['kloter'][2]['ditutup']=$kloter_db[2]->waktu_ditutup;

        // $to = DB::table('to_mapel')
        //         ->where('kode_to',$kode_to)
        //         ->where('id_mapel',$id_mapel);
        //         ->first();
        $data[0]['isi_modal']="";
        $data[1]['isi_modal']="";
        $data[2]['isi_modal']="";
        $data['nama_mapel']=$mapel->mapel;

        $kelas = DB::table('kelas')
                ->where('bidang',$mapel->bidang)
                ->get();

        if (($id_mapel == 6) OR ($id_mapel ==7)) {

            $kelas = DB::table('kelas')
                ->where('bidang','IPA')
                ->orWhere('bidang','IPS')
                ->get();

        } else {

            $kelas = DB::table('kelas')
                ->where('bidang',$mapel->bidang)
                ->get();


        }

        $kloter = DB::table('kloter')
                ->get();

        $banyakKelas = sizeof($kelas);

        for ($i=0; $i < $banyakKelas; $i++) { 

            //ngecek udah ada kloter blom
            $toauth = DB::table('to_auth_temp')
                        ->where('kode_to',$kode_to)
                        ->where('id_mapel',$id_mapel)
                        ->where('id_kelas',$kelas[$i]->id_kelas)
                        ->first();

            $data[$i]['debug']=$toauth;


            if (isset($toauth->kode_to_auth)) {

                if ($toauth->id_kloter==0) {
                    
                    $kloter1='checked="1"';
                    $kloter2='disabled';
                    $kloter3='disabled';

                } else if ($toauth->id_kloter==1){

                    $kloter1='disabled"';
                    $kloter2='checked="1"';
                    $kloter3='disabled';

                } else if ($toauth->id_kloter==2){

                    $kloter1='disabled';
                    $kloter2='disabled';
                    $kloter3='checked="1"';

                } 

            } else {

                    $kloter1='';
                    $kloter2='';
                    $kloter3='';

            }



            $data[0]['isi_modal'].='<div class="checkbox text-left">
                                        <label class="kelas-label" kelas="" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                                <input type="checkbox" '.$kloter1.' value="" id-kloter="0" id-kelas="'.$kelas[$i]->id_kelas.'" id-mapel="'.$id_mapel.'" kode-to="'.$kode_to.'" class="kelas-checkbox" id="idk1-'.$kelas[$i]->id_kelas.'">'.$kelas[$i]->nickname.'
                                        </label>
                                  </div>';

            $data[1]['isi_modal'].='<div class="checkbox text-left">
                                        <label class="kelas-label" kelas="" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                                <input type="checkbox" '.$kloter2.' value="" id-kloter="1" id-kelas="'.$kelas[$i]->id_kelas.'" id-mapel="'.$id_mapel.'" kode-to="'.$kode_to.'" class="kelas-checkbox" id="idk2-'.$kelas[$i]->id_kelas.'">'.$kelas[$i]->nickname.'
                                        </label>
                                  </div>';

            $data[2]['isi_modal'].='<div class="checkbox text-left">
                                        <label class="kelas-label" kelas="" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                                <input type="checkbox" '.$kloter3.' value="" id-kloter="2" id-kelas="'.$kelas[$i]->id_kelas.'" id-mapel="'.$id_mapel.'" kode-to="'.$kode_to.'" class="kelas-checkbox" id="idk3-'.$kelas[$i]->id_kelas.'">'.$kelas[$i]->nickname.'
                                        </label>
                                  </div>';
        }

        return json_encode($data,JSON_PRETTY_PRINT);


    }



    public function setModalToken(Request $request,$kode_to,$id_mapel){

        $id_kelas = $request->id_kelas;

        $data['id_kelas']= $id_kelas;

        $siswa = DB::table('siswa')
                    ->where('id_kelas',$id_kelas)
                    ->get();

        $jumlahSiswa = sizeof($siswa);

        $joss="";

        for ($i=0; $i < $jumlahSiswa; $i++) { 
            
            $toauth = new TOAuth($siswa[$i]->username);

            $id_kloter=$request->id_kloter;
            $id_siswa=$siswa[$i]->id;

            $siswa_baru = DB::table('to_auth_temp')
                    ->where('id_siswa',$id_siswa)
                    ->where('id_mapel',$id_mapel)
                    ->where('kode_to',$kode_to)
                    ->first();

            if(isset($siswa_baru->kode_to_auth)){


            } else {
                $status = $toauth->createAuth($kode_to,$id_mapel,$id_kloter,$id_siswa,$id_kelas);
            }


        }

        return $joss;

    }

    public function hapusModalToken(Request $request,$kode_to,$id_mapel){

        $id_kelas = $request->id_kelas;

        $toauth = new TOAuth();

        $jojo = $toauth->deleteAuth($kode_to,$id_mapel,$id_kelas);

        return $jojo;


    }

    public function updateTanggalUjian(Request $request,$kode_to,$id_mapel){

        $tanggal_ujian = $request->tanggal_ujian;

        $tanggal_db=DB::table('tanggal_ujian')
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->first();

        if (isset($tanggal_db->id)) {
            
            $jo1= DB::table('tanggal_ujian')
                ->where('kode_to', $kode_to)
                ->where('id_mapel', $id_mapel)
                ->update(['tanggal' => $tanggal_ujian]);

        } else {

            $id1 = DB::table("tanggal_ujian")->insert(
                ['kode_to'=> $kode_to, 
                 'id_mapel' => $id_mapel,
                 'tanggal'=> $tanggal_ujian]);

        }

    }

    public function updateKunciUjian(Request $request,$kode_to,$id_mapel){

        $kunci_ujian = $request->kunci_ujian;

        $ujian_kunci=DB::table('to_mapel')
                    ->where('kode_to',$kode_to)
                    ->where('id_mapel',$id_mapel)
                    ->first();

      //  if (isset($tanggal_db->kunci_ujian)) {
            
            $jo1= DB::table('to_mapel')
                ->where('kode_to', $kode_to)
                ->where('id_mapel', $id_mapel)
                ->update(['kunci' => $kunci_ujian]);

//        } else {

        return var_dump($ujian_kunci);

         

  //      }

    }


}
