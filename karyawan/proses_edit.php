<?php
include '../koneksi.php';

$id = $_POST['id_karyawan'];
$nama = $_POST['nama_karyawan'];
$user = $_POST['username'];
$pass = $_POST['pass'];
$alm = $_POST['alamat_karyawan'];

$query = mysqli_query($koneksi, "UPDATE karyawan SET nama_karyawan='$nama', username='$user', alamat= '$alm' where username ='$user' ");
mysqli_query($koneksi, "UPDATE user SET username='$user', pass='$pass' where username ='$user' ");
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
