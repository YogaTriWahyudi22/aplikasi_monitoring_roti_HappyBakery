<?php
include '../koneksi.php';
session_start();

if (isset($_POST['cek'])) {
  $vr = $_POST['rasa'];
  $user = $_SESSION['id'];
  $jml = $_POST['jumlah'];
  $tgl = $_SESSION['tanggal_cek'];

  $query = mysqli_query($koneksi, "INSERT INTO draf VALUES (Null,'$vr','$user','$jml','$tgl')") or mysqli_error($koneksi);
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
