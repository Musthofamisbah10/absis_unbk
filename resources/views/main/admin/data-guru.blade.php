@extends('layouts.template2')
@section('judul')
	Data Guru
@endsection
@section('navigasi')
	<div class="row" style="margin-top: 0px; padding-top: 20px; padding-bottom: 0px;">
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
				<button type="button" class="btn btn-success tambah-guru-btn" data-toggle="modal" data-target="#ModalTambahGuru">Tambah Guru</button>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-success">Input Lewat Excel</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ModalTambahGuru" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 5vh; overflow:hidden;">
	<div class="modal-dialog">
		<div class="modal-content" >
			<div class="modal-header bg-info no-border">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title text-center">Tambah Data Guru</h3>
			</div>
			<div class="modal-body" style="color: rgba(1,1,1,0.6); max-height: 60vh; overflow:auto;" >
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<h4>
										NIP
									</h4>
								</div>
								<div class="col-md-3">
									<input type="text" class="tambah-nip-guru form-control input-md bold-border" placeholder="Placeholder here">
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
										Nama
									</h4>
								</div>
								<div class="col-md-6">
									<input type="text" class="tambah-nama-guru form-control input-md bold-border" placeholder="Placeholder here">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<h4>
										KTSP
									</h4>
								</div>
								<div class="col-md-6">
									<input type="text" class="tambah-nama-guru form-control input-md bold-border" placeholder="Placeholder here">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<h4>
										K 2013
									</h4>
								</div>
								<div class="col-md-6">
									<input type="text" class="tambah-k2013-guru form-control input-md bold-border" placeholder="Placeholder here">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-info tambah-guru-proses" data-dismiss="modal">Simpan</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<div style="background: none repeat scroll 0% 0% rgb(247, 249, 250); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">
<div class="row">
	&nbsp;
</div>
<div class="row">
	<div class="col-sm-1 col-md-2">
	</div>
	<div class="col-sm-10 col-md-8">
		<div class="the-box no-border">
			<div class="row">
				<div class="col-md-4 col-sm-3">
					<div class="form-group text-center" style="margin-top: 23px;margin-bottom: 23px;">
						<input type="text" id="search-guru" class="form-control bold-border search-guru" placeholder="Cari Guru">
					</div>
				</div>
				<div class="col-md-8 col-sm-3 text-right">
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
						<th class="text-left" style="width: 17%;">NIP</th>
						<th class="text-center" style="width: %;">state</th>
						<th class="text-center" style="width: 5%;">Ubah</th>
						<th class="text-center" style="width: 5%;">Hapus</th>									
					</tr>
				</thead>
				<tbody id="data-guru-tabel">
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
</div>
@endsection


@section('script')



<script>
$(document).ready(function(){

	alert('munyuk');

	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});


	var search_table = function(query) {

		var arrayGetDataSearch = [query];
		$.ajax({
			
			type: "GET",
			url: "http://dev.absis.co.id/admin/data-guru/backview/search",
			data: {json: JSON.stringify(arrayGetDataSearch)},
			cache: false,
			success: function(html) {

				$("#data-guru-tabel").html(html);
				alert("aa");
			} 
		});

		$.ajax({

			type: "POST",
			url: "?sajen=data_umum_guru_page",
			data: {json: JSON.stringify(arrayGetDataSearch)},
			cache: false,
			success: function(html) {
				
				$(".page-numb").html(html);
			} 
		});
	};
	search_table("a");

    $("#search-guru").keyup(function() {
		
		if (query == ""){
			var query = "a";
			search_table(query);
		}
		if(query != '') {
			var query = $(this).val();
			search_table(query);
		} else {
			$(".page-numb").html("<ul class='pagination square'><li class='active'><a href='#fakelink'>0</a></li></ul>");
		}
		return false;    
	});

	$('.ubah-guru-save').click(function(){

		var nama = $(".ubah-nama-guru").attr("value");
		var nip = $(".ubah-nip-guru").attr("value");
		var kelamin = $(".select-kelamin-guru").val();
		console.log(nama);
		console.log(nip);
		console.log(kelamin);
		var arrayUbah = [nip,nama,kelamin];
		$.ajax({

				type: "POST",
				url: "index.php?sajen=data_umum_guru_ubah",
				data: {json: JSON.stringify(arrayUbah)},
				cache: false,
				success: function(html) {
					if (html=="1") {
							create_toast("info", "Sukses Ubah Guru", nip +" "+ nama);
							search_table($('#search-guru').val());
						} else {
							create_toast("error", "Error:", html);
							search_table($('#search-guru').val());
						}
					
	    		}      
			});
	});

	$('.hapus-guru-konfirmasi').click(function(){

		var nip = $(".hapus-guru-nip-text").html();
		var nama = $(".hapus-guru-nama-text").html();
		var arrayHapus = [nip];
		$.ajax({

				type: "POST",
				url: "index.php?sajen=data_umum_guru_delete",
				data: {json: JSON.stringify(arrayHapus)},
				cache: false,
				success: function(html) {
					create_toast("info", "Sukses Hapus Guru", nip + " " + nama);
	    		}      
			});
	});

	$(".tambah-guru-btn").on("click", function(){

		$(".tambah-nip-guru").val("");
		$(".tambah-nama-guru").val("");
		$(".select-tambah-kelamin-guru").val();
	});

	$(".tambah-guru-proses").on("click", function(){

		var nip = $(".tambah-nip-guru").val();
		var nama = $(".tambah-nama-guru").val();
		var kelamin = $(".select-tambah-kelamin-guru").val();
		if (nip == ""){

			var lanjut = 0;
			create_toast("error", "Dibutuhkan Data", "NIP");
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

			var arrayTambahGuru = [nip,nama,kelamin];
			$.ajax({

					type: "POST",
					url: "index.php?sajen=data_umum_guru_tambah",
					data: {json: JSON.stringify(arrayTambahGuru)},
					cache: false,
					success: function(html) {
						
						create_toast("info", "Sukses Tambah", nip + nama);
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
