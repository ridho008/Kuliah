<?php
require_once '../config/db.php';
error_reporting(0);

$id_kelas = $_GET['id_kelas'];
if(empty($id_kelas)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!'
   ];
} else {
   $rowKelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id = '$id_kelas'") or die(mysqli_error($conn));
   
   if(mysqli_num_rows($rowKelas) > 0) {
      $sqlKelas = mysqli_query($conn, "DELETE FROM kelas WHERE id = '$id_kelas'") or die(mysqli_error($conn));
      if($sqlKelas) {
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
            'message' => 'Data dengan ID ' . $id_kelas . ' tidak ditemukan',
         ];
   }
   
}


// header('Content-Type: application/json');
echo json_encode($response);