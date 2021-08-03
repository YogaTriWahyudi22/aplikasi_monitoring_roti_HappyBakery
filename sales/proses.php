<?php
include '../koneksi.php';
if (isset($_POST['cek'])) {
    $name = $_POST['nama_sales'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $alm = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO sales VALUES (Null,'$name','$user','$alm')");
    mysqli_query($koneksi, "INSERT INTO user VALUES (Null,'$user','$pass','sales')");

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
