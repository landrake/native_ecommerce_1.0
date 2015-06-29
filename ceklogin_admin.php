<?php
session_start();
include "koneksi.php";

/* Deklarasi variabel */
$username = $_POST['username'];
$password = $_POST['password'];

/* Menyamakan data dari form login dengan yang di database */ 
$user  = mysql_query(" SELECT * FROM user WHERE username='".mysql_real_escape_string($username)."' AND password='".mysql_real_escape_string($password)."' AND akses='0'");
$match = mysql_num_rows($user);


if ($match==1){
  	$_SESSION['username'] = $_POST['username'];
	echo "<script>window.location='admin/index.php';</script>";
}
else {
	echo "<script>window.location='login_admin_salah.php';</script>";
}
?>
