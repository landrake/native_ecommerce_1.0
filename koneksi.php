<?php
  $koneksi=mysql_connect("localhost","root","")or die("Koneksi Gagal".mysql_error());
  if($koneksi)mysql_select_db("ecom_haris")or die("Database Tidak Ditemukan".mysql_error());
?>
