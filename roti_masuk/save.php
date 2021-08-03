<?php
include '../koneksi.php';
session_start();
$lala = $_SESSION['tanggal_cek'];

$query = mysqli_query($koneksi, "SELECT * FROM draf where tanggal = '$lala' ") or die(mysqli_error($koneksi));
$no = 1;
while ($t = mysqli_fetch_array($query)) {
    $id_rasa = $t['id_rasa'];
    $id_user = $t['id_user'];
    $jml = $t['jumlah'];
    $t = mysqli_query($koneksi, "INSERT INTO roti_masuk VALUES (Null,'$id_rasa','$id_user','$jml','$lala')");

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
mysqli_query($koneksi, "DELETE FROM draf WHERE tanggal='$lala' ");
