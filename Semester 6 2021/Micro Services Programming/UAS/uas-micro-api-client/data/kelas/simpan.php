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

if ($menu=='kelas' AND $act=='input')
{
// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$nama_kelas		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['nama_kelas'], ENT_QUOTES))));

mysqli_query($conn, "INSERT INTO kelas VALUES (null, '$nama_kelas')") or die(mysqli_error($conn));

header('location:../../index.php?menu='.$menu);
}

else if ($menu=='kelas' AND $act=='update')
{
	// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$nama_kelas		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['nama_kelas'], ENT_QUOTES))));


mysqli_query($conn, "UPDATE kelas SET nama_kelas = '$nama_kelas' where id='$_POST[id]'") or die(mysqli_error($conn));


header('location:../../index.php?menu='.$menu);
}

else if ($menu=='kelas' AND $act=='hapus')
{
	// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

mysqli_query($conn, "DELETE FROM kelas WHERE id='$_GET[id]'");

header('location:../../index.php?menu='.$menu);
}

?>