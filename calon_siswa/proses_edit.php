<?php
	include '../koneksi.php';
	
	if(isset($_POST['submit'])){

	$id = $_POST['id'];
	$tempat = $_POST['tempat'];
	$lahir = $_POST['tl'];
	$alamat = $_POST['alamat'];
	$sekolah = $_POST['asal'];
	$telp = $_POST['telp'];;
	$gender = $_POST['gender'];
	$nilai = $_POST['nilai'];
	$jurusan = $_POST['jurusan'];

	$dir = "file/";
	$foto = $_FILES['file']['name'];

			move_uploaded_file($_FILES['file']['tmp_name'], $dir.$foto);
			$sql = "UPDATE siswa SET siswa_tempat_lahir = '$tempat', siswa_ttl = '$lahir', siswa_sekolah = '$sekolah', siswa_alamat='$alamat', siswa_notelp = '$telp', siswa_nilai ='$nilai', siswa_jurusan='$jurusan', gender ='$gender', siswa_foto ='$foto' WHERE siswa_id = '$id'";

			$result = mysqli_query($db, $sql);
			header("Location: halaman_awal.php?Sukses");
	}
?>