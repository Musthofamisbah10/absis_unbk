@extends('layouts.template2')
@section('judul')
	Pilih Tryout
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
	<br>
	<br>
	{!!$data_to!!}
	<br>
	<br>
@endsection