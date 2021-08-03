<?php
include '../koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM sales WHERE username='$id' ");
mysqli_query($koneksi, "DELETE FROM user WHERE username='$id' ");
echo mysqli_error($koneksi);

if ($query) {
    echo "<script>
          alert('data berhasil di hapus!');
          document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
          alert('data bermasalah!');
          document.location.href = 'index.php';
          </script>";
}
