<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    require_once 'config.php';

    $data = array();

    if($_POST){
        $userID = $_POST['userID'];
        $riwayatID = $_POST['riwayatID'];
        $query = "SELECT pengguna.nama, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.kode, pesanan.keterangan, pesanan.wkt_mulai, pesanan.wkt_selesai, daftar_servis.nama_servis, daftar_servis.waktu_pengerjaan, daftar_servis.harga
        FROM servis
        LEFT JOIN daftar_servis ON daftar_servis.kode_servis = servis.kode_servis
        LEFT JOIN pesanan ON pesanan.id = servis.pesanan_id
        LEFT JOIN pengguna ON pengguna.id = pesanan.user_id
        WHERE pesanan.montir_id = '$userID' AND servis.pesanan_id = '$riwayatID'";
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
