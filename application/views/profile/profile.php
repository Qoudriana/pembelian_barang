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
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="flash-data" id="flash-data" name="flash-data" data-flash="<?= $this->session->flashdata('msg') ?>"></div>
                <?= $this->session->flashdata('error') ?>
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <?= form_open_multipart('profile/ubah_profile') ?>
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/') . $user['foto']; ?>" alt="User profile picture" style="width:8rem; height:8rem">
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <center>
                                    <p>Dibuat Tanggal</p>
                                    <?= date('d F Y', $user['created_at']); ?>
                                </center>
                            </div>

                        </div>
                        <div class="form-group row ml-4">
                            <input type="file" id="foto" name="foto">
                        </div>

                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card  card-primary card-outline">

                            <div class="card-body">


                                <div class="tab-pane" id="settings">

                                    <div class="form-group row" hidden>
                                        <label for="inputName" class="col-sm-2 col-form-label">id</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="id" name="id" value="<?= $user['id_user'] ?>">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['name'] ?>">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" readonly>
                                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    </form>

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="form-group row ml-4">
                        <a href="<?= base_url('profile/ubahPassword') ?>" class="btn btn-primary">Ubah Password</a>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->