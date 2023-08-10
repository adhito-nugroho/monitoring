<?php
  session_start();
  unset($_SESSION['nama']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Menu</title>
  <!-- Load Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-5">
    <div class="text-center mb-2">
      <img src="img/logo-jatim.png" alt="Logo Provinsi Jawa Timur" height="100px">
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-2">Monitoring Kegiatan Penyuluh Kehutanan</h2>
        <h2 class="text-center mb-4">CDK Wilayah Bojonegoro</h2>

        <div class="d-grid gap-2 mb-3">
          <a href="input_data.php" class="btn btn-primary btn-lg">Input Data</a>
        </div>
        <div class="d-grid gap-2 mb-3">
          <a href="view_data.php" class="btn btn-success btn-lg">View Data</a>
        </div>

      </div>
    </div>
  </div>

  <!-- Load Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>