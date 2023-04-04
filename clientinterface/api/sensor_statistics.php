<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if(isset($_GET['id'])) {
		$id = $_GET['id'];

		$db = new SQLite3('./../clientdb.db');

		$dots = array();
		$dots['arrx'] = array();
		$dots['arry'] = array();

		$results = $db->query("SELECT value, `datetime` FROM sensor_value where sensor_id = '$id'");
	    $dataPoints = Array();
	    $arrx = Array();
	    $arry = Array();
		while ($row = $results->fetchArray()) {
			$value = $row['value'];
			$date = $row['datetime'];
			$arrx[] = $date;
			$arry[] = $value;

		}

		$dots['arrx'] = $arrx;
		$dots['arry'] = $arry;

		$results = $db->query("SELECT max(value) as maxval, min(value) as minval, max(datetime) as maxdate, min(datetime) as mindate FROM sensor_value where sensor_id = '$id'");
	   	$row = $results->fetchArray();
		$maxval = $row['maxval'];
		$minval = $row['minval'];
		$maxdate = $row['maxdate'];
		$mindate = $row['mindate'];

		$dots['minval'] = $minval;
		$dots['maxval'] = $maxval;
		$dots['maxdate'] = $maxdate;
		$dots['mindate'] = $mindate;

		echo json_encode($dots);


	}
?>