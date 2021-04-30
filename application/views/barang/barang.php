<?php if ($this->session->userdata('role') == 'Admin') { ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stok Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
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
                                <a href="<?= base_url('barang/tambah_barang') ?>"><i class="nav-icon fas fa-plus"></i><strong>Tambah Barang</strong></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier</th>
                                            <th>Barang</th>
                                            <th>Stok</th>
                                            <th>Harga Satuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $n = 1;
                                            foreach ($barang as $row) : ?>

                                            <tr>
                                                <td><?php echo $n++; ?></td>
                                                <?php foreach ($supplier as $key => $sup) : ?>
                                                    <?php if ($sup->id_supplier == $row->id_supplier) : ?>
                                                        <td><?= $sup->supplier ?></td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <td><?php echo $row->nama_barang; ?></td>
                                                <td><?php echo $row->stok; ?></td>
                                                <td><?php echo $row->harga_satuan ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#editmodal<?= $row->id_barang ?>"><i class="fas fa-pen-square" style="color:limegreen"></i></a>&nbsp;|
                                                    <a href="<?php echo base_url('barang/hapus_barang/' . $row->id_barang) ?>" id="hapus"><i class="fas fa-trash-alt" style="color:red"></i></a></td>
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

    <!-- MODAL -->
    <?php
        $no = 1; //supaya data menyesuaikan dengan id yang di klik
        foreach ($barang as $row) : $no++
            ?>
        <div class="modal fade" id="editmodal<?= $row->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span id="target14">EDIT BARANG</span></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="edit-data">
                        <form method="post" id="myform" action="<?= base_url('barang/ubah_barang') ?>">
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label hidden>ID</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="id" id="id" class="form-control form-control-sm col-sm-10" value="<?= $row->id_barang ?>" hidden>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Nama Barang </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="barang" id="barang" class="form-control form-control-sm col-sm-10" value="<?= $row->nama_barang ?>">
                                </div>
                            </div>

                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Stok </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="qty" id="qty" class="form-control form-control-sm col-sm-10" value="<?= $row->stok ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Harga Satuan</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="harga" id="harga" class="form-control form-control-sm col-sm-10" value="<?= $row->harga_satuan ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Supplier</label>
                                </div>

                                <div class="col-75" style="width: 63%;">
                                    <select name="supplier" id="supplier" class="form-control form-control-sm col-sm-10">
                                        <option value="">--Pilih Supplier--</option>
                                        <?php foreach ($supplier as $sup) : ?>
                                            <option value="<?= $sup->id_supplier ?>" <?= $sup->id_supplier == $row->id_supplier ? "selected" : null ?>><?= $sup->supplier ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-30">
                                    <button type="submit" class="btn btn-success" name="edit">Simpan</button>
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
    <!-- END MODAL -->

<?php } elseif ($this->session->userdata('role') == 'Gudang') { ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stok Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="flash" id="flash" name="flash" data-flash="<?= $this->session->flashdata('ubah') ?>"></div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barang</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $n = 1;
                                            foreach ($barang as $row) : ?>

                                            <tr>
                                                <td><?php echo $n++; ?></td>
                                                <td><?php echo $row->nama_barang; ?></td>
                                                <td><?php echo $row->stok; ?></td>
                                                <td hidden><?php echo $row->harga_satuan; ?></td>
                                                <td>
                                                    <center><a data-toggle="modal" data-target="#editmodal<?= $row->id_barang ?>"><i class="fas fa-pen-square" style="color:limegreen"></i></a></center>
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

    <!-- MODAL -->
    <?php
        $no = 1; //supaya data menyesuaikan dengan id yang di klik
        foreach ($barang as $row) : $no++
            ?>
        <div class="modal fade" id="editmodal<?= $row->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span id="target14">EDIT BARANG</span></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="edit-data">
                        <form method="post" id="myform" action="<?= base_url('barang/ubah_barang') ?>">
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label hidden>ID</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="id" id="id" class="form-control form-control-sm col-sm-10" value="<?= $row->id_barang ?>" hidden>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Nama Barang </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="barang" id="barang" class="form-control form-control-sm col-sm-10" value="<?= $row->nama_barang ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Stok </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="qty" id="qty" class="form-control form-control-sm col-sm-10" value="<?= $row->stok ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Harga Satuan</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="harga" id="harga" class="form-control form-control-sm col-sm-10" value="<?= $row->harga_satuan ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Supplier</label>
                                </div>

                                <div class="col-75" style="width: 63%;">
                                    <select name="supplier" id="supplier" class="form-control form-control-sm col-sm-10">
                                        <option value="">--Pilih Supplier--</option>
                                        <?php foreach ($supplier as $row) : ?>
                                            <option value="<?= $row->id_supplier ?>"><?= $row->supplier ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-30">
                                    <button type="submit" class="btn btn-success" name="edit">Simpan</button>
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
<?php }; ?>