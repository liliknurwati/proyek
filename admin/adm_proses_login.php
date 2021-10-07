<?php 
include '../koneksi.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql ="SELECT * FROM admin WHERE admin_email = '$email' AND admin_password='$password'";
	$result= mysqli_query($db, $sql);

	if($result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['admin_email'];
		header("Location: adm_pendaftaran.php");
	}else{
		header("Location: adm_login.php");
	}
}

?>