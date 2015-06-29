<?php

	include "../koneksi.php";
	$nm_brg 		= $_POST['nm_brg'];
	$kd_brg 		= $_POST['kd_brg'];
	$hrg_brg 		= $_POST['hrg_brg'];
	$jml_brg 		= $_POST['jml_brg'];
	$kategori 		= $_POST['kategori'];
	$ringkas_det 	= $_POST['ringkas_det'];
	$detail 		= $_POST['detail'];
	$folder 		= '../assets/images';
	$tmp_name 		= $_FILES['userfile']['tmp_name'];
	$name 			= $folder."/".$_FILES['userfile']['name'];
	$name_brg 		= $_FILES['userfile']['name'];

	move_uploaded_file($tmp_name, $name);
	
	$sql="INSERT INTO  `ecom_haris`.`barang` (
			`id_barang` ,
			`nama_barang` ,
			`id_kategori` ,
			`kode_barang`
			)
			VALUES (
			NULL ,  '$nm_brg',  '$kategori',  '$kd_brg'
			)";
	
	if(mysql_query($sql,$koneksi)){
		$last_id = mysql_insert_id($koneksi);
		$sql2="INSERT INTO  `ecom_haris`.`barang_detail` (
			`id_detail_barang` ,
			`id_barang` ,
			`harga` ,
			`jumlah`,
			`foto`,
			`detail_barang`,
			`ringkasan_detail_barang`
			)
			VALUES (
			NULL, '$last_id',  '$hrg_brg',  '$jml_brg',  '$name_brg',  '$detail',  '$ringkas_det'
			)";
		mysql_query($sql2,$koneksi);
	}
	echo "<script>window.location='barang.php';</script>";
?>

