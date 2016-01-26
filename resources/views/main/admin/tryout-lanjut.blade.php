@extends('layouts.template2')
@section('judul')
	<?php
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		//echo 'Pengaturan Tryout - ' . $requestURI[4];
	?>
	Pengaturan Tryout - {!!$data['nama_to']!!}
@endsection
@section('navigasi')
	
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8 text-center">	
			<div class="col-md-6">
				<a href="/admin/tryout/edit" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>						
			</div>
			<div class="col-md-6">
				<div class="btn-group">
					<a class="btn btn-info" href="/admin/tryout/cetak/token/{!!$data['kode_to']!!}" ><i class="fa fa-print" style="color: white;"></i>&nbsp; Cetak Token</a>
				</div>
			</div>				
		</div>
		<div class="col-md-2">
		</div>
	</div>

@endsection
@section('content')
<div style="background: none repeat scroll 0% 0% rgb(247, 249, 250); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">

<div class="row">
	&nbsp;
</div>


<div class="row">
	<div class="col-md-2">
			
	</div>

	<div class="col-md-8">
		<div class="col-md-4">				
			<div class="panel panel-info panel-square panel-no-border text-center" style="margin-bottom: 0px;">

			  	<div class="panel-body bg-default">
					<h4>IPA</h4>
					<hr />
					
					{!!$data['ipa']!!}


			  	</div>
			</div>
		</div>
		<div class="col-md-4">				
			<div class="panel panel-info panel-square panel-no-border text-center" style="margin-bottom: 0px;">

			  	<div class="panel-body bg-default">
					<h4>IPS</h4>
					<hr />

					{!!$data['ips']!!}

			  	</div>
			</div>
		</div>
		<div class="col-md-4">				
			<div class="panel panel-info panel-square panel-no-border text-center" style="margin-bottom: 0px;">

			  	<div class="panel-body bg-default">
					<h4>BAHASA</h4>
					<hr />

					{!!$data['bahasa']!!}

					
			  	</div>
			</div>
		</div>				
	</div>

	<div class="col-md-2">				
	</div>
</div>
<div class="row text-left">
	<div class="col-md-2">
	</div>
	<div class="col-md-10" style="padding-left:50px">
		<h5>
			<b>
				Keterangan:
			</b>
		</h5>
		<div class="row">
			<div class="col-md-4">
				<div class="btn btn-danger btn-sm btn-square text-left"><i class="fa fa-lock" style="color: white"></i>&nbsp;</div>&nbsp;<small>Mapel dikunci, tidak dapat dikerjakan siswa</small>
			</div>
			<div class="col-md-4">
				<div class="btn btn-success btn-sm btn-square text-left"><i class="fa fa-unlock" style="color: white"></i></div>&nbsp;<small>Mapel tidak dikunci, dapat dikerjakan siswa</small>
			</div>
		</div>			
	</div>
</div>
<div class="row">
	<br>&nbsp;
</div>
		<div class="modal fade" id="ModalToken" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 2vh;">
				<div class="modal-content">
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">
						<div class="row">
							<div class="col-md-12">
								<h3 id="judulModalToken">Bahasa Indonesia</h3>
							</div>
						</div>
						<div class="row">
						
						<form role="form">
							<div class="col-md-4">
								<h4 style="margin-top: 15px;margin-bottom: 0px;">Tanggal berlaku</h4>
								<h4 style="margin-top: 15px;margin-bottom: 0px;">Kunci Ujian</h4>
							</div>
							<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
								<div class="form-group" style="margin-bottom: 5px;">
									<input id="tanggal_ujian" type="date" class="form-control" name="tanggal_dikunci" value="">
									<input id="kunci_ujian" type="text" class="form-control" name="kunci_ujian" value="">
									<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
								</div>
							</div>
							<div class="col-md-4">
							</div>
						</form>
						</div>
						<hr style="margin-top: 0px;margin-bottom: 0px;"/>

						<!-- UNTUK KLOTER 1 -->
						<div class="row">
					    <div class="col-md-4">

					    	<!-- JUDUL KLOTER 1 -->

					        <div class="text-center">
					            <h3>Kloter 1</h3>
					            <p id="waktuKloter1">(07.30-09.30)</p>
					   		</div>

					   		<!-- ISI KLOTER 1 -->
					   		<div class="row">
					   			<div class="col-md-3"></div>
					   			<div class="col-md-8" id="isiModalTokenKloter1">
					   				

					   			</div>
					   		</div>
					   		
						</div>

						<!-- UNTUK KLOTER 2 -->
						<div class="col-md-4">

					    	<!-- JUDUL KLOTER 2 -->

					        <div class="text-center">
					            <h3>Kloter 2</h3>
					            <p id="waktuKloter2">(10.30-12.30)</p>
					   		</div>

					   		<!-- ISI KLOTER 2 -->
					   		<div class="row">
					   			<div class="col-md-3"></div>
					   			<div class="col-md-8" id="isiModalTokenKloter2">
					   				

					   			</div>
					   		</div>
					   		
						</div>

						<!-- UNTUK KLOTER 3 -->
						<div class="col-md-4">

					    	<!-- JUDUL KLOTER 3 -->

					        <div class="text-center">
					            <h3>Kloter 3</h3>
					            <p id="waktuKloter3">(14.00-16.00)</p>
					   		</div>

					   		<!-- ISI KLOTER 3 -->
					   		<div class="row">
					   			<div class="col-md-3"></div>
					   			<div class="col-md-8" id="isiModalTokenKloter3">
					   				

					   			</div>
					   		</div>
					   		
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<a type="button" href="" class="btn btn-info">Simpan</a>								
					</div>
				</div>
			</div>
		</div>
</div>

<!-- MODAL UNTUK ATUR TOKEN -->

@endsection