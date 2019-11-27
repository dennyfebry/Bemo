$('document').ready(function () {
    $.ajax({
        type: 'GET',
        url: 'php/daftar-servis.php',
        error: function (xhr, status, error) {
            console.log(xhr);
            var result = $.parseJSON(xhr.responseText);
            console.log(result);
            alert('Terjadi kesalahan ' + result.error);
        },
        success: function (data) {
            var selectOutput = "<option>Pilih Servis</option>";
            for (var i in data) {
                selectOutput += "<option value='" + data[i].kode_servis + "'>" + data[i].nama_servis + "</option>";
            }
            var output =
                "<select name='kode_servis' id='kode_servis' class='form-control'>" +
                selectOutput +
                "</select>";
            $('#daftar-servis').html(output);

        }
    });
});