<?php 

    $json = file_get_contents("http://127.0.0.1/api/service.php");

    $json_data = json_decode($json, true);

    $user = $json_data["user_name"];
    $pass = $json_data["password"];

    if($_POST['username'] == $user && $_POST['password'] == $pass) {
        session_start();
        $_SESSION['username'] = $user;
        echo $_SESSION['username'];
        echo "<script>window.open('./../index.php', '_self')</script>";
    } else {
        echo "<script>alert('Wrong credentials')</script>";
        echo "<script>window.open('./../login.php', '_self')</script>";
    }
?>