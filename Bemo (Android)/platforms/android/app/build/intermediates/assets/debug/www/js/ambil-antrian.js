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

    var user_id = sessionStorage.getItem('userID');
    $('#user_id').val(user_id);
    console.log('id user = ', user_id);

    var status = '1';
    $('#status').val(status);

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
    var m = parseInt(mm);
    var d = parseInt(dd);
    m += 1;
    d -= 25;
    if (d < 10) {
        d = '0' + d
    }
    if (m < 10) {
        m = '0' + m
    }

    if (dd == 31) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + m + '-' + d;
    } else if (dd == 30) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + m + '-' + d;
    } else if (dd == 29) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + m + '-' + d;
    } else if (dd == 28) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + m + '-' + d;
    } else if (dd == 27) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + m + '-' + d;
    } else if (dd == 26) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + m + '-' + d;
    } else if (dd == 25) {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + mm + '-' + (dd + 6);
    } else {
        today = yyyy + '-' + mm + '-' + dd;
        max = yyyy + '-' + mm + '-' + (dd + 6);
    }
    console.log('date = ', today);
    console.log('max = ', max);

    $('#date').attr({
        "min": today,
        "max": max,
        "value": today
    });

    $("#booking-form").validate({
        rules: {
            tgl_masuk: {
                required: true
            },
            keterangan: {
                required: true
            }
        },
        messages: {
            tgl_masuk: {
                required: "Tanggal harus diisi"
            },
            keterangan: {
                required: "Keterangan harus diisi"
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
    console.log($('#booking-form').serialize())
    $.ajax({
        type: 'POST',
        url: ' php/ambil-antrian.php',
        data: $('#booking-form').serialize(),
        async: false,
        success: function (a) {
            $('#btn-booking').html('&nbsp; booking...').prop('disabled', true);
            if (a == 0) {
                $("#booking-form").trigger('reset');
                alert('Error deh');
            } else {
                console.log(a);
                var result = $.parseJSON(a);
                console.log(result);
                if (result.status === 'success') {
                    sessionStorage.setItem("cek-pesanan", "1");
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-info">' + result.message + '</div>');
                        $("#booking-form").trigger('reset');
                        $('#btn-booking').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; booking').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                    setTimeout(function () {
                        window.location.href = 'proses.html'
                    }, 3000)
                } else {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-danger">' + result.message + '</div>');
                        $("#booking-form").trigger('reset');
                        $('#btn-booking').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; booking').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                }
            }
        }
    });
}