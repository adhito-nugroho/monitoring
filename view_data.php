<!DOCTYPE html>
<html>
<head>
	<title>Data Kegiatan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>

    <style>
            .thumbnail:hover {
                cursor: pointer;
                }

                    .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.9);
            }

            /* Modal Content */
            .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            }

            /* The Close Button */
            .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            }

            .close:hover,
            .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            }
            body {
            margin-bottom: 50px;
            }

    </style>
</head>
<body>
    
    <!-- The Modal -->
        <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
        </div>


                
    
	<div class="container mt-5">
		<h2>Data Kegiatan</h2>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Uraian Kegiatan</th>
					<th>Foto 1</th>
					<th>Foto 2</th>
					 <th>Lokasi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Load konfigurasi database
				include 'config.php';
                session_start();
                if(isset($_SESSION['nama'])) {
                    $namanya = $_SESSION['nama'];
				// Query untuk mengambil data dari database
				    $query = "SELECT * FROM kegiatan where nama='$namanya'";    
                }
                else
                {
                    $query = "SELECT * FROM kegiatan";
                }
                
				// Query untuk mengambil data dari database
				$result = mysqli_query($koneksi, $query);

				// Looping untuk menampilkan data dalam tabel
				while ($row = mysqli_fetch_assoc($result)) {
					// Ambil latitude dan longitude dari field lokasi
					$lokasi = explode(',', $row['lokasi']);
					$latitude = $lokasi[0];
					$longitude = $lokasi[1];

					// Tampilkan data dalam tabel
					echo "<tr>";
					echo "<td>" . $row['nama'] . "</td>";
					echo "<td>" . $row['uraian'] . "</td>";
                    echo "<td><img src='uploads/" . $row['foto1'] . "' width='100' class='thumbnail' onclick='showImage(\"uploads/" . $row['foto1'] . "\")'></td>";
                    echo "<td><img src='uploads/" . $row['foto2'] . "' width='100' class='thumbnail' onclick='showImage(\"uploads/" . $row['foto2'] . "\")'></td>";


					echo "<td><a href='#' onclick='viewMap(" . $latitude . ", " . $longitude . ")'>" . $latitude . ", " . $longitude . "</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

    <!-- Urutan library JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>


    <script>
        function showImage(url) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("modalImage");
            
            modal.style.display = "block";
            modalImg.src = url;
            }

            function closeModal() {
            var modal = document.getElementById("imageModal");
            modal.style.display = "none";
            }

            $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers",
                "search": {
                    "caseInsensitive": true
                },
                "dom": 'Bfrtip',
                "buttons": [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

        function viewMap(latitude, longitude) {
        // buat URL untuk Google Maps dengan latitude dan longitude
        var url = "https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude;

        // buka halaman baru dengan URL Google Maps
        window.open(url, '_blank');
        }



            
    </script>
</body>
</html>
