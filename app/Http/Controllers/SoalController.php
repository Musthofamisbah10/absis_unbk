<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Soal;
use DB;

class SoalController extends Controller
{
    public function baru(Request $request, $kode_to, $id_mapel){

    	$soal = new Soal($kode_to,$id_mapel);	
		$soal->kode_kd="hello";
		$soal->isi_soal='KOSONG';
		$soal->save();

		return redirect('admin/tryout/edit/'.$kode_to.'/'.$id_mapel);
    }

    public function hapus($kode_to, $id_mapel, $kode_soal){

    	$soal = new Soal($kode_to,$id_mapel,$kode_soal);
    	$soal->delete();

    	return redirect('admin/tryout/edit/'.$kode_to.'/'.$id_mapel);
    }

    public function get($kode_to, $id_mapel, $kode_soal){
        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $data['isi_soal']=$soal->isi_soal;
        $data['kode_soal']=$soal->kode_soal;
        $data['kode_kd']=$soal->kode_kd;
        $data['kode_to']=$soal->kode_to;
        $data['id_mapel']=$soal->id_mapel;  
        $data['status_acak']=$soal->status_acak;  
        $data['no_soal']=$soal->no_soal;  
        $data['tingkat_kesulitan']=$soal->tingkat_kesulitan;  
        $data['tipe_soal']=$soal->tipe_soal;  
        $data['kode_master']=$soal->kode_master;

        $jawaban=$soal->getJawaban();

        for ($i=0; $i < 5; $i++) { 

            $data[$i]['isi_jawaban']=$jawaban[$i]->isi_jawaban;
            $data[$i]['no_jawaban']=$i+1;
            $data[$i]['kode_jawaban']=$jawaban[$i]->kode_jawaban;
            $data[$i]['status_benar']=$jawaban[$i]->status_benar;

        }

        $data_get = DB::table('soal')
                ->where('kode_to',$kode_to)
                ->where('id_mapel',$id_mapel)
                ->where('status_acak',"0")
                ->orderBy('no_soal', 'desc')
                ->get();

        if (isset($data_get[0])){

            $banyak_data = sizeof($data_get);

            for ($i=0; $i < $banyak_data; $i++) { 
                $data['acak'][$i]['kode_soal']=$data_get[$i]->kode_soal;
                $data['acak'][$i]['no_soal']=$data_get[$i]->no_soal;
            }

        } else {

        

        }
  

        //$data['isi_jawaban']= $this->createJawaban($kode_to,$id_mapel,$kode_soal);//view('main.admin.to-mapel-soal-jawaban')->with('jawaban',$jawaban);

        return  json_encode($data,JSON_PRETTY_PRINT);
        //return view('main.admin.to-mapel-soal')->with('data',$data);
    }

    public function getListJawaban($kode_soal){

    }

    public function createJawaban($kode_to,$id_mapel,$kode_soal){

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

    public function update(Request $request,$kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);
        $soal->isi_soal=$request->isi_soal;
        $soal->save();

        $soal->updateIsiJawaban($request->kode_a,$request->jawaban_a);
        $soal->updateIsiJawaban($request->kode_b,$request->jawaban_b);
        $soal->updateIsiJawaban($request->kode_c,$request->jawaban_c);
        $soal->updateIsiJawaban($request->kode_d,$request->jawaban_d);
        $soal->updateIsiJawaban($request->kode_e,$request->jawaban_e);
        

        return $request->kode_a;
      

    }

    public function updateJawabanBenar(Request $request,$kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $soal->updateJawabanBenar($request->kode_jawaban);

        return $request->kode_jawaban;
      

    }

    public function updateStatusAcak(Request $request,$kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $no_soal = $soal->updateStatusAcak($kode_soal,$request->status_acak);

        $data_get = DB::table('soal')
                ->where('kode_to',$kode_to)
                ->where('id_mapel',$id_mapel)
                ->where('status_acak',"0")
                ->orderBy('no_soal', 'desc')
                ->get();

        $data['no_soal']=$no_soal;

        if (isset($data_get[0])){

            $banyak_data = sizeof($data_get);

            for ($i=0; $i < $banyak_data; $i++) { 
                $data[$i]['kode_soal']=$data_get[$i]->kode_soal;
                $data[$i]['no_soal']=$data_get[$i]->no_soal;
                
            }

        } else {

            $data[0]="kosong";

        }

        return json_encode($data,JSON_PRETTY_PRINT);//$request->status_acak;

    }

    public function updateNoSoal(Request $request,$kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        if($soal->updateNoSoal($kode_soal,$request->no_soal)){

            $data_get = DB::table('soal')
                ->where('kode_to',$kode_to)
                ->where('id_mapel',$id_mapel)
                ->where('status_acak',"0")
                ->orderBy('no_soal', 'desc')
                ->get();

            if (isset($data_get[0])){

                $banyak_data = sizeof($data_get);

                for ($i=0; $i < $banyak_data; $i++) { 
                    $data['acak'][$i]['kode_soal']=$data_get[$i]->kode_soal;
                    $data['acak'][$i]['no_soal']=$data_get[$i]->no_soal;
                }

            } else {

            

            }

            $data['status']='sukses';

            return json_encode($data, JSON_PRETTY_PRINT);

        } else {

            $data_get = DB::table('soal')
                ->where('kode_to',$kode_to)
                ->where('id_mapel',$id_mapel)
                ->where('status_acak',"0")
                ->orderBy('no_soal', 'desc')
                ->get();

            if (isset($data_get[0])){

                $banyak_data = sizeof($data_get);

                for ($i=0; $i < $banyak_data; $i++) { 
                    $data['acak'][$i]['kode_soal']=$data_get[$i]->kode_soal;
                    $data['acak'][$i]['no_soal']=$data_get[$i]->no_soal;
                }

            } else {

            

            }

            $data['status']=$soal->error;

            return json_encode($data, JSON_PRETTY_PRINT);

        }

       
      

    }

    public function updateKD(Request $request,$kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $soal->updateKD($request->kode_kd);

        return $request->kode_jawaban;
      

    }

    public function updateTingkatKesulitan(Request $request,$kode_to,$id_mapel,$kode_soal){

        $soal = new Soal($kode_to,$id_mapel,$kode_soal);

        $soal->updateTingkatKesulitan($kode_soal,$request->tingkat_kesulitan);

        return $request->tingkat_kesulitan;
      

    }

    
}
