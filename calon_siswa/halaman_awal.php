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
	<?php include '../koneksi.php';
	$sql = "SELECT * FROM siswa WHERE siswa_email = '$_SESSION[email]'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	?>

	<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
		<div class="container">
			<a class="navbar-brand" href="#">CALON SISWA</a>
			  <ul class="nav nav-pills">
			    <li class="nav-item">
			      <a class="nav-link" href="halaman_pendaftaran.php">Pendaftaran</a>
			    </li>
			    <li class="nav-item dropdown">
			      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $row['siswa_nama']; ?></a>
			      <ul class="dropdown-menu">
			        <li><a class="dropdown-item" href="profil_siswa.php">Profil</a></li>
			        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
			      </ul>
			    </li>
			  </ul>
		</div>
	</nav>

	<div class="container">
		<div class="card mt-4 mb-3 p-4">
			<div class="container">
				<h3 class="text-center">Lengkapi Data Pendaftaran</h3>
				<a href="profil_siswa.php">Lihat kelengkapan data</a>
				<hr>

				<br>
				<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $row['siswa_id']; ?>" name='id'>
					<div class="row g-3">
						<div class="col" class="form-control">
							<label><b>Email</b></label>
							<input type="text" name="email" class="form-control bg-light"  value="<?php echo $row['siswa_email']; ?>" disabled>
						</div>
						<div class="col" class="form-control">
							<label><b>Nama Lengkap</b></label>
							<input type="text" name="nama" class="form-control bg-light"  value="<?php echo $row['siswa_nama']; ?>" disabled>
						</div>
					</div>
					<br>
					<div class="row g-3">
						<div class="col" class="form-control">
							<label><b>Tempat Lahir</b></label>
							<input type="text" name="tempat" class="form-control bg-light" value="<?php echo $row['siswa_tempat_lahir']; ?>">
						</div>
						<div class="col" class="form-control">
							<label><b>Tanggal Lahir</b></label>
							<input type="date" name="tl" class="form-control bg-light" value="<?php echo $row['siswa_ttl']; ?>">
						</div>
					</div>
					<br>
					<div class="row g-3">
						<div class="col" class="form-control">
							<label><b>Gender</b></label><br>
							<input type="Radio" name="gender" value="Laki-laki">Laki-laki
							<input type="Radio" name="gender" value="Perempuan">Perempuan
						</div>
						<div class="col" class="form-control">
							<label><b>No. Telepon</b></label>
							<input type="text" name="telp" class="form-control bg-light" value="<?php echo $row['siswa_notelp']; ?>">
						</div>
					</div>
					<br>
					<div class="row g-3">
						<div class="col" class="form-control">
							<label><b>Asal Sekolah</b></label>
							<input type="text" name="asal" class="form-control bg-light" value="<?php echo $row['siswa_sekolah']; ?>">
						</div>
						<div class="col" class="form-control">
							<label><b>Rata-rata nilai Rapot</b></label>
							<input type="text" name="nilai" class="form-control bg-light" value="<?php echo $row['siswa_nilai']; ?>">
						</div>
					</div>
					<br>
					<div class="row g-3">
						<div class="col" class="form-control">
							<label><b>Jurusan</b></label><br>
							<input type="Radio" name="jurusan" value="IPA">IPA
							<input type="Radio" name="jurusan" value="IPS">IPS
						</div>
						<div class="col" class="form-control">
							<label><b>Alamat</b></label>
							<input type="text" name="alamat" class="form-control bg-light" value="<?php echo $row['siswa_alamat']; ?>">
						</div>
					</div>
							<label><b>Pas Foto</b></label>
							<input type="file" name="file" class="form-control">
					<br>
					<button type="reset" class="btn btn-danger">Reset</button>
					<button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
				</form>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>