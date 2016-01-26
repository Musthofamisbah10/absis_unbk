@extends('layouts.template2')
@section('judul')
	Pengaturan Tryout
@endsection
@section('navigasi')	
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="col-md-6">
				<a href="/" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>				
			</div>
			<div class="col-md-6">
				<div class="btn-group">
					<!-- <a class="btn btn-info" href="#" type="button" data-toggle="modal" data-target="#ModalTambahTryout"><i class="fa fa-plus-square" style="color: white;"></i>&nbsp; Tambah</a> -->

					<ul class="inline-popups">
						<a class="btn btn-info" href="#pop_up_kloter" data-effect="mfp-zoom-in"><i class="fa fa-plus-square" style="color: white;"></i>&nbsp; Edit Waktu Kloter</a>
						<a class="btn btn-info" href="#text-popup-html" data-effect="mfp-zoom-in"><i class="fa fa-plus-square" style="color: white;"></i>&nbsp; Tambah</a>
					</ul>
					<!-- Form popup -->
					<div id="text-popup-html" class="white-popup mfp-with-anim mfp-hide">
						<form action="{{ url('/admin/tryout/baru') }}" method="POST" class="bootstrap-validator-form" novalidate="novalidate">

							<div class="form-group">
								<label for="nama_to">Nama Tryout</label>
								<input type="text" class="form-control" name="nama" placeholder="Cth: Tryout Sekolah II">
							</div>
							<div class="form-group">
								<label for="tanggal_akhir">Tanggal Kunci Input Soal</label>
								<input type="date" class="form-control" name="tanggal_dikunci" value="{{ date('Y-m-d') }}">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
							</div>
							<button type="submit" class="btn btn-primary">Buat</button>
						</form>
					</div>

					<div id="pop_up_kloter" class="white-popup mfp-with-anim mfp-hide">
						<form action="{{ url('/admin/tryout/baru') }}" method="POST" class="bootstrap-validator-form" novalidate="novalidate">

							
								
							<div class="row">
								<div class="col-md-3">
									<h4>Kloter 1</h4>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="time" class="form-control" name="tanggal_dikunci-1-1" value="{{ date('Y-m-d') }}">								
									</div>
								</div>
								<div class="col-md-1 text-center">
									s.d.
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="time" class="form-control" name="tanggal_dikunci-1-2" value="{{ date('Y-m-d') }}">								
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<h4>Kloter 2</h4>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="time" class="form-control" name="tanggal_dikunci-2-1" value="{{ date('Y-m-d') }}">								
									</div>
								</div>
								<div class="col-md-1 text-center">
									s.d.
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="time" class="form-control" name="tanggal_dikunci-2-2" value="{{ date('Y-m-d') }}">								
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<h4>Kloter 3</h4>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="time" class="form-control" name="tanggal_dikunci-3-1" value="{{ date('Y-m-d') }}">								
									</div>
								</div>
								<div class="col-md-1 text-center">
									s.d.
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="time" class="form-control" name="tanggal_dikunci-3-2" value="{{ date('Y-m-d') }}">								
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>

					<div id="pop_up_kunci" class="white-popup mfp-with-anim mfp-hide">
						<form action="{{ url('/admin/tryout/baru') }}" method="POST" class="bootstrap-validator-form" novalidate="novalidate">

							<div class="form-group">
								<label for="nama_to">Nama Tryout</label>
								<input type="text" class="form-control" name="nama" placeholder="Cth: Tryout Sekolah II">
							</div>
							<div class="form-group">
								<label for="tanggal_akhir">Tanggal Kunci Input Soal</label>
								<input type="date" class="form-control" name="tanggal_dikunci" value="{{ date('Y-m-d') }}">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
							</div>
							<button type="submit" class="btn btn-primary">Buat</button>
						</form>
					</div>
					
				</div>
				
			</div>			
		
		</div>
		<div class="col-md-2">
		</div>
	</div>
@endsection

@section('content')
<div style="background: none repeat scroll 0% 0% rgb(247, 249, 250); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">
	<div class="row" >
		<br />
	</div>

	{!!$data_to!!}

	<div class="row">
		<br />
	</div>	


	<!-- MODAL UNTUK EDIT TRYOUT -->
	<div class="modal fade" id="ModalUbah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 5%;">
				<div class="modal-content">
					<div class="modal-header bg-info no-border">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Ubah Try Out</h4>
					</div>
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">

						<div class="row">
							<div class="col-md-3">
								<h4>
									Nama Tryout
								</h4>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control input-md bold-border" placeholder="Nama TO">
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<h4>
									Nama Tryout
								</h4>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control input-md bold-border" placeholder="Nama TO">
							</div>
						</div>

						<div class="row">
							<hr>
						</div>

						<div class="row">

							<div class="col-md-6">

								<div class="text-center">
						            <h3>IPA</h3>
						            <hr>
						   		</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Bhs Indonesia</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Bhs Inggris</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Biologi</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Fisika</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Kimia</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Matematika</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

							</div>

					

							<div class="col-md-6">

								<div class="text-center">
						            <h3>IPS</h3>
						            <hr>
						   		</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Bhs Indonesia</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Bhs Inggris</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Ekonomi</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Geografi</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Matematika</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Sosiologi</h4>
									</div>
									<div class="col-md-6">
										<input type="date" class="form-control" name="tanggal_dikunci" value="2016-01-12">
									</div>
								</div>
								
							</div>

						</div>

					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button> -->
						<button type="button" class="btn btn-info" data-dismiss="modal">OK</button>								
					</div>
				</div>
			</div>
		</div>


		<!-- MODAL UNTUK HAPUS TRYOUT -->
		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 15%;">
				<div class="modal-content">
					<div class="modal-header bg-danger no-border">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Konfirmasi Hapus Tryout</h4>
					</div>
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">
						<h4 class="text-center">Apakah anda ingin menghapus tryout ini?</h4> 
						<h5 class="text-center">Proses ini tidak bisa dikembalikan ulang</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
						<a type="button" id="hapus_to" href="" class="btn btn-danger">Ya</a>								
					</div>
				</div>
			</div>
		</div>

		<!-- MODAL UNTUK EDIT TANGGAL LOCK INPUT-->
		<div class="modal fade" id="ModalGantiWaktu" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 15%;">
				<div class="modal-content">
					<div class="modal-header bg-info no-border">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Ganti Tanggal Soal Dikunci</h4>
					</div>
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">
						<h4 class="text-center">Apakah anda ingin menghapus tryout ini?</h4> 
						<h5 class="text-center">Proses ini tidak bisa dikembalikan ulang</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
						<a type="button" href="" class="btn btn-danger">Ya</a>								
					</div>
				</div>
			</div>
		</div>

		
	</div>
		<script type="text/javascript">
		$(document).ready(function(){
			alert('hello');
		});
		</script>

@endsection