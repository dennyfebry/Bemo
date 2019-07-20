<?php
    $db = mysqli_connect('localhost','dene4871_denny','inwardco24','dene4871_bemo');
    if(!$db){
        $obj = (object) [
            'error' => 'failed to connect to db'
        ];
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode($obj);
    }

    function KodeBooking()
{
	//jumlah panjang karakter angka dan huruf.
	$length_abjad = "2";
	$length_angka = "4";

	//huruf yg dimasukan, kecuali I,L dan O
	$huruf = "ABCDEFGHJKMNPRSTUVWXYZ";

	//mulai proses generate huruf
	$i = 1;
	$txt_abjad = "";
	while ($i <= $length_abjad) {
		$txt_abjad .= $huruf{mt_rand(0,strlen($huruf))};
		$i++;
	}

	//mulai proses generate angka
	$datejam = date("His");
	$time_md5 = rand(time(), $datejam);
	$cut = substr($time_md5, 0, $length_angka);	

	//mennggabungkan dan mengacak hasil generate huruf dan angka
	$acak = str_shuffle($txt_abjad.$cut);

	//menghitung dan memeriksa hasil generate di database menggunakan fungsi getTotalRow(),
	//jika hasil generate sudah ada di database maka proses generate akan diulang
	$cek  = getTotalRow('SELECT kode FROM booking WHERE kode = "'.$acak.'"');
	if($cek > 0) { $cek = KodeBooking(); }

	return $acak;
}
