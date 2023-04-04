<?php 
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

  	$db = new SQLite3('./../clientdb.db');

	$num = 0;
	$sensors_arr = array();
	$sensors_arr['data'] = array();
	$result = $db->query('SELECT * FROM sensor order by sensor_id');
	while ($row = $result->fetchArray()) {
		$num++;
		extract($row);
		$sensor_item = array(
			'sensor_id' => $sensor_id,
			'sensor_name' => $sensor_name,
			'sensor_type' => $sensor_type,
			'sensor_on' => $sensor_on,
			'img_name' => $img_name
		);

		//print_r($sensor_item);

		array_push($sensors_arr['data'], $sensor_item);
	}
	echo json_encode($sensors_arr);

	if($num == 0) {
		echo json_encode(array('message' => 'No sensors found'));
	}


?>