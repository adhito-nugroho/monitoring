<?php
$host = "localhost"; //nama host
$user = "root"; //username untuk mengakses database
$password = ""; //password untuk mengakses database
$database_name = "monitoring"; //nama database

$koneksi = mysqli_connect($host, $user, $password, $database_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
