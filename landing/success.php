<?php


include("./../includes/db.php");

    $startdate = date("Y-m-d");

    $startdate = date('Y-m-d', strtotime($startdate . ' + 10 days'));

    $query = "Select priceday from admin";

    $run = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($run);

    $price = $row['priceday'];


      $contacts = $_GET['contacts'];
      $email = $_GET['email'];
      $address = $_GET['address'];
      $password = $_GET['password'];
      $days = $_GET['days'];
      $total = $_GET['total'];


      $today = date("Y-m-d");

      $startdate = $_GET['datestart'];

      $dateend = date('Y-m-d', strtotime($startdate . " +  " .  $days . ' days'));

      $query5 = "SELECT user_id FROM `users` order by user_id desc limit 1";

      $res5 = mysqli_query($connection, $query5);

      $row_edit = mysqli_fetch_array($res5);

      $user_id5 = $row_edit['user_id'];

      $int_value = intval( $user_id5 );

      $int_value += 1;

      $query4 = "Insert into users (contacts, username, user_address, user_email, user_pass, user_status, datestart, dateend) values
      ('$contacts', 'user" . $int_value .  "', '$address', '$email', '$password', 'Unactive', '$startdate', '$dateend')";

      echo $query4;

      $run4 = mysqli_query($connection, $query4);

      $query1 = "Select user_id from users where contacts = '$contacts' and user_address = '$address' and user_email = '$email' and user_pass = '$password' and datestart = '$startdate' and dateend = '$dateend'";

      echo $query1;

      $run1 = mysqli_query($connection, $query1);

      $row2 = mysqli_fetch_array($run1);

      $user_id = $row2['user_id'];

      $query2 = "Insert into orders (user_id, order_date, order_status) values ('$user_id', '$today', 'Pending')";

      echo $query2;

      $run2 = mysqli_query($connection, $query2);

      $queryq = "Select order_id from orders where user_id = '$user_id' and order_date = '$today'";

      echo $queryq;

      $runq = mysqli_query($connection, $queryq);

      $rowq = mysqli_fetch_array($runq);

      $order_id = $rowq['order_id'];

      $query3 = "Insert into payments (user_id, order_id, payment_date, payment_sum, period) values ('$user_id', '$order_id', '$today', '$total', '$days')";

      $run3 = mysqli_query($connection, $query3);

      echo "<script>window.location.replace('thanks.php');</script>"


?>