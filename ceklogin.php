<?php
session_start();
include "koneksi.php";

/* Deklarasi variabel */
$username = $_POST['username'];
$password = $_POST['password'];

/* Menyamakan data dari form login dengan yang di database */ 
$user  = mysql_query(" SELECT * FROM user WHERE username='".mysql_real_escape_string($username)."' AND password='".mysql_real_escape_string($password)."' AND akses='1'");
$match = mysql_num_rows($user);
while($data=mysql_fetch_array($user)){
	$id_user = $data['id_user'];

if ($match==1){
  	$_SESSION['id_user'] = $id_user;
  	$_SESSION['username'] = $_POST['username'];
	echo "<script>window.location='member/index.php';</script>";
}
else {
	echo "<script>window.location='login_salah.php';</script>";
}}
?>
