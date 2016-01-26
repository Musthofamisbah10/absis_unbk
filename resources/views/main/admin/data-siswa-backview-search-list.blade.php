<tr>
<td>{!!$data['no']!!}</td>
<td>{!!$data['nama']!!}<span class='badge badge-info badge-$nis'>aktif</span></td>
<td>{!!$data['bidang']!!}</td>
<td>{!!$data['nisn']!!}</td>
<td>{!!$data['nickname_kelas']!!} </td>
<td><input id='switch-state' siswa-nis='$nis' type='checkbox' data-size='mini' data-on-text='1' data-off-text='0' data-on-color='primary' data-off-color='warning' switch checked></td>
<td><button name='button' data-toggle='modal' data-target='#ModalUbahSiswa' class='btn btn-info ubah-siswa' siswa-nis='$nis' siswa-nisn='$nisn' siswa-nama='$nama' siswa-kelamin='$kelamin'>Ubah</button></td>
<td><button name='button' data-toggle='modal' data-target='#ModalHapusSiswa' class='btn btn-danger hapus-siswa' siswa-nis='$nis' siswa-nama='$nama'>Hapus</button></td>
</tr>