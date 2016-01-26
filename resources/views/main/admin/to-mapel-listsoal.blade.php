<div class="row" style="padding-left:20px;padding-right:20px">
	<div class="the-box" style="background: none repeat scroll 0% 0% rgb(255, 255, 255)">
		<table>
			<tr>
				<td colspan="2">
					<span class="badge badge-success">{nama_indikator}</span>
					<span class="badge badge-info">{kd}</span>
				</td>
			</tr>
			<tr>
				<td style="vertical-align:text-top">{!!$data['no_soal']!!}.&nbsp;&nbsp;&nbsp;</td>
				<td>
					<div id="list{!!$data['kode_soal']!!}" no-soal="{!!$data['no_soal']!!}">

						{!!$data['isi_soal']!!}
																
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center"><a class="btn btn-info btn-block lihat-soal" id="lihat{!!$data['no_soal']!!}" link-get-soal="/admin/tryout/edit/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/soal/{!!$data['kode_soal']!!}/edit" href="#" type="button">Lihat</a></td>
			</tr>
		</table>
	</div>
</div>