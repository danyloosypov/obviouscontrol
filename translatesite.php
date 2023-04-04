<?php
include("includes/db.php");

if(isset($_COOKIE['lang'])) {
    $language = $_COOKIE['lang'];
} else {
    setcookie("lang", "en", time() + 3600);
}

$query = "Select * from translations where language = '$language'";

$run = mysqli_query($connection, $query);

$translations = array();

while ($row = mysqli_fetch_assoc($run)) {
    $translations[$row['element_id']] = $row;
}

?>