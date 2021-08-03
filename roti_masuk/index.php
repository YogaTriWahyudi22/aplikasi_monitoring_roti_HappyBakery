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
                        <input type="hidden" name="halaman" value="index">
                        <?php
                        if (isset($_SESSION['tanggal_cek'])) {

                            $tgl = $_SESSION['tanggal_cek'];
                        } else {
                            $tgl = date('d-m-Y');
                        }
                        ?>
                        <input type="date" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>" class="form-control">
                    </div>
                    <h3 class="card-title"><a href="draf.php" class="btn btn-primary">New Roti Masuk</a></h3>
                    <h3 class="card-title ml-2"><a href="../cetak/cetak_roti_masuk.php" target="_blank" class="btn btn-danger"><i class="fas fa-print">&nbsp;Print</i> </a></h3>
                </form>
                <h3 class="card-title ml-2"><a href="../cetak/destroy_roti.php?roti=roti_masuk" class=" btn btn-success">Reset Tanggal</a></a></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Varian Rasa</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['tanggal_cek'])) {
                            $tgl = $_SESSION['tanggal_cek'];
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_masuk INNER JOIN varian_rasa ON roti_masuk.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_masuk.id_user = user.id INNER JOIN karyawan ON roti_masuk.id_user = user.id where tanggal = '$tgl' ") or die(mysqli_error($koneksi));
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_masuk INNER JOIN varian_rasa ON roti_masuk.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_masuk.id_user = user.id INNER JOIN karyawan ON roti_masuk.id_user = user.id ORDER BY tanggal ASC ") or die(mysqli_error($koneksi));
                        }
                        $no = 1;
                        while ($t = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $t['varian_rasa'] ?></td>
                                <td><?php echo $t['nama_karyawan'] ?></td>
                                <td><?php echo $t['jumlah'] ?></td>
                                <td><?php echo $t['tanggal'] ?></td>
                            </tr>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Varian Rasa</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">tanggal</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layouts/footer.php';
?>