<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION['username'])){
	redirect("login");
	exit;
}else{
	if ($_SESSION["is_admin"]==1) {
		redirect("pages/admin/dashboard");
	}else{
		redirect("pages/surat_suara");
	}
}
//die('hi');
?>
