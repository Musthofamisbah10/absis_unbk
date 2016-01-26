@extends('layouts.template2')
@section('judul')
    Data Siswa
@endsection
@section('navigasi')
    <div class="the-box toolbar no-border no-margin text-center" style="padding-bottom: 0px; padding-top: 0px; margin-top: 0px; border-bottom-width: 0px; background: #FBFBFB">
        <div class="row" style="margin-top: 0px; padding-top: 0px; padding-bottom: 0px;">
            <div class="col-md-3 col-sm-3">
            </div>
            <div class="col-md-3 col-sm-3" style="padding-top: 0px; padding-bottom: 0px;">
                <div class="btn-group">
                    <a class="btn btn-default" href="/" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali</a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>
                </div>
                &nbsp; &nbsp;           
            </div>
            <div style="margin-bottom: 0px; padding-bottom: 0px;" class="col-md-4 col-sm-4">                            
                <div class="btn-group inline-popups">
                    <button type="button" class="btn btn-success tambah-siswa-btn" data-toggle="modal" data-target="#ModalTambahSiswa">Tambah Siswa</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-success">Input Lewat Excel</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="ModalTambahSiswa" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 5vh; overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-info no-border">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-center">Tambah Data Siswa</h3>
            </div>
            <div class="modal-body" style="color: rgba(1,1,1,0.6); max-height: 60vh; overflow:auto;" >
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        NIS
                                    </h4>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="tambah-nis-siswa form-control input-md bold-border" placeholder="Placeholder here">
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <button class="btn btn-info">
                                                    tombol 1
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <button class="btn btn-info">
                                                    tombol 2
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <button class="btn btn-info">
                                                    tombol 3
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        NISN
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="tambah-nisn-siswa form-control input-md bold-border" placeholder="Placeholder here">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        Nama
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="tambah-nama-siswa form-control input-md bold-border" placeholder="Placeholder here">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        Kelamin
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <select name="kelamin" class="form-control select-tambah-kelamin-siswa">
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-info tambah-siswa-proses" data-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')
<div style="background: none repeat scroll 0% 0% rgb(247, 249, 250); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">
<br />
<div class="row">
    <div class="col-sm-1 col-md-2">
    </div>
    <div class="col-sm-10 col-md-8">
        <div class="the-box no-border">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <div class="form-group text-center" style="margin-top: 23px;margin-bottom: 23px;">
                        <input type="text" id="search-siswa" class="form-control bold-border search-siswa" placeholder="Cari Siswa">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="row">
                        <div class="col-md-4 text-right" style="padding-right: 0px;">
                            <h5 style="margin-top: 32px;margin-bottom: 23px;">
                                Sort by:
                            </h5>
                        </div>
                        <div class="col-md-8 text-left">
                            <div class="form-group" style="margin-top: 23px;margin-bottom: 23px;">
                                <form role="form">
                                    <select name="sort" id="sort" class="form-control" tabindex="1">
                                        
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="col-md-5 col-sm-3 text-right">
                    <div class="page-numb">
                        <ul class="pagination square">
                            <li class="active"><a href="#">0</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-striped table-hover table-info table-th-block">
                <thead class="the-box dark full">
                    <tr>
                        <th class="text-left" style="width:">No.</th>
                        <th class="text-left" style="width: 46%;">Nama</th>
                        <th class="text-left" style="width: 10%;">Bidang</th>
                        <th class="text-left" style="width: 10%;">NISN</th>
                        <th class="text-left" style="width: 17%;">Kelas</th>
                        <th class="text-center" style="width: %;">state</th>
                        <th class="text-center" style="width: 5%;">Ubah</th>
                        <th class="text-center" style="width: 5%;">Hapus</th>                                   
                    </tr>
                </thead>
                <tbody id="data-siswa-tabel">
                <tr>
                    <td colspan='8' class="text-center">
                        <h3>Sedang Mengambil Data...</h3>
                    </td>                   
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-sm-1 col-md-2">
    </div>
</div>
<div class="modal fade" id="ModalUbahSiswa" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 5vh; overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-info no-border">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-center">Ubah Data Siswa</h3>
            </div>
            <div class="modal-body" style="color: rgba(1,1,1,0.6); max-height: 60vh; overflow:auto;" >
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        NIS
                                    </h4>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="ubah-nis-siswa form-control input-md bold-border" placeholder="Placeholder here" disabled>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <button class="btn btn-info">
                                                    AUTO
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="text-center">
                                                <button class="btn btn-info">
                                                    NIS Sementara
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <button class="btn btn-info">
                                                    Isi Manual
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        NISN
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="ubah-nisn-siswa form-control input-md bold-border" placeholder="Placeholder here">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        Nama
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="ubah-nama-siswa form-control input-md bold-border" placeholder="Placeholder here">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>
                                        Kelamin
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <select name="kelamin" class="form-control select-kelamin-siswa">
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-info ubah-siswa-save" data-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalHapusSiswa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 15%;">
        <div class="modal-content">
            <div class="modal-header bg-danger no-border">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Siswa</h4>
            </div>
            
            <div class="modal-body" style="color: rgba(1,1,1,0.6);">
                <h3 class="text-center">Hapus Siswa <span class="hapus-siswa-nis-text"></span> - <span class="hapus-siswa-nama-text"></span></h3>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger hapus-siswa-konfirmasi" data-dismiss="modal">Hapus</button>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){

    var search_table = function(query,page) {

        $.ajax({

            url: "/admin/data-siswa/backview/search/" + query + "/" + page,
            success: function(html) {

                $("#data-siswa-tabel").html(html);
            } 
        });

        $.ajax({

            url: "/admin/data-siswa/backview/pagination/" + query,
            cache: false,
            success: function(html) {
                
                $(".page-numb").html(html);
            } 
        });
    };
var lala = "<option value='All'>Semua Kelas</option>";
    var list_kelas = function(){

        $.ajax({

            url: "/admin/data-siswa/backview/list-sort",
            success: function(html) {

                $("#sort").html(lala + html);
            } 
        });
    }
    list_kelas();
    search_table("a", 0);
	
$("#sort").change(function(){

		var ini = $(this).val();

		if (ini != "All"){
		
			$.ajax({

			    url: "/admin/data-siswa/backview/list-sort-data/" + ini,
			    success: function(html) {

				$("#data-siswa-tabel").html(html);
				$(".page-numb").html("");
			    } 
			});
		} else {

			search_table("a", 0);

		}


		
	});    

    $("#search-siswa").keyup(function() {

        var query = $(this).val();

        if (query == ""){
            var query = "a";
            search_table(query, 0);
        }
        if(query != '') {
            var query = $(this).val();
            search_table(query, 0);
        } else {
            $(".page-numb").html("<ul class='pagination square'><li class='active'><a href='#fakelink'>0</a></li></ul>");
        }
        return false;    
    });

    $('.ubah-siswa-save').click(function(){

        var nama = $(".ubah-nama-siswa").attr("value");
        var nis = $(".ubah-nis-siswa").attr("value");
        var nisn = $(".ubah-nisn-siswa").attr("value");
        var kelamin = $(".select-kelamin-siswa").val();
        console.log(nama);
        console.log(nis);
        console.log(nisn);
        console.log(kelamin);
        var arrayUbah = [nis,nisn,nama,kelamin];
        $.ajax({

                type: "GET",
                url: "http://dev.absis.co.id/admin/data-siswa/process/ubah",
                data: {json: JSON.stringify(arrayUbah)},
                cache: false,
                success: function(html) {

                    if (html=="1") {
                            create_toast("info", "Sukses Ubah Siswa", nis +" "+ nama);
                            search_table($('#search-siswa').val());
                        } else {
                            create_toast("error", "Error:", html);
                            search_table($('#search-siswa').val());
                        }
                }      
            });
    });

    $('.hapus-siswa-konfirmasi').click(function(){

        var nis = $(".hapus-siswa-nis-text").html();
        var nama = $(".hapus-siswa-nama-text").html();
        var arrayHapus = [nis];
        $.ajax({

                type: "GET",
                url: "http://dev.absis.co.id/admin/data-siswa/process/hapus",
                data: {json: JSON.stringify(arrayHapus)},
                cache: false,
                success: function(html) {
                    create_toast("info", "Sukses Hapus Siswa", nis + " " + nama);
                }      
            });
    });

    $(".tambah-siswa-btn").on("click", function(){

        $(".tambah-nis-siswa").val("");
        $(".tambah-nisn-siswa").val("");
        $(".tambah-nama-siswa").val("");
        $(".select-tambah-kelamin-siswa").val();
    });

    $(".tambah-siswa-proses").on("click", function(){

        var nis = $(".tambah-nis-siswa").val();
        var nisn = $(".tambah-nisn-siswa").val();
        var nama = $(".tambah-nama-siswa").val();
        var kelamin = $(".select-tambah-kelamin-siswa").val();
        if (nis == ""){

            var lanjut = 0;
            create_toast("error", "Dibutuhkan Data", "NIS");
        } else {

            var lanjut = 1;
        };
        if (nisn == ""){

            var lanjut = 0;
            create_toast("error", "Dibutuhkan Data", "NISN");
        } else {

            var lanjut = 1;
        };
        if (nama == ""){

            var lanjut = 0;
            create_toast("error", "Dibutuhkan Data", "NAMA");
        } else {

            var lanjut = 1;
        };

        if (lanjut == 1){

            var arrayTambahSiswa = [nis,nisn,nama,kelamin];
            $.ajax({

                    type: "GET",
                    url: "http://dev.absis.co.id/admin/data-siswa/process/tambah",
                    data: {json: JSON.stringify(arrayTambahSiswa)},
                    cache: false,
                    success: function(html) {
                        
                        create_toast("info", "Sukses Tambah", nis + nisn + nama);
                    }      
                });
        } else {

            create_toast("error", "Gagal Tambah","Data Tidak Lengkap");
        };
    });

    var create_toast = function (tipe,judul,pesan){

        var i = -1;
        var toastCount = 0;
        var shortCutFunction = tipe;//$("#toastTypeGroup input:radio:checked").val();
        var msg = pesan;//$('#message').val();
        var title = judul;//$('#title').val() || '';
        var showDuration = "300";
        var hideDuration = "100";
        var timeOut = "500";
        var extendedTimeOut = "200";
        var showEasing = "swing";
        var hideEasing = "linear";
        var showMethod = "fadeIn";
        var hideMethod = "fadeOut";
        var toastIndex = toastCount++;
        toastr.options = {

            closeButton: false, //true false broo
            debug: false,
            positionClass: 'toast-top-right', // Top Right Bottom Right Bottom Left Top Left Top Full Width Bottom Full Width
            onclick: null
            };
            var $toast = toastr[shortCutFunction](msg, title);
    };
});
</script>
@endsection
