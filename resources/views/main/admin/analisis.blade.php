@extends('layouts.template2')
@section('judul')
	Analisis Hasil Tryout
@endsection
@section('navigasi')	
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="col-md-12">
				<a href="/" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>				
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

			<div class="row">
				<div class="col-sm-1 col-md-3 col-md-2 col-lg-3">
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">

					  <div class="panel-body bg-info">
						<h2>Hasil Tryout</h2>
						<hr />
						<p>
							Melihat hasil tryout
						</p>					
					  </div>
						<a href="/admin/analisis/pilih" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">
					  <div class="panel-body bg-info">
						<h2>Analisis Mapel</h2>
						<hr />
						<p>
							Lihat analisis mapel
						</p>					
					  </div>
						<a href="#" class="btn  btn-warning btn-block btn-lg btn-square disabled">MASUK</a>
					</div>
				</div>
			</div>






	<div class="row">
		<br />
	</div>	

		
	</div>

@endsection