  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Halaman <?= $data['title'] ?></h1>
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
                  <div class="card-body">
                    <div class="btn-group mb-3 float-right"><a href="<?= base_url; ?>/playstation/tambah" class="btn float-right btn btn-primary">Tambah Playstation</a></div>

                  <!-- <form action="<?= base_url; ?>/playstation/cari" method="post">
                      <div class="row mb-3">
                          <div class="col-lg-6">
                              <div class="input-group">
                                  <input type="text" class="form-control" placeholder="" name="key">
                                  <div class="input-group-append">
                                      <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                                      <a class="btn btn-outline-danger" href="<?= base_url; ?>/playstation">Reset</a>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </form> -->
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th style="width: 10px">#</th>
                              <th class="text-center">Jenis Playstation</th>
                              <th class="text-center">Harga</th>
                              <th class="text-center">Status Peminjaman</th>
                              <th class="text-center" style="width: 150px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1; ?>
                          <?php foreach ($data['ps'] as $row) : ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $row['jenis']; ?></td>
                                  <td class="text-right">Rp. <?= number_format($row['harga'], 2,',','.'); ?></td>
                                  <td class="text-center
                                  <?php 
                                    if ($row['status_peminjaman'] == "tersedia") {
                                        ?> text-success <?php
                                    } else {
                                        ?> text-warning <?php
                                    } 
                                  ?>
                                  "><?= strtoupper($row['status_peminjaman']);  ?></td>
                                  <td>
                                      <a href="<?= base_url; ?>/playstation/edit/<?= $row['ps_id'] ?>" class="btn btn-info">Edit</a> <a href="<?= base_url; ?>/playstation/hapus/<?= $row['ps_id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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