<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>UJIAN NASIONAL ONLINE (PUSPENDIK BALITBANG KEMDIKBUD)</title>

<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/reset.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/style_testee.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/messages.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/forms.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/tables.css') }}" />
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/autocomplete.css') }}" />
<script type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>
</head>
<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

    <div id="wrapper">
        <header id="page-header">
            <div class="wrapper">
                <div id="util-nav">
                    <ul>
                        <?php
                            if (isset($data['kembali'])) {
                                echo $data['kembali'];
                            }
                        ?>
                        <li><a href="/logout">Keluar</a></li>
                        
                    </ul>
                </div>
                <br/>
                <h1 style="line-height:30px;">UJIAN NASIONAL ONLINE <br/> PUSPENDIK BALITBANG KEMDIKBUD</h1>
            </div>
        </header>
        
<script src="http://minites.puspendik.org/ujian/themes/xtremadmin/js/jquery.min.js "></script>
<script src="http://minites.puspendik.org/ujian/themes/xtremadmin/js/jquery.countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="http://minites.puspendik.org/ujian/themes/xtremadmin/js/jquery.countdown/jquery.countdown.js"></script>
<script type="text/javascript">
    $(function() {
        $(".jawab").click(function(){
            var url = "http://minites.puspendik.org/ujian/index.php/test_auto/save_ajax";
            var id_soal = $(this).attr('title');
            var nomor_butir = $(this).attr('alt');
            var jawaban = $(this).val();
            var start_soal = $("#start_soal").val();
            var data = ({no_soal: nomor_butir, id_soal: id_soal, jawaban: jawaban, start_soal: start_soal});
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: data,
                success: function (data_res){
                    if(data_res.valid == 1){
                        var hasil = data_res.jawaban;
                        $('#no_'+nomor_butir+'_user').html(hasil);
                    } else {
                        window.location = "http://minites.puspendik.org/ujian/index.php/welcome/logout";
                    }
                }
            });
        })
    });
    
    jQuery(document).ready(function(){
        var start = new Date();
        var end = new Date(2016, 01 - 1, 07, 10, 01, 55);
        $('#defaultCountdown').countdown({
            until: end, 
            compact: true,
            format: 'HMS', 
            description: '',
            onExpiry: selesai
        });
    });
    
    
    function sebelumnya(){
                window.location = "http://minites.puspendik.org/ujian/index.php/test_auto/index/1";
    }
    
    function send(){
        document.theform.submit();
    }
    
    function akhir(){
        window.location = "http://minites.puspendik.org/ujian/index.php/test_auto/index/15";
    }
    
    function awal(){
        window.location = "http://minites.puspendik.org/ujian/index.php/test_auto/index/1";
    }
    
    function jump(no_soal){
        window.location = "http://minites.puspendik.org/ujian/index.php/test_auto/index/" + no_soal;
    }
    
    function selesai(){
        window.location = "http://minites.puspendik.org/ujian/index.php/test_auto/finish";
    }
    
    function finish(){
        document.theform.action = 'http://minites.puspendik.org/ujian/index.php/test_auto/save_finish';
        document.theform.submit();
    }
</script> 
        <section id="content">
            <div class="wrapper">

                <!-- Main Section -->

                <section class="grid_8 first">
                    <div class="columns top">
                        <div class="grid_8 first">
                            <form id="theform" name="theform" method="post" class="form panel" enctype="multipart/form-data">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="width: 50%">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>Joko Listyono</td>
                                                </tr>
                                                <tr>
                                                    <td width="130">Satuan Pendidikan</td>
                                                    <td>:</td>
                                                    <td>SMPN 1 Semarang</td>
                                                </tr>
                                                <tr>
                                                    <td>No Ujian</td>
                                                    <td>:</td>
                                                    <td>1234567890</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width: 50%;" align="right">
                                            <table style="width: 50%">
                                                <tr>
                                                    <td>Jenjang</td>
                                                    <td>:</td>
                                                    <td>SMP</td>
                                                </tr>
                                                <tr>
                                                    <td>Mata Ujian</td>
                                                    <td>:</td>
                                                    <td>Matematika</td>
                                                </tr>
                                                <tr>
                                                    <td>Varian</td>
                                                    <td>:</td>
                                                    <td>MAT</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    
                    <script src="http://minites.puspendik.org/ujian/3rdparty/slide/bjqs-1.3.js"></script>
                    <link type="text/css" rel="Stylesheet" href="http://minites.puspendik.org/ujian/3rdparty/slide/bjqs.css" />
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $('#my-slideshow').bjqs({
                                'height' : 320,
                                'width' : 700,
                                'responsive' : false
                            });
                        });
                    </script>
                    <div class="columns">
                        <div class="grid_6 first">
                            
                                                        <form id="theform" name="theform" method="post" class="form_test panel" action="http://minites.puspendik.org/ujian/index.php/test_auto/finish" enctype="multipart/form-data">
                                                                                                
                                <header>
                                    <div style="border: 0px solid;width: 23%;float:right;margin-bottom: 10px;">Sisa waktu anda : 
                                        <span style="float:right;" id="defaultCountdown"></span>
                                    </div>
                                    <div style="clear:both;"/>
                                    <hr />
                                </header>
                                <input type="hidden" name="start_soal" id="start_soal" value="1452133023"/>
                                                                
                                <div id="my-slideshow">
                                    <ul class="bjqs">
                                        {!!$data['list_soal']!!}
                                    </ul>
                                </div>
                                <hr />
                                <table width="100%">
                                    <tr>
                                        <td widht="50%" style="vertical-align: top;">Soal no <span id='page_slide'>1</span> dari {!! $data['jml_soal'] !!}</td>
                                        <td widht="50%" style="text-align: right">
                                            <input type="button" value="<" name="next" id="btnPrev" class="button" alt="0">
                                            <input type="button" value=">" class="button" id="btnNext" name="next" alt="0">
                                            <input type="hidden" id="counterPage" value="1"/>
                                            <input type="hidden" id="totalSoal" value="{!! $data['jml_soal'] !!}" alt="http://minites.puspendik.org/ujian/index.php/test_auto/finish"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="grid_2">
                            <form id="theform" name="theform" method="post" class="form panel" enctype="multipart/form-data">
                                <table width="100%">
                                    <tr><td><a href="#" class="go_slide" alt="01">01</a> : <span id="no_01_user"></span></td><td><a href="#" class="go_slide" alt="04">04</a> : <span id="no_04_user"></span></td><td><a href="#" class="go_slide" alt="07">07</a> : <span id="no_07_user"></span></td><td><a href="#" class="go_slide" alt="10">10</a> : <span id="no_10_user"></span></td><td><a href="#" class="go_slide" alt="13">13</a> : <span id="no_13_user"></span></td></tr><tr><td><a href="#" class="go_slide" alt="02">02</a> : <span id="no_02_user"></span></td><td><a href="#" class="go_slide" alt="05">05</a> : <span id="no_05_user"></span></td><td><a href="#" class="go_slide" alt="08">08</a> : <span id="no_08_user"></span></td><td><a href="#" class="go_slide" alt="11">11</a> : <span id="no_11_user"></span></td><td><a href="#" class="go_slide" alt="14">14</a> : <span id="no_14_user"></span></td></tr><tr><td><a href="#" class="go_slide" alt="03">03</a> : <span id="no_03_user"></span></td><td><a href="#" class="go_slide" alt="06">06</a> : <span id="no_06_user"></span></td><td><a href="#" class="go_slide" alt="09">09</a> : <span id="no_09_user"></span></td><td><a href="#" class="go_slide" alt="12">12</a> : <span id="no_12_user"></span></td><td><a href="#" class="go_slide" alt="15">15</a> : <span id="no_15_user"></span></td></tr>                                
                                </table>
                            </form>
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
            <p class="wrapper"><span style="float: right;"></span>Bima Developer  | &copy; 2016.</p>    
        </div>
    </footer>

</body>
</html>