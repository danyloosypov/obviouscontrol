<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');



    include("includes/db.php");

  	$get_pro = "Select priceday from admin";

    $run_pro = mysqli_query($connection, $get_pro);

    $row = mysqli_fetch_array($run_pro);

    $data = $row['priceday'];

    if($run_pro) {
		  echo json_encode($data);
    } else {
		  echo json_encode("Error");
    }


?>