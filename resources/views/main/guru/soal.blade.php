@extends('layouts.template2')
@section('judul')
	Edit Soal {{$kode}}
@endsection
@section('navigasi')
	

	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="col-md-6">
				<a href="/guru/edit-soal/pilih-tryout" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>				
			</div>
			<div class="col-md-6">
				<div class="btn-group">
					<a class="btn btn-info" href="#" type="button" data-toggle="modal" data-target="#ModalTambahTryout"><i class="fa fa-plus-square" style="color: white;"></i>&nbsp; Tambah</a>
				</div>
				
			</div>			
		
		</div>
		<div class="col-md-2">
		</div>
	</div>


@endsection
@section('content')
<div class="row" style="height:100%">
	<div class="col-md-4" style="padding-left:15px;float:left">
		<div class="row" style="background:white;height:450px;overflow-y: scroll">
			<div class="col-md-12">
				<div class="row" style="padding-left:20px">
					<h4>Soal yang telah diinput :</h4>
				</div>
				
			</div>
			<div class="col-md-12">
				<?php

				for ($i=1; $i <=10 ; $i++) { ?>
					
					<div class="row" style="padding-left:20px;padding-right:20px" {{'id='.$i}}>

									<table>
										<tr>
											<td style="vertical-align:text-top">{{$i}}.&nbsp;&nbsp;&nbsp;</td>
											<td>
												<p>
													Banyaknya kalor yang harus diserap untuk mengubah wujud 1 gram emas dari ...										
												</p>
											</td>
										</tr>
										<tr>
											<td colspan="2" style="text-align:right"><a class="btn btn-info" href="#" type="button">Lihat</a></td>
										</tr>
									</table>

					</div>
					<hr style="background:black">
					
				<?php
				}
				?>
				
				<br>			
				<br>			
				<br>				

			</div>
		</div>
	</div>
	<div class="col-md-8" style="padding-left:15px;height:450px;">
		<iframe src="{{url('/guru/edit-soal/main/16541hf')}}" style="height:100%;width:100%;margin-right:0px;margin-left:0px"></iframe>
	</div>
</div>

@endsection