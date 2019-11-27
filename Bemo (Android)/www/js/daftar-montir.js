$('document').ready(function () {
    $.ajax({
        type: 'GET',
        url: 'php/daftar-montir.php',
        error: function (xhr, status, error) {
            console.log(xhr);
            var result = $.parseJSON(xhr.responseText);
            console.log(result);
            alert('Terjadi kesalahan ' + result.error);
        },
        success: function (data) {
            var selectOutput = "<option>Pilih Montir</option>";
            for (var i in data) {
                selectOutput += "<option value='" + data[i].id + "'>" + data[i].nama + "</option>";
            }
            var output =
                "<select name='montir_id' id='montir_id' class='form-control'>" +
                selectOutput +
                "</select>";
            $('#daftar-montir').html(output);

        }
    });
});