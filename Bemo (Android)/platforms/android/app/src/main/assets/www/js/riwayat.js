$('document').ready(function () {
    var userID = sessionStorage.getItem('userID');
    $('#userID').val(userID);
    console.log('id user =', userID);

    var hakAkses = sessionStorage.getItem('hakAkses');
    console.log('hak akses =', hakAkses);

    if ((userID != '') && (hakAkses == 'user')) {
        $.ajax({
            type: 'POST',
            url: ' php/riwayat.php',
            data: { userID: userID },
            // error: function (xhr, status, error) {
            // console.log(xhr);
            //   var result = $.parseJSON(xhr.responseText);
            //   console.log(result);
            //   alert('Terjadi kesalahan ' + result.error);
            // },
            success: function (data) {
                console.log(data);
                output = "<div class='box'><h4><center><b>Riwayat Servis</b></center></h4>";
                for (var i = 0; i < data.length; i++) {
                    output += "<div class='textantrian'>" + [i + 1] + ".</div>";
                    output += "<div class='textantrian'>Tanggal :<b>" + data[i].tgl_keluar + "</b></div>";
                    output += "<div class='textantrian'>Keterangan :<b> " + data[i].keterangan + "</b></div><br>";
                    sessionStorage.setItem("riwayat_" + data[i].id, data[i].id);
                    $('#riwayat_' + data[i].id).val(data[i].id);
                    console.log('id riwayat = ', data[i].id);
                    output += "<a href='riwayat-lengkap.html?riwayatID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Lebih lengkap</a>";
                }
                output += "</div>";


                $('#riwayat').html(output);
            }
        });
    } else if ((userID != '') && (hakAkses == 'montir')) {
        $.ajax({
            type: 'POST',
            url: ' php/riwayat-montir.php',
            data: { userID: userID },
            error: function (xhr, status, error) {
                console.log(xhr);
                var result = $.parseJSON(xhr.responseText);
                console.log(result);
                alert('Terjadi kesalahan ' + result.error);
            },
            success: function (data) {
                console.log(data);
                output = "<div class='box'><center>Riwayat PIC Servis </center>";
                for (var i = 0; i < data.length; i++) {
                    output += "<div>" + [i + 1] + ". <p class='textantrian'>Tanggal :<b> " + data[i].tgl_keluar + "</b></p></div>";
                    output += "<div class='textantrian'>Pelanggan : <b>" + data[i].nama + " (" + data[i].model_mobil + ")</b></div>";
                    output += "<div class='textantrian'>Keterangan :<b> " + data[i].keterangan + "</b></div><br>";
                    sessionStorage.setItem("riwayat_" + data[i].id, data[i].id);
                    $('#riwayat_' + data[i].id).val(data[i].id);
                    console.log('id riwayat = ', data[i].id);
                    output += "<a href='riwayat-lengkap-montir.html?riwayatID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Lebih lengkap</a>";
                }
                output += "</div>";

                $('#riwayat-montir').html(output);
            }
        });
    } else {
        alert("Belum ada history");
    }
});