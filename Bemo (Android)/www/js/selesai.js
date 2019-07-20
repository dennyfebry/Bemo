$(document).ready(function () {
    $('#user').addClass('hide');
    $('#montir').addClass('hide');
    $('#admin').addClass('hide');

    var role = sessionStorage.getItem('hakAkses');
    if (role == 'user') {
        $('#user').removeClass('hide');
    } else if (role == 'montir') {
        $('#montir').removeClass('hide');
    } else {
        $('#admin').removeClass('hide');
    }

    var userID = sessionStorage.getItem('userID');
    var urlParams = new URLSearchParams(window.location.search);
    console.log('ID Pesanan =', urlParams.get('konfirmasiID'));


    $.ajax({
        type: 'POST',
        url: 'http://dennyfebrygo.com/bemo/www/php/konfirmasi.php',
        data: { konfirmasiID: urlParams.get('konfirmasiID') },
        error: function (xhr, status, error) {
            console.log(xhr);
            var result = $.parseJSON(xhr.responseText);
            console.log(result);
            alert('Terjadi kesalahan ' + result.error);
        },
        success: function (data) {
            console.log(data);
            var id = data[0].id;
            var nama = data[0].nama;
            var no_kendaraan = data[0].no_kendaraan;
            var kode = data[0].kode;
            var tgl_masuk = data[0].tgl_masuk;
            var tgl_keluar = data[0].tgl_keluar;
            var wkt_mulai = data[0].wkt_mulai;
            var keterangan = data[0].keterangan;
            var status = data[0].status;

            $.ajax({
                type: 'POST',
                url: 'http://dennyfebrygo.com/bemo/www/php/servis-lengkap.php',
                data: { userID: userID, servisID: urlParams.get('konfirmasiID') },
                success: function (data) {
                    console.log(data);
                    var totalwaktu = parseFloat("0");
                    for (var i = 0; i < data.length; i++) {
                        var waktu = parseFloat(data[i].waktu_pengerjaan);
                        totalwaktu += waktu;
                    }
                    console.log('Durasi = ', totalwaktu);
                    console.log('Tanggal Keluar = ', tgl_keluar);

                    var d = new Date("July 21, 1983 " + wkt_mulai + ":00");
                    var j = d.getHours();
                    var m = d.getMinutes();
                    if (totalwaktu < 60) {
                        j += 0;
                        m += totalwaktu;
                    } else if ((totalwaktu < 120) && (totalwaktu >= 60)) {
                        j += 1;
                        m += (totalwaktu - 60);
                    } else if ((totalwaktu < 180) && (totalwaktu >= 120)) {
                        j += 2;
                        m += (totalwaktu - 120);
                    } else if ((totalwaktu < 240) && (totalwaktu >= 180)) {
                        j += 3;
                        m += (totalwaktu - 180);
                    } else if ((totalwaktu < 300) && (totalwaktu >= 240)) {
                        j += 4;
                        m += (totalwaktu - 240);
                    } else if ((totalwaktu < 360) && (totalwaktu >= 300)) {
                        j += 5;
                        m += (totalwaktu - 300);
                    } else if ((totalwaktu < 420) && (totalwaktu >= 360)) {
                        j += 6;
                        m += (totalwaktu - 360);
                    }
                    wkt = j + ":" + m;
                    $('#wkt_selesai').attr({
                        "value": wkt
                    });
                    console.log('Waktu Selesai = ', wkt);


                }
            });



            $('#pesanan_id').val(id);
            console.log('Pesanan id = ', id);

            $('#nama').val(nama);
            console.log('Nama = ', nama);

            $('#no_kendaraan').val(no_kendaraan);
            console.log('No Kendaraan = ', no_kendaraan);

            $('#kode').val(kode);
            console.log('Kode = ', kode);

            $('#tgl_masuk').val(tgl_masuk);
            console.log('Tanggal Masuk = ', tgl_masuk);

            $('#keterangan').val(keterangan);
            console.log('Keterangan = ', keterangan);

            console.log('Status = ', status);

            if (tgl_keluar == null) {
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!
                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd
                }
                if (mm < 10) {
                    mm = '0' + mm
                }
                today = yyyy + '-' + mm + '-' + dd;
                $('#tgl_keluar').attr({
                    "min": today,
                    "value": today
                });
                console.log('Tanggal Keluar = ', today);
            } else {
                $('#tgl_keluar').val(tgl_keluar);
                console.log('Tanggal Keluar = ', tgl_keluar);
            }


            if (wkt_mulai == null) {
                var waktu = new Date();
                var jam = waktu.getHours() + 1;
                var menit = waktu.getMinutes();
                if (menit < 10) {
                    menit = '0' + menit
                }
                time = jam + ":" + menit;
                $('#wkt_mulai').attr({
                    "value": time
                });
                console.log('Waktu Mulai = ', time);
            } else {
                $('#wkt_mulai').val(wkt_mulai);
                console.log('Waktu Mulai = ', wkt_mulai);
            }

        }
    });

    $("#selesai-form").validate({
        rules: {
            kode: {
                required: true
            },
            nama: {
                required: true
            },
            no_kendaraan: {
                required: true
            },
            tgl_masuk: {
                required: true
            },
            keterangan: {
                required: true
            },
            tgl_keluar: {
                required: true
            },
            wkt_mulai: {
                required: true
            },
            wkt_selesai: {
                required: true
            }
        },
        messages: {
            kode: {
                required: "Kode harus diisi"
            },
            nama: {
                required: "Nama harus diisi"
            },
            no_kendaraan: {
                required: "No Kendaraan harus diisi"
            },
            tgl_masuk: {
                required: "Tanggal Masuk harus diisi"
            },
            keterangan: {
                required: "Keterangan harus diisi"
            },
            tgl_keluar: {
                required: "Tanggal Keluar harus diisi"
            },
            wkt_mulai: {
                required: "Waktu Mulai harus diisi"
            },
            wkt_selesai: {
                required: "Waktu Selesai harus diisi"
            }
        },
        errorPlacement: function (error, element) {
            $(element).closest('.form-group').find('.help-block').html(error.html());
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.form-group').find('.help-block').html('');
        },
        submitHandler: submitFor
    });

});


function submitFor() {
    var temp = $('#selesai-form').serialize();
    console.log($('#selesai-form').serialize())
    $.ajax({
        type: 'POST',
        url: 'http://dennyfebrygo.com/bemo/www/php/selesai.php',
        data: $('#selesai-form').serialize(),
        async: false,
        success: function (a) {
            console.log(a);
            $('#btn-selesai').html('&nbsp; selesai...').prop('disabled', true);
            $('input[type=text],input[type=date],input[type=time]').prop('disabled', true);
            if (a == 0) {
                $("#selesai-form").trigger('reset');
                alert('Coba lagi...');
            } else {
                var pesanan_id = document.getElementById('pesanan_id').value
                var result = $.parseJSON(a);
                if (result.status === 'success') {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-info">' + result.message + '</div>');
                        $("#selesai-form").trigger('reset');
                        $('input[type=text],input[type=date],input[type=time]').prop('disabled', false);
                        $('#btn-selesai').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; konfirmasi').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                    console.log(temp);
                    $.ajax({
                        type: 'POST',
                        url: 'http://dennyfebrygo.com/bemo/www/php/email-selesai.php',
                        data: temp,
                        error: function (xhr, status, error) {
                            console.log(xhr);
                            console.log('error');
                              var result = $.parseJSON(xhr.responseText);
                              console.log(result);
                            },
                        success: function (b) {
                            console.log(b);
                        }
                    });
                    setTimeout(function () {
                        window.location.href = 'antrian.html'
                    }, 3000)
                } else {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-danger">' + result.message + '</div>');
                        $("#selesai-form").trigger('reset');
                        $('input[type=text],input[type=date],input[type=time]').prop('disabled', false);
                        $('#btn-selesai').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; konfirmasi').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                }
            }
        }
    });
}
