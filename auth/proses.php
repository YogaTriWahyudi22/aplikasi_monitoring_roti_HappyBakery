<?php
session_start();
include '../koneksi.php';
if (isset($_POST['cek'])) {
	$user = $_POST['username'];
	$pass = $_POST['pass'];

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' and pass = '$pass' ") or die(mysqli_error($koneksi));
	if (mysqli_num_rows($query) == 1) {
		$am = mysqli_fetch_assoc($query);
		if ($am['status'] == 'admin') {

			$_SESSION['nama'] = $user;
			$_SESSION['status'] = $am['status'];
			header('location:../home/index.php');
			exit;
		} elseif ($am['status'] == 'pimpinan') {
			$_SESSION['nama'] = $user;
			$_SESSION['status'] = $am['status'];
			header('location:../home/index.php');
		} elseif ($am['status'] == 'karyawan') {
			$_SESSION['nama'] = $user;
			$_SESSION['status'] = $am['status'];
			$_SESSION['id'] = $am['id'];
			header('location:../home/index.php');
		} elseif ($am['status'] == 'sales') {
			$_SESSION['nama'] = $user;
			$_SESSION['status'] = $am['status'];
			$_SESSION['id'] = $am['id'];
			header('location:../home/index.php');
		} else {
			$_SESSION['nama'] = $user;
			$_SESSION['status'] = $am['status'];
			header('location:/auth/login.php');
		}
	} else {
		header("location:../index.php?pesan=gagal") or die(mysqli_error($koneksi));
	}
}
