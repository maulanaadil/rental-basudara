  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Peminjaman</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Berikut merupakan data <?= $data['title'] ?> customer yang harus diperbaharui</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis PS</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Status Pembayaran</th>
                      <th style="width: 150px" colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data['peminjaman'] as $row) : ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['jenis'] ?></td>
                      <td><?= $row['tanggal_pinjam'] ?></td>
                      <td><?= $row['tanggal_kembali'] ?></td>
                      <td><?= $row['status'] ?></td>
                      <td>
                        <a href="<?= base_url; ?>/peminjaman/dipinjam/<?= $row['ps_id'] ?>" class="btn btn-success">Dipinjamkan</a>
                      </td>
                    </tr>
                  <?php $no++;
                    endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

