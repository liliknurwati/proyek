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
			      <a class="nav-link" href="adm_pendaftaran.php">Pendaftaran</a>
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
				<h3 class="text-center">Profil Admin</h3>
				<hr>
				<br>
				<div class="row g-3 bg-light">
						<div class="row g-3">
							<div class="col text-center">
								<label><b>Nama</b></label><br>
								<label><?php echo $d['admin_nama']; ?></label>
							</div>
							<div class="col text-center">
								<label><b>E-mail</b></label><br>
								<label><?php echo $d['admin_email']; ?></label>
							</div>
							<div class="col text-center">
								<label><b>No. Telepon</b></label><br>
								<label><?php echo $d['admin_notelp']; ?></label>
							</div>
						</div>
				</div>

			</div>
		</div>
	</div>
	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>