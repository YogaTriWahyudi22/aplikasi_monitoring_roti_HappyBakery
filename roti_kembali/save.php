<?php
include '../koneksi.php';
session_start();
$lala = $_SESSION['tanggal_cek'];

$query = mysqli_query($koneksi, "SELECT * FROM draf_kembali where tanggal_kembali = '$lala' ") or die(mysqli_error($koneksi));
$no = 1;
while ($t = mysqli_fetch_array($query)) {
    $id_ds = $t['id_ds'];
    $id_rasa = $t['id_rasa'];
    $id_user = $t['id_user'];
    $id_toko = $t['id_toko'];
    $jml_kembali = $t['jumlah_kembali'];
    $tgl_kembali = $t['tanggal_kembali'];
    $status = $t['status_roti'];


    $t = mysqli_query($koneksi, "INSERT INTO roti_kembali VALUES (Null,'$id_ds','$id_rasa','$id_user','$id_toko','$jml_kembali','$tgl_kembali','$status')");
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
}
mysqli_query($koneksi, "DELETE FROM draf_kembali WHERE tanggal_kembali='$lala' ");
