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

    var userID = sessionStorage.getItem('userID');
    var hakAkses = sessionStorage.getItem('hakAkses');
    var statusproses = sessionStorage.getItem('cek-pesanan');
    var pesananID = sessionStorage.getItem('pesanan_id');
    console.log('id user =', userID);
    console.log('hak akses =', hakAkses);
    console.log('status =', statusproses);
    console.log('pesanan_id =', pesananID);

    var urlParams = new URLSearchParams(window.location.search);
    var servisID = urlParams.get('servisID');
    console.log('ID Servis =', servisID);

    var href1 = "tambah-servis.html?pesananID=" + pesananID;
    var href2 = "selesai.html?konfirmasiID=" + pesananID;

    $('#tambah-servis').attr({
        "href": href1
    });

    $('#selesai').attr({
        "href": href2
    });

    if ((userID != '') && (hakAkses == 'user')) {
        $.ajax({
            type: 'POST',
            url: 'php/pesanan.php',
            data: { userID: userID, pesananID: pesananID },
            error: function (xhr, status, error) {
                console.log(xhr);
                var result = $.parseJSON(xhr.responseText);
                console.log(result);
                alert('Terjadi kesalahan ' + result.error);
            },
            success: function (data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    nama = data[i].nama;
                    tgl_masuk = data[i].tgl_masuk;
                    tgl_keluar = data[i].tgl_keluar;
                    kode = data[i].kode;
                    wkt_mulai = data[i].wkt_mulai;
                    wkt_selesai = data[i].wkt_selesai;
                    keterangan = data[i].keterangan;
                }
                output = "<div class='box'><h4><center><b>Servis Lengkap</b></center></h4><div class='indikator" + statusproses + "'></div><div class='texthistory'><b>Kode Antrian    : </b>" + kode + "</div><div class='texthistory'><b>Nama Montir    : </b>" + nama + "</div><div class='texthistory'><b>Tanggal : </b>" + tgl_masuk + "</div><div class='texthistory'><b>Waktu Mulai : </b>" + wkt_mulai + "</div><div class='texthistory'><b>Keterangan     : </b>" + keterangan + "</div>";
                output += "<br><div><b>Servis        :</b></div>";
                var totalwaktu = parseFloat("0");
                var totalharga = parseFloat("0");
                for (var i = 0; i < data.length; i++) {
                    output += "<div class='textprofile'>" + [i + 1] + "." + data[i].nama_servis + "</div>";
                    var waktu = parseFloat(data[i].waktu_pengerjaan);
                    totalwaktu += waktu;
                    var harga = parseFloat(data[i].harga);
                    var bil = harga;
                    var number_string = bil.toString(),
                        sisanya = number_string.length % 3,
                        rupiahnya = number_string.substr(0, sisanya),
                        ribu = number_string.substr(sisanya).match(/\d{3}/g);

                    if (ribu) {
                        separatornya = sisanya ? '.' : '';
                        rupiahnya += separatornya + ribu.join('.');
                    }
                    output += "<div class='textprofile'>  Harga : Rp" + rupiahnya + "</div>";
                    totalharga += harga
                }
                var bilangan = totalharga;
                var number_string = bilangan.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                output += "<div class='texthistory'><b>Durasi: </b>" + totalwaktu + " menit</div>";
                output += "<div class='texthistory'><b>Total Harga    : </b>Rp" + rupiah + "</div>";
                output += "</div>";
                output += "</div>";

                $('#detail').html(output);
            }
        });
    } else if ((userID != '') && (hakAkses == 'montir')) {
        $.ajax({
            type: 'POST',
            url: 'php/servis-lengkap.php',
            data: { userID: userID, servisID: servisID },
            // error: function (xhr, status, error) {
            //     console.log(xhr);
            //     var result = $.parseJSON(xhr.responseText);
            //     console.log(result);
            //     alert('Terjadi kesalahan ' + result.error);
            // },
            success: function (data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    nama = data[i].nama;
                    tgl_masuk = data[i].tgl_masuk;
                    tgl_keluar = data[i].tgl_keluar;
                    kode = data[i].kode;
                    wkt_mulai = data[i].wkt_mulai;
                    wkt_selesai = data[i].wkt_selesai;
                    keterangan = data[i].keterangan;
                }
                output = "<div class='box'><h4><center><b>Servis Lengkap</b></center></h4><div class='indikator" + statusproses + "'></div><div class='texthistory'><b>Kode Antrian    : </b>" + kode + "</div><div class='texthistory'><b>Nama Pelanggan    : </b>" + nama + "</div><div class='texthistory'><b>Tanggal : </b>" + tgl_masuk + "</div><div class='texthistory'><b>Waktu Mulai : </b>" + wkt_mulai + "</div><div class='texthistory'><b>Keterangan     : </b>" + keterangan + "</div>";
                output += "<br><div><b>Servis        :</b></div>";
                var totalwaktu = parseFloat("0");
                var totalharga = parseFloat("0");
                for (var i = 0; i < data.length; i++) {
                    output += "<div class='textprofile'>" + [i + 1] + "." + data[i].nama_servis + "</div>";
                    var waktu = parseFloat(data[i].waktu_pengerjaan);
                    totalwaktu += waktu;
                    var harga = parseFloat(data[i].harga);
                    var bil = harga;
                    var number_string = bil.toString(),
                        sisanya = number_string.length % 3,
                        rupiahnya = number_string.substr(0, sisanya),
                        ribu = number_string.substr(sisanya).match(/\d{3}/g);

                    if (ribu) {
                        separatornya = sisanya ? '.' : '';
                        rupiahnya += separatornya + ribu.join('.');
                    }
                    output += "<div class='textprofile'>  Harga : Rp" + rupiahnya + "</div>";
                    totalharga += harga
                }
                var bilangan = totalharga;
                var number_string = bilangan.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                output += "<div class='texthistory'><b>Durasi: </b>" + totalwaktu + " menit</div>";
                output += "<div class='texthistory'><b>Total Harga    : </b>Rp" + rupiah + "</div>";
                output += "</div>";
                output += "</div>";

                $('#servis-lengkap').html(output);
            }
        });
    } else {
        alert("Belum ada");
    }

});