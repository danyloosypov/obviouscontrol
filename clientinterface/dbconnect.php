<?php 

	session_start();

    $db = new SQLite3('clientdb.db');

    function check_auth(): bool
	{
	    return !!($_SESSION['username'] ?? false);
	}
/*
	$result = $db->query('Alter table sensor add img_name text');
	$result = $db->query('Update sensor set img_name = temp where sensor_id = 1 or sensor_id = 5');
	$result = $db->query('Update sensor set img_name = water where sensor_id = 2');
	$result = $db->query('Update sensor set img_name = humidity where sensor_id = 4');
	$result = $db->query('Update sensor set img_name = light where sensor_id = 6 or sensor_id = 7');
	$result = $db->query('Update sensor set img_name = heater where sensor_id = 8');
	$result = $db->query('Update sensor set img_name = food_quantity where sensor_id = 9');
	$result = $db->query('Update sensor set img_name = doors where sensor_id = 10');
	$result = $db->query('Update sensor set img_name = feeder where sensor_id = 11');
	$result = $db->query('Update sensor set img_name = drinker where sensor_id = 12');
	$result = $db->query('Update sensor set img_name = conditioner where sensor_id = 13');*/




	
?>