<?php
include '../koneksi.php';

if (isset($_POST['cek'])) {
	$rasa = $_POST['varian_rasa'];

	$query = mysqli_query($koneksi, "INSERT INTO varian_rasa VALUES (Null,'$rasa')");
	if ($query) {
		header('location:index.php');
	} else {
		header('location:create.php');
	}
}
