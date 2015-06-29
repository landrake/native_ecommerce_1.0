<?php
	include '../koneksi.php';
	$no_rek 		= $_POST['no_rek'];
	$id_order 		= $_POST['id_order'];
	$folder 		= '../assets/images/bukti';
	$tmp_name 		= $_FILES['userfile']['tmp_name'];
	$name 			= $folder."/".$_FILES['userfile']['name'];
	$name_brg 		= $_FILES['userfile']['name'];

	move_uploaded_file($tmp_name, $name);
	
	$sql="INSERT INTO  `ecom_haris`.`bukti_pembayaran` (
			`id_bukti` ,
			`no_rek` ,
			`bukti_foto` ,
			`id_order`
			)
			VALUES (
			NULL ,  '$no_rek',  '$name_brg',  '$id_order'
			)";

	$sql2 = " UPDATE ecom_haris.order SET status = '2' WHERE id_order = '$id_order'";
	mysql_query($sql);
	mysql_query($sql2);
	// echo $sql2;
	echo "<script>window.location='index.php';</script>";
?>