<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center row-6">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- Horizontal Form -->
                    <div class="card card-info mt-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto">
                                    <h3 class="card-title">FORM TAMBAH USER</h3>
                                </div>

                                <div class="col-auto ml-lg-auto">
                                    <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                                        <span class="icon">
                                            <i class="fa fa-arrow-left"></i>
                                        </span>
                                        <span class="text">
                                            Kembali
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" id="myform" action="<?php echo base_url('user/simpan_user') ?>">

                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Nama</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="text" name="nama" id="nama" class="form-control form-control-sm col-sm-10" value="<?= set_value('nama') ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Email</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="text" name="email" id="email" class="form-control form-control-sm col-sm-10" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Username</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="text" name="username" id="username" class="form-control form-control-sm col-sm-10" value="<?= set_value('username') ?>">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Password</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="password" name="password1" id="password1" class="form-control form-control-sm col-sm-10" value="<?= set_value('password1') ?>">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Konfirmasi Password</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="password" name="password2" id="password2" class="form-control form-control-sm col-sm-10">
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Role</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <div class="custom-control custom-radio">
                                        <input <?= set_radio('role', 'Admin'); ?> value="Admin" type="radio" id="admin" name="role" class="custom-control-input">
                                        <label class="custom-control-label" for="admin">Admin</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input <?= set_radio('role', 'Gudang'); ?> value="Gudang" type="radio" id="gudang" name="role" class="custom-control-input">
                                        <label class="custom-control-label" for="gudang">Gudang</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Tanggal</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="text" value="<?= date('d/m/Y') ?>" name="tgl" id="tgl" class="form-control form-control-sm col-sm-10">

                                </div>
                            </div>
                            <br>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-primary float-right">Clear</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>