<?php
include '../koneksi.php';
if (isset($_POST['cek'])) {
    $id = $_POST['id_toko'];
    $name = $_POST['nama_toko'];
    $alm = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE toko SET nama_toko='$name', alamat= '$alm' where id_toko ='$id' ");
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
}
