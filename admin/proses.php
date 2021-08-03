<?php
include '../koneksi.php';
if (isset($_POST['cek'])) {
  $name = $_POST['username'];
  $pass = $_POST['pass'];
  $status = $_POST['status'];
  $query = mysqli_query($koneksi, "INSERT INTO user VALUES (Null,'$name','$pass','$status')");

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
