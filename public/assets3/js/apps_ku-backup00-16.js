$(document).ready(function(){



	$('.lihat-soal').click(function(){
		
		$("#isi_soal").html("jek loading...");
		
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
			        
			        data_get = JSON.parse(response);

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
			        //alert('sukses');
			        console.log(data_get);
			    }
			})
	});

});

$(document).ready(function(){
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

			        alert('sukses');

			        //alert(id_lihat_soal);

			        $(idList).html(isi_soal);
			    }
			})
		

		
    });
});

$(document).ready(function(){
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

			        alert('Jawaban Benar Terupdate');

			        //alert(id_lihat_soal);

			       
			    }
			})
    });
});

$(document).ready(function(){
    $('body').on('click','.preview-soal',function(){
        alert('ehlo');
    });
});