<tr><td class="text-center">{!!$jawaban['no_jawaban']!!}</td><td><div class="col-md-10 isi-jawaban" contenteditable="true" kode-jawaban="{!!$jawaban['kode_jawaban']!!}" name="jawaban{!!$jawaban['no_jawaban']!!}" id="jawaban{!!$jawaban['no_jawaban']!!}" style="border-style:solid;border-width:1px;border-color:black">{!!$jawaban['isi_jawaban']!!}</div></td>
	<td>
		<div class="radio">
		  <label>
			<input class="radio jawaban-benar" kode-jawaban="{!!$jawaban['kode_jawaban']!!}" type="radio" name="optionsRadios" id="jawaban_benar{!!$jawaban['no_jawaban']!!}" value="option1" {!!$jawaban['status_benar']!!}>
				Benar
		  </label>
		</div>
	</td>
</tr>
