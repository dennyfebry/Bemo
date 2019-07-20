<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';

$response = array();
$text = 'abcdefghijklmnopqrstuvwxyz123457890';
$panj = 5;
$txtl = strlen($text) - 1;
$hasil = '';
for ($i = 1; $i <= $panj; $i++) {
    $hasil .= $text[rand(0, $txtl)];
}

if ($_POST) {
    $userid = $_POST['user_id'];
    $montirid = $_POST['montir_id'];
    $tgl_msk = $_POST['tgl_masuk'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $query = "INSERT INTO pesanan(user_id, montir_id, kode, tgl_masuk, keterangan, status) VALUES('$userid', '$montirid', '$hasil', '$tgl_msk', '$keterangan', '$status') ";
    $result = mysqli_query($db, $query);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Antrian telah terdaftar';
    } else {
        http_response_code(400);
        $response['error'] = mysqli_error($db);
        $response['status'] = 'failed'; // could not register
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK! Pemesanan tidak berhasil, silakan coba lagi :)';
    }
    // $response['result'] = $result;
}
echo json_encode($response);
 