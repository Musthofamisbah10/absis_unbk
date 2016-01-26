<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TO;
use App\Mapel;
use DB;

class AnalisisController extends Controller
{
	public function viewPilih(){

		$html = $this ->createViewAllAdmin();

		return view('main.admin.analisis-pilih')->with('data_to',$html);
	}


    public function createViewAllAdmin(){
        
        $to = new TO();
        $data_to =$to->listAll();

        //$html = $data_to[0]->nama;
        $html='';

        for ($i=0; $i < sizeof($data_to); $i++) { 

            $data = array(
                'nama_tryout' => $data_to[$i]->nama, 
                'rentang_waktu' =>'rentang_waktu',
                'status' => 'status',
                'jumlah_mapel' =>'jumlah_mapel',
                'jumlah_peserta' => 'jumlah_peserta',
                'tanggal_dikunci' => $data_to[$i]->tanggal_dikunci,
                'kode_to' => $data_to[$i]->kode_to
                );

            $html .= view('main.admin.analisis-pilih-list')->with('data',$data);
        }
        return $html;
        
    }	

	public function viewPilihMapel($kode_to){
        $this->kode_to = $kode_to;
        $to=new TO($kode_to);

		$data['ipa'] = $this ->createListMapel('ipa');
        $data['ips'] = $this ->createListMapel('ips');
        $data['bahasa'] = "";//$this ->createList('bahasa');
        $data['nama_to']=$to->nama;
        $data['kode_to']=$kode_to;

		return view('main.admin.analisis-pilih-mapel')->with('data',$data);
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

            $html .= view('main.admin.analisis-pilih-mapel-isi')->with('data',$data);
        }
        return $html;
        
    }

    public function viewAnalisisMain($kode_to){

        // $to=new TO($kode_to);
        // $data['nama_to']=$to->nama;
        // $data['kode_to']=$kode_to;

        $kode_mapel = array(5,6,7,8,9,10,13,14,15,16);

        $mapel = DB::table('mapel')
                ->whereIn('id',$kode_mapel)
                ->get();

        $kelas = DB::table('kelas')
                ->get();

        return redirect('/admin/analisis/show/'.$kode_to.'/'.$kelas[0]->id_kelas.'/'.$mapel[0]->id);


    }

	public function viewAnalisis($kode_to,$id_kelas,$id_mapel){
        $this->kode_to = $kode_to;
        $to=new TO($kode_to);
        $data['nama_to']=$to->nama;
        $data['kode_to']=$kode_to;

        $data['kelas']['html']="";

        $data['kelas']['id_kelas']=$id_kelas;

        $data['mapel']['html']="";

        $data['to']['html']="";

        $kode_mapel = array(5,6,7,8,9,10,13,14,15,16);

        $to_db = DB::table('to')
                ->get();

        $mapel = DB::table('mapel')
                ->whereIn('id',$kode_mapel)
                ->get();

        $kelas = DB::table('kelas')
                ->get();

        //$data['tryout']

        for ($i=0; $i < sizeof($to); $i++) { 

            $data['to']['html'] .= '<li><a href="#fakelink">'.$to_db[$i]->nama.'</a></li>';
            # code...
        }

        for ($i=0; $i < sizeof($kelas); $i++) { 

            //$data['kelas'][$i]=$kelas[$i];

            $data['kelas']['html'] .= '<li><a href="/admin/analisis/show/'.$kode_to.'/'.$kelas[$i]->id_kelas.'/'.$id_mapel.'">'.$kelas[$i]->nickname.'</a></li>';
            # code...
        }

        for ($i=0; $i < sizeof($mapel); $i++) { 

            $data['mapel']['html'] .= '<li><a href="/admin/analisis/show/'.$kode_to.'/'.$id_kelas.'/'.$mapel[$i]->id.'">'.$mapel[$i]->mapel.'</a></li>';
            # code...
        }

        if ($id_kelas==null) {
            $id_kelas=1;
        }

        $nama_mapel = DB::table('mapel')
                ->where('id',$id_mapel)
                ->first();

        $data['nama_mapel']=$nama_mapel->mapel;


        $soal = DB::table('soal')
                ->where('id_mapel',$id_mapel)
                ->where('kode_to',$kode_to)
                ->get();

        $jumlah_soal = sizeof($soal);

        $siswa = DB::table('siswa')
                ->where('id_kelas',$id_kelas)
                ->get();

        
        $data['jml_siswa']=sizeof($siswa);
        $data['jml_soal']=$jumlah_soal;

        for ($i=0; $i < $jumlah_soal; $i++) { 

            $soal_jawaban = DB::table('soal_jawaban')
                ->where('kode_soal',$soal[$i]->kode_soal)
                ->where('status_benar',1)
                ->first();

            switch ($soal_jawaban->urutan_untuk_guru) {
                case '0':
                    $huruf_jawaban="A";
                    break;

                case '1':
                    $huruf_jawaban="B";
                    break;

                case '2':
                    $huruf_jawaban="C";
                    break;

                case '3':
                    $huruf_jawaban="D";
                    break;

                case '4':
                    $huruf_jawaban="E";
                    break;
                
                default:
                    $huruf_jawaban="ERROR";
                    break;
            }

            //$data['soal'][$i]['kode_jawaban']=$huruf_jawaban;
            # code...
            $kunci_jawaban[$i+1]=$huruf_jawaban;
        }

        for ($i=0; $i < $data['jml_siswa']; $i++) { 

            $benar=0;
            $salah=0;
            $kosong=0;
            $nilai=0;

            $toauth = DB::table('to_auth_temp')
                ->where('id_siswa',$siswa[$i]->id)
                ->where('id_mapel',$id_mapel)
                ->where('kode_to',$kode_to)
                ->first();


            $data_siswa[$i]['nisn']=$siswa[$i]->nisn;
            $data_siswa[$i]['nama']=$siswa[$i]->nama;
            //$data_siswa[$i]['id_siswa']=$siswa[$i]->id;


            if (isset($toauth->kode_to_auth)) {
                # code...
            
                //ngecek jawaban benar
                for ($j=0; $j < $jumlah_soal; $j++) { 

                    // $data_siswa[$j]['jawaban'][$j+1]="A";

                    $jawaban_siswa = DB::table('jawaban_siswa')
                        ->where('kode_soal',$soal[$j]->kode_soal)
                        ->where('kode_to_auth',$toauth->kode_to_auth)
                        ->first();

                    $soal_jawaban = DB::table('soal_jawaban')
                        ->where('kode_soal',$soal[$j]->kode_soal)
                        ->where('status_benar',1)
                        ->first();

                    if (isset($jawaban_siswa->kode_jawaban)) {

                        $jawaban_siswa_urutan = DB::table('soal_jawaban')
                            ->where('kode_jawaban',$jawaban_siswa->kode_jawaban)
                            ->first();

                        //$huruf_jawaban = $jawaban_siswa->kode_jawaban;

                        if (isset($jawaban_siswa_urutan->urutan_untuk_guru)) {

                            switch ($jawaban_siswa_urutan->urutan_untuk_guru) {
                                case '0':
                                    $huruf_jawaban="A";
                                    break;

                                case '1':
                                    $huruf_jawaban="B";
                                    break;

                                case '2':
                                    $huruf_jawaban="C";
                                    break;

                                case '3':
                                    $huruf_jawaban="D";
                                    break;

                                case '4':
                                    $huruf_jawaban="E";
                                    break;
                                
                                default:
                                    $huruf_jawaban=" ";
                                    break;
                            }

                        } else {

                            $huruf_jawaban=" ";

                        }

                        

                        $data_siswa[$i]['soal'][$j]=$huruf_jawaban;

                    } else {

                        $data_siswa[$i]['soal'][$j]=" ";
                    }
                    

                    if (isset($jawaban_siswa->kode_jawaban)==0){

                        $kosong++;

                    } else if ($jawaban_siswa->kode_jawaban==$soal_jawaban->kode_jawaban) {

                        $benar++;

                    } else if ($jawaban_siswa->kode_jawaban<>$soal_jawaban->kode_jawaban) {

                        $salah++;

                    }

                }
            }

            if ($benar != 0) {
                $nilai = $benar / $jumlah_soal * 100;
            } else {
                $nilai = 0;
            }

            

            $data_siswa[$i]['nilai']=$nilai;
            $data_siswa[$i]['benar']=$benar;
            $data_siswa[$i]['salah']=$salah;
            $data_siswa[$i]['kosong']=$kosong;

        }

        $kelas_nama = DB::table('kelas')
                ->where('id_kelas',$id_kelas)
                ->first();

        $data['data_siswa']=json_encode($data_siswa, JSON_PRETTY_PRINT);
        if (isset($kunci_jawaban)) {

             $data['kunci_jawaban']=json_encode($kunci_jawaban, JSON_PRETTY_PRINT);

        } else {
            $data['kunci_jawaban']=null;            
        }
       
        
        $data['nama_kelas']=$kelas_nama->nickname;

        // $data['kelas']
        // $data['mapel']

		return view('main.admin.analisis-utama')->with('data',$data);
	}


}
