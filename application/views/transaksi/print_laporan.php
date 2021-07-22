<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <table>
                        <tr>
                            <td><img src="<?= base_url('assets/img/logo/SUBUR-JAYA.png') ?>" alt=""></td>
                            <td>
                                <center>
                                    <h1> <b> PO Subur Jaya </b></h1>
                                    <font size="3">Jl. KH Hasyim Ashari No. 27, Rt002/001, Kenanga, Kec. Cipondoh, Kota Tangerang, Banten 15146</font><br>
                                    <font size="2">No Telp : 0812-2661-7700</font>
                                </center>
                            </td>
                        </tr>
                    </table>
                    <hr style="border: 1px solid black;">
                    <?php foreach ($laporan as $row) { ?>
                        <form action="">
                            <div class="row ml-lg-5">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">No Pembelian</label>
                                        <label for="" style="margin-left:3rem">:</label>
                                        <input type="text" name="nopem" id="nopem" value="<?= $row->no_pembelian ?>" style="border:none;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <label for="" style="margin-left:3rem">:</label>
                                        <input type="text" name="tgl" id="tgl" value="<?= date('d M Y', strtotime($row->tgl)) ?>" style="border:none;">
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-lg-5">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Supplier</label>
                                        <label for="" style="margin-left:5.4rem">:</label>
                                        <input type="text" name="nopem" id="nopem" value="<?= $row->supplier ?>" style="border:none;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">User</label>
                                        <label for="" style="margin-left:4.4rem">:</label>
                                        <input type="text" name="user" id="user" value="<?= $row->name ?>" style="border:none;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>Barang</th>
                            <th>Qty</th>
                            <th>Harga Barang</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php
                            $grandTotal = 0;
                            foreach ($detail as $dt) : ?>
                                <tr>
                                    <td><?= $dt->barang ?></td>
                                    <td><?= $dt->qty ?></td>
                                    <td align="right"><?= 'Rp ' . number_format($dt->harga, 0, '.', '.') ?></td>
                                    <td align="right"><?= 'Rp ' . number_format($dt->total, 0, '.', '.') ?></td>
                                </tr>
                            <?php
                                $grandTotal = $grandTotal + $dt->total;
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <td colspan="3">Total Bayar</td>
                            <td align="right"> <?= 'Rp ' . number_format($grandTotal, 0, '.', '.') ?> </td>
                        </tfoot>
                    </table>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td width="800"></td>
                            <td>
                                <?php foreach ($laporan as $row) : ?>
                                    <font>Tangerang, <?= date('d M Y', strtotime($row->tgl)) ?></font>
                                    <br><br><br><br>
                                    <font style="margin-left:1.5rem"> Ahmad Khoironi</font>

                                <?php endforeach ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<footer style=" background-color: #fff; color: #869099;padding: 1rem;">


    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div> -->
</footer>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script>
    window.print();
</script>