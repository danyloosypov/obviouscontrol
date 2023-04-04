<?php
    $db = new SQLite3('clientdb.db');

if(isset($_COOKIE['lang'])) {
    $language = $_COOKIE['lang'];
} else {
    setcookie("lang", "en", time() + 3600);
}

//echo "<script>alert('$language')</script>";

$query = "Select * from translations where language = '$language'";

$result = $db->query($query);

while ($row = $result->fetchArray()) {
    $translations[$row['element_id']] = $row;
}


?>