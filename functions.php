<?php 
require 'config.php';
date_default_timezone_set("Asia/Jakarta");
$conn= mysqli_connect($config["db_host"], $config["db_username"], $config["db_password"], $config["db_name"]);

function query ($query){
	global $conn;
	$result = mysqli_query ($conn, $query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function exec_query($query){
	global $conn;
	$result = mysqli_query ($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah ($data){
	global $conn;

	$username = strtolower ( stripslashes ($data["username"]) );
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["nama"];
	$level = $data["level"];
	$email = $data["email"];
	$phone = $data["phone"];

	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Username yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2){
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password', '$nama', '$level', '$email', '$phone')");

	return mysqli_affected_rows($conn);
}


function ubah ($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$level = htmlspecialchars($data["level"]);
	$email = htmlspecialchars($data["email"]);
	$phone = htmlspecialchars($data["phone"]);

	// query insert data
	$query = "UPDATE users SET
				nama ='$nama',
				username = '$username',
				level = '$level',
				email = '$email',
				phone = '$phone'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}



function hapus($id, $apa){
	global $conn;
	mysqli_query($conn, "DELETE FROM $apa WHERE id=$id");
	return mysqli_affected_rows($conn);
}



function registrasi($data){

	global $conn;

	$username = strtolower ( stripslashes ($data["username"]) );
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["nama"];
	$level = $data["level"];
	$email = $data["email"];
	$phone = $data["phone"];

	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Username yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2){
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password', '$nama', '$level', '$email', '$phone')");

	return mysqli_affected_rows($conn);

}

function dd($arr)
{
	echo '<pre>';
	print_r($arr);
	die;
}

function cek_level($yg_boleh){
	$level_dia = $_SESSION['level'];
	if(!in_array($level_dia, $yg_boleh)){
		die("Anda tidak memiliki akses!");
		header("Location: pages/home.php");
	}
}

function tulis_alert($type, $kalimat){
	return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
			  '.$kalimat.'
			</div>';
}

function redirect($page='', $params = []){
	global $config;
	$param = '';
	if(count($params) > 0){
		$param = '?'.http_build_query($params);
	}
	// die("Location: ".$config["base_url"].$page.".php".$param);
	header("Location: ".$config["base_url"].$page.".php".$param);	
	exit;
}


?>