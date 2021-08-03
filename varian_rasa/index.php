<?php
require '../koneksi.php';

include '../layouts/header.php';
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
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
        <h3 class="card-title">
          <a href="create.php" class="btn btn-primary"> New Roti </a>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Varian Rasa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM varian_rasa") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <th><?php echo $no++; ?></th>
                <td><?php echo $t['varian_rasa'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Varian Rasa</th>
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