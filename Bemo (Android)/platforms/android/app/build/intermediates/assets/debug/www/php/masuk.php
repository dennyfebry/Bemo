<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once 'config.php';

$response = array();


if ($_POST) {
    $userEmail = $_POST['email'];
    $userPass = md5($_POST['password']);

    $sql = "SELECT * FROM pengguna WHERE email='$userEmail' AND password='$userPass'";
    $result = mysqli_query($db, $sql);
    $num_row = mysqli_num_rows($result);
    while ($row = mysqli_fetch_object($result)) {
        $response[] = $row;
    }


    if ($num_row > 0) {
        echo json_encode($response);
    } else {
        $obj = (object)[
            'error' => '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Email/Password yang anda masukkan salah :('
        ];
        http_response_code(400);
        echo json_encode($obj);
    }
}
 