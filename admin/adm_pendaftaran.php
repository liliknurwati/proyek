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
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
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
							<th>Aksi</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
						$sql = "SELECT * FROM siswa s LEFT JOIN pendaftaran p ON s.siswa_id = p.daftar_siswa";
						$result = mysqli_query($db, $sql);
						while($row = mysqli_fetch_array($result)){
					?>
						<tr>
							<td><?php echo $row['siswa_email']; ?></td>
							<td><?php echo $row['siswa_nama']; ?></td>
							<td><?php echo $row['siswa_jurusan']; ?></td>
							<td><?php echo $row['siswa_nilai']; ?></td>
							<td><?php echo $row['daftar_status']; ?></td>
							<td><?php echo $row['daftar_keterangan']; ?></td>
							<td><a href="adm_status_edit.php?id=<?php echo $row['siswa_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="adm_detail_siswa.php?id=<?php echo $row['siswa_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>
						<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>