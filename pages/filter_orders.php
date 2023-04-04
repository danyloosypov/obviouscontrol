<?php

header('Access-Control-Allow-rigin: *');
header('Content-Type: application/json');

$status = $_GET['status'];
$date = $_GET['date'];

if(isset($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = "";
}

if(isset($_GET['date'])) {
    $date = $_GET['date'];
} else {
    $date = "";
}

include("./../includes/db.php");

$get_pro = "Select * from orders where order_status like '%$status%' and order_date like '%$date%'";

$run_pro = mysqli_query($connection, $get_pro);

while($row = mysqli_fetch_assoc($run_pro))
{
    $dataArr = array();

    array_push($dataArr, $row['order_id']);

    $user_id = $row['user_id'];

    $get_info = "Select * from users where user_id = '$user_id'";

    $run_user = mysqli_query($connection, $get_info);

    $row_user = mysqli_fetch_assoc($run_user);

    array_push($dataArr, $row_user['contacts']);

    array_push($dataArr, $row_user['user_email']);

    array_push($dataArr, $row_user['user_address']);

    array_push($dataArr, $row['order_date']);

    array_push($dataArr, $row['order_status']);

    $data[] = $dataArr;
}

if($run_pro) {
    echo json_encode($data);
} else {
    echo json_encode("no data");
}
    




?>