<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto">
                                    <h3>Buat Pesanan</h3>
                                </div>
                                <div class="col-auto ml-lg-auto">
                                    <input type="button" value="Save" id="save" class="btn btn-success">
                                    <input type="button" value="Clear" id="clear" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <?php foreach ($laporan as $row) : ?>
                            <div class="card-body">
                                <form aaction="" method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>No Pembelian</label>
                                                <input type="text" id="idpembelian" name="idpembelian" style="width:300px" class="form-control" value="<?= $row->no_pembelian ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input name="tanggal" type="text" class="form-control" value="<?= $row->tgl ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <select id="supplier" class="select2 form-control idsupplier" style="width: 300px;">
                                                    <option value="">Pilih Supplier</option>
                                                    <?php foreach ($laporan as $lap) : ?>
                                                        <option value="<?= $lap->id_supplier ?>" <?= $lap->id_supplier == $row->id_supplier ? "selected" : null ?>><?= $lap->supplier ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>User</label>
                                                <input class="form-control mr-lg-5" type="text" name="user" id="user" style="width:300px" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- input states -->


                                    <div class="form-group">
                                        <table class="table table-striped table-bordered" style="width:100%" align="center">
                                            <tr>
                                                <th>Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td width="15%">
                                                    <select id="idbarang" name="idbarang" class="form-control">
                                                        <option value="">--Pilih Barang--</option>
                                                    </select>
                                                </td>
                                                <td width="15%" style="display:none;"><input type="text" id="nama_barang" class="form-control"></td>
                                                <td width="15%"><input type="text" id="qty" class="form-control"></td>
                                                <td width="15%"><input type="text" id="harga" class="form-control"></td>
                                                <td width="15%"><input type="text" id="total" class="form-control"></td>
                                                <td width="15%" align="center"><input class="btn btn-success" type="button" value="Tambah" id="insert">
                                                    <input class="btn btn-danger" type="button" value="Hapus" id="delete-row">
                                                </td>

                                            </tr>
                                        </table>
                                        <table id="example" class="table table-bordered" style="width:100%" align=center>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        <?php endforeach; ?>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<!-- /.content -->