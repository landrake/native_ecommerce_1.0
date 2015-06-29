<?php

	include "koneksi.php";
	$akses		= '1';
	$usrn 		= $_POST['usrn'];
	$pass 		= $_POST['pass'];
	$nm_dpn 	= $_POST['nm_dpn'];
	$nm_blkg 	= $_POST['nm_blkg'];
	$almt 		= $_POST['almt'];
	$tlp 		= $_POST['tlp'];
	$email 		= $_POST['email'];
	
	$sql="INSERT INTO  ecom_haris.user (
			id_user,
			username ,
			password ,
			akses 
			)
			VALUES (
			NULL ,  '$usrn',  '$pass',  '$akses'
			)";
	
	if(mysql_query($sql,$koneksi)){
		$last_id = mysql_insert_id($koneksi);
		$sql2="INSERT INTO  ecom_haris.user_detail (
			id_detail_user ,
			id_user,
			nama_depan ,
			nama_blkg,
			alamat,
			telp,
			email
			)
			VALUES (
			NULL, '$last_id',  '$nm_dpn',  '$nm_blkg',  '$almt',  '$tlp',  '$email'
			)";
//echo $sql2;
		mysql_query($sql2,$koneksi);
	}
	//echo"Data berhasil disimpan<br>";
	echo "<script>window.location='reg_succ.php';</script>";
?>

