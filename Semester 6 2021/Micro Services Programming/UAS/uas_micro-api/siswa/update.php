<?php
require_once '../config/db.php';
error_reporting(0);


$id_siswa = $_GET['id_siswa'];
$nama_siswa = $_GET['nama_siswa'];
// var_dump($id_user, $nama_user);
// localhost/api-micro-taylor/users/update.php?nama_user=rudi1&username=rudi12345&password=rudi&alamat=pasarpusat&hak_akses=1&id_user=4
if(empty($nama_siswa)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!',
   ];
} else {
   $rowSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'") or die(mysqli_error($conn));

   if(mysqli_num_rows($rowSiswa) > 0) {
      $sql = mysqli_query($conn, "UPDATE siswa SET nama_siswa = '$nama_siswa' WHERE id_siswa = '$id_siswa'") or die(mysqli_error($conn));
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
         'message' => 'Data dengan ID ' . $id_siswa . ' tidak ditemukan',
      ];
   }

   
}



echo json_encode($response);