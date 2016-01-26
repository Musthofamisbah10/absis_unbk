<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>UJIAN NASIONAL ONLINE (PUSPENDIK BALITBANG KEMDIKBUD)</title>

<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/reset.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/style_testee.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/messages.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/forms.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/tables.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/autocomplete.css') }}" />

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

</head>
<body >

    <div id="wrapper">
        <header id="page-header">
            <div class="wrapper">
                <div id="util-nav">
                    <ul>
                        <li><a href="logout">Keluar</a></li>
                    </ul>
                </div>
                <br/>
                <h1 style="line-height:30px;">TRYOUT UJIAN NASIONAL BERBASIS KOMPUTER <br/> SMAN 3 SEMARANG</h1>
            </div>
        </header>
        
<section id="content">
    <div class="wrapper">

        <!-- Main Section -->

        <section class="grid_8 first">

            <div class="columns top">
                <div class="grid_8 first">
                    <div class="message info">
                        <h3>Selamat datang di Sistem Ujian Nasional Berbasis Komputer</h3>

                        <p>
                            <table>
                                <tr>
                                    <td>Jenis Ujian</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['nama_to']!!}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['nisn']!!}</td>
                                </tr>
                                <tr>
                                    <td>Nama Peserta</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['nama_user']!!}</td>
                                </tr>             
                                <tr>
                                    <td>Mata Pelajaran&nbsp;&nbsp;&nbsp;</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['nama_mapel']!!}</td>
                                </tr>     
                                <tr>
                                    <td>Waktu</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['waktu']!!}</td>
                                </tr>          
                                <tr>
                                    <td>Waktu Kloter</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['waktu_kloter']!!}</td>
                                </tr>   
                                <tr>
                                    <td>Tanggal Ujian</td>
                                    <td>:&nbsp;</td>
                                    <td>{!!$data['tanggal_ujian']!!}</td>
                                </tr>         
                                <tr>
                                    <td>Status</td>
                                    <td>:&nbsp;</td>
                                    <td id="status_aktivasi">{!!$data['status']!!}</td>
                                </tr>     
                                <tr>
                                    <td>Masukkan Kode Aktivasi</td>
                                    <td>:&nbsp;</td>
                                    <td><input id="kunci_ujian" type="text" class="form-control" name="kunci_ujian" value=""><button kode-to="{!!$data['kode_to']!!}" id-mapel="{!!$data['id_mapel']!!}" id="cek_kunci_ujian">CEK</button></td>
                                
                                </tr>                                                                                               
                            </table>
                            <br />
                            <a href="{!!$data['previous']!!}" class="button button-blue">Kembali</a>
                            <a href="{!!$data['next']!!}" class="button button-blue">Kerjakan</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="clear">&nbsp;</div>

        </section>

        <div class="clear"></div>

    </div>
    <div id="push"></div>
</section>
    </div>

    <footer id="page-footer">
        <div id="footer-inner">
            <p class="wrapper"><span style="float: right;"></span>Bimadev (PT. Bima Developr Indonesia)  | &copy; 2016 | Author: Ariaseta Setia Alam, Fadhil Imam Kurnia, Muhammad Muhlas Abror</p>
        </div>
    </footer>


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

        var cekKunciUjian = function(){

            var kode_to = $('#cek_kunci_ujian').attr('kode-to');
            var kunci_ujian = $('#kunci_ujian').val();
            var id_mapel = $('#cek_kunci_ujian').attr('id-mapel');

            var link = "/admin/tryout/ujian/"+kode_to+"/"+id_mapel+"/cek/HELLO";

            $.ajax({
                data: {kunci_ujian:kunci_ujian},
                url: link,
                type: 'POST',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){

                    var data = JSON.parse(response);
                    console.log(data);

                    //console.log(response);
                    if (data['status']==1) {

                        //toastr.clear();
                       // create_toast("success", "Sukses", "Kode Aktivasi Benar", "1500", "9000", false);
                       alert("AKTIVASI SUKSES");
                       $('#status_aktivasi').html(data['error']);
                       // location.reload();

                    }else{

                        alert("AKTIVASI GAGAL");
                        //  create_toast("danger", "Gagal", "Kode Aktivasi Salah", "1500", "9000", false);
                    }


            }
        });


        }

        // $('body').on('change','#kunci_ujian',function(){

        //     cekKunciUjian();

        //     //location.reload();

        // });


        $('body').on('click','#cek_kunci_ujian',function(){

            cekKunciUjian();

            //location.reload();

        });

    });
    
    </script>

</body>
</html>