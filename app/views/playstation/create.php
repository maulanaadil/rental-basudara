  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Playstation</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/playstation/simpanplaystation" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control" placeholder="masukkan harga sewa playstation..." name="harga">
            </div>
            <div class="form-group">
              <label>Jenis</label>
              <select class="form-control" name="jenis-playstation">
                <option value="">Pilih</option>
                <option value="Playstation 3">Playstation 3</option>
                <option value="Playstation 4">Playstation 4</option>
                <option value="Playstation 5">Playstation 5</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <input type="hidden" name="status-peminjaman" value="tersedia" />
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->