<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';

$response = array();

if ($_POST) {
    $pesanan_id = $_POST['pesanan_id'];
    $wkt_selesai = $_POST['wkt_selesai'];
 

    $query = "UPDATE pesanan SET wkt_selesai='$wkt_selesai', status='3' WHERE id='$pesanan_id'";
    $result = mysqli_query($db, $query);

    // periksa berhasil mengubah profil
    if ($result) {
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Servis telah selesai';
    } else {
        $response['status'] = 'error'; // could not edit
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK!';
    }
}
echo json_encode($response);
 