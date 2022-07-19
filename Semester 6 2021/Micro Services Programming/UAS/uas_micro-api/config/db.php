<?php
define("DB_SERVER", "localhost");
define("DB_NAME", "uas_micro");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn) {
   // echo "berhasil";
}

// header('Content-Type: application/json');