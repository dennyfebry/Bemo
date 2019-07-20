<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'config.php';

    $data = array();

    $query = "SELECT pesanan.id, pesanan.user_id, pesanan.montir_id, pengguna.nama, pengguna.no_kendaraan, pesanan.kode, pesanan.tgl_masuk, pesanan.wkt_selesai, pesanan.status FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pesanan.status IN (1,2) ORDER BY pesanan.tgl_masuk, pesanan.status DESC";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()) {
            $userData[] = $row;
        }
        
        $data = $userData;
    }else{
        $data = null;
    }
        
    //returns data as JSON format
    echo json_encode($data);
    
?>