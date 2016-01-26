@extends('layouts.template_cetak')
@section('content')


<div class="row" style="height:85vh">
	<div class="col-md-3" style="padding-left:15px;position:fixed">
		<div class="row" style="margin-left:20px">
			<div class="col-md-12">


				<h3>{!!$data['judul1']!!}</h3>
				<h4>{!!$data['judul2']!!}</h4>
				<hr>
				<table style="width:100%">
					<tbody>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>

						{!! $data['dropdown'] !!}
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td class="text-right"><br>
								<a class="btn btn-danger" href="{!! $data['previous'] !!}" type="button"><i class="fa fa-chevron-left" style="color: white;"></i>&nbsp; Kembali</a>&nbsp;
								<a class="btn btn-info btn_unduh" id="btn_unduh" href="#" type="button" disabled><i class="fa fa-print" style="color: white;"></i>&nbsp; Unduh</a>
							</td>
						</tr>
					</tbody>
				</table>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				
			</div>
		</div>
	</div>
	<div class="col-md-9" style="background:#ADADAD;float:right;height:100%;overflow:scroll;padding:0px;margin:0px">
		
			<iframe id="frame_" src="/admin/tryout/cetak/token/content/{!! $data['kode_to'] !!}/" style="height:100%;width:100%"></iframe>

		
	</div>
</div>
<script type="text/javascript">
	function berubah () {
		$("#frame_").attr("src", "/admin/tryout/cetak/token/content/x/");
		var select_kelas = document.getElementById("select_kelas");
		var select_mapel = document.getElementById("select_mapel");
		var id_kelas = (select_kelas.options[select_kelas.selectedIndex].value).split('-')[0];
		var bidang = (select_kelas.options[select_kelas.selectedIndex].value).split('-')[1];

		if (bidang == 'IPA') {
			 var mapel = <?php echo ($data['mapel-ipa']); ?>;
		}else if(bidang == 'IPS'){
			var mapel = <?php echo ($data['mapel-ips']); ?>;
		}else if(bidang == 'BAHASA'){
			var mapel = <?php echo ($data['mapel-bahasa']); ?>;
		}else{
			var mapel = [];
		};

		$('#select_mapel')
		    .find('option')
		    .remove()
		    .end()
		    .append('<option value="pilih">Pilih</option>')
		    .val('pilih')
		;

		for (var i = mapel.length - 1; i >= 0; i--) {

			var option = document.createElement("option");
			option.text = mapel[i]['mapel'];
			option.value = mapel[i]['id'];
	    	select_mapel.add(option);
		};

	}

	function berubah_lagi () {
		var kode_to = "<?php echo $data['kode_to']?>";
		var select_kelas = document.getElementById("select_kelas");
		var select_mapel = document.getElementById("select_mapel");
		var id_kelas = (select_kelas.options[select_kelas.selectedIndex].value).split('-')[0];
		var id_mapel = select_mapel.options[select_mapel.selectedIndex].value;
		
		$("#btn_unduh").attr("href", "/admin/tryout/cetak/token/unduh/"+kode_to+"/"+id_kelas+"/"+id_mapel);
		$("#frame_").attr("src", "/admin/tryout/cetak/token/content/"+kode_to+"/"+id_kelas+"/"+id_mapel);
		$("#btn_unduh").removeAttr("disabled");
	}
</script>
@endsection