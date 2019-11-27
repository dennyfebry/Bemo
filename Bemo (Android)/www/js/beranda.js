$('document').ready(function () {
    $('#user').addClass('hide');
    $('#montir').addClass('hide');
    $('#admin').addClass('hide');
    $('#footer').addClass('hide');

    var role = sessionStorage.getItem('hakAkses');
    if (role == 'user') {
        $('#user').removeClass('hide');
    } else if (role == 'montir') {
        $('#montir').removeClass('hide');
    } else if (role == 'admin') {
        $('#admin').removeClass('hide');
    }
    else {
        sessionStorage.clear();
        $('#footer').removeClass('hide');
    }

    $.ajax({
        type: 'GET',
        url: 'php/info.php',
        error: function (xhr, status, error) {
            // console.log(xhr);
            var result = $.parseJSON(xhr.responseText);
            console.log(result);
            alert('Terjadi kesalahan ' + result.error);
        },
        success: function (data) {
            console.log(data);
            title1 = data[0].title;
            $('#title1').html(title1);

            title2 = data[1].title;
            $('#title2').html(title2);

            title3 = data[2].title;
            $('#title3').html(title3);

            logo = data[8].title;
            $('#logo').attr({
                "src": "http://dennyfebrygo.com/bemo/adminbemo/public/img/" + logo
            });

            body1 = data[0].body;
            $('#body1').html(body1);

            body2 = data[1].body;
            $('#body2').html(body2);

            body3 = data[2].body;
            $('#body3').html(body3);

            wa = data[3].body;
            $('#wa').html(wa);

            hp = data[4].body;
            $('#hp').html(hp);

            email = data[5].body;
            // $('#email').html(email);

            $('#email').attr({
                "href": "mailto:" + email
            });

            alamat = data[6].body;
            $('#alamat').html(alamat);

            header = data[7].body;
            $('#header').html(header);
        }
    });

    $.ajax({
        type: 'GET',
        url: 'php/perawatan-mobil.php',
        error: function (xhr, status, error) {
            // console.log(xhr);
            var result = $.parseJSON(xhr.responseText);
            console.log(result);
            alert('Terjadi kesalahan ' + result.error);
        },
        success: function (data) {
            console.log(data);
            output = "<h4><center><b>Tips Perawatan Mobil</b></center></h4>"
            output += "<table style='width:100%; border: 1px solid black; border-collapse: collapse; font-size: 10px;'>"
            output += "<tr><th style='border: 1px solid black; border-collapse: collapse; padding: 10px;'>Kode</th>"
            output += "<th style='border: 1px solid black; border-collapse: collapse;padding: 10px;'>Bagian</th>"
            output += "<th style='border: 1px solid black; border-collapse: collapse; padding: 10px;'>Nama Servis</th>"
            output += "<th style=' border: 1px solid black; border-collapse: collapse; padding: 10px;'>Servis Setiap</th></tr>"

            output += "<tr><td style=' border: 1px solid black; border-collapse: collapse; padding: 10px;'>" + data[0].kode_servis + "</td>"
            output += "<td style='border: 1px solid black; border-collapse: collapse; padding: 10px; padding: 10px;'>" + data[0].bagian + "</td>"
            output += "<td style=' border: 1px solid black; padding: 3px;'>" + data[0].nama_servis + "</td>"
            output += "<td style=' border: 1px solid black; border-collapse: collapse; padding: 10px;'>" + data[0].saran_setiap + "</td></tr>"


            for (var i = 1; i < data.length; i++) {
                output += "<tr><td style=' border: 1px solid black; border-collapse: collapse; padding: 10px;'>" + data[i].kode_servis + "</td>"
                output += "<td style='border: 1px solid black; border-collapse: collapse; padding: 10px; padding: 10px;'>" + data[i].bagian + "</td>"
                output += "<td style=' border: 1px solid black; padding: 3px;'>" + data[i].nama_servis + "</td>"
                output += "<td style=' border: 1px solid black; border-collapse: collapse; padding: 10px;'>" + data[i].saran_setiap + "</td></tr>"
            }

            output += "</table>";
            $('#tips').html(output);

        }
    });
})