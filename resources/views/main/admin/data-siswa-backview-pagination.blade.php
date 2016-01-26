{!!$pagination!!}
<script>
$(document).ready(function(){

	var search_table_page = function(query, page) {

		if (query == ""){

			query = "a";
		}

		$.ajax({

			url: "http://dev.absis.co.id/admin/data-siswa/backview/search/" + query + "/" + page,
			success: function(html) {

				$("#data-siswa-tabel").html(html);
			} 
		});
	};

	$(".halaman").on("click", function(){

		$("#data-siswa-tabel").html("<tr><td colspan='8' class='text-center'><h4>Sedang Mengambil Data...</h4></td></tr>");
		$(this).parent().addClass('active').siblings().removeClass('active');
		var query = $("#search-siswa").val();
		var page = $(this).attr("halaman");
		if (page == "terakhir"){

			$("#data-siswa-tabel").html("<tr><td colspan='8' class='text-center'><h4>Sedang Mengambil Data...</h4></td></tr>");
			search_table_page(query, "terakhir");
		} else {

			$("#data-siswa-tabel").html("<tr><td colspan='8' class='text-center'><h4>Sedang Mengambil Data...</h4></td></tr>");
			search_table_page(query, page);
		};
	});
});
</script>