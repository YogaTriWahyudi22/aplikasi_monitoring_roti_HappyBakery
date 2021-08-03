<?php
include '../koneksi.php';

if (isset($_POST['cek'])) {
  $name = $_POST['nama_toko'];
  $tk = $_POST['alamat'];

  $query = mysqli_query($koneksi, "INSERT INTO toko VALUES (Null,'$name','$tk')");

  if ($query) {
    echo "<script>
          alert('data berhasil diTambahkan!');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
          alert('data Bermasalah !');
          document.location.href = 'create.php';
          </script>";
  }
}
