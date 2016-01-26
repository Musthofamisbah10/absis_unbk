	<div class="row">
		<div class="col-md-2" style="padding-right: 0px;">
			<h3 style="margin-top: 10px; padding-left:15px;"><b><span>Nomor </span><span id="no_soal_edit">1</span></b></h3>
		</div>
		<div class="col-md-10 text-right" style="margin-top: 5px;margin-bottom: 5px;">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
							<div class="form-group" style="margin-bottom: 0px;">
								<form role="form">
										<select name="tingkat_kesulitan" id="tingkat_kesulitan" class="tingkat_kesulitan form-control" tabindex="1">
											<option value="0">Mudah</option>
											<option value="1">Sedang</option>
											<option value="2">Susah</option>
										</select>
								</form>
							</div>
						</div>
						<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
							<div class="form-group" style="margin-bottom: 0px;">
								<form role="form">
										<select name="KD" class="form-control" tabindex="1" disabled="1">
											<option value="">Pilihan KD/Indikator</option>
											<option value="1">KD 1</option>
											<option value="2">KD 2</option>
											<option value="3">KD 3</option>
										</select>
								</form>							
							</div>
						</div>
						<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
							<div class="form-group" style="margin-bottom: 0px;">
								<form role="form">
										<select name="status_acak" class="form-control status_acak" tabindex="1">
											<option value="1">No Soal diacak</option>
											<option value="0">No Soal tetap</option>
										</select>
								</form>							
							</div>
						</div>		
						<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
							<div class="form-group" style="margin-bottom: 0px;">
								<form id="form_no_soal_tidak_acak" hidden role="form">
										<select name="no_soal_tidak_acak" class="form-control no_soal_tidak_acak" tabindex="1">

											<?php 

												for ($i=0; $i < $data['jml_soal']; $i++) { 

													$no_soal = $i+1;

													echo '<option id="acak'.$no_soal.'" value="'.$no_soal.'">'.$no_soal.'</option>';

												}

											?>
											
										</select>
								</form>							
							</div>
						</div>					
					</div>
				</div>
				<div class="col-md-3" style="padding-left: 0px;padding-right: 30px;">	
					<div class="btn-group">
						<a class="btn btn-info simpan-soal" kode-soal="{!!$data['kode_soal']!!}" id-mapel="{!!$data['id_mapel']!!}" kode-to="{!!$data['kode_to']!!}" link-update="/admin/tryout/edit/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/soal/{!!$data['kode_soal']!!}/update" href="#" type="button">Simpan</a>
					</div>		
					<div class="btn-group">
						<a class="btn btn-danger hapus-soal" href="#" type="button" data-toggle="modal" data-target="#ModalHapusSoal">Hapus</a>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ModalHapusSoal" tabindex="-1" role="dialog" aria-hidden="true">
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
						<a type="button" id="hapus_to" href="/admin/tryout/edit/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/soal/{!!$data['kode_soal']!!}/hapus" class="btn btn-danger">Ya</a>								
					</div>
				</div>
			</div>
		</div>

<div style="height:59vh;overflow-y: scroll; overflow-x: hidden">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10"></div>
	</div>
	<div class="row">
		<script type="text/javascript" src="{{ URL::asset('ckeditor/ckeditor/ckeditor.js')}}"></script>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/2.2-latest/MathJax.js?config=TeX-AMS_HTML"></script>
		<div class="col-md-1"></div>
		<div class="col-md-10" contenteditable="true" id="isi-soal" style="border-style:solid;border-width:1px;border-color:black;background:white;padding-top:15px;min-height:300px">
			{!!$data['isi_soal']!!}
		</div>
	
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h4><b>Jawaban : </b></h4>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="the-box full">
				<table class="table table-hover table-warning table-th-block" style="margin-bottom: 0px;">
					<thead>
						<tr>
							<th class="text-center">
								Opsi
							</th>
							<th style="width: 70%;">
								Pilihan Jawaban
							</th>
							<th>
								Kunci Jawaban
							</th>
						</tr>
					</thead>
					<tbody>
						<form role="form">											
							{!!$data['isi_jawaban']!!}
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

