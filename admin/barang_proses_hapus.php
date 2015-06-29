<?php

	include '../koneksi.php';
	
	$sql = " DELETE FROM `barang_detail` WHERE `id_barang` = '".$_GET['id_barang']."' ";
	$sql2 = " DELETE FROM `barang` WHERE `id_barang` = '".$_GET['id_barang']."' ";
	mysql_query($sql,$koneksi);
	
	echo "<script>window.location='barang.php';</script>";
	
?>
