<?php
      include '../koneksi.php';
      session_start();
      $nama = $_SESSION['username'];
      if (!isset($nama)) {
            header('Location:../login.php');
      }
      $id_user          = $_POST['id_user'];
      $ambil_id_brg     = $_POST['id_barang'];
      $jml_beli         = $_POST['jml_beli'];
      $tgl_beli         = 
      $query            = "INSERT INTO  `ecom_haris`.`keranjang_sementara` (
                        `id_keranjang`,
                        `id_barang` ,
                        `jumlah_beli` ,
                        `id_user` 
                        )
                        VALUES (
                        NULL ,  '$ambil_id_brg',  '$jml_beli',  '$id_user' 
                        )";

      mysql_query($query,$koneksi);
      echo "<script>window.location='keranjang.php';</script>";
?>
