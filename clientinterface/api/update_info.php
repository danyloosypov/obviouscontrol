<?php 
header('Access-Control-Allow-rigin: *');
header('Content-Type: application/json');

	$contacts = $_GET['contacts'];
	$email = $_GET['email'];
	$address = $_GET['address'];
	$db = new SQLite3('./../clientdb.db');


	$results = $db->query("SELECT param_value FROM system where param_name = 'user_name'");
	$row = $results->fetchArray();
	$username = $row['param_value'];

	$json = file_get_contents("http://192.168.0.5/phpservice.php?contacts='$contacts'&email='$email'&address='$address'&username='$username'");

	$data = json_decode($json, true);

	$contacts = $data['contacts'];
	$email = $data['email'];
	$address = $data['address'];


	$statement = $db->prepare("update system set param_value = :value where param_name = :name");
	$statement->bindValue(':value', $contacts);
	$statement->bindValue(':name', 'contacts');
	$result = $statement->execute();

	$statement = $db->prepare("update system set param_value = :value where param_name = :name");
	$statement->bindValue(':value', $email);
	$statement->bindValue(':name', 'user_email');
	$result = $statement->execute();

	$statement = $db->prepare("update system set param_value = :value where param_name = :name");
	$statement->bindValue(':value', $address);
	$statement->bindValue(':name', 'user_address');
	$result = $statement->execute();


	$db->close();
	unset($db);
	//echo json_encode("Changed");


function publish_message($msg, $topic, $server, $port, $keepalive) {

	$client = new Mosquitto\Client();
	//$client->onConnect('connect');
	//$client->onDisconnect('disconnect');
	//$client->onPublish('publish');
	$client->connect($server, $port, $keepalive);

	try {
		$client->loop();
		$mid = $client->publish($topic, $msg);
		$client->loop();
		}catch(Mosquitto\Exception $e){
				echo 'Exception';
				return;
	}
    $client->disconnect();
	unset($client);
}

	echo "<script>window.open('./../index.php', '_self')</script>";
	header("Location: ./../index.php");

?>