<?php
// Mengambil data yang diisi pada form
$nama = $_POST["nama"];
$tanggal = $_POST["tanggal"];
$uraian = $_POST["uraian"];
$foto1 = $_FILES["foto1"]["name"];
$foto2 = $_FILES["foto2"]["name"];
$lokasi = $_POST["lokasi"];

// Memindahkan file gambar ke folder yang ditentukan
$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["foto1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["foto2"]["name"]);
move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file1);
move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file2);

// Menyimpan data ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoring";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Menyimpan data ke dalam tabel kegiatan
$sql = "INSERT INTO kegiatan (nama, tanggal, uraian, foto1, foto2, lokasi) VALUES ('$nama', '$tanggal', '$uraian', '$foto1', '$foto2', '$lokasi')";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Data berhasil disimpan');</script>";
  session_start();
  $_SESSION['nama'] = $nama;
  header("Location: view_data.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
