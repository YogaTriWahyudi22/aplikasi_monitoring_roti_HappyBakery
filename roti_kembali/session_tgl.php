<?php
session_start();
$tgl = $_POST['tanggal_cek'];

$_SESSION['tanggal_cek'] = $tgl;

if ($_POST['halaman'] == 'index') {
    header('location:index.php');
} elseif ($_POST['halaman'] == 'draf') {
    header('location:draf.php');
}
exit;
