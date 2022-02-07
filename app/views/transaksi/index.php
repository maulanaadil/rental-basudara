  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Transaksi</h1>
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
                      <th>Bukti Pembayaran</th>
                      <th>Total</th>
                      <th style="width: 150px" colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <td>1</td>
                    <td>Abdul</td>
                    <td>abdul@gmail.com</td>
                    <td>Playstation 2</td>
                    <td>02 Februari 2022</td>
                    <td>02 Februari 2022</td>
                    <td>Gambar.png</td>
                    <td>Rp. 10.000</td>
                    <td>
                        <button type="button" class="btn btn-success">Accept</button>
                        <button type="button" class="btn btn-danger">Tolak</button>
                    </td>
                  
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

