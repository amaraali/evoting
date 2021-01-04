<?php 
	session_start();
	require '../functions.php';

	$id = $_GET["id"];
	$apa = "users";
	$result = hapus($id, $apa);

	if($result > 0){
        redirect("pages/admin/user", ['pesan' => tulis_alert('success', 'Data berhasil dihapus.')]);
    } else {
        redirect("pages/admin/user", ['pesan' => tulis_alert('danger', 'Data gagal dihapus.')]);
    } 


?>