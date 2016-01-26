<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>UNBK SMAN 3 Semarang</title>


<link rel="stylesheet" media="screen" href="{{ URL::asset('ujian/reset.css') }}" />

<link rel="stylesheet" media="screen" href="{{ URL::asset('ujian/messages.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('ujian/forms.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('ujian/tables.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('ujian/autocomplete.css') }}" />

<link href="{{ URL::asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets2/css/style_ujian.css') }}" />

<link href="{{ URL::asset('assets2/plugins/sw-bootstrap/css/highlight.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/sw-bootstrap/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/prettify/prettify.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/chosen/chosen.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/icheck/skins/all.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/validator/bootstrapValidator.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/markdown/bootstrap-markdown.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/datatable/css/bootstrap.datatable.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/fullcalendar/fullcalendar/fullcalendar.print.css') }}" rel="stylesheet" media="print">
<link href="{{ URL::asset('assets2/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- <link href="{{ URL::asset('assets2/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/css/style-responsive.css') }}" rel="stylesheet"> -->
<link href="{{ URL::asset('assets2/plugins/weather-icon/css/weather-icons.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/owl-carousel/owl.theme.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/owl-carousel/owl.transitions.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/morris-chart/morris.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/c3-chart/c3.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/slider/slider.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/salvattore/salvattore.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/toastr/toastr.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets2/plugins/switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet">

<style type="text/css">
    
.judul{
    color: #fff;
    margin: 0;
    text-shadow: 1px 1px 3px #000;
    padding: 18px 20px 10px 80px;
    background-image: url(/smaga.png);
    background-size: 68px 68px;
    background-repeat: no-repeat;
    font-weight: bold;
    font-size: 20px;
    font-family: 'Lucida Grande', Verdana, Helvetica, Arial, sans-serif;
}

</style>


</head>
<body>



<header id="page-header" style="width:100%">
        <div class="row" style="width:100%">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <br>
                <h2 class="judul">TRYOUT UJIAN NASIONAL BERBASIS KOMPUTER<br>SMAN 3 SEMARANG</h2>
                <br>
            </div>
            <div class="col-md-2 text-right" >
                <div id="util-nav">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
</header>



<div class="row" style="width:100%">

    <div class="col-md-1"></div>

    <div class="col-md-10">
    

            <form id="theform" name="theform" method="post" class="form panel" enctype="multipart/form-data" style="border:1px solid #ccc;margin-bottom:0px">
                <table style="width: 100%">
                    <tbody><tr>
                        <td style="width: 50%">
                            <table style="width: 100%">
                                <tbody><tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{!!$data['nama_user']!!}</td>
                                </tr>
                                <tr>
                                    <td width="130">Satuan Pendidikan</td>
                                    <td>:</td>
                                    <td>SMAN 3 Semarang</td>
                                </tr>
                                <tr>
                                    <td>No Ujian (NISN)</td>
                                    <td>:</td>
                                    <td>{!!$data['nisn']!!}</td>
                                </tr>
                            </tbody></table>
                        </td>
                        <td style="width: 50%;" align="right">
                            <table style="width:50%;margin-right:20%">
                                <tbody><tr>
                                    <td>Jenjang</td>
                                    <td>:</td>
                                    <td>SMA</td>
                                </tr>
                                <tr>
                                    <td>Ujian</td>
                                    <td>:</td>
                                    <td>{!!$data['nama_to']!!}</td>
                                </tr>
                                <tr>
                                    <td>Mapel</td>
                                    <td>:</td>
                                    <td>{!!$data['nama_mapel']!!}</td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </form>

    </div>

    <div class="col-md-1"></div>
    
</div>
  

<div class="row" style="width:100%">
    <div class="col-md-1"></div>
    <div class="col-md-7">
        
        <form id="theform" name="theform" method="post" class="form_test panel" enctype="multipart/form-data" style="border:1px solid #ccc">
                                                                                                
            <header>
                <div style="float:left">
                    <h4> Soal No <span class="no_soal" id="no_soal" no-soal="1" >1</span></h4>
                </div>
                <div style="border: 0px solid;width: 50%;float:right;margin-bottom: 10px;" class="text-right">
                    <h5><b>Sisa waktu anda&nbsp;&nbsp;<span id="clock" style="color:red  ">00:00:00</span></b></h5>
                    {!!$data['audio']!!}
                </div>
                <div style="clear:both;">
                <hr>
            </div></header>

            <div style="height: 39vh; position: relative;overflow-y: scroll;padding-left:20px">
                <div id="isi_soal" kode-to-auth="{!!$data['kode_to_auth']!!}" kode-to="{!!$data['kode_to']!!}" id-mapel="{!!$data['id_mapel']!!}" kode-soal="{!!$data['kode_soal']!!}">

                {!!$data['isi_soal']!!}
                    
                </div>                                
                <div id="isi_jawaban">

                {!!$data['isi_jawaban']!!}
                    

                </div>
            </div>


            <hr>
            <table width="100%">
                <tr>
                    <td widht="50%" style="vertical-align: top;">Soal no <span class='no_soal'>1</span><span> dari <span id="jumlah_soal">{!!$data['jml_soal']!!}</span></span></td>
                    <td widht="50%" style="text-align: right">
                        <input type="button" value="<--" name="next" id="btnPrev" class="before button button-blue" alt="0">
                        <input type="button" value="-->" class="next button button-blue" id="btnNext" name="next" alt="0">
                        <a type="button" value="Selesai" href="/siswa/ujian/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/selesai" class="selesai button button-blue" id="btnSelesai" name="next" alt="0">Selesai</a>
                    </td>
                </tr>
            </table>

        </form>

    </div>
    <div class="col-md-3">

        <form method="post" class="form panel" enctype="multipart/form-data" style="border:1px solid #ccc">
            {!!$data['html_nav']!!}
        </form>


    </div>
    <div class="col-md-1"></div>
</div>                                                            
                                



    <script type='text/javascript' src="{{ URL::asset('assets2/jquery-1.8.0.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets2/jquery.countdown.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/retina/retina.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/nicescroll/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/backstretch/jquery.backstretch.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/sw-bootstrap/js/highlight.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/sw-bootstrap/js/bootstrap-switch.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/prettify/prettify.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/newsticker/jquery.newsTicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/mask/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/markdown/bootstrap-markdown.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/markdown/to-markdown.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/markdown/markdown.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/datatable/js/bootstrap.datatable.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/validator/bootstrapValidator.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/slider/bootstrap-slider.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/skycons/skycons.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/toastr/toastr.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/fullcalendar/lib/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/js/full-calendar.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/jquery-knob/knob.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/flot-chart/example.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/morris-chart/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/morris-chart/morris.min.js') }}"></script>  
    <script src="{{ URL::asset('assets2/plugins/c3-chart/d3.v3.min.js') }}" charset='utf-8'></script>
    <script src="{{ URL::asset('assets2/plugins/c3-chart/c3.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/easypie-chart/easypiechart.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/easypie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ URL::asset('assets2/plugins/switch/dist/js/bootstrap-switch.js') }}"></script>
    <script src="{{ URL::asset('assets2/js/apps.js') }}"></script>
    <script src="{{ URL::asset('assets2/js/online.js') }}"></script>

    <script type="text/javascript">

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

        $("#btnSelesai").on("click", function(){

            var conf = confirm("Anda Yakin Sudah Selesai?");
            if (conf) {
                //function 
                //selesai();
                //atau link 
                //window.location = "#";
                return true;
            } else {

                return false;
            }
        });

        var updateListJawaban = function(){

            var kode_to = $('#isi_soal').attr('kode-to');
            var id_mapel = $('#isi_soal').attr('id-mapel');
            var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

            var link = "/siswa/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+no_soal+"/jawaban";

            $.ajax({
                data: {kode_to_auth:kode_to_auth},
                url: link,
                type: 'GET',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){

                    data_get = JSON.parse(response);

                    var jumlah_soal = data_get.length;

                    var huruf = ['A','B','C','D','E'];

                    for (var i = 0; i < jumlah_soal; i++) {

                        var no_soal = i + 1; 
                        var id = "#no" + no_soal;

                        $(id).html(huruf[data_get[i]]);
                        //$(id).attr('id-jawaban',data_get[i]);

                    }

                    toastr.clear();
                    create_toast("success", "Sukses", "Perubahan Tersimpan", "1500", "100", false);

                }
            });

        }

        var loadSoalPertama = function(){

            $('#isi_soal').html("Loading...");

            var no_soal = 1;
            var kode_to = $('#isi_soal').attr('kode-to');
            var id_mapel = $('#isi_soal').attr('id-mapel');
            var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

            var link = "/admin/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+no_soal;

                $.ajax({
                    data: {kode_to_auth:kode_to_auth},
                    url: link,
                    type: 'GET',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        data_get = JSON.parse(response);
                        var isi_soal = data_get.isi_soal;
                        var kode_soal = data_get.kode_soal;

                        console.log(data_get);

                        $('#isi_soal').attr('kode-soal',kode_soal);
                        $('#isi_soal').html(isi_soal);
                        $('.no_soal').attr('no-soal',no_soal);
                        $('.no_soal').html(no_soal);

                        var arrayJawab = ['#jawabanIsiA','#jawabanIsiB','#jawabanIsiC','#jawabanIsiD','#jawabanIsiE'];
                        var arrayKodeJawab = ['#kodeJawabanA','#kodeJawabanB','#kodeJawabanC','#kodeJawabanD','#kodeJawabanE'];
                        var huruf = ['A','B','C','D','E'];

                        for (var i = 0; i <5; i++) {

                            var id_no_soal = "#no"+no_soal;

                            $(arrayJawab[i]).html(data_get[i]['isi_jawaban']);

                            $(arrayKodeJawab[i]).attr('kode-jawaban',data_get[i]['kode_jawaban']);

                            if (data_get[i]['jawaban']=='1') {

                                $(id_no_soal).html(huruf[i]);

                                $(arrayKodeJawab[i]).attr('checked','1');

                            } else {

                                $(arrayKodeJawab[i]).removeAttr('checked');

                            }
      
                        }

                        if (parseInt($('#no_soal').attr('no-soal'))==parseInt($('#jumlah_soal').html())) {

                            $('.next').val('Selesai');

                        } else {

                            $('.next').val('-->');

                        }
                    }
                });
        }

        {!!$data['peringatan_audio']!!}

        //loadSoalPertama();

        updateListJawaban();
        
        //BUAT KIRIM JAWABAN
        $('body').on('click','.jawab',function(){

            var kode_jawaban = $(this).attr('kode-jawaban');
            var kode_to = $('#isi_soal').attr('kode-to');
            var kode_soal = $('#isi_soal').attr('kode-soal');
            var id_mapel = $('#isi_soal').attr('id-mapel');
            var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

            var link = "/siswa/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+kode_soal+"/kirim_jawaban";

                $.ajax({
                    data: {kode_jawaban:kode_jawaban,kode_to_auth:kode_to_auth},
                    url: link,
                    type: 'POST',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){

                        data_get = JSON.parse(response);

                        console.log(data_get);

                        updateListJawaban();
                    }
                });

        });
        

        //BUAT AMBIL SOAL
        $('body').on('click','.get',function(){

            //create_toast("info", "Tunggu", "Mengambil Soal", "1500", "100", false);
            $('#isi_soal').html("Loading...");

            var no_soal = $(this).attr('no-soal');
            var kode_to = $('#isi_soal').attr('kode-to');
            var id_mapel = $('#isi_soal').attr('id-mapel');
            var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

            var link = "/siswa/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+no_soal;

                $.ajax({
                    data: {kode_to_auth:kode_to_auth},
                    url: link,
                    type: 'GET',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        data_get = JSON.parse(response);
                        var isi_soal = data_get.isi_soal;
                        var kode_soal = data_get.kode_soal;

                        console.log(data_get);

                        $('#isi_soal').attr('kode-soal',kode_soal);
                        $('#isi_soal').html(isi_soal);
                        $('.no_soal').attr('no-soal',no_soal);
                        $('.no_soal').html(no_soal);

                        var arrayJawab = ['#jawabanIsiA','#jawabanIsiB','#jawabanIsiC','#jawabanIsiD','#jawabanIsiE'];
                        var arrayKodeJawab = ['#kodeJawabanA','#kodeJawabanB','#kodeJawabanC','#kodeJawabanD','#kodeJawabanE'];
                        var huruf = ['A','B','C','D','E'];

                        for (var i = 0; i <5; i++) {

                            var id_no_soal = "#no"+no_soal;

                            $(arrayJawab[i]).html(data_get[i]['isi_jawaban']);

                            $(arrayKodeJawab[i]).attr('kode-jawaban',data_get[i]['kode_jawaban']);

                            if (data_get[i]['jawaban']=='1') {

                                $(id_no_soal).html(huruf[i]);

                                $(arrayKodeJawab[i]).attr('checked','1');

                            } else {

                                $(arrayKodeJawab[i]).removeAttr('checked');

                            }
      
                        }

                        if (parseInt($('#no_soal').attr('no-soal'))==parseInt($('#jumlah_soal').html())) {

                            $('.next').attr('hidden','');

                        } else {

                            $('.next').val('-->');
                            $('.next').removeAttr('hidden');

                        }
                    }
                });

        });

        $('body').on('click','.next',function(){

            var no_soal =parseInt($('#no_soal').attr('no-soal')) ;
            var jumlah_soal = parseInt($('#jumlah_soal').html());

            if (no_soal==jumlah_soal) {

                var no_soal = parseInt($('#no_soal').attr('no-soal'));

                var kode_to = $('#isi_soal').attr('kode-to');
                var kode_soal = $('#isi_soal').attr('kode-soal');
                var id_mapel = $('#isi_soal').attr('id-mapel');
                var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

                var link = "/siswa/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+kode_soal+"/selesai";

                    $.ajax({
                        data: {kode_to_auth:kode_to_auth},
                        url: link,
                        type: 'POST',
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function(response){

                            data_get = JSON.parse(response);

                            console.log(data_get);
                           
                        }
                    });

            } else {

                var no_soal = parseInt($('#no_soal').attr('no-soal'))+1;

            }

            $('#isi_soal').html("Loading...");

            var kode_to = $('#isi_soal').attr('kode-to');
            //var no_soal = $().attr('kode-soal');
            var id_mapel = $('#isi_soal').attr('id-mapel');
            var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

            var link = "/siswa/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+no_soal;

                $.ajax({
                    data: {kode_to_auth:kode_to_auth},
                    url: link,
                    type: 'GET',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        data_get = JSON.parse(response);
                        var isi_soal = data_get.isi_soal;
                        var kode_soal = data_get.kode_soal;

                        $('#isi_soal').attr('kode-soal',kode_soal);
                        $('#isi_soal').html(isi_soal);
                        $('.no_soal').attr('no-soal',no_soal);
                        $('.no_soal').html(no_soal);

                        var arrayJawab = ['#jawabanIsiA','#jawabanIsiB','#jawabanIsiC','#jawabanIsiD','#jawabanIsiE'];
                        var arrayKodeJawab = ['#kodeJawabanA','#kodeJawabanB','#kodeJawabanC','#kodeJawabanD','#kodeJawabanE'];
                        var huruf = ['A','B','C','D','E'];

                        for (var i = 0; i <5; i++) {

                            var id_no_soal = "#no"+no_soal;

                            $(arrayJawab[i]).html(data_get[i]['isi_jawaban']);

                            $(arrayKodeJawab[i]).attr('kode-jawaban',data_get[i]['kode_jawaban']);

                            if (data_get[i]['jawaban']=='1') {

                                $(id_no_soal).html(huruf[i]);

                                $(arrayKodeJawab[i]).attr('checked','1');

                            } else {

                                $(arrayKodeJawab[i]).removeAttr('checked');

                            }
                        }

                        if (parseInt($('#no_soal').attr('no-soal'))==parseInt($('#jumlah_soal').html())) {

                            $('.next').attr('hidden','');

                        }

                       
                    }
                });
            

        });

        $('body').on('click','.before',function(){

            if ($('#no_soal').attr('no-soal')==1) {

                var no_soal = parseInt($('#no_soal').attr('no-soal'));

            } else {

                var no_soal = parseInt($('#no_soal').attr('no-soal'))-1;

            }

            $('#isi_soal').html("Loading...");

            var kode_to = $('#isi_soal').attr('kode-to');
            //var no_soal = $().attr('kode-soal');
            var id_mapel = $('#isi_soal').attr('id-mapel');
            var kode_to_auth = $('#isi_soal').attr('kode-to-auth');

            var link = "/siswa/tryout/ujian/"+kode_to+"/"+id_mapel+"/"+no_soal;

                $.ajax({
                    data: {kode_to_auth:kode_to_auth},
                    url: link,
                    type: 'GET',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        data_get = JSON.parse(response);
                        var isi_soal = data_get.isi_soal;
                        var kode_soal = data_get.kode_soal;

                        $('#isi_soal').attr('kode-soal',kode_soal);
                        $('#isi_soal').html(isi_soal);
                        $('.no_soal').attr('no-soal',no_soal);
                        $('.no_soal').html(no_soal);

                        var arrayJawab = ['#jawabanIsiA','#jawabanIsiB','#jawabanIsiC','#jawabanIsiD','#jawabanIsiE'];
                        var arrayKodeJawab = ['#kodeJawabanA','#kodeJawabanB','#kodeJawabanC','#kodeJawabanD','#kodeJawabanE'];
                        var huruf = ['A','B','C','D','E'];

                        for (var i = 0; i <5; i++) {

                            var id_no_soal = "#no"+no_soal;

                            $(arrayJawab[i]).html(data_get[i]['isi_jawaban']);

                            $(arrayKodeJawab[i]).attr('kode-jawaban',data_get[i]['kode_jawaban']);

                            if (data_get[i]['jawaban']=='1') {

                                $(id_no_soal).html(huruf[i]);

                                $(arrayKodeJawab[i]).attr('checked','1');

                            } else {

                                $(arrayKodeJawab[i]).removeAttr('checked');

                            }
                        }

                        if (parseInt($('#no_soal').attr('no-soal')) != parseInt($('#jumlah_soal').html())) {

                            $('.next').val('-->');
                            $('.next').removeAttr('hidden');

                        }

                       
                    }
                });

        });


        $('#clock').countdown("{!!$data['waktu_selesai']!!}", function(event) {
            var totalHours = event.offset.totalDays * 24 + event.offset.hours;
            $(this).html(event.strftime(totalHours + ' jam %M menit %S  detik'));
        })
        .on('finish.countdown', function(){

             window.location.assign('/siswa/ujian/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}/selesai');

        });

        //$('#clock').countdown('2016/01/20 12:27:00');

    });
    

    </script> 

</body>
</html>