<?php 
	session_start();
	require '../functions.php';

function tambah_calon ($data){
	global $conn;

	$nama_ketua = $data["nama_ketua"];
	$nama_wakil = $data["nama_wakil"];
	$no_urut = $data["no_urut"];
	$id_unit = $data["id_unit"];
	$id_tingkatan = $data["tingkatan"];
	$images = $data["images"];

	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO calon VALUES (null, '$nama_ketua', '$nama_wakil', $no_urut, $id_unit, $id_tingkatan, '$images' )");

	return mysqli_affected_rows($conn);
}


function ubah_calon ($data){
	global $conn;
	$id = $data["id"];
	$nama_ketua = $data["nama_ketua"];
	$nama_wakil = $data["nama_wakil"];
	$no_urut = $data["no_urut"];
	$id_unit = $data["id_unit"];
	$id_tingkatan = $data["id_tingkatan"];
	$images = $data["images"];

	// query insert data
	$query = "UPDATE calon SET
				nama_ketua = '$nama_ketua',
				nama_wakil = '$nama_wakil',
				nama_wakil = '$nama_wakil',
				no_urut = '$no_urut',
				id_unit = '$id_unit',
				id_tingkatan = '$id_tingkatan',
				images = '$images'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


if(isset($_POST["submit"])) {

// dd($_POST);
	if (isset($_POST["id"])) {
		if(ubah_calon($_POST) > 0){
	        redirect("pages/admin/calon", ['pesan' => tulis_alert('success', 'Data berhasil diubah.')]);
	    } else {
	        redirect("pages/admin/calon", ['pesan' => tulis_alert('danger', 'Data gagal diubah.')]);
	    }
	} else {
	    if(tambah_calon($_POST) > 0){
	        redirect("pages/admin/calon", ['pesan' => tulis_alert('success', 'Data berhasil ditambahkan.')]);
	    } else {
	        redirect("pages/admin/calon", ['pesan' => tulis_alert('danger', 'Data gagal ditambahkan.')]);
	    } 

	}


}

?>