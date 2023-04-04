<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


	$contacts = $_GET['contacts'];
	$email = $_GET['email'];
	$address = $_GET['address'];
	$username = $_GET['username'];
    $password = $_GET['password'];


    include("includes/db.php");

  	$get_pro = "update users set contacts = '$contacts', user_address = '$address', user_email = '$email', user_pass = '$password' where username = '$username'";

    $run_pro = mysqli_query($connection, $get_pro);

    $data = array();

    $data['contacts'] = $contacts;
    $data['email'] = $email;
    $data['address'] = $address;
    $data['password'] = $password;


    if($run_pro) {
		  echo json_encode($data);
    } else {
		  echo json_encode("Error");
    }


?>