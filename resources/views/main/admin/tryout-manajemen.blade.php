@extends('layouts.template2')
@section('judul')
	Manajemen - Tryout Sekolah I
@endsection
@section('subjudul')
		XII IPA 1 - Bahasa Indonesia
@endsection
@section('navigasi')
	
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10 text-center">	
			<div class="col-md-12">
				<a href="/admin/tryout/edit/" class="btn btn-default" type="button"><i class="fa fa-chevron-left" style="color: #3498db;"></i>&nbsp; Kembali </a>
				<a class="btn btn-default" href="/" type="button"><i class="fa fa-home" style="color: #3498db;"></i>&nbsp; Home</a>		
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="btn-group open">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Pilih Tryout&nbsp;<span class="caret"></span> </button>
                  <ul class="dropdown-menu danger" role="menu">
                    <li><a href="#fakelink">Tryout Sekolah 1</a></li>
                  </ul>
                </div>				
                <div class="btn-group open">
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Pilih Tryout&nbsp;<span class="caret"></span> </button>
                  <ul class="dropdown-menu danger" role="menu">
                    <li><a href="#fakelink">Tryout Sekolah 1</a></li>
                  </ul>
                </div>      
                <div class="btn-group open">
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Pilih Tryout&nbsp;<span class="caret"></span> </button>
                  <ul class="dropdown-menu danger" role="menu">
                    <li><a href="#fakelink">Tryout Sekolah 1</a></li>
                  </ul>
                </div>      											
			</div>		
		</div>
		<div class="col-md-1">
		</div>
	</div>

@endsection
@section('content')
<div style="background: none repeat scroll 0% 0% rgb(247, 249, 250); margin-bottom: 0px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px; margin-left: -10px; margin-right: -10px;">
<br />
<div class="row">
    <div class="col-sm-1 col-md-2">
    </div>
    <div class="col-sm-10 col-md-8">
        <div class="the-box no-border">

            <div class="table-responsive">
            <table class="table table-striped table-hover table-info table-th-block">
                <thead class="the-box dark full">
                    <tr>
                        <th class="text-left" style="width:">No.</th>
                        <th class="text-left" style="width: 46%;">Nama</th>
                        <th class="text-left" style="width: 10%;">Bidang</th>
                        <th class="text-left" style="width: 10%;">NISN</th>
                        <th class="text-left" style="width: 17%;">Kelas</th>
                        <th class="text-center" style="width: %;">state</th>
                        <th class="text-center" style="width: 5%;">Ubah</th>
                        <th class="text-center" style="width: 5%;">Hapus</th>                                   
                    </tr>
                </thead>
                <tbody id="data-siswa-tabel">
                <tr>
                    <td colspan='8' class="text-center">
                        <h3>Sedang Mengambil Data...</h3>
                    </td>                   
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-sm-1 col-md-2">
    </div>
</div>



</div>

@endsection