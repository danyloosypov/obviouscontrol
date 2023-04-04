<?php

//echo "<script>alert('asdad')</script>";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$datestart = "1900-01-01";
$dateend = date("Y-m-d H:i");

if(isset($_POST['datestart'])) {
    if($_POST['datestart'] == "") {
        $datestart = "1900-01-01";
    } else {
        $datestart = $_POST['datestart'];
    }
} else {
    $datestart = "1900-01-01";
}

if(isset($_POST['dateend'])) {
    if($_POST['dateend'] == "") {
        $dateend = date("Y-m-d H:i");
    } else {
        $dateend = $_POST['dateend'];
    }
} else {
    $dateend = date("Y-m-d H:i");
}

function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

$db = new SQLite3('clientdb.db');
$data = array();
$results = $db->query("SELECT value, `datetime` FROM sensor_value where sensor_id = '$id' and datetime >= '$datestart' and datetime <= '$dateend'");

$fileName = "export-data_" . date('Y-m-d') . ".xls";

$fields = array('VALUE', 'DateTime'); 

$excelData = implode("\t", array_values($fields)) . "\n"; 

while ($row = $results->fetchArray()) {
    $lineData = array($row['value'], $row['datetime']);
    array_walk($lineData, 'filterData'); 
    $excelData .= implode("\t", array_values($lineData)) . "\n"; 
}

header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 

echo $excelData; 

?>