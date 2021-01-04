<?php 
	session_start();
	require '../functions.php';

function tambah_fakultas ($data){
	global $conn;

	$nama = $data["nama_fakultas"];
	$kode = $data["kode_fakultas"];
	

	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT nama_fakultas FROM fakultas WHERE nama_fakultas = '$nama'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Fakultas yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}
	
	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO fakultas VALUES (null, '$nama', $kode)");

	return mysqli_affected_rows($conn);
}


function ubah_fakultas ($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama_fakultas"]);
	$kode = htmlspecialchars($data["kode_fakultas"]);

	// query insert data
	$query = "UPDATE fakultas SET
				nama_fakultas ='$nama',
				kode_fakultas = '$kode'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


if(isset($_POST["submit"])) {

	if (isset($_POST["id"])) {
		if(ubah_fakultas($_POST) > 0){
	        redirect("pages/admin/fakultas", ['pesan' => tulis_alert('success', 'Data berhasil diubah.')]);
	    } else {
	        redirect("pages/admin/fakultas", ['pesan' => tulis_alert('danger', 'Data gagal diubah.')]);
	    }
	} else {
	    if(tambah_fakultas($_POST) > 0){
	        redirect("pages/admin/fakultas", ['pesan' => tulis_alert('success', 'Data berhasil ditambahkan.')]);
	    } else {
	        redirect("pages/admin/fakultas", ['pesan' => tulis_alert('danger', 'Data gagal ditambahkan.')]);
	    } 

	}


}

?>