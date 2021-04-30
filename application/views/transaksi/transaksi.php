<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Pembelian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <form class="form-horizontal" action="<?= base_url('transaksi') ?>" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input name="tanggal" type="text" class="form-control" placeholder="Periode Tanggal" style="width:300px" id="reportrange">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Supplier</label>
                                    <div class="col-sm-10">
                                        <select id="filter" class="select2 form-control idsupplier" style="width: 300px;">
                                            <option value="">Pilih Supplier</option>
                                            <?php foreach ($supplier as $row) : ?>
                                                <option value="<?php echo $row->id_supplier; ?>"><?php echo $row->supplier; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <button id="search" type="submit" name="cari" class="btn btn-warning">Cari</button>
                            </form>
                            <div class="form-group">
                                <table id="table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No Pembelian</th>
                                            <th>Tanggal</th>
                                            <th>Supplier</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($laporan as $row) : ?>

                                            <tr>
                                                <td><?php echo $row->no_pembelian; ?></td>
                                                <td><?php echo $row->tgl; ?></td>
                                                <td><?php echo $row->supplier ?></td>
                                                <td><a href="<?php echo base_url('transaksi/form_edit/' . $row->no_pembelian) ?>"><i class="fas fa-pen-square" style="color:limegreen"></i></a>&nbsp;|&nbsp;<a href="<?php echo base_url('admin/hapus/' . $row->no_pembelian) ?>" id="hapus"><i class="fas fa-trash-alt" style="color:red"></i></a></td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                        </div>
                        <!-- /.card-footer -->

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>