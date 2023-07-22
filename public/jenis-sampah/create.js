var Index = (function () {
    const csrf_token = $('meta[name="csrf-token"]').attr("content");
    var table;

    var handleAddData = function () {
        $("#formAddJenisSampah").submit(function (e) {
            e.preventDefault();

            const form = $(this);
            let formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: url + "/admin/jenis-sampah",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success("Data Berhasil Disimpan", "Success");
                    setTimeout(function () {
                        document.location.href = url + "/admin/jenis-sampah";
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
            handleAddData();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
