var Index = (function () {
    const csrf_token = $('meta[name="csrf-token"]').attr("content");
    var table;

    var handleData = function () {
        table = $("#tableKategoriSampah").DataTable({
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
                url: url + "/admin/kategori-sampahs",
                type: "POST",
                data: {
                    _token: csrf_token,
                },
            },
            columns: [
                { data: "rnum", orderable: false },
                { data: "nama", orderable: false },
                { data: "action", orderable: false },
            ],
        });
        $("#tableKategoriSampah tbody").on("click", "tr", function () {
            // console.log(table.row(this).data());
            handleShowInModal(table.row(this).data());
        });
    };

    var handleShowInModal = function (param) {
        $("#indexData").val(param.index);
        $("#edit_nama_kategori").val(param.nama);
    };

    var handleAddData = function () {
        $("#formAddKategoriSampah").submit(function (e) {
            e.preventDefault();

            const form = $(this);
            let formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: url + "/admin/kategori-sampah",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success("Data Berhasil Disimpan", "Success");
                    setTimeout(function () {
                        location.reload();
                    }, 5000);
                },
                error: function (response) {
                    $.each(response.responseJSON, function (key, value) {
                        toastr.error(value);
                    });
                },
            });
        });
    };
    var handleUpdateData = function () {
        $("#formEditKategoriSampah").submit(function (e) {
            e.preventDefault();

            const form = $(this);
            let formData = new FormData(form[0]);

            const id = $("#indexData").val();
            $.ajax({
                type: "POST",
                url: url + "/admin/kategori-sampah/" + id,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success("Data Berhasil Diperbarui", "Success");
                    setTimeout(function () {
                        location.reload();
                    }, 5000);
                },
                error: function (response) {
                    $.each(response.responseJSON, function (key, value) {
                        toastr.error(value);
                    });
                },
            });
        });
    };
    return {
        init: function () {
            handleData();
            handleAddData();
            handleUpdateData();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
