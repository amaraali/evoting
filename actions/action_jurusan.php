<?php 
	session_start();
	require '../functions.php';

function tambah_jurusan ($data){
	global $conn;

	$nama = $data["nama_jurusan"];
	$kode_jurusan = $data["kode_jurusan"];
	$kode_fakultas = $data["kode_fakultas"];
	

	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT nama_jurusan FROM jurusan WHERE nama_jurusan = '$nama'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Jurusan yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}
	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO jurusan VALUES (null, '$nama', $kode_fakultas, $kode_jurusan)");

	// dd(mysqli_affected_rows($conn));
	return mysqli_affected_rows($conn);
}


function ubah_jurusan ($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama_jurusan"]);
	$kode_jurusan = htmlspecialchars($data["kode_jurusan"]);
	$kode_fakultas = htmlspecialchars($data["kode_fakultas"]);

	// query insert data
	$query = "UPDATE jurusan SET
				nama_jurusan ='$nama',
				kode_fakultas = '$kode_fakultas',
				kode_jurusan = '$kode_jurusan'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


if(isset($_POST["submit"])) {

	if (isset($_POST["id"])) {
		if(ubah_jurusan($_POST) > 0){
	        redirect("pages/admin/jurusan", ['pesan' => tulis_alert('success', 'Data berhasil diubah.')]);
	    } else {
	        redirect("pages/admin/jurusan", ['pesan' => tulis_alert('danger', 'Data gagal diubah.')]);
	    } 
	} else {
	    if(tambah_jurusan($_POST) > 0){
	        redirect("pages/admin/jurusan", ['pesan' => tulis_alert('success', 'Data berhasil ditambahkan.')]);
	    } else {
	        redirect("pages/admin/jurusan", ['pesan' => tulis_alert('danger', 'Data gagal ditambahkan.')]);
	    } 

	}


}

?>