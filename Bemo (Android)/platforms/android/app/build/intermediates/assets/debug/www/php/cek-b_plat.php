<?php
header('Access-Control-Allow-Origin: *');
require_once 'config.php';

if (isset($_REQUEST['b_plat']) && !empty($_REQUEST['b_plat'])) {

    $b_plat = trim($_REQUEST['b_plat']);
    $b_plat = strip_tags($b_plat);

    $query = "SELECT nomor_polisi FROM plat_nomor WHERE nomor_polisi='$b_plat'";
    $result = mysqli_query($db, $query);

    $row = mysqli_num_rows($result);
    if ($row == 1) {
        echo 'true';
    } else {
        echo 'false';
    }
}
