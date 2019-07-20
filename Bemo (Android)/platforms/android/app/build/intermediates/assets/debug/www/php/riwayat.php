<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    require_once 'config.php';

    $data = array();

    if($_POST){
        $userID = $_POST['userID'];
        $query = "SELECT id,tgl_keluar,keterangan,status FROM pesanan WHERE status = '3' AND user_id = '$userID' ORDER BY tgl_keluar DESC ";
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
        echo json_encode($obj);
    }
    
?>