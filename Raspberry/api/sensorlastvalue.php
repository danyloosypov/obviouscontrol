<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$db = new SQLite3('./../clientdb.db');

	$value = "";

	$results = $db->query("SELECT value FROM sensor_value where sensor_id = '$id' order by datetime desc");
	
	$row = $results->fetchArray();

	$value = $row['value'];

	$data = array("data" => $value);

	
	echo json_encode($data);

	}

?>