<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM draf_kembali WHERE id_dk='$id' ");
echo mysqli_error($koneksi);

if ($query) {
    echo "<script>
          alert('data berhasil di hapus!');
          document.location.href = 'draf.php';
          </script>";
} else {
    echo "<script>
          alert('data bermasalah!');
          document.location.href = 'draf.php';
          </script>";
}
