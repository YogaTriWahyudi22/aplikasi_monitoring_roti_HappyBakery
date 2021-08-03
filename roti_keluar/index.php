<?php
require '../koneksi.php';

include '../layouts/header.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Monitoring Happy Bakery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <form action="session_tgl.php" method="post">
                    <div class="mb-3">
                        <?php
                        if (isset($_SESSION['tanggal_cek'])) {

                            $tgl = $_SESSION['tanggal_cek'];
                        } else {
                            $tgl = date('d-m-Y');
                        }
                        ?>
                        <input type="hidden" name="halaman" value="index">
                        <input type="date" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>" class="form-control">
                    </div>
                    <a href="draf.php" class="btn btn-primary">New Roti Keluar</a>
                    <a href="../cetak/cetak_roti_keluar.php" target="_blank" class="btn btn-danger"><i class="fas fa-print">&nbsp;Print</i> </a>
                    <a href="../cetak/destroy_roti.php?roti=roti_keluar" class="btn btn-success">Reset Tanggal</a>
                </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Varian Rasa</th>
                            <th>Jumlah Roti Keluar</th>
                            <th>Nama Sales</th>
                            <th>tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['tanggal_cek'])) {

                            $tgl = $_SESSION['tanggal_cek'];
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_keluar INNER JOIN varian_rasa ON roti_keluar.id_rasa = varian_rasa.id_rasa INNER JOIN sales ON roti_keluar.id_sales = sales.id_sales WHERE tanggal = '$tgl' ") or die(mysqli_error($koneksi));
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_keluar INNER JOIN varian_rasa ON roti_keluar.id_rasa = varian_rasa.id_rasa INNER JOIN sales ON roti_keluar.id_sales = sales.id_sales ORDER BY tanggal ASC ") or die(mysqli_error($koneksi));
                        }


                        $no = 1;
                        while ($t = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $t['varian_rasa'] ?></td>
                                <td><?php echo $t['jumlah'] ?></td>
                                <td><?php echo $t['nama_sales'] ?></td>
                                <td><?php echo $t['tanggal'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Varian Rasa</th>
                            <th>Jumlah Roti Keluar</th>
                            <th>Nama Sales</th>
                            <th>tanggal</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

<?php
include '../layouts/footer.php';
?>