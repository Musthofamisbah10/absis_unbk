<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TO;

class TOController extends Controller
{

	public function viewGuru(){
		$html = $this ->createViewAllGuru();

		return view('main.guru.pilih-tryout')->with('data_to',$html);
	}

	public function viewAdmin(){
		$html = $this ->createViewAllAdmin();

		return view('main.admin.tryout')->with('data_to',$html);
	}

    public function index(){

    	$nama_to = $request->input('nama_to');
    	$tanggal_akhir = $request->input('tanggal_akhir');

    	return "hello new";

    }

    public function baru(Request $request){

        $to = new TO();
        //$to->kode_to=sha1()
        $to->nama=$request->nama;
        $to->tanggal_dikunci=$request->tanggal_dikunci;
        $to->save();

        return redirect('admin/tryout/edit');

    }

    public function update(){

    	return "hello update";

    }

    public function hapus($kode_to){

        $to = new TO($kode_to);
        $to->hapus();


    	return redirect('admin/tryout/edit');
    }

    public function createViewAllGuru(){
    	
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

             $html .= view('main.guru.pilih-tryout-isi')->with('data',$data);
        }
        return $html;
    	
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

            $html .= view('main.admin.tryout-list')->with('data',$data);
        }
        return $html;
        
    }
}
