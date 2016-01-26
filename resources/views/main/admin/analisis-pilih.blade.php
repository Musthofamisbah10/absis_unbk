@extends('layouts.template2')
@section('judul')
	Analisis - Pilih Tryout
@endsection
@section('navigasi')	
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="col-md-12">
				<a href="/admin/analisis" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
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

	{!!$data_to!!}

	<div class="row">
		<br />
	</div>	


	</div>
		<script type="text/javascript">
		$(document).ready(function(){
			alert('hello');
		});
		</script>

@endsection