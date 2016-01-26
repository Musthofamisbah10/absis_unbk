$(document).ready(function(){

        var create_toast = function (tipe,judul,pesan, to, ext_to, close_btn){
        var i = -1;
        var toastCount = 0;
        var shortCutFunction = tipe;//$("#toastTypeGroup input:radio:checked").val();
        var msg = pesan;//$('#message').val();
        var title = judul;//$('#title').val() || '';
        var toastIndex = toastCount++;
        toastr.options = {
            showDuration: '300',
            hideDuration: '100',
            timeOut: to,
            extendedTimeOut: ext_to,
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            positionClass: 'toast-top-right', // Top Right Bottom Right Bottom Left Top Left Top Full Width Bottom Full Width
            closeButton: close_btn, //true false broo
            debug: false,
            progressBar: false,
            onclick: null,
            tapToDismiss: false
            };
            var $toast = toastr[shortCutFunction](msg, title);
        };


	$(".status-edit-soal-tryout").hide();

	$('.lihat-soal').click(function(){
		
		$(".content-edit-soal-tryout").hide();

		var link = $(this).attr('link-get-soal');
		var data_get;

			$.ajax({
			    data: {},
			    url: link,
			    type: 'GET',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){

			    	$(".content-edit-soal-tryout").show();

			        data_get = JSON.parse(response);

			        console.log(data_get);

			        $('#isi-soal').html(data_get.isi_soal);

			        var listUpdate='#list'+data_get.kode_soal;

			        $(listUpdate).html(data_get.isi_soal);

			        $('#no_soal_edit').html($(listUpdate).attr('no-soal'));

			        $('.simpan-soal').attr('link-update','/admin/tryout/edit/'+data_get.kode_to+'/'+data_get.id_mapel+'/soal/'+data_get.kode_soal+'/update');
			        $('.simpan-soal').attr('kode-soal',data_get.kode_soal);
			        $('.simpan-soal').attr('id-mapel',data_get.id_mapel);
			        $('.simpan-soal').attr('kode-to',data_get.kode_to);
			        $('.hapus-soal').attr('href','/admin/tryout/edit/'+data_get.kode_to+'/'+data_get.id_mapel+'/soal/'+data_get.kode_soal+'/hapus');
			        //$('.hapus-soal').attr('href')='/admin/tryout/edit/'2702d40451a515eb03ff661344efbbea84519c7f'/'6'/soal/'53d88c3b886a619d57af7312df2a191c4bbf1eac'/update';
			        	
			        //UPDATE DATA2 menu

			        $('.tingkat_kesulitan').val(data_get.tingkat_kesulitan);
			        $('.status_acak').val(data_get.status_acak);
			        $('.no_soal_tidak_acak').val(data_get.no_soal);

			        if (data_get.status_acak==0) {
			        	$('#form_no_soal_tidak_acak').removeAttr("hidden");
			        } else if(data_get.status_acak==1){
			        	$('#form_no_soal_tidak_acak').attr("hidden","");
			        }


			        //console.log(data_get);

			        var arrayJawab = ['#jawaban1','#jawaban2','#jawaban3','#jawaban4','#jawaban5'];
			        var arrayJawabBenar = ['#jawaban_benar1','#jawaban_benar2','#jawaban_benar3','#jawaban_benar4','#jawaban_benar5'];
			        

			        for (var i = 0; i < 5; i++) {

			        	$(arrayJawab[i]).html(data_get[i]['isi_jawaban']);
			        	$(arrayJawab[i]).attr('kode-jawaban',data_get[i]['kode_jawaban']);
			        	$(arrayJawabBenar[i]).attr('kode-jawaban',data_get[i]['kode_jawaban']);

			        	

			        	if (data_get[i]['status_benar']=='1') {
			        		//alert(data_get[i]['kode_jawaban']);
			        		$(arrayJawabBenar[i]).prop("checked", true);


			        	};
			        };

			        	var banyak_data = data_get['acak'].length;

				        var banyak_soal = $('#jumlah_soal').attr('jumlah-soal');

				        for (var i = 1; i <= banyak_soal; i++) {
				        	
				        	var id = "#acak" + i;

				        	$(id).removeAttr('disabled');
				        	

				        };

				        for (var i = 0; i < banyak_data; i++) {
				        	
				        	var id = "#acak" + data_get['acak'][i]['no_soal'];

				        	$(id).attr('disabled','');
				        	

				        };

			        create_toast("info", "Sukses", "Load Sukses", "1500", "100", false);
			    }
			})
	});

    $('body').on('click','.simpan-soal',function(){
        var isi_soal = $('#isi-soal').html();
		var jawaban_a= $('#jawaban1').html();
		var jawaban_b= $('#jawaban2').html();
		var jawaban_c= $('#jawaban3').html();
		var jawaban_d= $('#jawaban4').html();
		var jawaban_e= $('#jawaban5').html();
		var kode_a= $('#jawaban1').attr('kode-jawaban');
		var kode_b= $('#jawaban2').attr('kode-jawaban');
		var kode_c= $('#jawaban3').attr('kode-jawaban');
		var kode_d= $('#jawaban4').attr('kode-jawaban');
		var kode_e= $('#jawaban5').attr('kode-jawaban');
		var idList = '#list'+$(this).attr('kode-soal');

		//var arrayJawaban = [isi_soal,kode_a,jawaban_a,kode_b,jawaban_b,kode_c,jawaban_c,kode_d,jawaban_d,kode_e,jawaban_e];

		
			var link = $(this).attr('link-update');

			$.ajax({
			    data: {isi_soal:isi_soal,kode_a:kode_a,jawaban_a:jawaban_a,kode_b:kode_b,jawaban_b:jawaban_b,kode_c:kode_c,jawaban_c:jawaban_c,kode_d:kode_d,jawaban_d:jawaban_d,kode_e:kode_e,jawaban_e:jawaban_e},
			    url: link,
			    type: 'POST',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){
			        console.log(response);

			        //alert('sukses');

			        //alert(id_lihat_soal);

			        $(idList).html(isi_soal);

			        create_toast("success", "Sukses", "Perubahan Tersimpan", "1500", "100", false);
			    }
			})	
    });

    $('body').on('click','.jawaban-benar',function(){
        var kode_jawaban = $(this).attr('kode-jawaban');
        var kode_to = $('.simpan-soal').attr('kode-to');
        var kode_soal = $('.simpan-soal').attr('kode-soal');
        var id_mapel = $('.simpan-soal').attr('id-mapel');

		var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/soal/"+kode_soal+"/updateJawabanBenar";

			$.ajax({
			    data: {kode_jawaban:kode_jawaban},
			    url: link,
			    type: 'POST',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){
			        console.log(response);

			        //alert('Jawaban Benar Terupdate');

			        //alert(id_lihat_soal);

			        create_toast("success", "Sukses", "Perubahan Jawaban Tersimpan", "1500", "100", false);

			       
			    }
			})
    });

    $('body').on('change','.no_soal_tidak_acak',function(){

    	if ($('.status_acak').val()==0) {
        
	        var kode_to = $('.simpan-soal').attr('kode-to');
	        var kode_soal = $('.simpan-soal').attr('kode-soal');
	        var id_mapel = $('.simpan-soal').attr('id-mapel');
	        var no_soal = $(this).val();

			var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/soal/"+kode_soal+"/updateNoSoal";

				$.ajax({
				    data: {no_soal:no_soal},
				    url: link,
				    type: 'POST',
				    beforeSend: function (request) {
				        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
				    },
				    success: function(response){
				       
				        //alert('Jawaban Benar Terupdate');

				        //alert(id_lihat_soal);

				        var data_get = JSON.parse(response);

				       		if (data_get['status']=="sukses") {

					        	create_toast("success", "Sukses", "Perubahan tersimpan", "1500", "100", false);

					        } else {

					        	create_toast("error", "Error", data_get['status'], "1500", "100", false);

					        }

					        var banyak_data = data_get['acak'].length;

				       		var banyak_soal = $('#jumlah_soal').attr('jumlah-soal');

				        	for (var i = 1; i <= banyak_soal; i++) {
				        	
					        	var id = "#acak" + i;

					        	$(id).removeAttr('disabled');

					        	//console.log(banyak_data);
				        	

				        	};

					        for (var i = 0; i < banyak_data; i++) {
					        	
					        	var id = "#acak" + data_get['acak'][i]['no_soal'];

					        	$(id).attr('disabled','');
					        	

					        };

					         //console.log(data_get);


				       
				    }
				});
			}
    });

    $('body').on('change','.status_acak',function(){

    	if ($(this).val()==0) {

    		 //create_toast("success", "Sukses", "Perubahan Jawaban Tersimpan", "1500", "100", false);
    		$('#form_no_soal_tidak_acak').removeAttr("hidden");


    		create_toast("warning", "Warning", "Tolong masukkan no soal tetap", "1500", "2000", false);

    		var status_acak = $(this).val();
    		var kode_to = $('.simpan-soal').attr('kode-to');
	        var kode_soal = $('.simpan-soal').attr('kode-soal');
	        var id_mapel = $('.simpan-soal').attr('id-mapel');

			var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/soal/"+kode_soal+"/updateStatusAcak";

				$.ajax({
				    data: {status_acak:status_acak},
				    url: link,
				    type: 'POST',
				    beforeSend: function (request) {
				        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
				    },
				    success: function(response){
				        //console.log(response);
				        var data = JSON.parse(response);
				        console.log(data);

				        var banyak_data = data.length;

				        var banyak_soal = $('#jumlah_soal').attr('jumlah-soal');

				        for (var i = 1; i <= banyak_soal; i++) {
				        	
				        	var id = "#acak" + i;

				        	$(id).removeAttr('disabled');
				        	

				        };

				        for (var i = 0; i < banyak_data; i++) {
				        	
				        	var id = "#acak" + data[i]['no_soal'];

				        	$(id).attr('disabled','');
				        	

				        };

				        //$('.no_soal_tidak_acak').val(data['no_soal']);

				       
				    }
				});

    	} else if ($(this).val()==1){

    		 $('#form_no_soal_tidak_acak').attr("hidden","");



    		var status_acak = $(this).val();
    		var kode_to = $('.simpan-soal').attr('kode-to');
	        var kode_soal = $('.simpan-soal').attr('kode-soal');
	        var id_mapel = $('.simpan-soal').attr('id-mapel');

			var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/soal/"+kode_soal+"/updateStatusAcak";

				$.ajax({
				    data: {status_acak:status_acak},
				    url: link,
				    type: 'POST',
				    beforeSend: function (request) {
				        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
				    },
				    success: function(response){
				        console.log(response);

				        var data = JSON.parse(response);
				        console.log(data);


				        
				        

				       
				    }
				});



    	};
    });

	$('body').on('change','#tingkat_kesulitan',function(){


    	// create_toast("warning", "Warning", "Tolong masukkan no soal tetap", "1500", "2000", false);


        // var kode_jawaban = $(this).attr('kode-jawaban');
        var tingkat_kesulitan = $(this).val();
        var kode_to = $('.simpan-soal').attr('kode-to');
        var kode_soal = $('.simpan-soal').attr('kode-soal');
        var id_mapel = $('.simpan-soal').attr('id-mapel');

		var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/soal/"+kode_soal+"/updateTingkatKesulitan";

			$.ajax({
			    data: {tingkat_kesulitan:tingkat_kesulitan},
			    url: link,
			    type: 'POST',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){
			        console.log(response);

			        create_toast("success", "Sukses", "Perubahan Tingkat Kesulitan Berhasil", "1500", "2000", false);

			        //alert('Jawaban Benar Terupdate');

			        //alert(id_lihat_soal);

			        

			       
			    }
			})
    });

	$('#lihat1').click();

	$('body').on('click','.edit-token',function(){

		$('#isiModalTokenKloter1').html("Loading...");
    	$('#isiModalTokenKloter2').html("Loading...");
    	$('#isiModalTokenKloter3').html("Loading...");

    	create_toast("warning", "Warning", "Tunggu, sedang load data....", "99999999", "99999999", false);

		$("#ModalToken").modal();

        var kode_to = $(this).attr('kode-to');
        var id_mapel = $(this).attr('id-mapel');

        $('#tanggal_ujian').attr('id-mapel',id_mapel);
        $('#tanggal_ujian').attr('kode-to',kode_to);

        $('#kunci_ujian').attr('id-mapel',id_mapel);
        $('#kunci_ujian').attr('kode-to',kode_to);

		var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/getModalToken";

			$.ajax({
			    data: {kode_to:kode_to,id_mapel:id_mapel},
			    url: link,
			    type: 'GET',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){

			    	//console.log(response);

			    	var data = JSON.parse(response);

			    	$('#isiModalTokenKloter1').html(data[0].isi_modal);
			    	$('#isiModalTokenKloter2').html(data[1].isi_modal);
			    	$('#isiModalTokenKloter3').html(data[2].isi_modal);
			    	$('#judulModalToken').html(data['nama_mapel']);
			    	$('#tanggal_ujian').val(data['tanggal_ujian']);
			    	$('#kunci_ujian').val(data['kunci_ujian']);
			    	$('#waktuKloter1').html('('+data['kloter'][0]['dibuka']+'-'+data['kloter'][0]['ditutup']+')');
			    	$('#waktuKloter2').html('('+data['kloter'][1]['dibuka']+'-'+data['kloter'][1]['ditutup']+')');
			    	$('#waktuKloter3').html('('+data['kloter'][2]['dibuka']+'-'+data['kloter'][2]['ditutup']+')');

			        console.log(data);

			        //alert(data['tanggal_ujian']);

			        			    	toastr.clear();

			        create_toast("info", "Sukses", "Data terload", "1500", "2000", false);

			        // //alert('Jawaban Benar Terupdate');

			        // alert(id_lihat_soal);

			        

			       
			    }
			});
    });

	$('body').on('change','#tanggal_ujian',function(){

		var kode_to = $(this).attr('kode-to');
        var id_mapel = $(this).attr('id-mapel');
        var tanggal_ujian = $(this).val();

        var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/updateTanggalUjian";

			$.ajax({
			    data: {kode_to:kode_to,id_mapel:id_mapel,tanggal_ujian:tanggal_ujian},
			    url: link,
			    type: 'POST',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){

			    	console.log(response);

			    	toastr.clear();

			    	create_toast("success", "Sukses", "Perubahan Tanggal Sukses", "1500", "2000", false);


			    }
			});

        
	});

	$('body').on('change','#kunci_ujian',function(){

		var kode_to = $(this).attr('kode-to');
        var id_mapel = $(this).attr('id-mapel');
        var kunci_ujian = $(this).val();

        var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/updateKunciUjian";

			$.ajax({
			    data: {kode_to:kode_to,id_mapel:id_mapel,kunci_ujian:kunci_ujian},
			    url: link,
			    type: 'POST',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){

			    	console.log(response);

			    	toastr.clear();

			    	create_toast("success", "Sukses", "Perubahan Kunci Sukses", "1500", "2000", false);


			    }
			});

        
	});

	$('body').on('click','.kelas-checkbox',function(){

		create_toast("warning", "Warning", "Tunggu, sedang menyimpan....", "99999999", "99999999", false);

        var kode_to = $(this).attr('kode-to');
        var id_mapel = $(this).attr('id-mapel');
        var id_kelas = $(this).attr('id-kelas');
        var id_kloter = $(this).attr('id-kloter');
        var idk1 = "#idk1-"+id_kelas;
        var idk2 = "#idk2-"+id_kelas;
        var idk3 = "#idk3-"+id_kelas;
        var id_2 = ".mapel"+id_mapel;

        if ($(this).attr('id-kloter')==0) {

        	$(idk2).attr('disabled','');
        	$(idk3).attr('disabled','');

        }else if ($(this).attr('id-kloter')==1){

        	$(idk1).attr('disabled','');
        	$(idk3).attr('disabled','');

        }else if ($(this).attr('id-kloter')==2){

        	$(idk1).attr('disabled','');
        	$(idk2).attr('disabled','');

        }

		if ($(this).prop( "checked" )) {

		var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/setModalToken";

		console.log(kode_to+ " " + id_mapel +" "+id_kelas+" "+id_kloter+" ");

			$.ajax({
			    data: {kode_to:kode_to,id_mapel:id_mapel,id_kelas:id_kelas,id_kloter:id_kloter},
			    url: link,
			    type: 'GET',
			    beforeSend: function (request) {
			        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
			    },
			    success: function(response){

			    	console.log(response);

			    	toastr.clear();


			    	create_toast("success", "Sukses", "Perubahan Kloter Sukses", "1500", "2000", false);


			    }
			});

		} else {

			var link = "/admin/tryout/edit/"+kode_to+"/"+id_mapel+"/hapusModalToken";

			console.log(kode_to+ " " + id_mapel +" "+id_kelas+" "+id_kloter+" ");

				$.ajax({
				    data: {kode_to:kode_to,id_mapel:id_mapel,id_kelas:id_kelas,id_kloter:id_kloter},
				    url: link,
				    type: 'GET',
				    beforeSend: function (request) {
				        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
				    },
				    success: function(response){

				    	console.log(response);

				    	toastr.clear();

				    	create_toast("success", "Sukses", "Perubahan Kloter Sukses", "1500", "2000", false);


			    }
			});
			        

			       
			
		}
    });

});
