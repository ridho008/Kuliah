<?php
require_once '../config/db.php';
error_reporting(0);


$id_user = $_GET['id_user'];
$nama_user = $_GET['nama_user'];
$username = $_GET['username'];
$password = md5($_GET['password']);
$role = $_GET['role'];
// var_dump($id_user, $nama_user);
// localhost/api-micro-taylor/users/update.php?nama_user=rudi1&username=rudi12345&password=rudi&alamat=pasarpusat&hak_akses=1&id_user=4
if(empty($nama_user) || empty($username) || empty($password) || empty($role)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!',
   ];
} else {
   $rowUser = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'") or die(mysqli_error($conn));

   if(mysqli_num_rows($rowUser) > 0) {
      $sql = mysqli_query($conn, "UPDATE user SET nama_user = '$nama_user', username = '$username', password = '$password', role ='$role' WHERE id_user = '$id_user'") or die(mysqli_error($conn));
      if($sql) {
         $response = [
            'status' => 1,
            'message' => 'Data berhasil diupdate.',
         ];
      } else {
         $response = [
            'status' => 0,
            'message' => 'Gagal Ubah Data!!!',
         ];
      }
   } else {
      $response = [
         'status' => 0,
         'message' => 'Data dengan ID ' . $id_user . ' tidak ditemukan',
      ];
   }

   
}



echo json_encode($response);