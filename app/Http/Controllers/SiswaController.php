<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Guru;
use DB;

class SiswaController extends Controller
{
    public function index()
    {
    	/*$siswa= new Siswa('ariaseta');

    	$siswa->username="ariaseta";
    	$siswa->password="ariaseta";
    	$siswa->nama="ariaseta";
    	$siswa->kelas="7A";
    	$siswa->nis="121212";
    	$siswa->nisn="11111";
    	$siswa->bidang="IPA";

    	// $siswa->save();
    	
    	$siswa->delete();
    	return var_dump($siswa);
    	    	//}

    	//return $siswa->save();*/

    	$guru = new Guru ('ariaseta');
    	$guru->username="ariaseta";
    	$guru->password="aria1308";
    	$guru->nama="ariaseta";
    	$guru->nip="121212";
    	$guru->bidang="IPA";

    	$guru->save();
    	return var_dump($guru);
    }
}
