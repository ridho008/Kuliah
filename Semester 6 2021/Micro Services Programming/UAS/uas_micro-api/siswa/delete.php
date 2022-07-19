<?php
require_once '../config/db.php';
error_reporting(0);

$id_siswa = $_GET['id_siswa'];
if(empty($id_siswa)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!'
   ];
} else {
   $rowSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'") or die(mysqli_error($conn));

   if(mysqli_num_rows($rowSiswa) > 0) {
      $sqlSiswa = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'") or die(mysqli_error($conn));

      if($sqlSiswa) {
         $response = [
            'status' => 1,
            'message' => 'Berhasil menghapus data!'
         ];
      } else {
         $response = [
            'status' => 0,
            'message' => 'Gagal menghapus data!'
         ];
      }
   } else {
      $response = [
         'status' => 0,
         'message' => 'Data dengan ID ' . $id_siswa . ' tidak ditemukan',
      ];
   }
   
}


// header('Content-Type: application/json');
echo json_encode($response);