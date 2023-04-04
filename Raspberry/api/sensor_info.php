<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new SQLite3('./../clientdb.db');

    $result = $db->query("SELECT * FROM sensor where sensor_id = '$id'");
    $sensors_arr = array();
	$sensors_arr['data'] = array();
    $row = $result->fetchArray();
    extract($row);
    $sensor_item = array(
        'sensor_id' => $sensor_id,
        'sensor_name' => $sensor_name,
        'sensor_type' => $sensor_type,
        'sensor_on' => $sensor_on,
        'img_name' => $img_name
    );

    $data = array("data" => $sensor_item);	

    echo json_encode($data);

}
?>