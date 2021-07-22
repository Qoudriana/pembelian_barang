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
                                    <h3 class="card-title">FORM TAMBAH BARANG</h3>
                                </div>

                                <div class="col-auto ml-lg-auto">
                                    <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                        <form method="post" id="myform" action="<?php echo base_url('barang/simpan_barang') ?>">

                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Barang </label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="text" name="barang" id="barang" class="form-control form-control-sm col-sm-10" value="<?= set_value('nama_barang') ?>">
                                    <?= form_error('barang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Jenis</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <select name="jenis" id="jenis" class="form-control form-control-sm col-sm-10">
                                        <option value="">--Pilih Jenis--</option>
                                        <?php foreach ($jenis as $row) : ?>
                                            <option value="<?= $row->id_jenis ?>"><?= $row->jenis ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Satuan</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <select name="satuan" id="satuan" class="form-control form-control-sm col-sm-10">
                                        <option value="">--Pilih Satuan--</option>
                                        <?php foreach ($satuan as $row) : ?>
                                            <option value="<?= $row->id_satuan ?>"><?= $row->satuan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row mt-2 ml-3" hidden>
                                <div class="col-25" style="width: 25%;">
                                    <label>Stok</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input type="text" name="qty" id="qty" class="form-control form-control-sm col-sm-10" value="<?= set_value('qty') ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Harga Satuan</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <input style="text-align:right" type="text" name="harga" id="harga" class="form-control form-control-sm col-sm-10" value="<?= set_value('harga_satuan') ?>">
                                    <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2 ml-3">
                                <div class="col-25" style="width: 25%;">
                                    <label>Supplier</label>
                                </div>

                                <div class="col-75" style="width: 65%;">
                                    <select name="supplier" id="supplier" class="form-control form-control-sm col-sm-10">
                                        <option value="">--Pilih Supplier--</option>
                                        <?php foreach ($supplier as $row) : ?>
                                            <option value="<?= $row->id_supplier ?>"><?= $row->supplier ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('supplier', '<small class="text-danger">', '</small>'); ?>
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