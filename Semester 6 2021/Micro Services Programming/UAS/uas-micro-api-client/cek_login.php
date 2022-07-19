<?php
session_start();
// error_reporting(0);
include "config/koneksi.php";


$username	= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES))));
$kata_kunci	= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES))));
$pass		= md5($kata_kunci);

$login		= mysqli_query($conn, "SELECT username,password,nama_user,role FROM user WHERE username = '$username' AND password = '$pass'") or die(mysqli_error($conn));
$ketemu		= mysqli_num_rows($login);
$r			= mysqli_fetch_assoc($login);
// var_dump($r); die;


// $pass 	=md5($_POST[password]);

// $login	=mysql_query("");
// $ketemu	=mysql_num_rows($login);
// $r		=mysql_fetch_array($login);

if ($ketemu > 0)
{
$_SESSION['username']		= $r['username'];
$_SESSION['nama']			= $r['nama_user'];
$_SESSION['role']		= $r['role'];

header('location:index.php?menu=home');
}


else
{
echo"<script> window.alert('Username & Password Salah !'); document.location.href='login.php'; </script>";
}

?>

<!-- <title>Aplikasi</title> -->
