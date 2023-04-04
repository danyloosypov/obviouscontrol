<?php

header('Access-Control-Allow-rigin: *');
header('Content-Type: application/json');

include("includes/db.php");

    $days = $_GET['days'];

    $username = $_GET['username'];

    $query = "Select * from users where username = '$username'";

    $run = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($run);

    $dateend = $row['dateend'];

    $user_id = $row['user_id'];

    $json_data = file_get_contents('priceperday.php');

    $priceperday = json_decode($json_data);

    $payment_sum = $days * $priceperday;

    $payment_date = date('Y-m-d');

    $dateend = date('Y-m-d', strtotime($dateend . ' + ' . $days . ' days'));

  	$get_pro = "update users set dateend = '$dateend' where username = '$username'";

    $run_pro = mysqli_query($connection, $get_pro);

    $data = Array();

    $data['dateend'] = $dateend;

    $get_order = "Select order_id from orders where user_id = '$user_id'";

    $run_order = mysqli_query($connection, $get_order);

    $result_order = mysqli_fetch_array($run_order);

    $order_id = $result_order['order_id'];

    $ins_payment = "Insert into payments (user_id, order_id, payment_date, payment_sum, period) values ('$user_id', '$order_id', '$payment_date', '$payment_sum', '$days')";

    $run_in = mysqli_query($connection, $ins_payment);

    if($run_pro) {
		  echo json_encode($data);
    } else {
		  echo json_encode("Error");
    }


?>