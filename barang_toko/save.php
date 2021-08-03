<?php
include '../koneksi.php';
session_start();
$lala = $_SESSION['tanggal_cek'];

$query = mysqli_query($koneksi, "SELECT * FROM draf_sales where tanggal = '$lala' ") or die(mysqli_error($koneksi));
$no = 1;
while ($t = mysqli_fetch_array($query)) {
    $id_rasa = $t[1];
    $nama = $t[2];
    $tk = $t[3];
    $jml = $t[4];
}
$query = mysqli_query($koneksi, "INSERT INTO roti_sampai VALUES (Null,'$id_rasa','$nama','$tk','$jml','$lala')");
mysqli_query($koneksi, "DELETE FROM draf_sales WHERE tanggal='$lala' ");
if ($query) {
    echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
                </script>";
} else {
    echo "<script>
                alert('data Bermasalah !');
                document.location.href = 'index.php';
                </script>";
}
