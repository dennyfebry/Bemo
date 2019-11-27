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

    $('#detail').addClass('hide');
    var id = sessionStorage.getItem('userID')
    console.log('id user = ', id);

    $.ajax({
        type: 'GET',
        url: ' php/antrian.php',
        error: function (xhr, status, error) {
            // console.log(xhr);
            var result = $.parseJSON(xhr.responseText);
            console.log(result);
            alert('Terjadi kesalahan ' + result.error);
        },
        success: function (data) {
            console.log(data);
            if (data != null) {
                output = "";
                for (var i = 0; i < data.length; i++) {
                    cek = data[i].montir_id;
                    if (id != cek) {
                        output += "<div class='alert alert-info' style='text-align: center;'>Tidak ada antrian</div>";
                    }
                }
                if (id == data[0].montir_id) {
                    output += "<div class='box2'><div class='indikator" + data[0].status + "'></div><div class='textantrian'><b>Kode Antrian :</b>" + data[0].kode + "</div><div class='textantrian'><b>Nama :</b>" + data[0].nama + "</div><div class='textantrian'><b>No Kendaraan :</b>" + data[0].no_kendaraan + "</div><div class='textantrian'><b>Tanggal :</b>" + data[0].tgl_masuk + "</div>";
                    if (data[0].status == '1') {
                        output += "<br><a href='konfirmasi.html?konfirmasiID=" + data[0].id + "' style='margin: 0 0 0 155px;' class='link'>Konfirmasi</a>";
                    } else if (data[0].status == '2') {
                        output += "<br><a href='servis-lengkap.html?servisID=" + data[0].id + "' style='margin: 0 0 0 155px;' class='link'>Servis Lengkap</a>";
                    }
                    output += "</div><br>";
                }


                if (data.length <= 5) {
                    for (var i = 1; i < data.length; i++) {
                        if (id == data[i].montir_id) {
                            output += "<div class='box2'><div class='indikator" + data[i].status + "'></div><div class='textantrian'><b>Kode Antrian :</b>" + data[i].kode + "</div><div class='textantrian'><b>Nama :</b>" + data[i].nama + "</div><div class='textantrian'><b>No Kendaraan :</b>" + data[i].no_kendaraan + "</div><div class='textantrian'><b>Tanggal :</b>" + data[i].tgl_masuk + "</div>";
                            if (data[i].status == '1') {
                                output += "<br><a href='konfirmasi.html?konfirmasiID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Konfirmasi</a>";
                            } else if (data[i].status == '2') {
                                output += "<br><a href='servis-lengkap.html?servisID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Servis Lengkap</a>";
                            }
                            // output += "<br><a href='konfirmasi.html?konfirmasiID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Konfirmasi</a>";
                            output += "</div><br>";
                        }
                    }
                    var antrian = parseFloat(i);
                    var sisa = 5 - antrian;
                    info = "<div class='alert alert-info' style='text-align: center;'>Masih Tersedia " + sisa + " Antrian Kosong</div>";
                } else {
                    for (var i = 1; i < 5; i++) {
                        if (id == data[i].montir_id) {
                            output += "<div class='box2'><div class='indikator" + data[i].status + "'></div><div class='textantrian'><b>Kode Antrian :</b>" + data[i].kode + "</div><div class='textantrian'><b>Nama :</b>" + data[i].nama + "</div><div class='textantrian'><b>No Kendaraan :</b>" + data[i].no_kendaraan + "</div><div class='textantrian'><b>Tanggal :</b>" + data[i].tgl_masuk + "</div>";
                            if (data[i].status == '1') {
                                output += "<br><a href='konfirmasi.html?konfirmasiID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Konfirmasi</a>";
                            } else if (data[i].status == '2') {
                                output += "<br><a href='servis-lengkap.html?servisID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Servis Lengkap</a>";
                            }
                            output += "</div><br>";
                        }


                    }
                    var antrian = parseFloat(i);
                    var sisa = 5 - antrian;
                    info = "<div class='alert alert-info' style='text-align: center;'>Masih Tersedia " + sisa + " Antrian Kosong</div>";

                    output += "<br><br><div style='text-align: center'><h4>Tunggu Antrian</h4></div>";
                    for (var i = 5; i < data.length; i++) {
                        if (id == data[i].montir_id) {
                            output += "<div class='box2'><div class='indikator" + data[i].status + "'></div><div class='textantrian'><b>Kode Antrian :</b>" + data[i].kode + "</div><div class='textantrian'><b>Nama :</b>" + data[i].nama + "</div><div class='textantrian'><b>No Kendaraan :</b>" + data[i].no_kendaraan + "</div><div class='textantrian'><b>Tanggal :</b>" + data[i].tgl_masuk + "</div>";
                            if (data[i].status == '1') {
                                output += "<br><a href='konfirmasi.html?konfirmasiID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Konfirmasi</a>";
                            } else if (data[i].status == '2') {
                                output += "<br><a href='servis-lengkap.html?servisID=" + data[i].id + "' style='margin: 0 0 0 155px;' class='link'>Servis Lengkap</a>";
                            }
                            output += "</div><br>";
                        }


                    }
                    var antrian = parseFloat(i);
                    var sisa = antrian - 5;
                    info = "<div class='alert alert-info' style='text-align: center;'>Menunggu " + sisa + " Antrian Lagi</div>";

                }
                $('#info').html(info);
                $('#antrian').html(output);
            } else {
                output = "<div class='alert alert-info' style='text-align: center;'>Tidak ada antrian sama sekali</div>";
                $('#antrian').html(output);
            }
        }
    });
});