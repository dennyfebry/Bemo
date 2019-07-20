<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';

$response = array();

if ($_POST) {
    $pesanan_id = $_POST['pesanan_id'];
    $tanggal = $_POST['tanggal'];
    $kode_servis = $_POST['kode_servis'];
 
    $query = "INSERT INTO servis(pesanan_id,kode_servis,tanggal) VALUES ('$pesanan_id', '$kode_servis', '$tanggal')";
    $result = mysqli_query($db, $query);

    // periksa berhasil mengubah profil
    if ($result) {
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Servis telah di tambahkan';
    } else {
        $response['status'] = 'error'; // could not edit
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK!';
    }
}
echo json_encode($response);
 