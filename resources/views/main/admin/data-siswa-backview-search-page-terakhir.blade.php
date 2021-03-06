<?php
	$dataSearch=json_decode($_GET['json']);
	$query = htmlspecialchars($dataSearch[0], ENT_QUOTES);
	$page = 0;
	$item = 7;

	$myData = array_slice($array, $page, $item);
	for ($x = 0; $x <> sizeof($myData); $x++){

		$nis = $myData[$x]['nis'];
		$nisn = $myData[$x]['nisn'];
		$nama = $myData[$x]['nama'];
		$kelamin = $myData[$x]['kelamin'];
		$kelas = $myData[$x]['kelas'];
		echo "<tr>";
		echo "<td>1</td>";
		echo "<td>$nama <span class='badge badge-info badge-$nis'>aktif</span></td>";
		echo "<td>$kelamin</td>";
		echo "<td>$nis</td>";
		echo "<td>$nisn</td>";
		echo "<td><input id='switch-state' siswa-nis='$nis' type='checkbox' data-size='mini' data-on-text='1' data-off-text='0' data-on-color='primary' data-off-color='warning' switch checked></td>";
		echo "<td><button name='button' data-toggle='modal' data-target='#ModalUbahSiswa' class='btn btn-info ubah-siswa' siswa-nis='$nis' siswa-nisn='$nisn' siswa-nama='$nama' siswa-kelamin='$kelamin'>Ubah</button></td>";
		echo "<td><button name='button' data-toggle='modal' data-target='#ModalHapusSiswa' class='btn btn-danger hapus-siswa' siswa-nis='$nis' siswa-nama='$nama'>Hapus</button></td>";
		echo "</tr>";
	}
	
?>
<script>
	$(document).ready(function(){

		$("[switch]").bootstrapSwitch();

		$('[switch]').on('switchChange.bootstrapSwitch', function () {

			var get_state = $(this).bootstrapSwitch('state');
			var nis = $(this).attr("siswa-nis");
			if (get_state == false){

				var query = "false";
				var arrayGetDataSwitch = [query];
				$.ajax({

					type: "GET",
					url: "http://dev.absis.co.id/admin/data-siswa/backview/switch",
					data: {json: JSON.stringify(arrayGetDataSwitch)},
					cache: false,
					success: function(html) {

						$(".badge-" + nis).attr("class", "badge badge-danger badge-" + nis);
						$(".badge-" + nis).html("tidak aktif");
						create_toast("info","TIDAK AKTIF",nis + "->" + get_state);
					} 
				});				
			} else {

				var query = "true";
				var arrayGetDataSwitch = [query];
				$.ajax({

					type: "GET",
					url: "http://dev.absis.co.id/admin/data-siswa/backview/switch",
					data: {json: JSON.stringify(arrayGetDataSwitch)},
					cache: false,
					success: function(html) {

						$(".badge-" + nis).attr("class", "badge badge-info badge-" + nis);
						$(".badge-" + nis).html("aktif");
						create_toast("info","AKTIF",nis + "->" + get_state);
					} 
				});		
			};
		});

		$('.ubah-siswa').click(function(){

			var nama = $(this).attr("siswa-nama");
			var nis = $(this).attr("siswa-nis");
			var nisn = $(this).attr("siswa-nisn");
			var kelamin = $(this).attr("siswa-kelamin");
			$(".ubah-nama-siswa").attr("value", nama);
			$(".ubah-nis-siswa").attr("value", nis);
			$(".ubah-nisn-siswa").attr("value", nisn);
			$(".select-kelamin-siswa").val(kelamin);
			console.log(nama);
			console.log(nis);
			console.log(nisn);
			console.log(kelamin);
			
		});

		$('.hapus-siswa').click(function(){

			var nis = $(this).attr("siswa-nis");
			var nama = $(this).attr("siswa-nama");
			$(".hapus-siswa-nis-text").html(nis);
			$(".hapus-siswa-nama-text").html(nama);			
		});

		var create_toast = function (tipe,judul,pesan){

			var i = -1;
			var toastCount = 0;
			var shortCutFunction = tipe;//$("#toastTypeGroup input:radio:checked").val();
			var msg = pesan;//$('#message').val();
			var title = judul;//$('#title').val() || '';
			var showDuration = "300";
			var hideDuration = "100";
			var timeOut = "500";
			var extendedTimeOut = "200";
			var showEasing = "swing";
			var hideEasing = "linear";
			var showMethod = "fadeIn";
			var hideMethod = "fadeOut";
			var toastIndex = toastCount++;
			toastr.options = {

				closeButton: false, //true false broo
				debug: false,
				positionClass: 'toast-top-right', // Top Right Bottom Right Bottom Left Top Left Top Full Width Bottom Full Width
				onclick: null
				};
				var $toast = toastr[shortCutFunction](msg, title);
		};
	});
	</script>