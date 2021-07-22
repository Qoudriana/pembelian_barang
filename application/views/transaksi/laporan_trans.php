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
                    <?php foreach ($laporan as $row) { ?>
                        <!-- <a href="<?= base_url('transaksi/print/' . $row->no_pembelian) ?>" class="btn btn-info">Print</a> -->
                        <form action="">
                            <div class="row ml-lg-5 ">
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
                    <table id="tabel" class="table table-striped table-bordered" style="width:100%">
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
                    <div class="mt-4">
                        <?php foreach ($laporan as $row) : ?>
                            <a href="<?= base_url('transaksi/print/' . $row->no_pembelian) ?>" class="btn btn-info">Print</a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>