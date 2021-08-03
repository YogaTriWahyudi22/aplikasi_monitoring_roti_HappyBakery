<?php
session_start();
if ($_GET['roti'] == 'roti_masuk') {
    unset($_SESSION['tanggal_cek']);
    header('location:../roti_masuk/index.php');
} elseif ($_GET['roti'] == 'roti_keluar') {
    unset($_SESSION['tanggal_cek']);
    header('location:../roti_keluar/index.php');
} elseif ($_GET['roti'] == 'roti_sampai') {
    unset($_SESSION['tanggal_cek']);
    header('location:../barang_toko/index.php');
} elseif ($_GET['roti'] == 'roti_kembali') {
    unset($_SESSION['tanggal_cek']);
    header('location:../roti_kembali/index.php');
}
