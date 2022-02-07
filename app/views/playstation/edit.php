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
        <form role="form" action="<?= base_url; ?>/playstation/updatePlaystation" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="ps_id" value="<?= $data['playstation']['ps_id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Jenis</label>
              <select class="form-control" name="jenis-playstation">
                <option value="Playstation 3" <?= $data['playstation']['jenis'] == "Playstation 3" ?  "Selected" : ""; ?>>Playstation 3</option>
                <option value="Playstation 4" <?= $data['playstation']['jenis'] == "Playstation 4" ?  "Selected" : ""; ?>>Playstation 4</option>
                <option value="Playstation 5" <?= $data['playstation']['jenis'] == "Playstation 5" ?  "Selected" : ""; ?>>Playstation 5</option>
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="nummber" class="form-control" name="harga" value="<?= $data['playstation']['harga']; ?>">
            </div>
            <div class="form-group">
              <label>Status Peminjaman</label>
              <input readonly type="text" class="form-control" name="status-peminjaman" value="<?= $data['playstation']['status_peminjaman']; ?>">

            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->