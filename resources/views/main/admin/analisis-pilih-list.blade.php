<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default panel-square panel-no-border text-center">
			<div class="panel-body bg-default">
				<div class="row">
					<div class="col-md-4 text-left">
						<h4>{!!$data['nama_tryout']!!}</h4>
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
				</div>
				<div class="row text-center">
					<div class="col-md-12">
						<a class="btn btn-info btn-lg" href="/admin/analisis/show/{!!$data['kode_to']!!}" type="button"><i class="fa fa-book"></i>&nbsp;Lihat Analisis </a>
					</div>
				</div>
		  	</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
