<?php
error_reporting(0);
require_once '../config/db.php';

$nama_kelas = $_GET['nama_kelas'];

if(empty($nama_kelas)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!',
   ];
} else {
   $sql = mysqli_query($conn, "INSERT INTO kelas VALUES (null, '$nama_kelas')") or die(mysqli_error($conn));
   // localhost/api-micro-taylor/kategori/create.php?nama_kategori=mencoba
   // http://localhost/api-micro-taylor/kategori/update.php?nama_kategori=lagi&id_kategori=4
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