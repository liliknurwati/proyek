<?php
	include 'koneksi.php';

	$email = $_POST['email'];
	$password = $_POST['password'];
	$konfirmasi_password = $_POST['konfirmasi_password'];
	$nama= $_POST['nama'];

	if($password == $konfirmasi_password){
		$sql = "INSERT INTO siswa SET siswa_email ='$email', siswa_password='$konfirmasi_password', siswa_nama= '$nama'";
		mysqli_query($db, $sql);
		header("Location: login.php?Sukses");
	}else{
		header("Location: login.php?Gagal");
	}
?>