<?php
include '../koneksi.php';
$id_sales = $_POST['id_sales'];
$nama = $_POST['nama_sales'];
$user = $_POST['username'];
$pass = $_POST['pass'];
$alm = $_POST['alamat'];

$query = mysqli_query($koneksi, "UPDATE sales SET nama_sales='$nama', username='$user', alamat= '$alm' where username ='$user' ");
mysqli_query($koneksi, "UPDATE user SET username='$user', pass= '$pass' where username ='$user' ");
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
