<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default panel-square panel-no-border text-center">
			<div class="panel-body bg-default">
				<div class="row">
					<div class="col-md-4 text-left">
						<h4>{!!$data['nama_tryout']!!}</h4>
					</div>
					<div class="col-md-8 text-right"><!-- 
						<a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#ModalToken"><i class="fa fa-wrench" style="color: white;"></i>&nbsp; TOKEN &nbsp;</a>
						<a class="btn btn-warning" href="/admin/tryout/cetak" type="button"><i class="fa fa-print" style="color: white;"></i>&nbsp; Cetak Kartu &nbsp;</a> -->
						<a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#ModalUbah"><i class="fa fa-wrench" style="color: white;"></i>&nbsp; Ubah &nbsp;</a>
						<a class="btn btn-danger" href="#" type="button" data-toggle="modal" data-target="#ModalHapus-{!!$data['kode_to']!!}"><i class="fa fa-trash-o" style="color: white;"></i>&nbsp; Hapus</a>
					</div>
				</div>
				<hr style="margin-top:5px" />
				<div class="row">	
					<div class="col-md-8 text-left">					
						<table>
							<tr>
								<td>Rentang Waktu</td>
								<td>&nbsp;:&nbsp;</td>
								<td>{!!$data['rentang_waktu']!!}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>&nbsp;:&nbsp;</td>
								<td>{!!$data['status']!!}</td>
							</tr>
							<tr>
								<td>Jumlah Mapel</td>
								<td>&nbsp;:&nbsp;</td>
								<td>
									{!!$data['jumlah_mapel']!!}									
								</td>
							</tr>
							<tr>
								<td>Jumlah Peserta</td>
								<td>&nbsp;:&nbsp;</td>
								<td>{!!$data['jumlah_peserta']!!}</td>
							</tr>															
						</table>				
					</div>
					<div class="col-md-4 text-center">
						<h1><i class="fa fa-unlock-alt" style="color:green"></i></h1>
						<table style="margin:0 auto">
							<tr>
								<td class="text-right"><h6>Input soal dikunci pada <br>
								{!!$data['tanggal_dikunci']!!}</h6></td>
								<td>
									&nbsp;<a class="btn btn-info btn-xs" href="#" type="button" data-toggle="modal" data-target="#ModalGantiWaktu-{!!$data['kode_to']!!}">Ubah</a>

								</td>
							</tr>
						</table>							
					</div>						
				</div>
				<div class="row text-center">
					<div class="col-md-12">
						<a class="btn btn-info" href="/admin/tryout/edit/{!!$data['kode_to']!!}" type="button"><i class="fa fa-book"></i>&nbsp;Edit Mapel dan Soal </a>
						<a class="btn btn-danger" href="/admin/analisis/show/{!!$data['kode_to']!!}" type="button"><i class="fa fa-book"></i>&nbsp;Hasil Analisis </a>
						<a class="btn btn-warning" href="/admin/tryout/manajemen/{!!$data['kode_to']!!}" type="button"><i class="fa fa-book"></i>&nbsp;Manajemen TO </a>
					</div>
				</div>
		  	</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
<!-- MODAL UNTUK HAPUS TRYOUT -->
<!-- 		<div class="modal fade" id="ModalHapus-{!!$data['kode_to']!!}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 15%;">
				<div class="modal-content">
					<div class="modal-header bg-danger no-border">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Konfirmasi Hapus Tryout</h4>
					</div>
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">
						<h4 class="text-center">Apakah anda ingin menghapus <b>"{!!$data['nama_tryout']!!}"</b>?</h4> 
						<h5 class="text-center">Proses ini tidak bisa dikembalikan ulang</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
						<a type="button" id="hapus_to" href="/admin/tryout/edit/{!!$data['kode_to']!!}/hapus" class="btn btn-danger">Ya</a>								
					</div>
				</div>
			</div>
		</div> -->


<!-- MODAL UNTUK HAPUS TRYOUT -->
		<!-- <div class="modal fade" id="ModalGantiWaktu-{!!$data['kode_to']!!}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 15%;">
				<div class="modal-content">
					<div class="modal-header bg-danger no-border">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Ubah Waktu Kunci-{!!$data['nama_tryout']!!}</h4>
					</div>
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">
						<div class="form-group">
							<label for="tanggal_akhir">Tanggal Kunci Input Soal</label>
							<input type="date" class="form-control" name="tanggal_dikunci" value="{{ date('Y-m-d') }}">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
						<a type="button" id="hapus_to" href="/admin/tryout/edit/{!!$data['kode_to']!!}/hapus" class="btn btn-danger">Ya</a>								
					</div>
				</div>
			</div>
		</div> -->