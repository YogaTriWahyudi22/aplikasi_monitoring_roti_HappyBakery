<?php
include '../koneksi.php';
session_start();

if (isset($_POST['cek'])) {
    $vr = $_POST['rasa'];
    $nama = $_POST['nama_sales'];
    $jml = $_POST['jumlah'];
    $tgl = $_SESSION['tanggal_cek'];

    $query = mysqli_query($koneksi, "INSERT INTO draf_keluar VALUES (Null,'$vr','$nama','$jml','$tgl')") or mysqli_error($koneksi);
    if ($query) {
        echo "<script>
                  alert('data berhasil diTambahkan!');
                  document.location.href = 'draf.php';
                  </script>";
    } else {
        echo "<script>
                  alert('data Bermasalah !');
                  document.location.href = 'create.php';
                  </script>";
    }
}
