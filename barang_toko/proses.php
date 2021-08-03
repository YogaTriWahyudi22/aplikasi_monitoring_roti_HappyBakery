<?php
include '../koneksi.php';
session_start();

if (isset($_POST['cek'])) {
  $vr = $_POST['rasa'];
  $sales =  $_SESSION['id'];
  $tk = $_POST['nama_toko'];
  $jml = $_POST['jumlah'];
  $tgl = $_SESSION['tanggal_cek'];

  $query = mysqli_query($koneksi, "INSERT INTO draf_sales VALUES (Null,'$vr','$sales','$tk','$jml','$tgl')") or mysqli_error($koneksi);
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
