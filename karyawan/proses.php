<?php
include '../koneksi.php';
if (isset($_POST['cek'])) {
    $name = $_POST['nama_karyawan'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $alm = $_POST['alamat_karyawan'];

    $query = mysqli_query($koneksi, "INSERT INTO karyawan VALUES (Null,'$name','$user','$alm')");
    mysqli_query($koneksi, "INSERT INTO user VALUES (Null,'$user','$pass','karyawan')");
    if ($query) {
        echo "<script>
                    alert('data berhasil diDitambahkan!');
                    document.location.href = 'index.php';
                    </script>";
    } else {
        echo "<script>
                        alert('data Bermasalah !');
                        document.location.href = 'create.php';
                        </script>";
    }
}
