<?php

header('Access-Control-Allow-rigin: *');
header('Content-Type: application/json');

include("./../includes/db.php");


    if(isset($_GET['date'])) {
        $date = $_GET['date'];

        $data = array();

        $get_pro = "Select * from payments where payment_date = '$date'";

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
    } else {
        $data = array();

        $get_pro = "Select * from payments";

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
    }

?>