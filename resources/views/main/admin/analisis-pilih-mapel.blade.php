@extends('layouts.template2')
@section('judul')
	Analisis - {!!$data['nama_to']!!}
@endsection
@section('navigasi')
	
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8 text-center">	
			<div class="col-md-12">
				<a href="/admin/analisis/pilih" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>						
			</div>		
		</div>
		<div class="col-md-2">
		</div>
	</div>

@endsection
@section('content')
<div style="background: none repeat scroll 0% 0% rgb(247, 249, 250); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">

<div class="row">
	&nbsp;
</div>


<div class="row">
	<div class="col-md-2">
			
	</div>

	<div class="col-md-8">
		<div class="col-md-4">				
			<div class="panel panel-info panel-square panel-no-border text-center" style="margin-bottom: 0px;">

			  	<div class="panel-body bg-default">
					<h4>IPA</h4>
					<hr />
					
					{!!$data['ipa']!!}


			  	</div>
			</div>
		</div>
		<div class="col-md-4">				
			<div class="panel panel-info panel-square panel-no-border text-center" style="margin-bottom: 0px;">

			  	<div class="panel-body bg-default">
					<h4>IPS</h4>
					<hr />

					{!!$data['ips']!!}

			  	</div>
			</div>
		</div>
		<div class="col-md-4">				
			<div class="panel panel-info panel-square panel-no-border text-center" style="margin-bottom: 0px;">

			  	<div class="panel-body bg-default">
					<h4>BAHASA</h4>
					<hr />

					{!!$data['bahasa']!!}

					
			  	</div>
			</div>
		</div>				
	</div>

	<div class="col-md-2">				
	</div>
</div>
<div class="row">
	<br>&nbsp;
</div>
		<div class="modal fade" id="ModalToken" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 2vh;">
				<div class="modal-content">
					<div class="modal-body"style="color: rgba(1,1,1,0.6);">
						<div class="row">

						<form role="form">
							<div class="col-md-4">
								<h4 style="margin-top: 5px;margin-bottom: 0px;">Tanggal berlaku</h4>
							</div>
							<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
								<div class="form-group" style="margin-bottom: 5px;">
									<input type="date" class="form-control" name="tanggal_dikunci" value="{{ date('Y-m-d') }}">
									<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
								</div>
							</div>
							<div class="col-md-4">
							</div>
						</form>
						</div>
						<hr style="margin-top: 0px;margin-bottom: 0px;"/>

						<!-- UNTUK KLOTER 1 -->
						<div class="row">
					    <div class="col-md-4">

					    	<!-- JUDUL KLOTER 1 -->

					        <div class="text-center">
					            <h3>Kloter 1</h3>
					            <p>(07.00-09.00)</p>
					   		</div>

					   		<!-- ISI KLOTER 1 -->
					   		<div class="row">
					   			<div class="col-md-3"></div>
					   			<div class="col-md-8">
					   				<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 1
					                  	</label>
               						</div>
					   				
					   				<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 2
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 3
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 4
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 5
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 6
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 7
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 8
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 9
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 10
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 11
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 12
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 AKSEL
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPS 1
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPS 2
					                  	</label>
               						</div>

					   			</div>
					   		</div>
					   		
						</div>

						<!-- UNTUK KLOTER 2 -->
						<div class="col-md-4">

					    	<!-- JUDUL KLOTER 2 -->

					        <div class="text-center">
					            <h3>Kloter 2</h3>
					            <p>(10.00-12.00)</p>
					   		</div>

					   		<!-- ISI KLOTER 2 -->
					   		<div class="row">
					   			<div class="col-md-3"></div>
					   			<div class="col-md-8">
					   				<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox">12 IPA 1
					                  	</label>
               						</div>
					   				
					   				<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 2
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 3
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 4
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 5
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 6
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 7
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 8
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 9
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 10
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 11
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 12
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 AKSEL
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPS 1
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPS 2
					                  	</label>
               						</div>

					   			</div>
					   		</div>
					   		
						</div>

						<!-- UNTUK KLOTER 3 -->
						<div class="col-md-4">

					    	<!-- JUDUL KLOTER 3 -->

					        <div class="text-center">
					            <h3>Kloter 3</h3>
					            <p>(13.00-15.00)</p>
					   		</div>

					   		<!-- ISI KLOTER 3 -->
					   		<div class="row">
					   			<div class="col-md-3"></div>
					   			<div class="col-md-8">
					   				<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 1
					                  	</label>
               						</div>
					   				
					   				<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 2
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 3
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 4
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 5
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 6
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 7
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 8
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 9
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 10
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 11
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPA 12
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 AKSEL
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPS 1
					                  	</label>
               						</div>

               						<div class="checkbox text-left">
                  						<label class="kelas-label" kelas="7A" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sri Kurniawati, S.Pd.">
                   							<input type="checkbox" value="" kelas="7A" class="kelas-checkbox" disabled="disabled">12 IPS 2
					                  	</label>
               						</div>

					   			</div>
					   		</div>
					   		
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<a type="button" href="" class="btn btn-info">Simpan</a>								
					</div>
				</div>
			</div>
		</div>
</div>

<!-- MODAL UNTUK ATUR TOKEN -->

@endsection