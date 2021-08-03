<?php
session_start();
$tgl = $_POST['tanggal_cek'];

$_SESSION['tanggal_cek'] = $tgl;
if ($_POST['halaman'] == 'roti_sampai') {
    header('location:roti_sampai.php');
} elseif ($_POST['halaman'] == 'roti_keluar') {
    header('location:roti_keluar.php');
} elseif ($_POST['halaman'] == 'rekapitulasi') {
    header('location:rekapitulasi.php');
} elseif ($_POST['halaman'] == 'roti_kembali') {
    header('location:roti_kembali.php');
} elseif ($_POST['halaman'] == 'roti_masuk') {
    header('location:roti_masuk.php');
}
exit;
