<div class="btn-group btn-block row">
	<div class="btn btn-danger btn-sm btn-square text-left col-md-2 edit-token mapel{!!$data['id_mapel']!!}" kode-to="{!!$data['kode_to']!!}" id-mapel="{!!$data['id_mapel']!!}"  nama-mapel="{!!$data['mapel']!!}" data-toggle="modal"><i class="fa fa-lock" style="color: white"></i></div>
	<div class="btn btn-warning btn-sm btn-square text-left disabled col-md-8" style="color:black;text-align:left">{!!$data['mapel']!!}</div>
	<a href="/admin/tryout/edit/{!!$data['kode_to']!!}/{!!$data['id_mapel']!!}" class="btn btn-warning btn-sm btn-square text-left col-md-2">Edit</a>
</div>
