@extends('layouts.template')
@section('content')




			<div class="row">
				<div class="col-sm-1 col-md-3 col-md-2 col-lg-3">
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">

					  <div class="panel-body bg-info">
						<h2>Try Out</h2>
						<hr />
						<p>
							Tambah atau edit try out
						</p>					
					  </div>
						<a href="/admin/tryout/edit" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
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
						<a href="/admin/analisis/" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
			</div>




			<div class="row">
				<div class="col-sm-1 col-md-3 col-md-2 col-lg-3">
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">

					  <div class="panel-body bg-info">
						<h2>Data Guru</h2>
						<hr />
						<p>
							Atur berbagai data guru
						</p>					
					  </div>
						<a href="/admin/data-guru/" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
				<div class="col-sm-5 col-md-4 col-lg-3">				
					<div class="panel panel-info panel-square panel-no-border text-center">
					  <div class="panel-body bg-info">
						<h2>Data Siswa</h2>
						<hr />
						<p>
							Atur berbagai data siswa
						</p>					
					  </div>
						<a href="/admin/data-siswa/" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">				
					<div class="panel panel-info panel-square panel-no-border text-center">

					  <div class="panel-body bg-info">
						<h2>Setting Server </h2>
						<hr />
						<p>
							Atur Server Pusat / Lokal
						</p>					
					  </div>
						<a href="/admin/server" class="btn  btn-warning btn-block btn-lg btn-square">MASUK</a>
					</div>
				</div>
			</div>


@endsection