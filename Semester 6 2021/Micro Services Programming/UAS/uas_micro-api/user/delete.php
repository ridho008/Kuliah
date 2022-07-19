<?php
require_once '../config/db.php';
error_reporting(0);

$id_user = $_GET['id_user'];
if(empty($id_user)) {
   $response = [
      'status' => 0,
      'message' => 'Belum memasukan parameternya!'
   ];
} else {
   $rowUser = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'") or die(mysqli_error($conn));

   if(mysqli_num_rows($rowUser) > 0) {
      $sqlUser = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'") or die(mysqli_error($conn));

      if($sqlUser) {
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
         'message' => 'Data dengan ID ' . $id_user . ' tidak ditemukan',
      ];
   }
   
}


// header('Content-Type: application/json');
echo json_encode($response);