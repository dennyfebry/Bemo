$('document').ready(function () {
    var userID = sessionStorage.getItem('userID');
    console.log('id user =', userID);
    var urlParams = new URLSearchParams(window.location.search);
    console.log('ID riwayat =', urlParams.get('riwayatID'));


    $.ajax({
        type: 'POST',
        url: 'http://dennyfebrygo.com/bemo/www/php/riwayat-lengkap-montir.php',
        data: { userID: userID, riwayatID: urlParams.get('riwayatID') },
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
                kode = data[i].kode;
                tgl_masuk = data[i].tgl_masuk;
                tgl_keluar = data[i].tgl_keluar;
                wkt_mulai = data[i].wkt_mulai;
                wkt_selesai = data[i].wkt_selesai;
                keterangan = data[i].keterangan;
            }
            output = "<div class='box'><h4><center><b>Riwayat Servis Lengkap</b></center></h4>";
            output += "<div class='texthistory'><b>Kode Antrian    : </b>" + kode + "</div>";
            output += "<div class='texthistory'><b>Nama Pelanggan    : </b>" + nama + "</div>";
            output += "<div class='texthistory'><b>Tanggal : </b>" + tgl_keluar + "</div>";
            output += "<div class='texthistory'><b>Waktu  : </b>" + wkt_mulai + " - " + wkt_selesai + "</div>";
            output += "<div class='texthistory'><b>Keterangan     : </b>" + keterangan + "</div>";
            output += "<br><div><b>Servis       :</b></div>";

            var totalwaktu = parseFloat("0");
            var totalharga = parseFloat("0");
            for (var i = 0; i < data.length; i++) {
                output += "<div class='textprofile'>" + [i + 1] + "." + data[i].nama_servis + "</div>";
                var waktu = parseFloat(data[i].waktu_pengerjaan);
                totalwaktu += waktu;
                // console.log(data[i].waktu_pengerjaan);
                // console.log(totalwaktu);
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
                // console.log(data[i].harga);
                // console.log(totalharga);
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
            // output += "<div class='texthistory'><b>Waktu Pegerjaan: </b>"+ wkt_mulai +" - "+ wkt_selesai +" ("+ totalwaktu +" menit)</div>";
            output += "<div class='texthistory'><b>Durasi: </b>" + totalwaktu + " menit</div>";
            output += "<div class='texthistory'><b>Total Harga    : </b>Rp" + rupiah + "</div>";
            output += "</div>";

            $('#riwayat-lengkap').html(output);
        }
    });

});
