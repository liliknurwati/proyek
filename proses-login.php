<?php 
include 'koneksi.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql ="SELECT * FROM siswa WHERE siswa_email = '$email' AND siswa_password='$password'";
	$result= mysqli_query($db, $sql);

	if($result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['siswa_email'];
		header("Location: calon_siswa/halaman_awal.php");
	}else{
		header("Location: login.php");
	}
}

?>