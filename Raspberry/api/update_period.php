<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

	$days = $_GET['days'];
	$db = new SQLite3('./../clientdb.db');


	$results = $db->query("SELECT param_value FROM system where param_name = 'user_name'");
	$row = $results->fetchArray();
	$username = $row['param_value'];
	$json = file_get_contents("http://192.168.0.5/updatedateend.php?username=$username&days=$days");

	$data = json_decode($json, true);
/*
	echo $json;
	echo $data['dateend'] . "asdasdads";

	die();
*/
	$statement = $db->prepare("update system set param_value = :value where param_name = :name");
	$statement->bindValue(':value', $data['dateend']);
	$statement->bindValue(':name', 'date_end');
	$result = $statement->execute();


	$db->close();
	unset($db);
	//echo json_encode("Changed");

	echo "<script>window.open('./../index.php', '_self')</script>";
	header("Location: ./../index.php");

?>