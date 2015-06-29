<?php

	include "../koneksi.php";
	$idbrg          = $_POST['idbrg'];
	$iddetbrg       = $_POST['iddetbrg'];
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

	
	$sql = "UPDATE barang 
			SET nama_barang = '$nm_brg',
				kode_barang = '$kd_brg',
				id_kategori = '$kategori'
			WHERE id_barang = $idbrg";
	
	
	if(mysql_query($sql,$koneksi)){
		$last_id = mysql_insert_id($koneksi);
		$sql2 ="UPDATE barang_detail 
				SET harga 					= '$hrg_brg',
					jumlah 					= '$jml_brg',
					detail_barang 			= '$detail',
					ringkasan_detail_barang	= '$ringkas_det',
					foto 					= '$name_brg'
				WHERE id_detail_barang 		= '$iddetbrg'
				";
		if($name_brg===''){
			$sql2 ="UPDATE barang_detail 
				SET harga 					= '$hrg_brg',
					jumlah 					= '$jml_brg',
					detail_barang 			= '$detail',
					ringkasan_detail_barang	= '$ringkas_det'
				WHERE id_detail_barang 		= '$iddetbrg'
				";
		}
		echo $sql2;
		//unlink('../assets/images/'.$name_brg);
		move_uploaded_file($tmp_name, $name);
		mysql_query($sql2,$koneksi);
	}
	echo "<script>window.location='barang.php';</script>";
?>

