<?php
    header('Access-Control-Allow-Origin: *');
    // header('Content-type: application/json');
	require_once 'config.php';

	$response = array();

	if ($_POST) {
		$userID = $_POST['userID'];
        $status = $_POST['status'];
		$query = "DELETE FROM pesanan WHERE user_id = '$userID' AND status = '$status' ";
		$result = mysqli_query($db, $query);

        if ($result) {
			$response['status'] = 'success';
			$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; OK! Kamu telah membatalkan antrian';
        } else {
            $response['status'] = 'error'; // tidak bisa mendaftar
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tidak OK! Kamu masih di dalam antrian :)';

        }
	}
	else{
        $response = null;
    }
	echo json_encode($response);
?>