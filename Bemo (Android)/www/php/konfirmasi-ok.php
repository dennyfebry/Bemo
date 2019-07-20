<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';

$response = array();

if ($_POST) {
    $pesanan_id = $_POST['pesanan_id'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $wkt_mulai = $_POST['wkt_mulai'];
 

    $query = "UPDATE pesanan SET tgl_keluar='$tgl_keluar', wkt_mulai='$wkt_mulai', status='2' WHERE id='$pesanan_id'";
    $result = mysqli_query($db, $query);

    // periksa berhasil mengubah profil
    if ($result) {
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Antrian telah di konfirmasi';
    } else {
        $response['status'] = 'error'; // could not edit
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK!';
    }
}
echo json_encode($response);
 