<?php
header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
require_once 'config.php';


$response = array();

if ($_POST) {
    $fullName = $_POST['nama'];
    $userEmail = $_POST['email'];
    $userPassword = md5($_POST['password']);

    $query = "INSERT INTO pengguna(nama,email,password,akses,aktif) VALUES('$fullName', '$userEmail', '$userPassword', 'user', '0')";
    $result = mysqli_query($db, $query);
    // check for successfull registration

    if ($result) {
        $response['email'] = $userEmail;
        $response['status'] = 'success';
        $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! terdaftar dengan sukses, Silakan verifikasi email anda';
        
    } else {
        $response['status'] = 'error'; // tidak bisa mendaftar
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK! terdaftar tidak berhasil, silakan coba lagi :)';
    }
}else{
    $response= "Data tidak Masuk";
}
echo json_encode($response);
 