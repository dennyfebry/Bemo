$(document).ready(function () {
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

    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $.validator.addMethod("validemail", function (value, element) {
        return this.optional(element) || eregex.test(value);
    });

    $("#lupa-pass-form").validate({
        rules: {
            email: {
                required: true,
                validemail: true,
            }
        },
        messages: {
            email: {
                required: "Diperlukan email",
                validemail: "Silakan masukkan alamat email yang valid",
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
    var temp = $('#lupa-pass-form').serialize();
    console.log($('#lupa-pass-form').serialize())
    $.ajax({
        type: 'POST',
        url: 'http://dennyfebrygo.com/bemo/www/php/ambil-email.php',
        data: $('#lupa-pass-form').serialize(),
        async: false,
        success: function (a) {
            $('#btn-lupa').html('&nbsp; Lupa password...').prop('disabled', true);
            $('input[type=email]').prop('disabled', true);
            if (a == 0) {
                $("#lupa-pass-form").trigger('reset');
                alert('Terjadi kesalahan yang tidak diketahui, Coba lagi nanti...');
            } else {
                console.log(a);
                var result = $.parseJSON(a);
                if (result.status === 'success') {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-info">' + result.message + '</div>');
                        $("#lupa-pass-form").trigger('reset');
                        $('input[type=email]').prop('disabled', false);
                        $('#btn-lupa').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Lupa password').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                    console.log(temp);
                    $.ajax({
                        type: 'POST',
                        url: 'http://dennyfebrygo.com/bemo/www/php/email-lupa.php',
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
                        window.location.href = 'masuk.html'
                    }, 3000)
                } else {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-danger">' + result.message + '</div>');
                        $("#lupa-pass-form").trigger('reset');
                        $('input[type=email]').prop('disabled', false);
                        $('#btn-lupa').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Lupa password').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                }
            }
        }
    });
}