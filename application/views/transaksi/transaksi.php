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
                            <!-- <form id="form-filter" class="form-horizontal"> -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <input name="reportrange" type="text" class="form-control" placeholder="Pilih Tanggal" value="<?= date('d/m/Y') ?>" style="width:300px" id="reportrange">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cari</label>
                                <div class="col-sm-4">
                                    <input name="keyword" type="text" class="form-control" style="width:300px" id="keyword">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Supplier</label>
                                <div class="col-sm-10">
                                    <select id="filter" name="filter" class="select2 form-control idsupplier" style="width: 300px;">
                                        <option value="">All</option>
                                        <?php foreach ($supplier as $row) : ?>
                                            <option value="<?php echo $row->id_supplier; ?>"><?php echo $row->supplier; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- button -->
                            <button id="search" name="search" class="btn btn-primary">Cari</button>
                            <button id="btn-reset" type="button" name="btn-reset" class="btn btn-warning">Reset</button>
                            <!-- </form> -->
                            <div class="form-group mt-4">
                                <table id="table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pembelian</th>
                                            <th>Tanggal</th>
                                            <th>Supplier</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        dataTableShow();

        function dataTableShow(supplier = '', dateRange = '') {

            var t = $('#table').DataTable({
                "processing": true,
                "serveSide": true,
                "ordering": true,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [
                    [1, 'desc']
                ],
                "ajax": {
                    "url": "<?= base_url('transaksi/view') ?>",
                    "type": "POST",
                    "data": {
                        "supplier": supplier,
                        "dateRange": dateRange
                    }
                },
                "deferRender": true,
                "aLengthMenu": [
                    [5, 10, 20, 30],
                    [5, 10, 20, 30]
                ],
                "columns": [{
                        "render": function(data, type, row) {
                            return "number";
                        }
                    },
                    {
                        "data": "no_pembelian"
                    },

                    {
                        "data": "tgl"
                    },
                    {
                        "data": "supplier"
                    },
                    {
                        data: "no_pembelian",
                        render: function(data, type, row) {
                            return type === 'display' ?
                                '<a href="<?= base_url('transaksi/detail/') ?>' + data + '" class="btn btn-info">Detail</a>  <a href="<?= base_url('transaksi/hapus/') ?>' + data + '" class="btn btn-danger" id="hapus">Hapus</a>' :data
                        }
                    },
                ]
            });

            t.on('draw.dt', function() {
                var PageInfo = $('#table').DataTable().page.info();
                t.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

        }



        $('#search').on('click', function() {

            var supplier = $('#filter').val();
            var dateRange = $('#reportrange').val();

            $('#table').DataTable().destroy();
            dataTableShow(supplier, dateRange);

        })
        $(".dataTables_filter").css('display', 'none');
    });
</script>