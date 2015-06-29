<?php
	include "../koneksi.php";
	$nm_kat = $_POST['nm_kat'];
	$sql	= "INSERT INTO `ecom_haris`.`barang_kategori` (`id_kategori`,`nama_kategori`) 
				VALUES (NULL, '$nm_kat')";
	mysql_query($sql,$koneksi);
	echo "<script>window.location='kategori_admin.php';</script>";
?>
