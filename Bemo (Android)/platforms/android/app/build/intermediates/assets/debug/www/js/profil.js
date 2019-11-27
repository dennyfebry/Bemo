$('document').ready(function () {
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

    var a_plat = sessionStorage.getItem('a_plat');
    $('#a_plat').html(a_plat);

    var b_plat = sessionStorage.getItem('b_plat');
    $('#b_plat').html(b_plat);

    var c_plat = sessionStorage.getItem('c_plat');
    $('#c_plat').html(c_plat);

    var email = sessionStorage.getItem('email');
    console.log("email =", email);
    if (email != '') {
        $.ajax({
            type: 'POST',
            url: ' php/profil.php',
            data: { email: email },
            error: function (xhr, status, error) {
                console.log(xhr);
                var result = $.parseJSON(xhr.responseText);
                console.log(result);
                alert('Terjadi kesalahan ' + result.error);
            },
            success: function (data) {
                console.log(data);
                $('#userNama').html(data.nama);
                $('#userEmail').html(data.email);
                $('#userAlamat').html(data.alamat);
                $('#userNoHP').html(data.no_hp);
                $('#userMerkMobil').html(data.merk_mobil);
                $('#userModelMobil').html(data.model_mobil);
                $('#userNoMobil').html(data.no_kendaraan);
                montirnama = data.nama;
                montiremail = data.email;
                montiralamat = data.alamat;
                montirno_hp = data.no_hp;
                $('#montirnama').html(montirnama);
                $('#montiremail').html(montiremail);
                $('#montiralamat').html(montiralamat);
                $('#montirno_hp').html(montirno_hp);

            }
        });
    } else {
        alert("Belum mengisi data");
    }

    $('#logout').click(function () {
        alert("Kamu berhasil keluar")
        localStorage.clear();
        sessionStorage.clear();
        document.location.href = 'masuk.html';

    });
});