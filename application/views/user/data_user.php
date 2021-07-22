    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="flash-data" id="flash-data" name="flash-data" data-flash="<?= $this->session->flashdata('msg') ?>"></div>
            <div class="flash" id="flash" name="flash" data-flash="<?= $this->session->flashdata('ubah') ?>"></div>
            <div class="flash-data" id="flash-data" name="flash-data" data-flash="<?= $this->session->flashdata('aktivasi') ?>"></div>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- card header -->
                            <div class="card-header">
                                <a href="<?= base_url('user/form_user') ?>"><i class="nav-icon fas fa-plus"></i><strong>Tambah User</strong></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped dt-responsive nowrap" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if ($user) :
                                            foreach ($getuser as $row) :
                                                ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->username ?></td>
                                                    <td><?= $row->email ?></td>
                                                    <td><?= $row->role ?></td>
                                                    <td><img src="<?= base_url('assets/img/' . $row->foto) ?>" alt="" width="50px" height="50px"></td>
                                                    <td>
                                                        <a href="<?= base_url('user/toggle/' . $row->id_user) ?>" class="btn btn-circle btn-sm <?= $row->status ? 'btn-secondary' : 'btn-success' ?>" title="<?= $row->status ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                                        <a href="<?php echo base_url('user/form_edit/' . $row->id_user) ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                                        <a href="<?php echo base_url('user/hapus_user/' . $row->id_user) ?>" class="btn btn-circle btn-sm btn-danger" id="hapus"><i class="fa fa-fw fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                            else : ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Silahkan tambahkan user baru</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->