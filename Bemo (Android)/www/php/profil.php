<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'config.php';

    $data = array();

    if($_POST){
        $userEmail = $_POST['email'];
        $query = "SELECT * FROM pengguna WHERE email = '$userEmail' ";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1){
            $userData = mysqli_fetch_assoc($result);
            $data = $userData;
        }else{
            $data = null;
        }
        
        //returns data as JSON format
        echo json_encode($data);
    }else{
        $obj = (object) [
            'error' => 'user tidak ditemukan!'
        ];
        http_response_code(400);
        echo json_encode($obj);
    }
?>