<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web','backhandler']], function () {

 
    Route::auth();
    //Route::role();
    ///Yang bsa diakses bersama di sini, kalo pisah2 bisa di grup masing2 ya~ jangan lupa kalau yg buat diakses bersama dikasih IF
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
    Route::get('/hello', 'SiswaController@index');

    Route::group(['middleware' => 'admin'], function () {

        // Menu Analisis =========================================================================================================================
        Route::get('/admin/analisis/', function(){  return view('main.admin.analisis');  });
        Route::get('/admin/analisis/pilih','AnalisisController@viewPilih');
        //Route::get('/admin/analisis/show/{kode_to}/{kode_kelas}','AnalisisController@viewAnalisis');
        Route::get('/admin/analisis/show/{kode_to}/{kode_kelas}/{id_mapel}','AnalisisController@viewAnalisis');
        Route::get('/admin/analisis/show/{kode_to}/','AnalisisController@viewAnalisisMain');
        //Route::get('/admin/analisis/show/{kode_to}/{id_mapel}/{id_kelas}','AnalisisController@viewAnalisis');
        // Route::get('/admin/analisis/{kode_to}/{kode_kelas}/{kode_mapel}/', function(){
        //     return 'hasil analisis';
        // });

        // End Menu Analisis ======================================================================================================================


        // Menu Tryout =========================================================================================================================
        Route::get('/admin/tryout/edit', 'TOController@viewAdmin');
        Route::get('/admin/tryout/edit/{kode_to}', ['uses' =>'TOMapelController@viewAdmin']);
        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}', 'TOMapelController@viewEdit');
        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/updateTanggalUjian', 'TOMapelController@updateTanggalUjian');
        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/updateKunciUjian', 'TOMapelController@updateKunciUjian');
        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}/getModalToken', 'TOMapelController@getModalToken');
        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}/setModalToken', 'TOMapelController@setModalToken');
        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}/hapusModalToken', 'TOMapelController@hapusModalToken');


        Route::get('/admin/tryout/manajemen/{kode_to}', function(){
            return view('main.admin.tryout-manajemen');
        });


        //=============================================================================================================
        //Route::get('/admin/tryout/token/{kode_to}/{id_kelas}/{id_mapel}', 'PDFController@CetakToken');
        Route::get('/admin/tryout/cetak/token/{kode_to}',  'PDFController@viewCetakToken');
        Route::get('/admin/tryout/cetak/soal/{kode_to}/{id_mapel}',  'PDFController@viewCetakSoal');
        Route::get('/admin/tryout/cetak/token/content/{kode_to?}/{id_kelas?}/{id_mapel?}',  'PDFController@contentToken');
        Route::get('/admin/tryout/cetak/token/unduh/{kode_to}/{id_kelas}/{id_mapel}',  'PDFController@cetakToken');
        //nggawe TOAuth sementara untuk ujicoba di TOAuth_temp
        Route::get('/admin/tryout/coba/{kode_to}/{id_mapel}', 'TOAuthController@baruAdmin');
        //nggawe baris daftar soal, no_soal, lembar jawab  ====>>>Bikin session di pusat, langsung kick ke halaman kerja
        Route::get('/admin/tryout/ujian/{kode_to}/{id_mapel}', 'TOAuthController@aksesAdmin');
        //ambil soal~~
        Route::get('/admin/tryout/ujian/{kode_to}/{id_mapel}/{no_soal}', 'UjianController@get');

        Route::post('/admin/tryout/ujian/{kode_to}/{id_mapel}/cek/HELLO', 'UjianController@cekKunciUjian');
        //ambil daftar jawaban
        Route::get('/admin/tryout/ujian/{kode_to}/{id_mapel}/{no_soal}/jawaban', 'UjianController@getDaftarJawaban');
        //kirim jawaban~~
        Route::post('/admin/tryout/ujian/{kode_to}/{id_mapel}/{kode_soal}/kirim_jawaban', 'UjianController@update');
        //selesai ngerjain, bisa lihat hasil~~
        Route::post('/admin/tryout/ujian/{kode_to}/{id_mapel}/{kode_soal}/selesai', 'UjianController@selesai');
        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}/baru', ['uses' =>'SoalController@baru']);
        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/hapus', ['uses' =>'SoalController@hapus']);

        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/update', ['uses' =>'SoalController@update']);
        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/updateJawabanBenar', ['uses' =>'SoalController@updateJawabanBenar']);
        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/updateTingkatKesulitan', ['uses' =>'SoalController@updateTingkatKesulitan']);
        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/updateStatusAcak', ['uses' =>'SoalController@updateStatusAcak']);
        Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/updateNoSoal', ['uses' =>'SoalController@updateNoSoal']);
        // Route::post('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/updateStatusAcak', ['uses' =>'SoalController@updateStatusAcak']);

        Route::get('/admin/tryout/edit/{kode_to}/{id_mapel}/soal/{kode_soal}/edit', ['uses' =>'SoalController@get']);
        Route::any('/admin/tryout/baru', 'TOController@baru');       
        Route::any('/admin/tryout/hapus/{kode_to}', ['uses' =>'TOController@hapus']);
        // End Menu Tryout =======================================================================================================================



        // Menu data siswa =========================================================================================================================
        Route::get('/admin/data-siswa/', function(){
            return view('main.admin.data-siswa');
        });
        // Route::get('/admin/data-siswa/backview/search', function(){
        //     return view('main.admin.data-siswa-backview-search');
        // });
        Route::get('/admin/data-siswa/backview/search/{query}/{page}', 'AdminBackviewController@listSearchSiswa');
        Route::get('/admin/data-siswa/backview/search-page', function(){
            return view('main.admin.data-siswa-backview-search-page');
        });
        Route::get('/admin/data-siswa/backview/search-page-terakhir', function(){
            return view('main.admin.data-siswa-backview-search-page-terakhir');
        });

        Route::get('/admin/data-siswa/backview/pagination/{query}', 'AdminBackviewController@showPaginationSiswa');

	    Route::get('/admin/data-siswa/backview/list-sort', 'AdminBackviewController@createListKelas');
	    Route::get('/admin/data-siswa/backview/list-sort-data/{query}', 'AdminBackviewController@createListSortedData');

        Route::get('/admin/data-siswa/backview/switch', function(){
            return view('main.admin.data-siswa-backview-switch');
        });  

        // End Menu data siswa =====================================================================================================================



        // Menu data guru =========================================================================================================================
        Route::get('/admin/data-guru/', function(){
            return view('main.admin.data-guru');
        });  
        Route::get('/admin/data-guru/backview/search', function(){
            return view('main.admin.data-guru-backview-search');
        });
        Route::post('/admin/data-guru/backview/search', 'AdminBackviewController@dataGuruSearch');
        Route::get('/admin/server', function(){
            return view('main.admin.server');
        });
        // End Menu data guru ======================================================================================================================

	});

    Route::group(['middleware' => 'guru'], function () {
        // Menu Analisis
        Route::get('/guru/analisis/pilih-tryout', function(){
            return 'pilih tryout yang akan dianalisis, kalo kosong berarti kosong';
        });
        Route::get('/guru/analisis/hasil', function(){
            return 'ada grafik-grafik hasil analisis, menu lihat analisis kelas';
        });     
        Route::get('/guru/analisis/kelas/{kelas}', function($kelasId){
            return 'Analisis khusus kelas '.$kelasId;
        });            


        Route::get('/guru/edit-soal/pilih-tryout', 'TOController@viewGuru');

        Route::get('/guru/edit-soal/{kode}', function($kodeId){
            return view('main.guru.soal')->with('kode', $kodeId);
        });
        Route::get('/guru/edit-soal/main/{kode}', function($kodeId){
            return view('main.guru.soal-main')->with('idSoal', $kodeId);
        });
        Route::get('/guru/edit-soal/main/{kode}/new', ['uses' => 'SoalController@new']);                
        Route::get('/guru/edit-soal/main/{kode}/update', ['uses' => 'SoalController@update']);                
        Route::get('/guru/edit-soal/main/{kode}/delete', ['uses' => 'SoalController@delete']);                
        Route::get('/guru/edit-soal/main/{kode}/image_new', ['uses' => 'GambarController@update']);                
    });

    Route::group(['middleware' => 'siswa'], function () {

        // Route::get('/start', function(){
        //     return view('main.siswa.start');
        // });

        // Route::get('/ujian', function(){
        //     return view('main.siswa.ujian');
        // });     

        // Route::get('/gambar/{kode_soal}/{file_gambar}', ['uses' => 'GambarController@get']);

        Route::get('/siswa/ujian/{kode_to}/{id_mapel}', 'UjianController@authUjianSiswa');
        Route::get('/siswa/ujian/{kode_to}/{id_mapel}/start', 'UjianController@viewUjianSiswa');
        Route::get('/siswa/ujian/{kode_to}/{id_mapel}/selesai', 'UjianController@finishUjianSiswa');
        // Route::get('/siswa/ujian/{kode_to}/{id_mapel}/finish', 'UjianController@finishUjianSiswa');

        Route::get('/siswa/tryout/ujian/{kode_to}/{id_mapel}/{no_soal}', 'UjianController@get');
        //ambil daftar jawaban
        Route::get('/siswa/tryout/ujian/{kode_to}/{id_mapel}/{no_soal}/jawaban', 'UjianController@getDaftarJawaban');
        //kirim jawaban~~
        Route::post('/siswa/tryout/ujian/{kode_to}/{id_mapel}/{kode_soal}/kirim_jawaban', 'UjianController@update');

        Route::post('/siswa/tryout/ujian/{kode_to}/{id_mapel}/cek/HELLO', 'UjianController@cekKunciUjian');
        //selesai ngerjain, bisa lihat hasil~~
        //Route::post('/admin/tryout/ujian/{kode_to}/{id_mapel}/selesai', 'UjianController@finishUjianSiswa');

    });

});
