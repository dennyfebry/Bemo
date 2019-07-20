<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'config.php';

    $data = array();

    $query = "SELECT * FROM daftar_servis ";
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