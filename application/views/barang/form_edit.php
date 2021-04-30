<div class="form-supplier">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                    Form Tambah Supplier
                                </h4>
                            </div>
                            <div class="col-auto">
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
                    <div class="card-body">
                        <?php
                        foreach ($barang as $row) :
                            ?>
                            <form method="post" id="myform" action="<?php echo base_url('barang/ubah_barang') ?>" style="margin-left: 10%;">
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
                                <br>
                                <div class="row" hidden>
                                    <div class="col-25" style="width: 25%;">
                                        <label>Stok</label>
                                    </div>

                                    <div class="col-75" style="width: 75%;">
                                        <input type="text" name="qty" id="qty" class="form-control form-control-sm col-sm-10" value="<?= $row->stok ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-25" style="width: 25%;">
                                        <label>Harga Satuan </label>
                                    </div>

                                    <div class="col-75" style="width: 75%;">
                                        <input type="text" name="harga" id="harga" class="form-control form-control-sm col-sm-10" value="<?= $row->harga_satuan ?>">
                                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-30">
                                        <button type="submit" class="btn btn-success">SAVE</button>
                                        <button type="reset" class="btn btn-primary" value="clear"> CLEAR</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>