<?php
session_start();
// error_reporting(0);
// include "../../config/control.php";
include "../../config/koneksi.php";

// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$menu	=$_GET["menu"];
$act	=$_GET["act"];

if ($menu=='siswa' AND $act=='input')
{
// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$nama_siswa		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['nama_siswa'], ENT_QUOTES))));

mysqli_query($conn, "INSERT INTO siswa VALUES (null, '$nama_siswa')") or die(mysqli_error($conn));

header('location:../../index.php?menu='.$menu);
}

else if ($menu=='siswa' AND $act=='update')
{
	// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$nama_siswa		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['nama_siswa'], ENT_QUOTES))));


mysqli_query($conn, "UPDATE siswa SET nama_siswa = '$nama_siswa' where id_siswa='$_POST[id]'") or die(mysqli_error($conn));


header('location:../../index.php?menu='.$menu);
}

else if ($menu=='siswa' AND $act=='hapus')
{
	// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$_GET[id]'");

header('location:../../index.php?menu='.$menu);
}

?>