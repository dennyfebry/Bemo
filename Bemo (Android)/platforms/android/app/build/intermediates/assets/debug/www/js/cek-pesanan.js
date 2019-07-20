$('document').ready(function () {
    var userID = sessionStorage.getItem('userID');
    $('#userID').val(userID);
    console.log('id_user = ', userID);

    var hakAkses = sessionStorage.getItem('hakAkses');

    if ((userID != '') && (hakAkses == 'user')) {
        $.ajax({
            type: 'POST',
            url: 'http://dennyfebrygo.com/bemo/www/php/cek-pesanan.php',
            data: { userID: userID },
            // error: function (xhr, status, error) {
            //     console.log(xhr);
            //     console.log(status);
            //     console.log(error);
            //     var result = $.parseJSON(xhr.obj);
            //     console.log(result);
            //     alert('Terjadi kesalahan ' + result.error);
            // },
            success: function (data) {
                console.log(data);
                sessionStorage.setItem("pesanan_id", data[0].id);
                sessionStorage.setItem("cek-pesanan", data[0].status);
            }
        });
    } else if ((userID != '') && (hakAkses == 'montir')) {
        $.ajax({
            type: 'POST',
            url: 'http://dennyfebrygo.com/bemo/www/php/cek-pesanan-montir.php',
            data: { userID: userID },
            // error: function (xhr, status, error) {
            //     console.log(xhr);
            //     console.log(status);
            //     console.log(error);
            //     var result = $.parseJSON(xhr.obj);
            //     console.log(result);
            //     alert('Terjadi kesalahan ' + result.error);
            // },
            success: function (data) {
                console.log(data);
                sessionStorage.setItem("pesanan_id", data[0].id);
                sessionStorage.setItem("cek-pesanan", data[0].status);
            }
        });
    }
});