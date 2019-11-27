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

    var urlParams = new URLSearchParams(window.location.search);
    console.log('ID Pesanan =', urlParams.get('pesananID'));

    $('#pesanan_id').val(urlParams.get('pesananID'));

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
    $('#tgl_sekarang').attr({
        "value": today
    });
    console.log('Tanggal Sekarang = ', today);

    $("#tambah-servis-form").validate({
        rules: {
            tanggal: {
                required: true
            }
        },
        messages: {
            tanggal: {
                required: "Tanggal harus ada"
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
    console.log($('#tambah-servis-form').serialize())
    $.ajax({
        type: 'POST',
        url: 'php/tambah-servis.php',
        data: $('#tambah-servis-form').serialize(),
        async: false,
        success: function (a) {
            console.log(a);
            $('#btn-Tambah').html('&nbsp; tambah-servis...').prop('disabled', true);
            $('input[type=text],input[type=date],input[type=time]').prop('disabled', true);
            if (a == 0) {
                $("#tambah-servis-form").trigger('reset');
                alert('Coba lagi...');
            } else {
                var result = $.parseJSON(a);
                if (result.status === 'success') {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-info">' + result.message + '</div>');
                        $("#tambah-servis-form").trigger('reset');
                        $('#btn-Tambah').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; konfirmasi').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                    setTimeout(function () {
                        window.location.href = 'antrian.html'
                    }, 3000)
                } else {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-danger">' + result.message + '</div>');
                        $("#tambah-servis-form").trigger('reset');
                        $('#btn-Tambah').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; konfirmasi').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                }
            }
        }
    });
}