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

    var namaregex = /^[a-zA-Z ]+$/;

    $.validator.addMethod("validnama", function (value, element) {
        return this.optional(element) || namaregex.test(value);
    });

    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $.validator.addMethod("validemail", function (value, element) {
        return this.optional(element) || eregex.test(value);
    });

    $("#register-form").validate({
        rules: {
            nama: {
                required: true,
                validnama: true,
                minlength: 4
            },
            email: {
                required: true,
                validemail: true,
                remote: {
                    url: " php/cek-email.php",
                    type: 'POST',
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 15
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            nama: {
                required: "Nama harus diisi",
                validnama: "Nama harus hanya mengandung huruf dan spasi",
                minlength: "Nama kamu terlalu pendek"
            },
            email: {
                required: "Diperlukan email",
                validemail: "Silakan masukkan alamat email yang valid",
                remote: "Email sudah ada"
            },
            password: {
                required: "Password dibutuhkan",
                minlength: "Password setidaknya memiliki 6 karakter"
            },
            cpassword: {
                required: "Ketik ulang password Anda",
                equalTo: "Password tidak cocok !"
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
    var temp = $('#register-form').serialize();
    console.log($('#register-form').serialize())
    $.ajax({
        type: 'POST',
        url: ' php/daftar.php',
        data: $('#register-form').serialize(),
        async: false,
        success: function (a) {
            $('#btn-signup').html('&nbsp; signing up...').prop('disabled', true);
            $('input[type=text],input[type=email],input[type=password]').prop('disabled', true);
            if (a == 0) {
                $("#register-form").trigger('reset');
                alert('Terjadi kesalahan yang tidak diketahui, Coba lagi nanti...');
            } else {
                console.log(a);
                var result = $.parseJSON(a);
                if (result.status === 'success') {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-info">' + result.message + '</div>');
                        $("#register-form").trigger('reset');
                        $('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Me Up').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                    console.log(temp);
                    $.ajax({
                        type: 'POST',
                        url: ' php/email-daftar.php',
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
                        $("#register-form").trigger('reset');
                        $('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Me Up').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                }
            }
        }
    });
}