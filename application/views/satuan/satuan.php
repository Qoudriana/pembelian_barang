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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- card header -->
                            <div class="card-header">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="nav-icon fas fa-plus"></i>Tambah</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped dt-responsive nowrap" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($satuan as $row) :
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->satuan ?></td>
                                                <td>
                                                    <a class="btn btn-circle" data-toggle="modal" data-target="#edit<?= $row->id_satuan ?>"><i class="fas fa-pen-square" style="color:limegreen"></i></a>
                                                    <a href="<?php echo base_url('satuan/hapus_satuan/' . $row->id_satuan) ?>" id="hapus"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><span id="target14">Tambah Satuan</span></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-data">
                    <form method="post" id="myform" action="<?= base_url('satuan/tambah_satuan') ?>">


                        <div class="row">
                            <div class="col-25" style="width: 25%;">
                                <label>Satuan </label>
                            </div>

                            <div class="col-75" style="width: 75%;">
                                <input type="text" name="satuan" id="satuan" class="form-control form-control-sm col-sm-10">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-30">
                                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL TAMBAH -->

    <!-- EDIT MODAL -->
    <?php
    $no = 1; //supaya data menyesuaikan dengan id yang di klik
    foreach ($satuan as $row) : $no++
        ?>
        <div class="modal fade" id="edit<?= $row->id_satuan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span id="target14">Edit Satuan</span></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="edit-data">
                        <form method="post" id="myform" action="<?= base_url('satuan/ubah_satuan') ?>">

                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>ID</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="id" id="id" class="form-control form-control-sm col-sm-10" value="<?= $row->id_satuan ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Satuan </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="satuan" id="satuan" class="form-control form-control-sm col-sm-10" value="<?= $row->satuan ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-30">
                                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
    <!-- END EDIT MODAL -->