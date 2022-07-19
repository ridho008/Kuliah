<?php
error_reporting(0);
require_once '../config/db.php';

$nama_user = $_GET['nama_user'];
$username = $_GET['username'];
$password = md5($_GET['password']);
$role = $_GET['role'];

if(empty($nama_user) || empty($username) || empty($password) || empty($role)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!',
   ];
} else {
   $sql = mysqli_query($conn, "INSERT INTO user VALUES (null, '$nama_user', '$username', '$password', '$role')") or die(mysqli_error($conn));
   // localhost/api-micro-taylor/users/create.php?nama_user=rudi&username=rudi123&password=rudi&alamat=pasar&hak_akses=1
   if($sql) {
      $response = [
         'status' => 1,
         'message' => 'Tambah Data Berhasil',
      ];
   } else {
      $response = [
         'status' => 0,
         'message' => 'Gagal Tambah Data!!!',
      ];
   }
}


echo json_encode($response);