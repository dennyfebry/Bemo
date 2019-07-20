<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';

$response = array();

if ($_POST) {
    $user_id = $_POST['user_id'];
    $userNama = $_POST['nama'];
    // $userEmail = $_POST['email'];
    $userAlamat = $_POST['alamat'];
    $userNohp = $_POST['no_hp'];
    $userMerk = $_POST['merk_mobil'];
    $userModel = $_POST['model_mobil'];
    $a = $_POST['a_plat'];
    $b = $_POST['b_plat'];
    $c = $_POST['c_plat'];
    $userNoken = "$a$b$c";

    $query = "UPDATE pengguna SET nama='$userNama',alamat='$userAlamat',no_hp='$userNohp',merk_mobil='$userMerk',model_mobil='$userModel',no_kendaraan='$userNoken' WHERE id='$user_id'";
    $result = mysqli_query($db, $query);

    // periksa berhasil mengubah profil
    if ($result) {
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Data berhasil di ubah';
    } else {
        $response['status'] = 'error'; // could not edit
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK! data belum berubah :)';
    }
}
echo json_encode($response);
 