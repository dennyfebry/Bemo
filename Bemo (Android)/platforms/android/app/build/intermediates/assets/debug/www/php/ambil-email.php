<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';


$response = array();

if ($_POST) {
    $userEmail = $_POST['email'];

    $query = "SELECT id,email FROM pengguna WHERE email = '$userEmail'";
    $result = mysqli_query($db, $query);

    if ($result) {
        $response['email'] = $userEmail;
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Silakan cek email anda untuk reset password';
        
    } else {
        $response['status'] = 'error'; // tidak bisa mendaftar
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Email tidak ditemukan :(';
    }
}else{
    $response= "Data tidak ada";
}
echo json_encode($response);
 