<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    require_once 'config.php';

    $data = array();

    if($_POST){
        $userID = $_POST['userID'];
        $query = "SELECT pengguna.nama, pengguna.alamat, pengguna.no_hp, pengguna.merk_mobil, pengguna.model_mobil, pengguna.no_kendaraan, pesanan.id, pesanan.tgl_keluar, pesanan.keterangan FROM pesanan INNER JOIN pengguna ON pesanan.user_id = pengguna.id WHERE pesanan.status = '3' AND pesanan.montir_id = '$userID' ORDER BY pesanan.tgl_keluar DESC";
        // $query = "SELECT id,tgl_keluar,keterangan,status FROM pesanan WHERE status = '3' AND montir_id = '$userID' ORDER BY tgl_keluar DESC ";
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