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
            <div class="flash" id="flash" name="flash" data-flash="<?= $this->session->flashdata('hapus') ?>"></div>

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
                                            <th>Jenis</th>
                                            <th>Satuan</th>
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

                                                <?php foreach ($jenis as $key => $jen) : ?>
                                                    <?php if ($jen->id_jenis == $row->id_jenis) : ?>
                                                        <td><?= $jen->jenis ?></td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                                <?php foreach ($satuan as $key => $sat) : ?>
                                                    <?php if ($sat->id_satuan == $row->id_satuan) : ?>
                                                        <td><?= $sat->satuan ?></td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                                <td><?php echo $row->stok; ?></td>

                                                <td align="right"><?php echo 'Rp ' . number_format($row->harga_satuan, 0, '.', '.') ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#editmodal<?= $row->id_barang ?>"><i class="fas fa-pen-square" style="color:limegreen"></i></a>
                                                    |
                                                    <a href="<?php echo base_url('barang/hapus_barang/' . $row->id_barang) ?>" id="hapus"><i class="fas fa-trash-alt" style="color:red"></i></a>
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
                                    <input type="text" name="barang" id="barang" class="form-control form-control-sm col-sm-12" value="<?= $row->nama_barang ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Jenis</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <select name="jenis" id="jenis" class="form-control form-control-sm col-sm-12">
                                        <option value="">--Pilih Jenis--</option>
                                        <?php foreach ($jenis as $jen) : ?>
                                            <option value="<?= $jen->id_jenis ?>" <?= $jen->id_jenis == $row->id_jenis ? "selected" : null ?>><?= $jen->jenis ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Satuan</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <select name="satuan" id="satuan" class="form-control form-control-sm col-sm-12">
                                        <option value="">--Pilih Satuan--</option>
                                        <?php foreach ($satuan as $sat) : ?>
                                            <option value="<?= $sat->id_satuan ?>" <?= $sat->id_satuan == $row->id_satuan ? "selected" : null ?>><?= $sat->satuan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Stok </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="qty" id="qty" class="form-control form-control-sm col-sm-12" value="<?= $row->stok ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Harga Satuan</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" style="text-align:right" name="harga" id="harga" class="form-control form-control-sm col-sm-12" value="<?php echo 'Rp. ' . number_format($row->harga_satuan, 0, '.', '.') ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Supplier</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <select name="supplier" id="supplier" class="form-control form-control-sm col-sm-12">
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
                                            <th>Supplier</th>
                                            <th>Barang</th>
                                            <th>Jenis</th>
                                            <th>Satuan</th>
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

                                                <?php foreach ($supplier as $key => $sup) : ?>
                                                    <?php if ($sup->id_supplier == $row->id_supplier) : ?>
                                                        <td><?= $sup->supplier ?></td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                                <td><?php echo $row->nama_barang; ?></td>

                                                <?php foreach ($jenis as $key => $jen) : ?>
                                                    <?php if ($jen->id_jenis == $row->id_jenis) : ?>
                                                        <td><?= $jen->jenis ?></td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                                <?php foreach ($satuan as $key => $sat) : ?>
                                                    <?php if ($sat->id_satuan == $row->id_satuan) : ?>
                                                        <td><?= $sat->satuan ?></td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                                <td><?php echo $row->stok; ?></td>

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
                                    <input type="text" name="barang" id="barang" class="form-control form-control-sm col-sm-12" value="<?= $row->nama_barang ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Jenis</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <select name="jenis" id="jenis" class="form-control form-control-sm col-sm-12" aria-readonly="true">
                                        <option value="">--Pilih Jenis--</option>
                                        <?php foreach ($jenis as $jen) : ?>
                                            <option value="<?= $jen->id_jenis ?>" <?= $jen->id_jenis == $row->id_jenis ? "selected" : null ?>><?= $jen->jenis ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Jenis</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <select name="satuan" id="satuan" class="form-control form-control-sm col-sm-12">
                                        <option value="">--Pilih Satuan--</option>
                                        <?php foreach ($satuan as $sat) : ?>
                                            <option value="<?= $sat->id_satuan ?>" <?= $sat->id_satuan == $row->id_satuan ? "selected" : null ?>><?= $sat->satuan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-25" style="width: 25%;">
                                    <label>Stok </label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" name="qty" id="qty" class="form-control form-control-sm col-sm-12" value="<?= $row->stok ?>">
                                </div>
                            </div>

                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Harga Satuan</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <input type="text" style="text-align:right" name="harga" id="harga" class="form-control form-control-sm col-sm-12" value="<?php echo 'Rp. ' . number_format($row->harga_satuan, 0, '.', '.') ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Supplier</label>
                                </div>

                                <div class="col-75" style="width: 75%;">
                                    <select name="supplier" id="supplier" class="form-control form-control-sm col-sm-12">
                                        <option value="">--Pilih Supplier--</option>
                                        <?php foreach ($supplier as $sup) : ?>
                                            <option value=" <?= $sup->id_supplier ?>" <?= $sup->id_supplier == $row->id_supplier ? "selected" : null ?>><?= $sup->supplier ?></option>
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
<?php }; ?>
<!-- <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>