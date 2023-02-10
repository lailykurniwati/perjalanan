<?php
session_start();
$nama = $_SESSION['nama'];
if($_SESSION['status']!="login"){
	header("location:index.php?pesan=belum_login");
}
?>
<html>
<head>
	<meta charshet="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!- - Boostrap CSS - ->
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<!- - My CSS - ->
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<!- - Boostrap ICON - ->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="shortcut icon" href="asset/img/logo/ctt.png">
	<title>Menu</title>
	<style>
	/* ukuran peta */
	#mapid {
		height: 100%;
	}
	.jumbotron{
		height: 100%;
		border-radius: 0;
	}
	body{
		background-color: #DEB887;
	}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-auto col-x1-2 px-sm-2 px-0 navigasi">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
					<a href="index.php" class="d-flex align-items-center pb-3 md-mb-0 me-md-auto text-white text-decoration-none">
						<s<i class="fs-4 bi bi-card-heading"></i> <span class="ms-1 d-none d-sm-inline">Menu</span>
					</a>
					<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
						<li class="nav-item">
							<a href="beranda.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi bi-house-door"></i> <span class="ms-1 d-none d-sm-inline">Beranda</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="historyperjalanan.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi bi-journal-richtext"></i> <span class="ms-1 d-none d-sm-inline">Catatan Perjalanan</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="perjalanan.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi bi-aspect-ratio"></i> <span class="ms-1 d-none d-sm-inline">Isi Data Perjalanan</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="catatan_lokasi.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi bi-clipboard-pulse"></i> <span class="ms-1 d-none d-sm-inline">Catatan Lokasi</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="lokasi.php" class="nav-link align-middle px-0 text-white">
								<i class="fs-4 bi bi-geo-alt"></i> <span class="ms-1 d-none d-sm-inline">Lokasi</span>
							</a>
						</li>
								
								</ul>
							</li>
						</ul>
						<hr>
						<div class="dropdown pb-4">
							<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="asset/img/dashboard/pf.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
								<span class="d-none d-sm-inline mx-1"><?php
									include "koneksi.php";
									$nama = $_SESSION['nama'];
									$data = mysqli_query($koneksi,"select * from login where nama = '$nama'");
									$d = mysqli_fetch_array($data);
									echo $d['nama'];
								?>
								</span>
							</a>
							<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
								<li><a class="dropdown-item" href="profile.php">Profile</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li>
									<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tombolkeluar">Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="modal fade" id="tombolkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title text-fw-bold" id="exampleModalLabel">KELUAR</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Apakah anda yakin untuk keluar?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">Batal"</button>
								<a href="logout.php" type="button" class="btn btn-outline-danger fw-bold">Keluar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col py-3 beranda">
					<div class="text-center">
						<marquee bgcolor="" width="365" height="40" class="fw-bold"><h2>Tambah Lokasi</h2></marquee>
					</div>
		
		<hr>
			<form method="post">
				<div class="form-group">
					<label for="exampleFormControlInput1">Latitude, Longitude</label>
					<input type="text" class="form-control" id="lat_long" name="lat_long">
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Nama Tempat</label>
					<input type="text" class="form-control" name="nama_tempat">
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Kategori Tempat</label>
					<select class="form-control" name="kategori" id="kategori">
						<option value="">--Kategori Tempat--</option>
						<option value="rumah makan">Rumah Makan</option>
						<option value="pom bensin">Pom Bensin</option>
						<option value="Fasilitas Umum">Fasilitas Umum</option>
						<option value="Pasar/Mall">Pasar/Mall</option>
						<option value="rumah sakit">Rumah Sakit</option>
						<option value="Sekolah">Sekolah</option>
						<option value="Wisata">Wisata</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Keterangan</label>
					<textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
				</div>
				<div class="form-group">
				<input type="submit" value="Simpan" name="simpan" class="btn btn-success">
					<a href="lokasi.php" type="button" class="btn btn-danger fw-bold">Batal</a>
				</div>
			</form>
		</div>
	</div>
	
	<!- - Boostrap JS - ->
	<script type="text/module/javascript" herf="asset/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" intergrity="sha384-ka75k0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0lRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	<! -- leaflet js -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>
	<script>
	// set lokasi latitude dan longitude, lokasinya kota BATU
	var mymap = L.map('mapid').setView([-7.8806559,112.5047945], 14);
	//setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
	L.tileLayer(

'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
		attribution: 'Map data &copy;
<a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors,
<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery ©
<a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 20,
		id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenisjenis peta lainnnya di web resmi mapbox
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'your.mapbox.access.token'
	}).addTo(mymap);
	
	
// buat variabel berisi fugnsi L.popup
var popup = L.popup();

// buat fungsi popup saat map diklik
function onMapClick(e) {
  popup
	.setLatLng(e.latlng)
	.setContent("koordinatnya adalah " + e.latlng
	.toString()
	) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
	.openOn(mymap);
	
document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
 }
mymap.on('click', onMapClick); //jalankan fungsi

<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'perjalanan'); //koneksi ke database
$tampil = mysqli_query($mysqli, "select * from lokasi"); //ambil data dari tabel lokasi
while($hasil = mysqli_fetch_array($tampil)){ ?> //melooping data menggunakan while

// menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
// menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>]).addTo(mymap)

// data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html

.bindPopup(`<?php echo 'nama tempat:'.$hasil['nama_tempat'].'|kategori:'.$hasil['kategori'].'|keteragan:'.$hasil['keterangan']; ?>`)
<?php } ?>
	</script>
					
</body>
</html>
<?php

if(isset($_POST['simpan'])){
	include 'koneksi.php';
	
	$lat_long = $_POST['lat_long'];
	$nama_tempat = $_POST['nama_tempat'];
	$kategori = $_POST['kategori'];
	$keterangan = $_POST['keterangan'];
	
	mysqli_query ($koneksi, "insert into lokasi values('','$lat_long','$nama_tempat','$kategori','$keterangan')");
	
	echo '<script language="javascript">';
	echo '<alert("Data Berhasil Disimpan">';
	echo '</script>';
}
?>



<!-- BATAS SUCI -->