<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use mPDF;
use App\TO;
use App\Mapel;
use App\Kelas;
use App\Soal;
use App\Token;
use App\User;
use DB;
use Crypt;

class PDFController extends Controller
{

    public function viewCetakToken($kode_to)
    {	

		$to = new TO($kode_to);
		$data['nama_to']=$to->nama;
		$html ='		<tr>
							<td>Kelas</td>
							<td colspan="2">
		  						<select name="kelas" class="form-control select_kelas" id="select_kelas" onchange="berubah()">
									<option value="pilih">Pilih</option>';  													
									$kelas = new Kelas();
									$daftar_kelas = $kelas->listAll();
									for ($i=0; $i < sizeof($daftar_kelas); $i++) { 
										$html .= '<option value="'.$daftar_kelas[$i]->id_kelas.'-'.$daftar_kelas[$i]->bidang.'">'.$daftar_kelas[$i]->nickname.'</option>';
									}
		$html .=					'</select>
							</td>
						</tr>						
						<tr>
							<td>Mapel</td>
							<td colspan="2">
		  						<select name="mapel" class="form-control select_mapel" id="select_mapel" onchange="berubah_lagi()">
									<option value="pilih">Pilih</option>	 ';		
							  //       $mapelTO= new Mapel('sma','ipa');
									// $mapel_ipa = $mapelTO -> listMapel();
									// for ($i=0; $i < sizeof($mapel_ipa); $i++) { 
									// 	$html .= '<option value="'.$mapel_ipa[$i]->code.'">IPA - '.$mapel_ipa[$i]->mapel.'</option>';
									// }
									// $mapelTO= new Mapel('sma','ips');
									// $mapel_ips = $mapelTO -> listMapel();
									// for ($i=0; $i < sizeof($mapel_ipa); $i++) { 
									// 	$html .= '<option value="'.$mapel_ips[$i]->code.'">IPS - '.$mapel_ips[$i]->mapel.'</option>';
									// }
		$html .=				'</select>
							</td>
						</tr>';
    	
		$mapelTO = new Mapel('sma','ipa');
		$data['mapel-ipa'] = json_encode($mapelTO -> listMapel());
		$mapelTO = new Mapel('sma','ips');
		$data['mapel-ips'] = json_encode($mapelTO -> listMapel());
		$data['mapel-bahasa'] = json_encode(array());
    	$data['dropdown'] = $html;
    	$data['judul1'] = 'Cetak Kartu Ujian (Token)';
    	$data['judul2'] = $to->nama;
    	$data['isi-cetak'] = '<page size="A4">test</page>';
    	$data['kode_to'] = $kode_to;
    	$data['previous'] = '/admin/tryout/edit/'.$kode_to;

    	return view('main.admin.cetak')->with('data',$data);



	}

    public function viewCetakSoal($kode_to,$id_mapel)
    {	
    	$this->kode_to = $kode_to;
		$to = new TO($kode_to);
		$mapel = new Mapel('SMA',null,$id_mapel);
    	$mpdf=new mPDF();

    	for ($i=1; $i < 10; $i++) { 	
	    	$mpdf->WriteHTML('<table width="100%" border="1" style="border-collapse: collapse;">');
	    	$mpdf->WriteHTML('<tr><td style="text-align:center"><h3>Token Simulasi UNBK</h3><h4>'.$to->nama.' - '.$mapel->getNama().'</h4></td></tr>');
	    	$mpdf->WriteHTML('<tr><td><table>');
	    	$mpdf->WriteHTML('<tr><td></td><td>Nama</td><td>: </td><td>nama '.$i.'</td><tr>');
	    	$mpdf->WriteHTML('<tr><td></td><td>Kelas</td><td>: </td><td>kelas</td><tr>');
	    	$mpdf->WriteHTML('<tr><td></td><td>Username</td><td>: </td><td>username</td><tr>');
	    	$mpdf->WriteHTML('<tr><td></td><td>Password</td><td>: </td><td>password</td><tr>');
	    	$mpdf->WriteHTML('<tr><td></td><td>Waktu</td><td>: </td><td>07.00-09.00</td><tr>');
	    	$mpdf->WriteHTML('</table></td></tr>');
	    	$mpdf->WriteHTML('</table><br>');
	    	if ( ($i % 5) == 0 ) {
	    		$mpdf->WriteHTML("<pagebreak />");
	    	}
    	}
    	
    	$mpdf->Output();    	
    	exit;
	}


    public function cetakToken($kode_to, $id_kelas, $id_mapel)
    {

    	$this->kode_to = $kode_to;
		$to = new TO($kode_to);
		$mapel = new Mapel('SMA',null,$id_mapel);
    	$mpdf=new mPDF();

    	// for ($i=1; $i < 10; $i++) { 	
	    // 	$mpdf->WriteHTML('<table width="100%" border="1" style="border-collapse: collapse;">');
	    // 	$mpdf->WriteHTML('<tr><td style="text-align:center"><h3>Token Simulasi UNBK</h3><h4>'.$to->nama.' - '.$mapel->getNama().'</h4></td></tr>');
	    // 	$mpdf->WriteHTML('<tr><td><table>');
	    // 	$mpdf->WriteHTML('<tr><td></td><td>Nama</td><td>: </td><td>nama '.$i.'</td><tr>');
	    // 	$mpdf->WriteHTML('<tr><td></td><td>Kelas</td><td>: </td><td>kelas</td><tr>');
	    // 	$mpdf->WriteHTML('<tr><td></td><td>Username</td><td>: </td><td>username</td><tr>');
	    // 	$mpdf->WriteHTML('<tr><td></td><td>Password</td><td>: </td><td>password</td><tr>');
	    // 	$mpdf->WriteHTML('<tr><td></td><td>Waktu</td><td>: </td><td>07.00-09.00</td><tr>');
	    // 	$mpdf->WriteHTML('</table></td></tr>');
	    // 	$mpdf->WriteHTML('</table><br>');
	    // 	if ( ($i % 5) == 0 ) {
	    // 		$mpdf->WriteHTML("<pagebreak />");
	    // 	}
    	// }

	    $users = DB::table('to_auth_temp')->where('kode_to', '=', $kode_to)->where('id_kelas','=',$id_kelas)->where('id_mapel','=',$id_mapel)->orderBy('id_siswa')->get();
	    $jum_siswa = sizeof($users);
	    if ($jum_siswa == 0) {
	    	$data['isi'] =  '<page size="A4" style="text-align:center">data belum tersedia</page>';
	    }else{

	        $i=1;
	        $html = array();
			$x=0;
			foreach ($users as $user)
			{
				$siswa = DB::table('siswa')->where('username', $user->username)->first();
				$kloter = DB::table('kloter')->where('id', $user->id_kloter)->first();
		    	$mpdf->WriteHTML('<table width="100%" border="1" style="border-collapse: collapse;">');
		    	$mpdf->WriteHTML('<tr><td style="text-align:center"><h3>Token Simulasi UNBK</h3><h4>'.$to->nama.' - '.$mapel->getNama().'</h4></td></tr>');
		    	$mpdf->WriteHTML('<tr><td><table>');
		    	$mpdf->WriteHTML('<tr><td></td><td><b>Nama</b></td><td>: </td><td>'.ucwords(strtolower($siswa->nama)).'</td><tr>');
		    	$mpdf->WriteHTML('<tr><td></td><td><b>Kelas</b></td><td>: </td><td>'.$siswa->nickname_kelas.'</td><tr>');
		    	$mpdf->WriteHTML('<tr><td></td><td><b>Username</b></td><td>: </td><td>'.$user->username.'</td><tr>');
		    	$mpdf->WriteHTML('<tr><td></td><td><b>Password</b></td><td>: </td><td>'.$user->password.'</td><tr>');
		    	$mpdf->WriteHTML('<tr><td></td><td><b>Waktu</b></td><td>: </td><td>'.$kloter->waktu_dibuka.'</td><tr>');
		    	$mpdf->WriteHTML('</table></td></tr>');
		    	$mpdf->WriteHTML('</table><br>');
		    	if ( ($i % 5) == 0 ) {
		    		$mpdf->WriteHTML('<pagebreak />');
		    		$x++;
		    	}

			    $i++;
			}
	        	
	    }
	    $namafile = "Token Tryout UNBK - ".$to->nama." - ".$siswa->nickname_kelas." - ".$mapel->getNama().".pdf";
    	$mpdf->Output($namafile,'I');
    	
		exit;
    }


    public function contentToken($kode_to = null,$id_kelas = null ,$id_mapel = null)
    {	

    	$to = new TO($kode_to);
		$mapel = new Mapel('SMA',null,$id_mapel);

		// $id_mapel = 7;
		// $id_kelas = 1;
		// $kode_to = '2702d40451a515eb03ff661344efbbea84519c7f';

    	if (($kode_to <> null) AND ($id_kelas <> null) AND ($id_mapel <> null)) {
	
	        $users = DB::table('to_auth_temp')->where('kode_to', '=', $kode_to)->where('id_kelas','=',$id_kelas)->where('id_mapel','=',$id_mapel)->orderBy('id_siswa')->get();
	        $jum_siswa = sizeof($users);
	        if ($jum_siswa == 0) {
	        	$data['isi'] =  '<page size="A4" style="text-align:center">data belum tersedia</page>';
	        }else{
	
		        $i=1;
		        $html = array();
				$x=0;
				$html[$x] = '<page size="A4">';
				foreach ($users as $user)
				{
					$siswa = DB::table('siswa')->where('username', $user->username)->first();
					$kloter = DB::table('kloter')->where('id', $user->id_kloter)->first();
			    	$html[$x] .='<table width="100%" border="1" style="border-collapse: collapse;">';
			    	$html[$x] .='<tr><td style="text-align:center"><h3>Token Simulasi UNBK</h3><h4>'.$to->nama.' - '.$mapel->getNama().'</h4></td></tr>';
			    	$html[$x] .='<tr><td><table>';
			    	$html[$x] .='<tr><td></td><td><b>Nama</b></td><td>: </td><td>'.ucwords(strtolower($siswa->nama)).'</td><tr>';
			    	$html[$x] .='<tr><td></td><td><b>Kelas</b></td><td>: </td><td>'.$siswa->nickname_kelas.'</td><tr>';
			    	$html[$x] .='<tr><td></td><td><b>Username</b></td><td>: </td><td>'.$user->username.'</td><tr>';
			    	$html[$x] .='<tr><td></td><td><b>Password</b></td><td>: </td><td>'.$user->password.'</td><tr>';
			    	$html[$x] .='<tr><td></td><td><b>Waktu</b></td><td>: </td><td>'.$kloter->waktu_dibuka.'</td><tr>';
			    	$html[$x] .='</table></td></tr>';
			    	$html[$x] .='</table><br>';
			    	if ( ($i % 5) == 0 ) {
			    		$html[$x] .='<pagebreak /></page>';
			    		$x++;
			    		if ($i < $jum_siswa) {
			    			$html[$x] = '<page size="A4">';
			    		}
			    	}

				    $i++;
				}

		    	$data['isi'] = '';

		    	for ($i=0; $i < sizeof($html); $i++) { 
		    		$data['isi'] .= $html[$i];
		    	}
	        	
	        }
    		
    	}else{
    		$data['isi'] = '<page size="A4" style="text-align:center">Pilih Kelas dan Mapel terlebih dahulu!</page>';
    	}
    	

		return view('main.admin.cetak-content')->with('data',$data);

	}


}
