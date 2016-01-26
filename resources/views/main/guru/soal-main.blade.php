<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<!--   <title>Summernote</title>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.css" rel="stylesheet"> -->
  
  <script src="{{ URL:asset('ckeditor/ckeditor/ckeditor.js')}}"></script>

</head>
<body>
<div class="row">
	<!-- 	<div class="col-md-1"></div>
		<div class="col-md-9">
			  <div id="summernote"><p>Hello Summernote</p></div>
			  <script>
			    $(document).ready(function() {
			        $('#summernote').summernote();
			    });
			  </script>
		</div>
		<div class="col-md-1"></div>
	</div> -->
	<form>
		<textarea name="editor_soal" id="editor_soal" rows="5" cols="80">
			
		</textarea>
		<script type="text/javascript">
			CKEDITOR.replace('editor_soal');
		</script>
	</form>
</body>
</html>