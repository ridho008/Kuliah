<?php
session_start();
error_reporting(0);
require_once "config/koneksi.php";
if(!isset($_SESSION['username'])) {
   header("location:login.php");
}
// }
// else
// {
// var_dump($_GET);

// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem API</title>
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
     <link rel="stylesheet" href="css/w3.css">
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="?menu=home" class="active">
        <i class="fa fa-desktop fa-lg"></i> Home</a>
       
                <div class="dropdown">
                    <button class="dropbtn"><i class="fa fa-database fa-lg"></i> Data Master
                      <i class="fa fa-caret-down"></i>
                    </button>
                <div class="dropdown-content">
                      <a href="?menu=user">Data User</a>
                      <a href="?menu=siswa">Data Siswa</a>
                      <a href="?menu=kelas">Data Kelas</a>                       
            </div>
                    </div>
                    <a href="http://localhost/api-taylor/logout.php" class="active">
        <i class="fa fa-desktop fa-lg"></i> Logout</a>
                    </div>

         


        <a href="http://localhost/api-taylor/logout.php">
        <i class="fa fa-power-off fa-lg"></i> Logout</a>
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>

    <div style="padding-left:10px; padding-right:10px">
      <?php
      // ini untuk konten, paham kan ?
if($_GET["menu"]=='home')
{
// echo"<h3>Selamat Datang</h3>" .;
echo"<h3>Selamat Datang " . $_SESSION['nama'] . "</h3>";
}

if($_GET["menu"]=='user'){
 include "data/user/modul.php";
} else if($_GET["menu"]=='kelas') {
 include "data/kelas/modul.php";
} else if($_GET["menu"]=='siswa') {
 include "data/siswa/modul.php";
} else if($_GET["menu"]=='transaksi') {
 if($_GET['act'] == '') {
      include "data/transaksi/index.php";
   } else if($_GET['act'] == 'tambah') {
      include "data/transaksi/create.php";
   } else if($_GET['act'] == 'edit') {
      include "data/transaksi/update.php";
   }
} else if($_GET["menu"]=='baju') {
 if($_GET['act'] == '') {
      include "data/baju/index.php";
   } else if($_GET['act'] == 'tambah') {
      include "data/baju/create.php";
   } else if($_GET['act'] == 'edit') {
      include "data/baju/update.php";
   }
}






// if($_GET[menu]=='keluar'){
//         session_destroy();
//         echo"<script>
//   window.alert('Logout Berhasil !'); document.location.href='index.php'; 
// </script>";
//          // header('location:index.php');
//           exit;
// }



      ?>











    </div>

    
</body>
<?php 
// }

 ?>
</html>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
