<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></li>
                            <li class="breadcrumb-item active">Ubah Password</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- <div class="sukses" id="sukses" name="sukses" data-flash="<?= $this->session->flashdata('sukses') ?>"></div> -->
                <?= $this->session->flashdata('error') ?>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card  card-primary card-outline">
                            <div class="card-body">


                                <form action="<?= base_url('profile/ubahPassword') ?>" method="post">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Password Lama</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="psw_lama" name="psw_lama">
                                            <?= form_error('psw_lama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Password Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="psw_baru1" name="psw_baru1">
                                            <?= form_error('psw_baru1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="psw_baru2" name="psw_baru2">
                                            <?= form_error('psw_baru2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>


                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->

                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->