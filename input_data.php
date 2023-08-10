<!DOCTYPE html>
<html>

<head>
    <title>Form Input Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
    /* Styling untuk form */
    form {
      max-width: 600px;
      margin: 0 auto;
      padding: 2rem;
      background-color: #f5f5f5;
      border-radius: 5px;
    }

    /* Styling untuk tombol "Ambil Lokasi" */
    .btn-get-location {
      margin-bottom: 1rem;
    }

    /* Styling untuk tombol "Submit" */
    .btn-submit {
      margin-top: 1rem;
    }
    .form-title {
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 2rem;
        }

  </style>
</head>

<body>
    <div class="container">
        <h2 class="form-title">Form Input Kegiatan</h2>
        <form action="submit_form.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <select class="form-control" id="nama" name="nama">
                    <?php
        // Mengambil data nama dari tabel pegawai
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

        // Mengambil data nama dari tabel pegawai
        $sql = "SELECT nama FROM pegawai";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          // Membuat option untuk setiap nama yang ada di tabel pegawai
          while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["nama"] . "'>" . $row["nama"] . "</option>";
          }
        } else {
          echo "0 results";
        }

        mysqli_close($conn);
        ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"
                    value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label for="uraian">Uraian Kegiatan:</label>
                <textarea class="form-control" id="uraian" name="uraian"></textarea>
            </div>
            <div class="form-group">
                <label for="foto1">Foto 1:</label>
                <input type="file" class="form-control-file" id="foto1" name="foto1">
            </div>
            <div class="form-group">
                <label for="foto2">Foto 2:</label>
                <input type="file" class="form-control-file" id="foto2" name="foto2">
            </div>
            <!-- HTML form code -->

                <div class="form-group">
                <label for="lokasi">Koordinat Lokasi:</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" readonly>
                <button type="button" class="btn btn-primary" onclick="getLocation()">Ambil Lokasi</button>
                </div>

            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>
    </div>
    <script>
  function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation tidak didukung oleh browser Anda.");
  }
}

function showPosition(position) {
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;
  var locationInput = document.getElementById("lokasi");
  locationInput.value = latitude + "," + longitude;
}

    </script>
</body>

</html>