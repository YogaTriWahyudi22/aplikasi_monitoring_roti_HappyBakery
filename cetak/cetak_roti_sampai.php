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
        <h3>Cetak Laporan Roti Keluar</h3>
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
                    <th>Varian Rasa</th>
                    <th>Jumlah</th>
                    <th>Nama Sales</th>
                    <th>Nama Toko</th>
                    <th>Alamat Toko</th>
                    <th>tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['tanggal_cek'])) {
                    $tgl = $_SESSION['tanggal_cek'];
                    $query = mysqli_query($koneksi, "SELECT * FROM roti_sampai INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN toko ON roti_sampai.id_toko = toko.id_toko Where tanggal = '$tgl'") or die(mysqli_error($koneksi));
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM roti_sampai INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN toko ON roti_sampai.id_toko = toko.id_toko ORDER BY tanggal ASC ") or die(mysqli_error($koneksi));
                }



                $no = 1;
                while ($t = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $t['varian_rasa'] ?></td>
                        <td><?php echo $t['jumlah'] ?></td>
                        <td><?php echo $t['username'] ?></td>
                        <td><?php echo $t['nama_toko'] ?></td>
                        <td><?php echo $t['alamat'] ?></td>
                        <td><?php echo $t['tanggal'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
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