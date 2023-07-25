var Index = (function () {
    const csrf_token = $('meta[name="csrf-token"]').attr("content");
    var table;

    var handleData = function () {
        table = $("#tablePembayaran").DataTable({
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
                url: url + "/admin/pembayarans",
                type: "POST",
                data: {
                    _token: csrf_token,
                },
            },
            columns: [
                { data: "rnum", orderable: false },
                { data: "no_tr", orderable: false },
                { data: "nasabah", orderable: false },
                { data: "total", orderable: false },
                { data: "tanggal", orderable: false },
                { data: "action", orderable: false },
            ],
        });
        $("#tablePembayaran tbody").on("click", "tr", function () {
            // console.log(table.row(this).data());
            handleShowInModal(table.row(this).data());
        });
    };

    var handleShowInModal = function (param) {
        $("#noTransaksi").html(param.no_tr);
        $("#Nasabah").html(param.nasabah);
        $("#TotalPembayaran").html(param.total);
        $("#TanggalPembayaran").html(param.tanggal);
        $("#KeteranganPembayaran").html(param.keterangan);
    };
    return {
        init: function () {
            handleData();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
