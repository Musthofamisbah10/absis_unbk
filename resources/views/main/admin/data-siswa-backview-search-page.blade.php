<?php
	$dataSearch=json_decode($_GET['json']);
	$query = htmlspecialchars($dataSearch[0], ENT_QUOTES);
	$page_request = htmlspecialchars($dataSearch[1], ENT_QUOTES);
	$page = $page_request - 1;
	$item = 7;
	$array = array(

		"0" => array(

			"nis" => "324",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"1" => array(

			"nis" => "1132423411",
			"nisn" => "8888",
			"nama" => "siswa_nama_2",
			"kelamin" => "P",
			"kelas" => "99"
			),
		"2" => array(

			"nis" => "32432",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"3" => array(

			"nis" => "6536",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"4" => array(

			"nis" => "43543",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"5" => array(

			"nis" => "23432",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"6" => array(

			"nis" => "454343",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"7" => array(

			"nis" => "76445",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"8" => array(

			"nis" => "2342",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"9" => array(

			"nis" => "64353",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"10" => array(

			"nis" => "6453",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"11" => array(

			"nis" => "6342",
			"nisn" => "8888",
			"nama" => "siswa_nama_2",
			"kelamin" => "P",
			"kelas" => "99"
			),
		"12" => array(

			"nis" => "24523",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"13" => array(

			"nis" => "432435",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"14" => array(

			"nis" => "5423532",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"15" => array(

			"nis" => "213414",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"16" => array(

			"nis" => "6544",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"17" => array(

			"nis" => "765335",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"18" => array(

			"nis" => "34254354",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"19" => array(

			"nis" => "423453",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			),
		"20" => array(

			"nis" => "13242",
			"nisn" => "9999",
			"nama" => "siswa_nama_1",
			"kelamin" => "L",
			"kelas" => "00"
			)	
		);
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