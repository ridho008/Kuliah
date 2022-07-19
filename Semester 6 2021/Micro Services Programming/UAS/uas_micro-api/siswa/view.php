<?php
require_once '../config/db.php';
// error_reporting(0);

$sqlSiswa = mysqli_query($conn, "SELECT * FROM siswa") or die(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($sqlSiswa)) {
   $data[] = $row;
}
if(mysqli_num_rows($sqlSiswa) < 1) {
   $response = [
      'status' => 0,
      'message' => 'Data belum diinputkan.'
   ];
} else {
   $response = [
      'status' => 1,
      'message' => 'Berhasil',
      'data' => $data,
   ];
}

// header('Content-Type: application/json');
echo json_encode($response);