<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>UNBK SMAN 3 Semarang</title>


<link href="{{ URL::asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets2/css/style_testee.css') }}" />

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
        <div class="grid_6 first">
            <p>
                <b>TERIMA KASIH ANDA TELAH MENGIKUTI UJIAN NASIONAL ONLINE</b><br>
                
            </p><table width="100%">
                <tbody><tr>
                    <th colspan="3" align="center">Rangkuman</th>
                </tr>
                <tr>
                    <td width="150">Nama Lengkap</td>
                    <td width="10">:</td>
                    <td>{!!$data['nama_user']!!}</td>
                </tr>
                <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td>{!!$data['nama_mapel']!!}</td>
                </tr>
                <tr>
                    <td>Satuan Pendidikan</td>
                    <td>:</td>
                    <td>SMAN 3 Semarang</td>
                </tr>
                <tr>
                    <td>No Ujian</td>
                    <td>:</td>
                    <td>{!!$data['nisn']!!}</td>
                </tr>
                <tr>
                    <td>Tanggal Ujian</td>
                    <td>:</td>
                    <td>....</td>
                </tr>
            </tbody></table>
            <p></p>

             <a type="button" href="/" class="button button-blue" id="" name="" alt="0">Kembali</a>
        </div>

    </div>
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

    //     $(document).ready(function(){

    // //     var on_status = function(){
    // //         toastr.clear();
    // //         create_toast("success", "Internet Online", "Semua Perubahan Tersimpan", "99999999", "1000", true);
    // //     };

    // //     var off_status = function(){
    // //         toastr.clear();
    // //         create_toast("error", "Internet Offline", "Perubahan Tidak Tersimpan", "99999999", "99999999", false);
    // //     };

    // //     window.addEventListener('online',  on_status);
    // //     window.addEventListener('offline', off_status);

    //     var create_toast = function (tipe,judul,pesan, to, ext_to, close_btn){
    //     var i = -1;
    //     var toastCount = 0;
    //     var shortCutFunction = tipe;//$("#toastTypeGroup input:radio:checked").val();
    //     var msg = pesan;//$('#message').val();
    //     var title = judul;//$('#title').val() || '';
    //     var toastIndex = toastCount++;
    //     toastr.options = {
    //         showDuration: '300',
    //         hideDuration: '100',
    //         timeOut: to,
    //         extendedTimeOut: ext_to,
    //         showEasing: 'swing',
    //         hideEasing: 'linear',
    //         showMethod: 'fadeIn',
    //         hideMethod: 'fadeOut',
    //         positionClass: 'toast-top-right', // Top Right Bottom Right Bottom Left Top Left Top Full Width Bottom Full Width
    //         closeButton: close_btn, //true false broo
    //         debug: false,
    //         progressBar: false,
    //         onclick: null,
    //         tapToDismiss: false
    //         };
    //         var $toast = toastr[shortCutFunction](msg, title);
    //     };
    // });



    

    </script> 

</body>
</html>