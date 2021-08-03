<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status'])) {
    header('location:../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monitoring Happy Bakery</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">


    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="../auth/logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span class="d-block text-white"><?php $nama = $_SESSION['nama'];
                                                            echo ucwords($nama); ?></span>
                    </div>
                </div>

                <!-- Sidebar Menu -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php
                        if ($_SESSION['status'] == 'karyawan') {

                        ?>

                            <li class="nav-item has-treeview">
                                <a href="../home/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../roti_masuk/index.php" class="nav-link ml-2">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    <p class="ml-2">
                                        Roti

                                    </p>
                                </a>
                            </li>

                        <?php } ?>

                        <?php
                        if ($_SESSION['status'] == 'sales') {
                        ?>
                            <li class="nav-item has-treeview">
                                <a href="../home/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="../toko/index.php" class="nav-link ml-1">
                                    <i class="fas fa-store"></i>
                                    <p class="ml-2">
                                        Toko
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../barang_toko/index.php" class="nav-link">
                                    <i class="nav-icon fas far fa-road"></i>
                                    <p>
                                        Roti sampai Ke Toko

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../roti_kembali/index.php" class="nav-link">
                                    <i class="nav-icon fas far fa-road"></i>
                                    <p>
                                        Roti Kembali

                                    </p>
                                </a>
                            </li>

                        <?php } ?>

                        <?php if ($_SESSION['status'] == 'admin') { ?>

                            <li class="nav-item has-treeview">
                                <a href="../home/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview ml-1">
                                <a href="../admin/index.php" class="nav-link">
                                    &nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;
                                    <p>
                                        Admin / Pimpinan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview ml-1">
                                <a href="../sales/index.php" class="nav-link">
                                    &nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;
                                    <p>
                                        Sales
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview ml-1">
                                <a href="../karyawan/index.php" class="nav-link">
                                    &nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;
                                    <p>
                                        Karyawan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../varian_rasa/index.php" class="nav-link ml-2">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    <p class="ml-2">
                                        Input Varian Rasa
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../roti_keluar/index.php" class="nav-link ml-2">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    <p class="ml-2">
                                        Roti Keluar
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_masuk.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Masuk
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_keluar.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Keluar
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_sampai.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Sampai Toko
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_kembali.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Kembali
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/rekapitulasi.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Rekapitulasi
                                    </p>
                                </a>
                            </li>
                        <?php } ?>


                        <?php if ($_SESSION['status'] == 'pimpinan') { ?>

                            <li class="nav-item has-treeview">
                                <a href="../home/index.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_masuk.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Masuk
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_keluar.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Keluar
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_sampai.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Sampai Toko
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/roti_kembali.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Laporan Roti Kembali
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../laporan/rekapitulasi.php" class="nav-link ml-1">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Rekapitulasi
                                    </p>
                                </a>
                            </li>
                        <?php } ?>

                        <!-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            Layout Options
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">6</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../layout/top-nav-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation + Sidebar</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Boxed</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../layout/fixed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Sidebar</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../layout/fixed-topnav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Navbar</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../layout/fixed-footer.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Footer</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../layout/collapsed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Collapsed Sidebar</p>
            </a>
            </li>
        </ul>
        </li> -->
                        <!-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Charts
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>ChartJS</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Flot</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../charts/inline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inline</p>
            </a>
            </li>
        </ul>
        </li> -->
                        <!-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
            UI Elements
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../UI/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>General</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/icons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Icons</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/buttons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Buttons</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/sliders.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sliders</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/modals.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Modals & Alerts</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/navbar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Navbar & Tabs</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/timeline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Timeline</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../UI/ribbons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ribbons</p>
            </a>
            </li>
        </ul>
        </li> -->
                        <!-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
            Forms
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>General Elements</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advanced Elements</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../forms/editors.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Editors</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../forms/validation.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Validation</p>
            </a>
            </li>
        </ul>
        </li> -->
                        <!-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
            Tables
            <i class="fas fa-angle-left right"></i>
            </p>
        </a> -->
                        <!-- <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../tables/jsgrid.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
            </a>
            </li>
        </ul> -->
                        <!-- </li> -->

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>