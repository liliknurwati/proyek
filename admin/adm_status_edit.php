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
				<?php 
				include '../koneksi.php';
				$id = $_GET['id'];
				$result = mysqli_query($db, "SELECT s.*, p.* FROM siswa s LEFT JOIN pendaftaran p ON s.siswa_id = p.daftar_siswa WHERE s.siswa_id= '$id'");
				$row = mysqli_fetch_array($result);
				?>

				<form method="POST" action="adm_proses_status.php">
					<input type="hidden" value="<?php echo $row['siswa_id']; ?>" name='id_siswa'>

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
							<label><b>Status Pendaftaran</b></label><br>
							<input type="radio" name="status" value="Diterima">Diterima 
							<input type="radio" name="status" value="Cadangan">Cadangan 
							<input type="radio" name="status" value="Tidak Diterima">Tidak Diterima
						</div>
						<div class="col" class="form-control">
							<label><b>Keterangan</b></label>
							<input type="Text" name="keterangan" class="form-control bg-light">
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>