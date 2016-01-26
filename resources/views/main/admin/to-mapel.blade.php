@extends('layouts.template2')
@section('judul')
	Edit Soal Tryout - {!!$data['nama_to']!!} [{!!$data['nama_mapel']!!}]
@endsection
@section('navigasi')
	

	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-11">
			<div class="col-md-6">
				<a href="/admin/tryout/edit/{!!$data['kode_to']!!}/" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>				
			</div>
			<div class="col-md-6">
				<div class="btn-group">
					<a class="btn btn-info" href="#" data-toggle="modal" data-target="#ModalUploadMP3"><i class="fa fa-upload" style="color: white;"></i>&nbsp; Upload MP3</a>
				</div>
				<div class="btn-group">
					<a class="btn btn-warning" href="/admin/tryout/coba/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}" ><i class="fa fa-pencil" style="color: white;"></i>&nbsp; Preview</a>
				</div>
				<div class="btn-group">
					<a class="btn btn-success" href="/admin/tryout/edit/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/baru" ><i class="fa fa-plus-square" style="color: white;"></i>&nbsp; Tambah</a>
				</div>
				<div class="btn-group">
					<a class="btn btn-info" href="/admin/tryout/cetak/soal/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}" ><i class="fa fa-print" style="color: white;"></i>&nbsp; Cetak Soal</a>
				</div>
				<div class="btn-group">
					<a class="btn btn-danger" href="/admin/tryout/edit/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/#" ><i class="fa fa-wrench" style="color: white;"></i>&nbsp; Pengaturan</a>
				</div>				
			</div>			
		
		</div>
	</div>


@endsection
@section('content')
<div class="row" style="height:100%;background: none repeat scroll 0% 0% rgb(247, 249, 250);padding-right:5px">
	<div class="col-md-4" style="padding-left:15px;float:left">
		<div class="row" style="background: none repeat scroll 0% 0% rgb(247, 249, 250);">
			<div class="col-md-12" style="padding-left:20px">
				<div class="row">
					<div class="col-md-4 text-center" style="margin-bottom: 5px;margin-top: 5px;">
						<a class="btn btn-info" href="#soal-prev"><i class="fa  fa-angle-double-left" style="color: white;"></i></a>
						<a class="btn btn-info" href="#soal-next"><i class="fa  fa-angle-double-right" style="color: white;"></i></a>
					</div>
					<div class="col-md-4">
						<h4 class="text-center" >Total <b id="jumlah_soal" jumlah-soal="{!!$data['jml_soal']!!}">{!!$data['jml_soal']!!}</b> Soal </h4>
					</div>
					<div class="col-md-4 text-center" style="margin-bottom: 5px;margin-top: 5px;">
						<a class="btn btn-info" href="#soal-up"><i class="fa  fa-angle-double-up" style="color: white;"></i></a>
						<a class="btn btn-info" href="#soal-down"><i class="fa  fa-angle-double-down" style="color: white;"></i></a>
					</div>
				</div>
				
			</div>
			<div class="col-md-12" style="height:59vh;overflow-y: scroll">
				<div id="soal-up"></div>
				{!!$data['list_soal']!!}
				<div id="soal-down"></div>
			</div>
		</div>
	</div>
	<div class="col-md-8 content-edit-soal-tryout" id="" style="background: none repeat scroll 0% 0% rgb(247, 249, 250); padding-left:0px;padding-right:0px;">
		{!!$data['isi_soal']!!}
		<!-- 
		<div id="isi_soal" style="height:100%;margin-right:0px;margin-left:0px;overflow-y: scroll">

			
		</div> -->
	</div>
</div>

<div class="modal fade" id="ModalUploadMP3" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="margin-top: 10%;">
		<div class="modal-content">
			<div class="modal-header bg-info no-border">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Upload MP3</h4>
			</div>
			<div class="modal-body"style="color: rgba(1,1,1,0.6);">
				<h4 class="text-center">Pilih file .mp3 (maks n MB)</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-info btn-file">
								Pilih File <input name="" type="file">
							</span>
						</span>
						<input class="form-control" readonly="" type="text">
					</div>
				</div>				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<a type="button" id="hapus_to" href="#" class="btn btn-info">Upload</a>								
			</div>
		</div>
	</div>
</div>

@endsection