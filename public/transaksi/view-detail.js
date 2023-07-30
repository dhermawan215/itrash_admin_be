var Index = (function () {
    const csrf_token = $('meta[name="csrf-token"]').attr("content");
    var table;
    const transaksiID = $("#transaksiId").val();

    var handleTransaksiItem = function () {
        table = $("#tableItemTransaksi").DataTable({
            responsive: true,
            autoWidth: true,
            pageLength: 10,
            searching: true,
            paging: true,
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50],
            ],
            language: {
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 - 0 dari 0 data",
                infoFiltered: "",
                zeroRecords: "Data tidak di temukan",
                loadingRecords: "Loading...",
                processing: "Processing...",
            },
            columnsDefs: [
                { searchable: false, target: [0, 1] },
                { orderable: false, target: 0 },
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: url + "/admin/view-transaksi-details",
                type: "POST",
                data: {
                    _token: csrf_token,
                    transaksi_id: transaksiID,
                },
            },
            columns: [
                { data: "rnum", orderable: false },
                { data: "jenis_sampah", orderable: false },
                { data: "qty", orderable: false },
                { data: "subtotal", orderable: false },
                { data: "action", orderable: false },
            ],
            drawCallback: function (response) {
                const sumTotal = response.json.sum;
                handleTotal(sumTotal);
            },
        });
    };

    var handleTotal = function (sumTotal) {
        $("#total").val(sumTotal);
    };

    var handleAddTransaksiDetail = function () {
        $("#formTransakasiItemDetail").submit(function (e) {
            e.preventDefault();

            const form = $(this);
            let formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: url + "/admin/transaksi-detail",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success("Data Berhasil Disimpan", "Success");
                    setTimeout(function () {
                        table.ajax.reload(null, false);
                        $("#formTransakasiItemDetail").trigger("reset");
                    }, 2000);
                },
                error: function (response) {
                    $.each(response.responseJSON, function (key, value) {
                        toastr.error(value);
                    });
                },
            });
        });
    };

    var handleUpdateTotal = function () {
        $("#formTotalTransaksi").submit(function (e) {
            e.preventDefault();

            const form = $(this);
            let formData = new FormData(form[0]);

            if (confirm("apakah transaksi sudah sesuai?")) {
                $.ajax({
                    type: "POST",
                    url: url + "/admin/transaksi/proses/" + transaksiID,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        toastr.success("Data Berhasil Disimpan", "Success");
                        setTimeout(function () {
                            document.location.href =
                                url +
                                "/admin/transaksi/success/" +
                                response.data;
                        }, 4000);
                    },
                    error: function (response) {
                        $.each(response.responseJSON, function (key, value) {
                            toastr.error(value);
                        });
                    },
                });
            }
        });
    };

    var handleDeleteItem = function () {
        $(document).on("click", ".btnDelete", function () {
            const idButton = $(this).data("id");
            if (confirm("apakah anda yakin?")) {
                $.ajax({
                    type: "DELETE",
                    url: url + "/admin/transaksi-detail/" + idButton,
                    data: {
                        _token: csrf_token,
                    },
                    success: function (response) {
                        toastr.success("Data Berhasil Disimpan", "Success");
                        table.ajax.reload();
                    },
                    error: function (response) {
                        $.each(response.responseJSON, function (key, value) {
                            toastr.error(value);
                        });
                    },
                });
            }
        });
    };

    var handleEditItem = function () {
        $(document).on("click", ".btnEdit", function () {
            const idButton = $(this).data("id");

            $.ajax({
                type: "POST",
                url: url + "/admin/transaksi-item-detail/" + idButton,
                data: {
                    _token: csrf_token,
                },
                success: function (response) {
                    const dataResponse = response.data;
                    $("#editItemTransaksiDetail").modal("toggle");
                    $("#namaItem").html(
                        dataResponse.jenis_sampah_transaksi.nama_sampah
                    );
                    $("#editIndex").val(dataResponse.id);
                    $("#qtyEdit").val(dataResponse.qty);
                    $("#subTotalEdit").val(dataResponse.subtotal);
                },
                error: function (response) {
                    $.each(response.responseJSON, function (key, value) {
                        toastr.error(value);
                    });
                },
            });
        });
    };

    var handleUpdateItem = function () {
        $("#formEditItemTransaksi").submit(function (e) {
            e.preventDefault();

            const form = $(this);
            let formData = new FormData(form[0]);
            const itemId = $("#editIndex").val();
            if (confirm("apakah data sudah sesuai?")) {
                $.ajax({
                    type: "POST",
                    url: url + "/admin/transaksi-item-detail/" + itemId,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        toastr.success("Data Berhasil Diperbarui", "Success");
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    },
                    error: function (response) {
                        $.each(response.responseJSON, function (key, value) {
                            toastr.error(value);
                        });
                    },
                });
            }
        });
    };
    return {
        init: function () {
            handleAddTransaksiDetail();
            handleTransaksiItem();
            handleUpdateTotal();
            handleDeleteItem();
            handleEditItem();
            handleUpdateItem();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
