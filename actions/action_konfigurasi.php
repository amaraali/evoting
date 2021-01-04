<?php 
	session_start();
	require '../functions.php';


function konfigurasi($data){

	global $conn;

	$nama_pemilu = $data["nama_pemilu"];
	$waktu_buka = (new DateTime($data["waktu_buka"]))->format('Y-m-d H:i:s');
	$waktu_tutup = (new DateTime($data["waktu_tutup"]))->format('Y-m-d H:i:s');

	
	mysqli_query($conn, "INSERT INTO konfig VALUES (null, '$nama_pemilu', '$waktu_buka', '$waktu_tutup')");

	return mysqli_affected_rows($conn);

}

if(isset($_POST["submit"])) {
    if(konfigurasi($_POST) > 0){
        redirect("pages/admin/konfigurasi", ['pesan' => tulis_alert('success', 'Konfigurasi berhasil diset.')]);
    } else {
    	redirect("pages/admin/konfigurasi", ['pesan' => tulis_alert('danger', 'Konfigurasi gagal diset.')]);
    } 
    
  } 

?>