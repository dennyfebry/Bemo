<?php
header('Access-Control-Allow-Origin: *');
require_once 'config.php';

if (isset($_REQUEST['c_plat']) && !empty($_REQUEST['c_plat'])) {

    $c_plat = trim($_REQUEST['c_plat']);
    $c_plat = strip_tags($c_plat);

    $query = "SELECT huruf_seri FROM plat_nomor WHERE huruf_seri='$c_plat'";
    $result = mysqli_query($db, $query);

    $row = mysqli_num_rows($result);
    if ($row == 1) {
        echo 'true';
    } else {
        echo 'false';
    }
}
