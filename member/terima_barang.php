<?php
	include '../koneksi.php';
	$id_order = $_GET['id_order'];
	$sql2 = " UPDATE ecom_haris.order SET status = '4' WHERE id_order = '$id_order'";
	mysql_query($sql2);
	echo "<script>window.location='riwayat.php';</script>";
?>