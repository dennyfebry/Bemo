<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'config.php';
require_once 'phpmailer/classes/class.phpmailer.php';

$data = array();

if ($_POST) {
    $fullName = $_POST['nama'];
    $userEmail = $_POST['email'];
    $query = "SELECT id,email FROM pengguna WHERE email = '$userEmail' ";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $userData = mysqli_fetch_assoc($result);

        $id = $userData["id"];

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = ‘tls’;
        $mail->Host = "ssl://smtp.gmail.com"; //hostname masing-masing provider email
        $mail->SMTPDebug = 2;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "noreply.bemo25@gmail.com"; //user email
        $mail->Password = "bemo12345"; //password email
        $mail->SetFrom("noreply.bemo25@gmail.com", "Admin Bemo"); //set email pengirim
        $mail->Subject = "Verifikasi Email"; //subyek email
        $mail->AddAddress($userEmail,  $fullName); //tujuan email
        $mail->MsgHTML("Anda telah mengirim permintaan untuk mereset kata sandi<br/>Silakan klik <a href='http://dennyfebrygo.com/bemo/adminbemo/index.php/email/lupa/$id'>di sini</a> untuk reset kata sandi<br/><br/>Terimakasih");
        if ($mail->Send()) $data['email'] = "Message has been sent";
        else $data['email'] = "Failed to sending message";

        $data = $userData;
    } else {
        $data = 'tidak berhasil';
    }
    //returns data as JSON format
    echo json_encode($data);
} else {
    $obj = (object)[
        'error' => 'user tidak ditemukan!'
    ];
    http_response_code(400);
    echo json_encode($obj);
}
 