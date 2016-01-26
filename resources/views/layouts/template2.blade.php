
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="Aplikasi Akademik">
	<meta name="keywords" content="aplikasi,akademik,absis">
	<meta name="author" content="bimadev">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ABSIS UNBK - Aplikasi Akademik</title>
	<link href="{{ URL::asset('assets2/css/bootstrap.css') }}" rel="stylesheet">
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
	<link href="{{ URL::asset('assets2/css/style.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets2/css/style-responsive.css') }}" rel="stylesheet">
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
<body style="background-color: #F7F9FA">
	<div class="wrapper ">

		<div class="top-navbar info-color" style="background: #3498db">
			<div class="top-navbar-inner">
				<div class="logo-brand" style="background: #3498db;">
					<a href="/"><img src="{{ URL::asset('assets2/img/absis-logo2-blue.png')}}" alt="ABSIS logo" style="margin-top:13px"></a>
				</div>
				<div class="top-nav-content">
					<div class="btn-collapse-sidebar-left-2" id="notif" data-toggle="modal" data-target="#">
						<i class="fa fa-spin  fa-circle-o-notch"></i>				
					</div>
					<div class="btn-collapse-sidebar-right inline-popups" style="background:#e9573f;width:60px;padding-top: 0px;padding-bottom: 0px;">						
						<button id="logout" class="btn btn-danger btn-block" data-toggle="modal" data-target="#ModalKeluar" style="background:#e9573f;width:60px;border-top-width: 0px;border-right-width: 0px;padding-top: 20px;padding-left: 0px;padding-right: 0px;padding-bottom: 20px;border-bottom-width: 0px;border-left-width: 0px;">Keluar</button>
					</div>
							

					<div class="btn-collapse-nav" data-toggle="collapse" data-target="#main-fixed-nav">
						<a class="btn btn-info btn-square" style="border-width: 0px; padding: 22px 12px 22px 12px;width:60px;margin-top: -17px;margin-left: -11px; box-sizing: border-box;">
						<i class="fa fa-calendar icon-calendar"></i>
						</a>
					</div>
					<ul class="nav-user navbar-right">
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown" style="display:inline-flex; cursor:default">
									<div style="float:left;margin-top:-10px;margin-right:10px;text-align:right;font-size:14px">
										<strong>
											{{ session()->get('nama') }}
										</strong>
										<br>
										<span>
											{{ ucfirst(session()->get('role')).' '.ucfirst(session()->get('mapel')) }}
										</span>
									</div>
								<div style="float:right">
								</div>
							</a>
						</li>
					</ul>
					
				</div>
			</div>
		</div>

	</div>

	<style>
	.hoper :hover {
	    background-color: #FFF;
	}
	</style>


	<div class="page-content hsl-toggle" style="background: none repeat scroll 0% 0% #E8E9EE;padding-bottom:0px">
		<div class="container-fluid"  style="padding-left: 10px; padding-right: 10px;">
			<div class="the-box no-border" style="background: none repeat scroll 0% 0% rgb(251, 251, 251); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">

				<h2 class="page-heading text-center" style="margin-top: 0px; margin-bottom: 0px;">



								@yield('judul')

				

				</h2>
				<h4 class="page-heading text-center">


								@yield('subjudul')



				</h4>
			
				<div class="text-center" style="padding-bottom: 20px; padding-top: 20px; margin-bottom: 0px; margin-top: 0px; border-bottom-width: 0px; background: #FBFBFB">




								@yield('navigasi')



				</div>	

			</div>










			@yield('content')










		</div>

	</div>

	<footer class="bg-home" style="position: fixed; right: 0; left: 0; bottom: 0; background: #2980b9; line-height: 67%; z-index: 1024;padding-top: 3px;padding-bottom: 3px;">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<div class="text-left">
					<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalBantuanFooter" style="color:#fff;border: 0px;margin-top: 3px;margin-bottom: 2px;"><i class="fa fa-question-circle"></i> Bantuan</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="text-center">
					<a class="btn btn-info btn-md" style="border: 0px; color: #fff; background: rgb(41,128,185);padding-top: 4px;padding-bottom: 4px;margin-top: 3px;margin-bottom: 2px;">
						© {{ date("Y") }} Bimadev
					</a>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">			
			</div>
		</div>
	</footer>
	<div class="modal fade" id="ModalBantuanFooter" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" style="margin-top: 15%;">
			<div class="modal-content">
				<div class="modal-header bg-info no-border">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title text-center">Bantuan</h3>
				</div>
				<div class="modal-body"style="color: rgba(1,1,1,0.6);">
					<h3 class="text-center">Bantuan Untuk Halaman Dewa<sup>ne</sup> Admin</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Keluar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ModalKeluar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" style="margin-top: 15%;">
			<div class="modal-content">
				<div class="modal-header bg-danger no-border">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Konfirmasi Keluar</h4>
				</div>
				<div class="modal-body"style="color: rgba(1,1,1,0.6);">
					<h3 class="text-center">Apakah Anda Ingin Keluar?</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="button" class="btn btn-danger logout-all" >Keluar</button>								
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<div id="back-top">
		<a href="#top"><i class="fa fa-chevron-up"></i></a>
	</div>

<script type='text/javascript' src="{{ URL::asset('assets2/jquery-1.8.0.min.js') }}"></script>

@yield('script')
	
	<script type="text/javascript">
	$(document).ready(function(){
	   $("#notif").trigger('click');

	});
	</script>
<script>


$(document).ready(function(){

	/** BEGIN DATEPICKER **/
	if ($('.datepicker').length > 0){
		$('.datepicker').datepicker()
	}
	
	if ($('#datepicker1').length > 0){
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		 
		var checkin = $('#datepicker1').datepicker({
		  onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#datepicker2')[0].focus();
		}).data('datepicker');
		var checkout = $('#datepicker2').datepicker({
		  onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  checkout.hide();
		}).data('datepicker');
	}
	/** END DATEPICKER **/

	$("#logout-side").on("click", function(){
	
		$("#logout").trigger('click'); 
	});

	$("#password-side").on("click", function(){
	
		$("#password").trigger('click'); 
	});

	$(".ganti-password-act").on("click", function(){

		var current_pass = $(".current-password").val();
		var pas1 = $(".pass1").val();
		var pas2 = $(".pass2").val();

		if (pas1 == ""){

			alert("password tidak boleh kosong");
		} else {

			if (pas1 == pas2){
				arrayGantiPassword = [current_pass,pas1,pas2];
				$.ajax({

					type: "POST",
					url: "?sajen=ganti_password",
					data: {json: JSON.stringify(arrayGantiPassword)},
					cache: false,
					success: function(html) {

						alert(html);
					} 
				});
			} else {

				alert("password tidak sama");
			};
		}
	});

	$("#lockscreen-side").on("click", function(){
	
		$("#lockscreen").trigger('click'); 
	});

	$(".save-ta").on("click", function(){
		alert('savvee');
		$( ".ta-data" ).submit();
	});

	$('.icheck-ta').on('ifClicked', function (event) {
        var value = this.value;
        var semester = $(this).attr("sem");
        if (value == "tidakboleh") {
        	//alert(semester + value);
        	$("." + semester).attr("style", "background: rgb(246,187,66); margin-bottom: 0px;");
        } else {
        	//alert(semester + value);
        	$("." + semester).attr("style", "background: rgb(59,175,218); margin-bottom: 0px;");
        }
    });

	$(".edit-ta").on("click", function(){

		var get_ta = $(this).attr("ta");
		var get_st = $(this).attr("st");
		var get_nd = $(this).attr("nd");

		if (get_st == "1"){

			$(".aaa").iCheck('check');	
			$(".bbb").iCheck('uncheck');
			$(".sem1").attr("style", "background: rgb(59,175,218); margin-bottom: 0px;");		
		};
		if (get_st == "0"){

			$(".aaa").iCheck('uncheck');	
			$(".bbb").iCheck('check');
			$(".sem1").attr("style", "background: rgb(246,187,66); margin-bottom: 0px;");
		};
		if (get_nd == "1"){

			$(".ccc").iCheck('check');	
			$(".ddd").iCheck('uncheck');
			$(".sem2").attr("style", "background: rgb(59,175,218); margin-bottom: 0px;");		
		};
		if (get_nd == "0"){

			$(".ccc").iCheck('uncheck');	
			$(".ddd").iCheck('check');
			$(".sem2").attr("style", "background: rgb(246,187,66); margin-bottom: 0px;");
		};

		$(".show-ta-title").html(get_ta);
		$("#editTA").trigger('click'); 
	});
});



		

		  $(document).ready(function (){
			$(".logout-all").on("click", function(){
				//$.fn.idleTimeout().logout();
				window.location.href = '/logout';
			});
		  });
		



</script>
<script src="{{ URL::asset('assets2/js/jquery.min.js') }}"></script>
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
<script src="{{ URL::asset('assets3/js/apps_ku.js') }}"></script>
	
</body>
</html>
