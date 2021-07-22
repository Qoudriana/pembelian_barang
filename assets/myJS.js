

var dataExist = 0;

$(document).ready(function () {


    var pesananDetail = [];
    var count = 0;

    var hargaInt = 0;
    var totalInt = 0;
    var totalBayarInt = 0;

    $("#supplier").select2();



    //bersihkan insert header detail
    function Clear() {
        $("#supplier").val("");
        $("#idbarang").val("");
        $("#qty").focus();
        $("#total").focus();
        $("#example tbody").remove();
        $("#ttlbayar").val("");
    }


    // Menghitung total harga
    $("#qty").keyup(function () {
        var qty = parseInt($("#qty").val());
        var hargaSplit = $("#harga").val().split('.');
        var harga = 0;
        for (var i = 0; i < hargaSplit.length; i++) {

            if (hargaSplit[i] != 'Rp') {
                harga = harga + hargaSplit[i];
            }

        }
        hargaInt = parseInt(harga.split(" ")[1])
        var total = qty * hargaInt
        $("#total").val(formatRupiah(total.toString(), 'Rp '));
    })

    // Memasukkan data ke Grid
    $("#insert").click(function () {
        insertGrid();
        clearIsianGrid();
    })

    $('#save').click(function () {
        insertHeaderDB();
        Clear();
    })

    $('#clear').click(function () {
        Clear();
    })

    function insertHeaderDB() {

        var idpembelian = $('#idpembelian').val();
        var idsupplier = $('#supplier').val();
        var user = $('#user').attr('data-id');
        var tgl = $('#tgl').val();

        $.post('pesanan/InsertHeader', {
            idpembelian: idpembelian,
            idsupplier: idsupplier,
            tgl: tgl,
            user: user
        }, function (status) {
            insertDetailDB();
        }
        )
    }



    function insertDetailDB() {

        $.post('pesanan/InsertDetail', {
            data: pesananDetail
        },
            function (status) {
                location.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'pesanan berhasil dibuat',
                    showConfirmButton: false,
                    timer: 500
                })
            }
        )

    }


    function insertGrid() {

        var idpembelian = $('#idpembelian').val();
        var idbarang = $("#idbarang").val();
        var nama_barang = $('#nama_barang').val();
        var qty = $("#qty").val();
        var harga = $("#harga").val();
        var totalString = $('#total').val();

        var totalSplit = $("#total").val().split('.');
        var total = 0;
        for (var i = 0; i < totalSplit.length; i++) {

            if (totalSplit[i] != 'Rp') {
                total = total + totalSplit[i];
            }

        }

        totalInt = parseInt(total.split(" ")[1]);

        totalBayarInt = totalBayarInt + totalInt;

        pesananDetail[count] = {
            idpembelian: idpembelian,
            idbarang: idbarang,
            qty: qty,
            harga: hargaInt,
            total: totalInt,

        };
        count = count + 1;

        var button = "<input type='checkbox' name='record'>";
        var brs = "<tr><td width='15%'>" + nama_barang + "</td>" +
            "<td width='15%'>" + qty + "</td>" +
            "<td width='15%' align='right'>" + harga + "</td>" +
            "<td width='15%' align='right'>" + totalString + "</td>" +
            "<td width='15%' align='center'>" + button + "</td></tr>";

        if (total > 0 || total != null) $("#example tbody").append(brs);
        $('#ttlbayar').val(formatRupiah(totalBayarInt.toString(), 'Rp. '));
        clearIsianGrid();

    }

    // Hapus Row
    $("#delete-row").click(function () {
        $("#example tbody").find('input[name="record"]').each(function () {
            if ($(this).is(":checked")) {
                $(this).parents("tr").remove();
                var totalSplit = $(this).parents("tr").find("td:nth-child(4)").html().split('.');
                var total = 0;
                for (var i = 0; i < totalSplit.length; i++) {

                    if (totalSplit[i] != 'Rp') {
                        total = total + totalSplit[i];
                    }

                }
                total = parseInt(total.split(" ")[1]);
                totalBayarInt = totalBayarInt - total;
                $('#ttlbayar').val(formatRupiah(totalBayarInt.toString(), 'Rp '));
            }
        });
    });

    // Clear data row jika sudah di insert
    function clearIsianGrid() {
        $("#idbarang").val("");
        $("#qty").val("");
        $("#harga").val("");
        $("#total").val("");
        $("#idbarang").focus();
    }



    $('#supplier').change(function () {
        var id = $(this).val();
        $.ajax({
            url: "pesanan/tampilBarang",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function (data) {

                var html = '';
                var i;
                html = "<option value='#'>-- Pilih Barang --</option>";
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_barang + '>' + data[i].nama_barang + ' - ' + data[i].jenis + '</option>';
                }
                $('#idbarang').html(html);

            }
        });
        return false;
    });



    $("#idbarang").change(function () {
        showHarga();
    })
    // Menampilkan Harga dari Selected Box
    function showHarga() {
        var id = $("#idbarang").val();
        $.post("pesanan/getHarga", {
            id: id
        }, function (dt) {
            var hargaBarang = JSON.parse(dt);

            $('#nama_barang').val(hargaBarang.nama_barang);
            $("#harga").val(formatRupiah(hargaBarang.harga, 'Rp '));
        })
    }

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

    // =====================LAPORAN TRANSAKSI==========================

});
