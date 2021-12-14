<?php
session_start();
require '../functions.php';

function tambah_user($data)
{
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$nama = $data["nama"];
	$nim = $data["nim"];
	$kode_jurusan = $data["kode_jurusan"];

	// dd($data);
	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Username yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}


	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO users VALUES (null, '$username', '$password', '$nama', $nim, $kode_jurusan, '')");

	return mysqli_affected_rows($conn);
}


function ubah_user($data)
{
	// dd($data);
	global $conn;
	// $id = $data["id"];
	// $username = htmlspecialchars($data["username"]);
	// $nama = htmlspecialchars($data["nama"]);
	// $nim = $data["nim"];
	// $kode_jurusan = $data["kode_jurusan"];

	$username = strtolower(stripslashes($data["username"]));
	if ($data['password'] != "") {
		$password = mysqli_real_escape_string($conn, $data["password"]);
	}
	// $password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["nama"];
	$nim = $data["nim"];
	$kode_jurusan = $data["kode_jurusan"];
	$id = $data['id'];


	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' and id != $id");

	if ($result->num_rows != 0) {
		echo "<script>
					alert('Username yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}
	// dd($result);

	// cek konfirmasi password
	// if ($password !== $password2) {
	// 	echo "<script>
	// 			alert('Konfirmasi password tidak sesuai!');
	// 		</script>";
	// 	return false;
	// }

	// enkripsi password


	// query insert data
	if ($data['password'] != "") {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$query = "UPDATE users SET
				username ='$username',
				password ='$password',
				nama ='$nama',
				nim = $nim,
				kode_jurusan = $kode_jurusan
			WHERE id = $id
			";
	} else {
		$query = "UPDATE users SET
				username ='$username',
				nama ='$nama',
				nim = $nim,
				kode_jurusan = $kode_jurusan
			WHERE id = $id
			";
	}
	// dd($query);
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


if (isset($_POST["submit"])) {

	if (isset($_POST["id"])) {
		if (ubah_user($_POST) > 0) {
			redirect("pages/admin/user", ['pesan' => tulis_alert('success', 'Data berhasil diubah.')]);
		} else {
			redirect("pages/admin/user", ['pesan' => tulis_alert('danger', 'Data gagal diubah.')]);
		}
	} else {
		if (tambah_user($_POST) > 0) {
			redirect("pages/admin/user", ['pesan' => tulis_alert('success', 'Data berhasil ditambahkan.')]);
		} else {
			redirect("pages/admin/user", ['pesan' => tulis_alert('danger', 'Data gagal ditambahkan.')]);
		}
	}
}
