<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-default panel-square panel-no-border text-center">

		<div class="panel-body bg-default">
			<div class="row">
				<div class="col-md-6 text-left">
					<h4>{!!$data['nama_tryout']!!}</h4>
				</div>
				<div class="col-md-6 text-right">
					<a class="btn btn-info" href="/guru/edit-soal/t45125hsbh" type="button"><i class="fa fa-book"></i>&nbsp; Edit Soal </a>
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
								{!!$data['jumlah_mapel']!!} Mapel									
							</td>
						</tr>
						<tr>
							<td>Jumlah Peserta</td>
							<td>&nbsp;:&nbsp;</td>
							<td>{!!$data['jumlah_peserta']!!} Siswa</td>
						</tr>															
					</table>				
				</div>
				<div class="col-md-4 text-center">
					<h1><i class="fa fa-unlock-alt" style="color:green"></i></h1>
					<table style="margin:0 auto">
						<tr>
							<td class="text-center"><h6>Input soal dikunci pada <br>
							{!!$data['tanggal_dikunci']!!}</h6></td>
						</tr>
					</table>
					
				</div>						
			</div>
	  	</div>

	</div>
</div>
<div class="col-md-3"></div>
</div>';

