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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
	
</head>
<body>
	<?php include '../koneksi.php';
	$sql = "SELECT * FROM siswa s LEFT JOIN pendaftaran p ON s.siswa_id = p.daftar_siswa WHERE siswa_email = '$_SESSION[email]'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	?>

	<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
		<div class="container">
			<a class="navbar-brand" href="halaman_awal.php">CALON SISWA</a>
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

	<div class="container" >
		<div class="card mt-4 mb-3 p-4">
			<div class="container">
				<h3 class="text-center">Info Pendaftaran</h3>
				<hr>
				<br>
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Email</th>
							<th>Nama</th>
							<th>Jurusan</th>
							<th>Rata Rapot</th>
							<th>Status</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $row['siswa_email']; ?></td>
							<td><?php echo $row['siswa_nama']; ?></td>
							<td><?php echo $row['siswa_jurusan']; ?></td>
							<td><?php echo $row['siswa_nilai']; ?></td>
							<td><?php echo $row['daftar_status']; ?></td>
							<td><?php echo $row['daftar_keterangan']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br><a href="export.php">Cetak Bukti Pendaftaran</a>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>