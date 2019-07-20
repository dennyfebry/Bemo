<?php
header('Access-Control-Allow-Origin: *');
require_once 'config.php';

if (isset($_REQUEST['a_plat']) && !empty($_REQUEST['a_plat'])) {

    $a_plat = trim($_REQUEST['a_plat']);
    $a_plat = strip_tags($a_plat);

    $query = "SELECT kode_wilayah FROM plat_nomor WHERE kode_wilayah='$a_plat'";
    $result = mysqli_query($db, $query);

    $row = mysqli_num_rows($result);
    if ($row == 1) {
        echo 'true';
    } else {
        echo 'false';
    }
}
