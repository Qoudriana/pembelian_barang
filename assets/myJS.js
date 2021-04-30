

var dataExist = 0;

$(document).ready(function () {


    var pesananDetail = [];
    var count = 0;


    $("#supplier").select2();

    //bersihkan insert header detail
    function Clear() {
        $("#supplier").val("");
        $("#idbarang").val("");
        $("#qty").focus();
        $("#total").focus();
        $("#example tr").remove();
    }


    // Menghitung total harga
    $("#qty").keyup(function () {
        var qty = parseInt($("#qty").val());
        var harga = parseInt($("#harga").val());
        var total = qty * harga
        $("#total").val(total);
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
            }
        )

    }


    function insertGrid() {

        var idpembelian = $('#idpembelian').val();
        var idbarang = $("#idbarang").val();
        var nama_barang = $('#nama_barang').val();
        var qty = $("#qty").val();
        var harga = $("#harga").val();
        var total = $("#total").val();

        pesananDetail[count] = {
            idpembelian: idpembelian,
            idbarang: idbarang,
            qty: qty,
            harga: harga,
            total: total
        };
        count = count + 1;

        var button = "<input type='checkbox' name='record'>";
        var brs = "<tr><td width='15%'>" + nama_barang + "</td>" +
            "<td width='15%'>" + qty + "</td>" +
            "<td width='15%' align='right'>" + harga + "</td>" +
            "<td width='15%' align='right'>" + total + "</td>" +
            "<td width='15%' align='center'>" + button + "</td></tr>";


        if (total > 0) $("#example").append(brs);
        clearIsianGrid();

    }

    // Hapus Row
    $("#delete-row").click(function () {
        $("#example").find('input[name="record"]').each(function () {
            if ($(this).is(":checked")) {
                $(this).parents("tr").remove();
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
                    html += '<option value=' + data[i].id_barang + '>' + data[i].nama_barang + '</option>';
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
            $("#harga").val(hargaBarang.harga);
        })
    }

    // =====================LAPORAN TRANSAKSI==========================

});
