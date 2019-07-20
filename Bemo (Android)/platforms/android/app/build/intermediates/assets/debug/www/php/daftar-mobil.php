<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once 'config.php';

$data = array();

// $query = "SELECT merk_mobil.nama_merk, model_mobil.nama_model FROM merk_mobil LEFT JOIN model_mobil ON merk_mobil.id = model_mobil.id_merk ";
$query = "SELECT * FROM merk_mobil";
$result = mysqli_query($db, $query);
$num_row = mysqli_num_rows($result);
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row;
}

if ($num_row > 0) {
    echo json_encode($data);
}
 