<?php 
	include '../koneksi.php';
	session_start();
	$nama = $_SESSION['username'];
	if (!isset($nama)) {
	header('Location:../login.php');
	}
	$nm_dpn		= $_POST['nm_dpn'];
	$nm_blkg	= $_POST['nm_blkg'];
	$almt		= $_POST['almt'];
	$tlp		= $_POST['tlp'];
	$email		= $_POST['email'];
	$id_user	= $_SESSION['id_user'];

	$sql		= "UPDATE user_detail 
					SET nama_depan = '$nm_dpn',
					nama_blkg = '$nm_blkg',
					alamat = '$almt',
					telp = '$tlp',
					email = '$email'
					WHERE id_user = '$id_user'
					";
	mysql_query($sql,$koneksi);

	echo "<script>window.location='profil.php';</script>";
?>