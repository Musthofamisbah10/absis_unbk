<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Siswa;

class AdminBackviewController extends Controller{

    public function createListKelas(){

        $siswa = new Siswa();
        $list = $siswa -> listAllKelas();
        $html = "";

        for ($i=0; $i < sizeof($list); $i++) { 

            $data = array(
                'nickname_kelas' => $list[$i]->nickname_kelas,
                );

            $html .= view('main.admin.data-siswa-backview-search-sort')->with('data',$data);
        }
        return $html;
    }

	public function genListSortedData($query){

		$siswa = new Siswa();
		$list = $siswa -> listSortedKelas($query);
		$html = "";

		for ($i=0; $i < sizeof($list); $i++) { 

		    $data = array(
		        'no' => $i+1,
		        'nama' => $list[$i]->nama,
		        'nis' => $list[$i]->nis,
		        'nisn' => $list[$i]->nisn,
		        'nickname_kelas' => $list[$i]->nickname_kelas,
		        'bidang' => $list[$i]->bidang
		        );

		    $html .= view('main.admin.data-siswa-backview-search-list')->with('data',$data);
		}
		return $html;
	}

	public function createListSortedData($query){
		$html = $this -> genListSortedData($query);
	        return view('main.admin.data-siswa-backview-search')->with('data_siswa',$html);
	}

    public function listSearchSiswa($query, $page) {

        if ($page != "terakhir"){

            $html = $this -> createListSearchSiswa($query, $page);
            return view('main.admin.data-siswa-backview-search')->with('data_siswa',$html);
        } else {
            if ($query == "a"){

                $query = "z";
                $html = $this -> createListSearchSiswaTerakhir($query);
                return view('main.admin.data-siswa-backview-search')->with('data_siswa',$html);

            } else {

                $html = $this -> createListSearchSiswaTerakhir($query);
                return view('main.admin.data-siswa-backview-search')->with('data_siswa',$html);

            }
        }

    }

    public function createListSearchSiswa($query, $page){

        $siswa = new Siswa();
        $list = $siswa -> listPaged($query, $page);
        $html = "";

        for ($i=0; $i < sizeof($list); $i++) { 

            $data = array(
                'no' => $i+1,
                'nama' => $list[$i]->nama,
                'nis' => $list[$i]->nis,
                'nisn' => $list[$i]->nisn,
                'nickname_kelas' => $list[$i]->nickname_kelas,
                'bidang' => $list[$i]->bidang
                );

            $html .= view('main.admin.data-siswa-backview-search-list')->with('data',$data);
        }
        return $html;
    }

    public function createListSearchSiswaTerakhir($query){

        $siswa = new Siswa();
        $list = $siswa -> listPagedTerakhir($query);
        $html = "";

        for ($i=0; $i < sizeof($list); $i++) { 
            
            $data = array(
                'no' => $i+1,
                'nama' => $list[$i]->nama,
                'nis' => $list[$i]->nis,
                'nisn' => $list[$i]->nisn,
                'nickname_kelas' => $list[$i]->nickname_kelas,
                'bidang' => $list[$i]->bidang
                );

            $html .= view('main.admin.data-siswa-backview-search-list')->with('data',$data);
        }
        return $html;
    }
    public function showPaginationSiswa($query){

        $pagination = $this -> createListPaginationSiswa($query, 0);
        return view('main.admin.data-siswa-backview-pagination') -> with('pagination', $pagination);
    }

    public function createListPaginationSiswa($query, $page){

        $siswa = new Siswa();
        $result = $siswa -> searchSiswa($query, $page);

        $item=50;

        $limit_page = 9;

        $no_all = sizeof($result);
        $no_limited = sizeof($result);

        $total_pages = ceil($no_all/$item);
        $html = "";

        if ($no_limited == 0){
            $html .=  "
            <ul class='pagination square'>
                <li class='active'><a href='#'>1</a></li>
            </ul>
            ";
        }
        if ($no_limited != 0 ){
            //$no_limited data
            //$total_pages total
            $html .= "
            <ul class='pagination square'>";
            $start_page = 0;
            if ($total_pages > $limit_page ){

                while ($start_page != $limit_page){

                    $start_page_view = $start_page + 1;

                    if ($start_page_view == 1) {

                        $html .= "
                            <li class='active'><a class='halaman' href='#' halaman='$start_page'>$start_page_view</a></li>
                        ";
                    } else {

                        $html .= "
                            <li class=''><a class='halaman' href='#' halaman='$start_page'>$start_page_view</a></li>
                        ";
                    }
                    
                    $start_page++;
                }
            } else {

                while ($start_page != $total_pages){

                    $start_page_view = $start_page + 1;
                    if ($start_page_view == 1) {

                        $html .= "
                            <li class='active'><a class='halaman' href='#' halaman='$start_page'>$start_page_view</a></li>
                        ";
                    } else {

                        $html .= "
                            <li class=''><a class='halaman' href='#' halaman='$start_page'>$start_page_view</a></li>
                        ";
                    }
                    $start_page++;
                }
            }
            //$html .= "<li class=''><a class='halaman' href='#' halaman='terakhir'>terakhir</a></li>";
            $html .= "</ul>";
        }

        return $html;
    }

}
