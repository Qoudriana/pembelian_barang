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
                                    <h3 class="card-title">FORM EDIT SUPPLIER</h3>
                                </div>

                                <div class="col-auto ml-lg-auto">
                                    <a href="<?= base_url('admin/supplier') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                        <?php
                        foreach ($supplier as $row) :
                            ?>
                            <form method="post" id="myform" action="<?php echo base_url('admin/ubah_supplier') ?>">

                                <div class="row mt-2 ml-3">
                                    <div class="col-25" style="width: 25%;">
                                        <label hidden>ID</label>
                                    </div>

                                    <div class="col-75" style="width: 65%;">
                                        <input type="text" name="id" id="id" class="form-control form-control-sm col-sm-10" value="<?= $row->id_supplier ?>" hidden>

                                    </div>
                                </div>
                                <br>
                                <div class="row mt-2 ml-3">
                                    <div class="col-25" style="width: 25%;">
                                        <label>Supplier </label>
                                    </div>

                                    <div class="col-75" style="width: 65%;">
                                        <input type="text" name="supplier" id="supplier" class="form-control form-control-sm col-sm-10" value="<?php echo $row->supplier ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row mt-2 ml-3">
                                    <div class="col-25" style="width: 25%;">
                                        <label>No Telepon </label>
                                    </div>

                                    <div class="col-75" style="width: 65%;">
                                        <input type="text" name="telp" id="telp" class="form-control form-control-sm col-sm-10" value="<?php echo $row->telp ?>">

                                    </div>
                                </div>
                                <br>
                                <div class="row mt-2 ml-3">
                                    <div class="col-25" style="width: 25%;">
                                        <label>Alamat </label>
                                    </div>

                                    <div class="col-75" style="width: 65%;">
                                        <textarea class="form-control form-control-sm col-sm-10" name="alamat" id="alamat" cols="63" rows="5"><?php echo $row->alamat ?></textarea>

                                    </div>
                                </div>
                                <br>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="reset" class="btn btn-primary float-right">Clear</button>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>