<?php

header('Access-Control-Allow-rigin: *');
header('Content-Type: application/json');

$contacts = "";
$address = "";
$email = "";
$active = "";
$datestart = "";
$dateend = "";


if(isset($_GET['contacts'])) {
    $contacts = $_GET['contacts'];
} else {
    $contacts = "";
}

if(isset($_GET['address'])) {
    $address = $_GET['address'];
} else {
    $address = "";
}

if(isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = "";
}

if(isset($_GET['active'])) {
    $active = $_GET['active'];
} else {
    $active = "";
}

if(isset($_GET['datestart'])) {
    $datestart = $_GET['datestart'];
} else {
    $datestart = "";
}

if(isset($_GET['dateend'])) {
    $dateend = $_GET['dateend'];
} else {
    $dateend = "";
}

include("./../includes/db.php");

$get_pro = "Select * from users where contacts like '%$contacts%' and user_address like '%$address%' and user_email like '%$email%' and user_status like '%$active%' and datestart like '%$datestart%' and dateend like '%$dateend%'";

$run_pro = mysqli_query($connection, $get_pro);

while($row = mysqli_fetch_assoc($run_pro))
{
    $data[] = $row;
}

if($run_pro) {
    echo json_encode($data);
} else {
    echo json_encode("no data");
}
    




?>