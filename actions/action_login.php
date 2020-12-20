<?php 
session_start();
require '../functions.php';
if(isset($_POST["login"])){
	// print_r($_POST);die;
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
// dd($_POST);
	// cek username
	if(mysqli_num_rows($result) === 1){

		// cek pass
		$row = mysqli_fetch_assoc($result);
		// dd($row);
		if(password_verify($password, $row["password"])){

			// set session 
			$_SESSION["login"] = true;
			$_SESSION["username"] = $row["username"];
			$_SESSION["id_user"] = $row["id"];
			$_SESSION["nama"] = $row["nama"];
			$_SESSION["is_admin"] = $row["is_admin"];
			$_SESSION["id_jurusan"] = $row["id_jurusan"];

			// cek remember me
			if(isset($_POST['remember'])){
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $username['username']), time()+60);
			}
			if ($row["is_admin"]==1) {
				redirect("pages/konfigurasi");
			}else{
				redirect("pages/surat_suara");
			}
		}else{
			redirect("login", ['pesan' => tulis_alert('danger', 'Password Salah!')]);
		}
	}

	redirect("login");
}
?>