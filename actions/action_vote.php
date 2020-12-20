<?php 
session_start();
require '../functions.php';
// dd($_POST);
// if(isset($_POST["vote"])){
	// print_r($_POST);die;
	$vote_jurusan = $_POST["pilihjurusan"];
	$vote_fakultas = $_POST["pilihfakultas"];
	$vote_univ = $_POST["pilihuniv"];

	$id_user = $_SESSION["id_user"];

	mysqli_query($conn, "INSERT INTO vote (id, id_calon, id_user) VALUES (null, $vote_jurusan, $id_user )");
	mysqli_query($conn, "INSERT INTO vote (id, id_calon, id_user) VALUES (null, $vote_fakultas, $id_user )");
	mysqli_query($conn, "INSERT INTO vote (id, id_calon, id_user) VALUES (null, $vote_univ, $id_user )");

redirect("logout");
// }
?>