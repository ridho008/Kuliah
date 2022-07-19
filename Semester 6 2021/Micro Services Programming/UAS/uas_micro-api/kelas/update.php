<?php
require_once '../config/db.php';
error_reporting(0);


$id_kelas = $_GET['id_kelas'];
$nama_kelas = $_GET['nama_kelas'];
// localhost/api-micro-taylor/users/update.php?nama_user=rudi1&username=rudi12345&password=rudi&alamat=pasarpusat&hak_akses=1&id_user=4
if(empty($nama_kelas)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!',
   ];
} else {
   $rowKelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id = '$id_kelas'") or die(mysqli_error($conn));

   if(mysqli_num_rows($rowKelas) > 0) {
      $sql = mysqli_query($conn, "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id = '$id_kelas'") or die(mysqli_error($conn));
      if($sql) {
         $response = [
            'status' => 1,
            'message' => 'Ubah Data Berhasil',
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
         'message' => 'Data dengan ID ' . $id_kelas . ' tidak ditemukan',
      ];
   }
   
}



echo json_encode($response);