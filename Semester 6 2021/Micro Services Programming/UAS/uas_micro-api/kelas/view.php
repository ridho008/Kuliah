<?php
require_once '../config/db.php';
// error_reporting(0);

$sqlKelas = mysqli_query($conn, "SELECT * FROM kelas") or die(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($sqlKelas)) {
   $data[] = $row;
}
if(mysqli_num_rows($sqlKelas) < 1) {
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