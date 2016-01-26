<script>
	
$(document).ready(function(){
    
	function berubah () {
		var select_kelas = document.getElementById("select_kelas");
		var id_kelas = select_kelas.options[select_kelas.selectedIndex].value;
		window.alert('kelas terpilih adalah'+id_kelas);
	}
});
</script>