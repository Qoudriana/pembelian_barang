<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
<!-- Alert -->
<script src="<?= base_url('assets/') ?>dist/js/alert.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/') ?>dist/js/pages/dashboard3.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/') ?>plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url('assets/') ?>bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- dtTable JS -->
<script src="<?= base_url('assets/') ?>dist/js/dtTable.js"></script>
<!-- Date Range Picker -->
<script type="text/javascript" src="<?= base_url('assets/') ?>plugins/date-range-picker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>plugins/date-range-picker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>plugins/date-range-picker/daterangepicker.css" />
<!-- MyJS -->
<script src="<?= base_url('assets/') ?>myJS.js"></script>


<!-- AdminLTE App -->
<script>
    // ALERT SIMPAN
    var flash = $('#flash-data').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Disimpan',
            showConfirmButton: false,
            timer: 1500
        })
    }

    var flash = $('#data').data('data');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Pesanan Berhasil Dibuat :)',
            showConfirmButton: false,
            timer: 1500
        })
    }


    // ALERT EDIT
    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Diubah',
            showConfirmButton: false,
            timer: 1500
        })
    }

    // ALERT HAPUS
    $(document).on('click', '#hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Yakin?',
            text: "Data Akan Dihapus !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 1500
                })
                window.location = link;
            }
        })
    })

    // ALERT LOGOUT
    $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Ingin Log Out?',
            text: "",
            icon: '',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Log Out'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
            }
        })
    })

    $(document).ready(function() {
        var table = $('#table').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
            dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false,
                autoWidth: false,
                responsive: true,
            }]
        });

        table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
    });

    // $(document).ready(function() {
    //     $('#filter').select2({
    //         placeholder: 'Pilih Supplier',
    //         allowClear: true

    //     });

    //     var t = $('#dataTable').DataTable({
    //         // "processing": true,
    //         "serveSide": true,
    //         "ordering": true,
    //         "columnDefs": [{
    //             "searchable": false,
    //             "orderable": false,
    //             "targets": 0
    //         }],
    //         "order": [
    //             [1, 'asc']
    //         ],
    //         "ajax": {
    //             "url": "transaksi/view",
    //             "type": "POST"
    //         },
    //         "deferRender": true,
    //         "aLengthMenu": [
    //             [10, 20, 30],
    //             [10, 20, 30]
    //         ],
    //         "columns": [{
    //                 "render": function(data, type, row) {
    //                     return "number";
    //                 }
    //             },
    //             {
    //                 "data": "no_pembelian"
    //             },
    //             {
    //                 "data": "tgl"
    //             },
    //             {
    //                 "data": "user"
    //             },

    //             {
    //                 "data": "supplier"
    //             },
    //             {
    //                 "data": "barang"
    //             },
    //             {
    //                 "data": "qty"
    //             },
    //             {
    //                 "data": "harga"
    //             },
    //             {
    //                 "data": "total"
    //             },
    //         ]
    //     });
    //     t.on('draw.dt', function() {
    //         var PageInfo = $('#dataTable').DataTable().page.info();
    //         t.column(0, {
    //             page: 'current'
    //         }).nodes().each(function(cell, i) {
    //             cell.innerHTML = i + 1 + PageInfo.start;
    //         });
    //     });

    //     $('#search').on('click', function() {

    //         var keyword = $('#keyword').val();
    //         var filter = $('#filter').val();

    //         t.search(keyword + " " + filter).draw();
    //     })
    //     $(".dataTables_filter").css('display', 'none');
    // });
</script>

<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
</script>
</body>

</html>