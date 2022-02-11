<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $data['title']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center d-block">
                <img sr="./public/asseets/logo.png" alt="Ini ceritanya gambar" class="img-fluid w-100">
                <h4 class="h5 text-center font-weight-light">Silahkan memilih jenis Playstation dan tanggal penyewaannya <br />lalu isi identitas anda. </h3>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <?= Flasher::MessagePelanggan() ?>
                    <form action="<?= base_url; ?>/customer/simpancustomer" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="nama">Nama</label>
                            </div>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama" aria-label="nama" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="no_hp">No Handphone</label>
                            </div>
                            <input type="tel" name="no_hp" id="no_hp" class="form-control" placeholder="Masukan no handphone" aria-label="no-hp" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="email">Email</label>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email" aria-label="email" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="jenis-playstation">Jenis Playstation</label>
                            </div>
                            <select class="custom-select" id="jenis-playstation" name="jenis-playstation">
                                <option selected>Pilih Playstation</option>
                                <?php
                                $i = 0;
                                foreach ($data['ps'] as $ps) {
                                ?>
                                    <option value="<?= $ps['jenis'] ?>"><?= $ps['jenis'] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <!-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="jenis-playstation">Jenis Playstation</label>
                            </div>
                            <select class="custom-select" id="jenis-playstation" name="jenis-playstation">
                                <option selected>Pilih Playstation</option>
                                <option value="Playstation 3">Playstation 3</option>
                                <option value="Playstation 4">Playstation 4</option>
                                <option value="Playstation 5">Playstation 5</option>
                            </select>
                        </div> -->

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="tanggal">Tanggal Sewa</label>
                            </div>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" aria-label="tanggal" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="tanggal_kembali">Tanggal Kembali</label>
                            </div>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" placeholder="Pilih Tanggal Kembali" aria-label="tanggal" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload" name="bukti_pembayaran" required aria-describedby="upload">
                                <label class="custom-file-label" for="inputGroupFile01">Upload Bukti Pembayaran</label>
                            </div>
                        </div>

                        <div class="d-inline float-right">
                            <input type="reset" class="btn btn-outline btn-danger">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


    </div>
    <!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="./public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./public/dist/js/demo.js"></script>
</body>

</html>