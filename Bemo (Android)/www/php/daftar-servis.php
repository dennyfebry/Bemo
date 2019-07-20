<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once 'config.php';

$data = array();

$query = "SELECT id,kode_servis,nama_servis FROM daftar_servis";
$result = mysqli_query($db, $query);
$num_row = mysqli_num_rows($result);
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row;
}

if ($num_row > 0) {
    echo json_encode($data);
}
 