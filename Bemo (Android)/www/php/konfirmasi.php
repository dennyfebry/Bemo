<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    require_once 'config.php';

    $data = array();

    if($_POST){
        $konfirmasiID = $_POST['konfirmasiID'];
        $query = "SELECT pengguna.nama, pengguna.no_kendaraan, pesanan.id, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.wkt_mulai, pesanan.kode, pesanan.keterangan, pesanan.status FROM pesanan LEFT JOIN pengguna ON pengguna.id = pesanan.user_id WHERE pesanan.id = '$konfirmasiID'";
        $result = mysqli_query($db, $query);
        $num_row = mysqli_num_rows($result);
        while($row=mysqli_fetch_object($result)){
            $data[]=$row;
        }

        
        if($num_row > 0){
            echo json_encode($data);
        }

    }else{
        $obj = (object) [
            'error' => 'user not found!'
        ];
        http_response_code(400);
        echo json_encode($obj);
    }
    
?>