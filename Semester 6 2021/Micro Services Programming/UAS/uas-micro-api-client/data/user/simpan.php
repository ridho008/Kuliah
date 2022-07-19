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

if ($menu=='user' AND $act=='input')
{
// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$username		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES))));
$pass	 		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES))));
$nm_lengkap		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['nama_user'], ENT_QUOTES))));
$role			= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['role'], ENT_QUOTES))));
$password_hash = md5($pass);
mysqli_query($conn, "INSERT INTO user(
								nama_user,
								username,
								password,
								role)                 

								VALUES(
								'$nm_lengkap',
								'$username',
								'$password_hash',
								'$role')") or die(mysqli_error($conn));

header('location:../../index.php?menu='.$menu);
}

else if ($menu=='user' AND $act=='update')
{
	// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

$username		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES))));
$pass	 		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES))));
$nm_lengkap		= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['nama_user'], ENT_QUOTES))));
$role			= mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($_POST['role'], ENT_QUOTES))));
$password_hash = md5($pass);

mysqli_query($conn, "UPDATE user SET	nama_user = '$nm_lengkap',	username		='$username',
									password		='$password_hash',
									role			='$role'
									
									where id_user='$_POST[id]'") or die(mysqli_error($conn));


header('location:../../index.php?menu='.$menu);
}

else if ($menu=='user' AND $act=='hapus')
{
	// if(empty($_SESSION['username'] AND $_SESSION['password'] AND $_SESSION['level']))
// {
// echo"Login Dulu !";
// exit;
// }

mysqli_query($conn, "DELETE FROM user WHERE id_user='$_GET[id]'");

header('location:../../index.php?menu='.$menu);
}

?>