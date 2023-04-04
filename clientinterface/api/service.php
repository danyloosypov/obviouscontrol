<?php 
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

  	$db = new SQLite3('./../clientdb.db');

	$data = array();
	$result = $db->query('SELECT * FROM system');
	while ($row = $result->fetchArray()) {
	    $data[$row['param_name']] = $row['param_value'];
	}

	echo json_encode($data);

?>