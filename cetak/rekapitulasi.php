<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container my-2">
        <img src="../gambar/logo.jpg" width="70">
        <span class="fst-italic">Happy Bakery</span>
    </div>
    <div class="container my-5">
        <h3>Cetak Rekapitulasi</h3>
        <div class="float-end">
            <?php
            $tgl = date('d-m-Y');
            echo $tgl;
            ?>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jumlah Roti Masuk</th>
                    <th>Jumlah Roti Keluar</th>
                    <th>Jumlah Roti Sampai</th>
                    <th>Jumlah Roti Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['tanggal_cek'])) {
                    $tgl = $_SESSION['tanggal_cek'];
                    $query = mysqli_query($koneksi, "SELECT (SELECT sum(roti_masuk.jumlah) FROM roti_masuk WHERE roti_masuk.tanggal = '$tgl') as jumlahrotimasuk, (SELECT sum(roti_keluar.jumlah) FROM roti_keluar WHERE roti_keluar.tanggal = '$tgl') as jumlahrotikeluar, (SELECT sum(roti_sampai.jumlah) FROM roti_sampai WHERE roti_sampai.tanggal = '$tgl') as jumlahrotisampai, (SELECT sum(roti_kembali.jumlah_kembali) FROM roti_kembali WHERE roti_kembali.tanggal_kembali = '$tgl') as jumlahrotikembali") or die(mysqli_error($koneksi));
                } else {
                    $query = mysqli_query($koneksi, "SELECT (SELECT sum(roti_masuk.jumlah) FROM roti_masuk) as jumlahrotimasuk, (SELECT sum(roti_keluar.jumlah) FROM roti_keluar) as jumlahrotikeluar, (SELECT sum(roti_sampai.jumlah) FROM roti_sampai) as jumlahrotisampai, (SELECT sum(roti_kembali.jumlah_kembali) FROM roti_kembali) as jumlahrotikembali") or die(mysqli_error($koneksi));
                }

                $no = 1;
                while ($p = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td>
                            <?php
                            if ($p['jumlahrotimasuk']) {
                                echo $p['jumlahrotimasuk'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if ($p['jumlahrotikeluar']) {
                                echo $p['jumlahrotikeluar'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if ($p['jumlahrotisampai']) {
                                echo $p['jumlahrotisampai'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if ($p['jumlahrotikembali']) {
                                echo $p['jumlahrotikembali'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <div class="float-end mt-4">
            <div class="mb-5"> Mengetahui </div>
            Pimpinan<p class="fst-italic">Happy Bakery</p>
        </div>
    </div>
    <script>
        window.print();
    </script>

</body>

</html>