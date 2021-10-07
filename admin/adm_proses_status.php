<?php
	include '../koneksi.php';
	$id = $_POST['id_siswa'];
	$status = $_POST['status'];
	$keterangan = $_POST['keterangan'];

	$query = "SELECT*FROM pendaftaran WHERE daftar_siswa='$id'";
	$result = mysqli_query($db, $query);

	if($result->num_rows == 0){
		mysqli_fetch_assoc($result);
		$sql= "INSERT INTO pendaftaran SET daftar_siswa ='$id', daftar_status = '$status', daftar_keterangan ='$keterangan'";
		mysqli_query($db, $sql);
		header("Location: adm_pendaftaran.php");
	}
	if($result->num_rows == 1){
		mysqli_fetch_assoc($result);
		$sql= "UPDATE pendaftaran SET daftar_siswa ='$id', daftar_status = '$status', daftar_keterangan ='$keterangan' WHERE daftar_siswa='$id'";
		mysqli_query($db, $sql);
		header("Location: adm_pendaftaran.php");
	}

?>