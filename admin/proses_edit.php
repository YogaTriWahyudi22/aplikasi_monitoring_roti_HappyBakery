<?php
include '../koneksi.php';
$id = $_POST['id'];
$user = $_POST['username'];
$pass = $_POST['pass'];
$status = $_POST['status'];

$query = mysqli_query($koneksi, "UPDATE user SET username='$user', pass= '$pass' status = '$status' where id ='$id' ");
echo mysqli_error($koneksi);

if ($query) {
    echo "<script>
        alert('data berhasil di Edit!');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
        alert('data Bermasalah !');
        document.location.href = 'edit.php';
        </script>";
}
