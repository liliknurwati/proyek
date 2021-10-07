<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: ../login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Siswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
	<?php 
	include '../koneksi.php';
	$sql = "SELECT * FROM siswa s LEFT JOIN pendaftaran p ON s.siswa_id = p.daftar_siswa WHERE siswa_email = '$_SESSION[email]'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	?>

	<div class="container" >
		<div class="card mt-4 mb-3 p-4">
			<div class="container">
				<h3 class="text-center">Profil Pendaftar</h3>
				<hr>
				<br>
				<table id="table-datatables">
					<div class="row g-3 bg-light">
					<div class="col-sm-4">
						<img class="img-fluid" width="150px" src="file/<?php echo $row['siswa_foto']; ?>">
					</div>
					<div class="col">
						<div class="row g-3">
							<div class="col">
								<label><b>Nama</b></label><br>
								<label><?php echo $row['siswa_nama']; ?></label>
							</div>
							<div class="col">
								<label><b>E-mail</b></label><br>
								<label><?php echo $row['siswa_email']; ?></label>
							</div>
						</div>
						<br>
						<div class="row g-3">
							<div class="col">
								<label><b>TTL</b></label><br>
								<label><?php echo $row['siswa_tempat_lahir'].', '.$row['siswa_ttl']; ?></label>
							</div>
							<div class="col">
								<label><b>Jenis Kelamin</b></label><br>
								<label><?php echo $row['gender']; ?></label>
							</div>
						</div>
						<br>
						<div class="row g-3">
							<div class="col">
								<label><b>Alamat</b></label><br>
								<label><?php echo $row['siswa_alamat']; ?></label>
							</div>
							<div class="col">
								<label><b>No. Telepon</b></label><br>
								<label><?php echo $row['siswa_notelp']; ?></label>
							</div>
						</div>
						<br>
						<div class="row g-3">
							<div class="col">
								<label><b>Asal Sekolah</b></label><br>
								<label><?php echo $row['siswa_sekolah']; ?></label>
							</div>
							<div class="col">
								<label><b>Nilai Rata Rapor</b></label><br>
								<label><?php echo $row['siswa_nilai']; ?></label>
							</div>
						</div>
						<br>
						<div class="row g-3">
							<div class="col">
								<label><b>Pilihan Jurusan</b></label><br>
								<label><?php echo $row['siswa_jurusan']; ?></label>
							</div>
							<div class="col">
								<label><b>Status Pendaftaran</b></label><br>
								<button class="btn btn-success"><?php echo $row['daftar_status']; ?></button>

							</div>
						</div>
					</div>
				</div>
				</table>
				
			</div>
		</div>
	</div>
	<script>
		window.print();
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>