<?php
session_start();
if ($_GET['halaman'] == 'roti_masuk') {
    unset($_SESSION['tanggal_cek']);
    header('location:../laporan/roti_masuk.php');
} elseif ($_GET['halaman'] == 'roti_keluar') {
    unset($_SESSION['tanggal_cek']);
    header('location:../laporan/roti_keluar.php');
} elseif ($_GET['halaman'] == 'roti_sampai') {
    unset($_SESSION['tanggal_cek']);
    header('location:../laporan/roti_sampai.php');
} elseif ($_GET['halaman'] == 'roti_kembali') {
    unset($_SESSION['tanggal_cek']);
    header('location:../laporan/roti_kembali.php');
} elseif ($_GET['halaman'] == 'rekapitulasi') {
    unset($_SESSION['tanggal_cek']);
    header('location:../laporan/rekapitulasi.php');
}
