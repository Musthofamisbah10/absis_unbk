@extends('layouts.template2')
@section('judul')
	Analisis - {!!$data['nama_to']!!}
@endsection
@section('subjudul')
		{!!$data['nama_kelas']!!} - {!!$data['nama_mapel']!!}
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
				<div class="btn-group">
				  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Pilih Tryout&nbsp;<span class="caret"></span> </button>
				  <ul class="dropdown-menu danger" role="menu">
				  	{!!$data['to']['html']!!}
				  </ul>
				</div>					
				<div class="btn-group">
				  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Pilih Kelas&nbsp;<span class="caret"></span> </button>
				  <ul class="dropdown-menu info" role="menu">
				  	{!!$data['kelas']['html']!!}
				  </ul>
				</div>	
				<div class="btn-group">
				  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Pilih mapel&nbsp;<span class="caret"></span> </button>
				  <ul class="dropdown-menu primary" role="menu">
					{!!$data['mapel']['html']!!}
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

<div class="row">
	&nbsp;
</div>


<div class="row">
	<div class="col-md-2">
			
	</div>

	<div class="col-md-8 text-center">
		<div id="tabel_hasil" style="width:100%;height:auto;overflow:hidden">
			
		</div>
	</div>

	<div class="col-md-2">				
	</div>
</div>
<div class="row">
	<br>&nbsp;
</div>

<script src="{{ URL::asset('handsontable/dist/handsontable.full.js') }}"></script>
<link rel="stylesheet" media="screen" href="{{ URL::asset('handsontable/dist/handsontable.full.css') }}">
<script type="text/javascript">
	
    function headerRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        td.style.fontWeight = 'bold';
        td.style.color      = 'black';
        td.style.background = '#ecf0f1';
    }
    var jml_soal = {!!$data['jml_soal']!!};
    var jml_siswa = {!!$data['jml_siswa']!!};

    var kunci_jawaban = {!!$data['kunci_jawaban']!!};

    function randomkunci(x){
	    var possible = "ABCDE";
	    return possible.charAt(  Math.floor(Math.random() * 5)  );
	}

    var kunci = [];
    var c = 1;

    while ( c <= jml_soal){
    	kunci.push(kunci_jawaban[c]);
    	c++;
    }

    var data_siswa = {!!$data['data_siswa']!!};

    var data_merge = [
        {row: 0, col: 0, rowspan: 1, colspan: 1}, //NO
        {row: 0, col: 1, rowspan: 3, colspan: 1}, //NISN
        {row: 0, col: 2, rowspan: 3, colspan: 1}, //NAMA
        {row: 0, col: 3, rowspan: 3, colspan: 1}, //NILAI
        {row: 0, col: 4, rowspan: 2, colspan: 3}, //DETAIL
        {row: 1, col: 4, rowspan: 1, colspan: 1}, //B
        {row: 1, col: 5, rowspan: 1, colspan: 1}, //S
        {row: 1, col: 6, rowspan: 1, colspan: 1}, //K
        {row: 0, col: 7, rowspan: 1, colspan: (jml_soal)}, //JAWABAN
    ];
  
    var dheader = [
		["", "NISN", "NAMA", "NILAI", "DETAIL", "", "","JAWABAN"],
		["NO", "NISN", "NAMA", "NILAI", "B", "S", "K"],
		["", "NISN", "NAMA", "NILAI", "B", "S", "K"]
    ];


    var x = 1;
    while ( x <= jml_soal){
    	dheader[0].push(x);
    	dheader[1].push(x);
    	dheader[2].push(kunci[x-1]);
    	x++;
    }

	var dcontent = [];
    var y = 0;

    while ( y < jml_siswa){

    	dcontent.push([(y+1), data_siswa[y]['nisn'], data_siswa[y]['nama'], data_siswa[y]['nilai'], data_siswa[y]['benar'], data_siswa[y]['salah'], data_siswa[y]['kosong']]);

    	for (var i = 0; i < jml_soal; i++) {
    		dcontent[y].push(data_siswa[y]['soal'][i]);
    	};
    	y++;
    }	

	var data = dheader.concat(dcontent);
  	var array_left=[];var t = 3;
  		while (t < (dcontent.length+3)){
    		array_left.push({row: t, col: 2, className: "htLeft htMiddle"});
    		t++;
  		}	
    function falseRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        if (value!=data[2][col]) {
        	td.style.color      = 'white';
        	td.style.background = 'red';
        };
    }

	var container = document.getElementById('tabel_hasil');
	var hot = new Handsontable(container, {
	  data 			: data,
	  colWidths     : [50, 100, 300, 70, 40, 40, 40, 40, 40, 40, 40, 40],
	  rowHeaders	: false,
	  colHeaders	: false,
      fixedRowsTop    : 3,
      fixedColumnsLeft: 3,
	  mergeCells    : data_merge,
	  				  cell : array_left,
      className     : "htCenter htMiddle", 
                  	  
      cells         : function (row, col, prop) {
	                    var cellProperties = {};
	                    if (row >= 0){
	                      cellProperties.readOnly = true;
	                    }if ((row >= 3)&&(col >= 7)){
	                      cellProperties.renderer = falseRenderer;
	                    }if ((row >= 0)&&(row <= 2)){
	                      cellProperties.renderer = headerRenderer;
	                    }           
	                    return cellProperties;
                  	}
	});

</script>
@endsection