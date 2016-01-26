@extends('layouts.template')
@section('content')




			<div class="row">
				<div class="col-sm-1 col-md-3 col-md-2 col-lg-3">
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">

					  <div class="panel-body bg-info">
						<h2>Bank Soal</h2>
						<hr />
						<p>
							Lihat dan edit soal
						</p>					
					  </div>
						<a href="guru/edit-soal/pilih-tryout/" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">
					  <div class="panel-body bg-info">
						<h2>Analisis</h2>
						<hr />
						<p>
							Lihat analisis dari hasil try out
						</p>					
					  </div>
						<a href="guru/analisis/pilih-tryout" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
			</div>





@endsection