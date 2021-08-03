<?php
include '../koneksi.php';
session_start();
if (isset($_POST['rasa'])) {
  $sql = "SELECT * FROM  roti_sampai INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN toko on roti_sampai.id_toko = toko.id_toko WHERE id_ds='$_POST[rasa]'";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  $t = mysqli_fetch_array($query);
  $ds = $t['id_ds'];
  $vr = $t['id_rasa'];
  $ns = $t['id_user'];
  $nt = $t['id_toko'];
  $jml = $_POST['jumlah_kembali'];
  $st = $_POST['status_roti'];
  $tgl = $_SESSION['tanggal_cek'];

  // echo "INSERT INTO draf_kembali VALUES (NULL,'$ds','$vr','$ns','$nt','$jml','$tgl''Rusak')";
  $query = mysqli_query($koneksi, "INSERT INTO draf_kembali VALUES (Null,'$ds','$vr','$ns','$nt','$jml','$tgl','$st')") or mysqli_error($koneksi);
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
