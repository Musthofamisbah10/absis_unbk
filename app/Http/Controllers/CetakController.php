<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CetakController extends Controller
{
	public function cetakToken($kode_to){

        $this->jenis = $cetak_jenis;

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
        
        $data['previous']="/admin/tryout/edit/".$kode_to."/".$id_mapel;
        $data['next']="/admin/tryout/ujian/".$kode_to."/".$id_mapel;

        return view('main.siswa.start')->with('data',$data);

        if ($cetak_jenis=='token') {
        	$to = new TO($kode_to);
        	$html ='';
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

	            $html .= '<option value="$data_to[$i]->kode_to">$data_to[$i]->nama</option>';

	        }
	        $data['nama_tryout'] = 
	        $data['list_to'] = $html;
	        $data['previous']="/admin/tryout/edit/".$kode_to;
	        return view('main.admin.cetak')->with('data',$data);
        }else{
        	return redirect('/');
        }

    }    
}
