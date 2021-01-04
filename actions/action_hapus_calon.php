<?php 
	session_start();
	require '../functions.php';

	$id = $_GET["id"];
	$apa = "calon";
	$result = hapus($id, $apa);

	if($result > 0){
        redirect("pages/admin/calon", ['pesan' => tulis_alert('success', 'Data berhasil dihapus.')]);
    } else {
        redirect("pages/admin/calon", ['pesan' => tulis_alert('danger', 'Data gagal dihapus.')]);
    } 


?>