<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: adm_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Siswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/471abfb845.js"></script>
</head>
<body>
	<?php include '../koneksi.php';
		$query = mysqli_query($db, "SELECT*FROM admin WHERE admin_email='$_SESSION[email]'");
		$d = mysqli_fetch_array($query);
	?>

	<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
		<div class="container">
			<a class="navbar-brand" href="">ADMIN</a>
			  <ul class="nav nav-pills">
			    <li class="nav-item">
			      <a class="nav-link" href="">Pendaftaran</a>
			    </li>
			    <li class="nav-item dropdown">
			      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $d['admin_nama']; ?></a>
			      <ul class="dropdown-menu">
			        <li><a class="dropdown-item" href="adm_profil.php">Profil</a></li>
			        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
			      </ul>
			    </li>
			  </ul>
		</div>
	</nav>

	<div class="container" >
		<div class="card mt-4 mb-3 p-4">
			<div class="container">
				<h3 class="text-center">Detail Pendaftar</h3>
				<hr>
				<br>
				<?php include '../koneksi.php';
				$id = $_GET['id'];
				$sql = "SELECT * FROM siswa WHERE siswa_id= '$id'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_array($result);
				?>

				<div class="row g-3 bg-light">
					<div class="col-sm-4">
						<img class="img-fluid" width="150px" src="../calon_siswa/file/<?php echo $row['siswa_foto']; ?>">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>