<?php
include '../koneksi.php';
session_start();
$lala = $_SESSION['tanggal_cek'];

$query = mysqli_query($koneksi, "SELECT * FROM draf_keluar where tanggal = '$lala' ") or die(mysqli_error($koneksi));
$no = 1;
while ($t = mysqli_fetch_array($query)) {
    $id_rasa = $t[1];
    $nama = $t[2];
    $jml = $t[3];
    $t = mysqli_query($koneksi, "INSERT INTO roti_keluar VALUES (Null,'$id_rasa','$nama','$jml','$lala')");
    if ($t) {
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
mysqli_query($koneksi, "DELETE FROM draf_keluar WHERE tanggal='$lala' ");
