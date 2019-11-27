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

    var user_id = sessionStorage.getItem('userID');
    $('#user_id').val(user_id);
    console.log('nama user = ', user_id);

    var userNama = sessionStorage.getItem('userNama');
    if (userNama != 'null') {
        var userNama = sessionStorage.getItem('userNama');
        $('#nama').val(userNama);
    }
    else {
        document.getElementById("name").placeholder = "Nama";
    }

    var email = sessionStorage.getItem('email');
    if (email != 'null') {
        var email = sessionStorage.getItem('email');
        $('#email').val(email);
    }
    else {
        document.getElementById("email").placeholder = "Email";
    }

    var alamat = sessionStorage.getItem('alamat');
    if (alamat != 'null') {
        var alamat = sessionStorage.getItem('alamat');
        $('#alamat').val(alamat);
    }
    else {
        document.getElementById("alamat").placeholder = "Alamat";
    }


    var no_hp = sessionStorage.getItem('no_hp');
    if (no_hp != 'null') {
        var no_hp = sessionStorage.getItem('no_hp');
        $('#no_hp').val(no_hp);
    }
    else {
        document.getElementById("no_hp").placeholder = "No HP";
    }

    // var merk_mobil = sessionStorage.getItem('merk_mobil');
    // if (merk_mobil !== '') {
    //     document.getElementById("merk_mobil").value = merk_mobil;
    // }

    var model_mobil = sessionStorage.getItem('model_mobil');
    console.log(model_mobil)
    if (model_mobil !== '') {
        document.getElementById("model_mobil").value = model_mobil;
    }


    var a_plat = sessionStorage.getItem('a_plat');
    if (a_plat != 'null') {
        var a_plat = sessionStorage.getItem('a_plat');
        $('#a_plat').val(a_plat);
    }
    else {
        document.getElementById("a_plat").placeholder = "";
    }

    var b_plat = sessionStorage.getItem('b_plat');
    if (b_plat != 'null') {
        var a_plat = sessionStorage.getItem('b_plat');
        $('#b_plat').val(a_plat);
    }
    else {
        document.getElementById("b_plat").placeholder = "ex:1234";
    }

    var c_plat = sessionStorage.getItem('c_plat');
    if (c_plat != 'null') {
        var a_plat = sessionStorage.getItem('c_plat');
        $('#c_plat').val(c_plat);
    }
    else {
        document.getElementById("c_plat").placeholder = "ex:VEO";
    }

    var namaregex = /^[a-zA-Z ]+$/;

    $.validator.addMethod("validname", function (value, element) {
        return this.optional(element) || namaregex.test(value);
    });

    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $.validator.addMethod("validemail", function (value, element) {
        return this.optional(element) || eregex.test(value);
    });

    var noregex = /^[0-9]+$/;

    $.validator.addMethod("validno", function (value, element) {
        return this.optional(element) || noregex.test(value);
    });

    $("#update-form").validate({
        rules: {
            nama: {
                required: true,
                validname: true,
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
            alamat: {
                required: true
            },
            no_hp: {
                required: true,
                validno: true
            },
            merk_mobil: {
                required: true
            },
            model_mobil: {
                required: true
            },
            a_plat: {
                required: true,
                remote: {
                    url: " php/cek-a_plat.php",
                    type: 'POST',
                    data: {
                        a_plat: function () {
                            return $("#a_plat").val();
                        }
                    }
                }
            },
            b_plat: {
                required: true,
                validno: true,
                minlength: 4,
                maxlength: 4,
                remote: {
                    url: " php/cek-b_plat.php",
                    type: 'POST',
                    data: {
                        b_plat: function () {
                            return $("#b_plat").val();
                        }
                    }
                }
            },
            c_plat: {
                required: true,
                minlength: 3,
                maxlength: 3,
                remote: {
                    url: " php/cek-c_plat.php",
                    type: 'POST',
                    data: {
                        c_plat: function () {
                            return $("#c_plat").val();
                        }
                    }
                }
            }
        },
        messages: {
            nama: {
                required: "Nama harus diisi",
                validname: "Nama harus hanya mengandung huruf dan spasi",
                minlength: "Nama anda terlalu pendek"
            },
            email: {
                required: "Email harus diisi",
                validemail: "Silakan masukkan alamat email yang valid",
                remote: "Email sudah ada"
            },
            alamat: {
                required: "Alamat harus diisi"
            },
            no_hp: {
                required: "No HP harus diisi",
                validno: "No HP harus diisi berupa angka"
            },
            merk_mobil: {
                required: "Merk Mobil harus diisi"
            },
            model_mobil: {
                required: "Model mobil harus diisi"
            },
            // no_kendaraan: {
            //     required: "No kendaraan harus diisi"
            // }
            a_plat: {
                required: "Kode wilayah harus diisi",
                remote: "Plat Nomor tidak terdaftar"
            },
            b_plat: {
                required: "Nomor polisi harus diisi",
                validno: "Nomor polisi harus diisi berupa angka",
                minlength: "Nomor polisi harus 4 angka",
                maxlength: "Nomor polisi harus 4 angka",
                remote: "Plat Nomor tidak terdaftar"
            },
            c_plat: {
                required: "Seri plat harus diisi",
                minlength: "Seri plat harus 3 huruf",
                maxlength: "Seri plat harus 3 huruf",
                remote: "Plat Nomor tidak terdaftar"
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
    console.log($('#update-form').serialize())
    $.ajax({
        type: 'POST',
        url: ' php/ubah-profil.php',
        data: $('#update-form').serialize(),
        async: false,
        success: function (a) {
            $('#btn-update').html('&nbsp; Update...').prop('disabled', true);
            $('input[type=text],input[type=number]').prop('disabled', true);
            if (a == 0) {
                $("#update-form").trigger('reset');
                alert('Coba lagi...');
            } else {
                var nama = document.getElementById('nama').value
                // var email = document.getElementById('email').value
                var almt = document.getElementById('alamat').value
                var hp = document.getElementById('no_hp').value
                var merk = document.getElementById('merk_mobil').value
                var model = document.getElementById('model_mobil').value
                // var no_ken = document.getElementById('no_kendaraan').value
                var a_plat = document.getElementById('a_plat').value
                var b_plat = document.getElementById('b_plat').value
                var c_plat = document.getElementById('c_plat').value
                var no_ken = a_plat + b_plat + c_plat;
                console.log("tanda", no_ken)
                var result = $.parseJSON(a);
                if (result.status === 'success') {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-info">' + result.message + '</div>');
                        $("#update-form").trigger('reset');
                        $('input[type=text],input[type=number]').prop('disabled', false);
                        $('#btn-update').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                    setTimeout(function () {
                        sessionStorage.setItem('userNama', nama);
                        // sessionStorage.setItem('email',email);
                        sessionStorage.setItem('alamat', almt);
                        sessionStorage.setItem('no_hp', hp);
                        sessionStorage.setItem('merk_mobil', merk);
                        sessionStorage.setItem('model_mobil', model);
                        sessionStorage.setItem('no_kendaraan', no_ken);
                        sessionStorage.setItem('a_plat', a_plat);
                        sessionStorage.setItem('b_plat', b_plat);
                        sessionStorage.setItem('c_plat', c_plat);
                        window.location.href = 'profil.html'
                    }, 3000)
                } else {
                    $('#errorDiv').slideDown('fast', function () {
                        $('#errorDiv').append('<div class="alert alert-danger">' + result.message + '</div>');
                        $("#update-form").trigger('reset');
                        $('input[type=text],input[type=number]').prop('disabled', false);
                        $('#btn-update').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update').prop('disabled', false);
                    }).delay(2000).slideUp('fast');
                }
            }
        }
    });
}