<?php
include '../koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM toko WHERE id_toko='$id' ");
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
