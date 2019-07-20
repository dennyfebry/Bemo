<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    require_once 'config.php';

    $data = array();

    if($_POST){
        $userID = $_POST['userID'];
        $pesananID = $_POST['pesananID'];
        $query = "SELECT pengguna.nama, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.kode, pesanan.keterangan, pesanan.wkt_mulai, pesanan.wkt_selesai, daftar_servis.nama_servis, daftar_servis.waktu_pengerjaan, daftar_servis.harga FROM servis LEFT JOIN daftar_servis ON daftar_servis.kode_servis = servis.kode_servis LEFT JOIN pesanan ON pesanan.id = servis.pesanan_id LEFT JOIN pengguna ON pengguna.id = pesanan.montir_id WHERE pesanan.user_id = '$userID' AND servis.pesanan_id = '$pesananID' AND pesanan.status IN (1,2)";
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
            'error' => 'user tidak ditemukan!'
        ];
        http_response_code(400);
        echo json_encode($obj);
    }
    
?>