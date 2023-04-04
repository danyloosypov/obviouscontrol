<?php /*
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');*/
/*
if(isset($_GET['idon'])) {
	$id = $_GET['idon'];
	$db = new SQLite3('./../clientdb.db');

	//global $db;

	$statement = $db->prepare("update sensor set sensor_on = :value where sensor_id = :id");
	$statement->bindValue(':value', 1);
	$statement->bindValue(':id', $id);
	$result = $statement->execute();

	$results = $db->query("SELECT param_value FROM system where param_name = 'user_name'");
	$row = $results->fetchArray();
	$username = $row['param_value'];

   	publish_message('1', $username . '/controller/' . $id, 'localhost', 1883, 5);

	$db->close();
	unset($db);
	echo json_encode("sada");


}

if(isset($_GET['idoff'])) {
	$id = $_GET['idoff'];
	$db = new SQLite3('./../clientdb.db');

	//global $db;

	$statement = $db->prepare("update sensor set sensor_on = :value where sensor_id = :id");
	$statement->bindValue(':value', 0);
	$statement->bindValue(':id', $id);
	$result = $statement->execute();

	$results = $db->query("SELECT param_value FROM system where param_name = 'user_name'");
	$row = $results->fetchArray();
	$username = $row['param_value'];

    publish_message('0', $username . '/controller/' . $id, 'localhost', 1883, 5);

    $db->close();
	unset($db);

	echo json_encode("sada");

}

function publish_message($msg, $topic, $server, $port, $keepalive) {

	$client = new Mosquitto\Client();
	//$client->onConnect('connect');
	//$client->onDisconnect('disconnect');
	$client->onPublish('publish');
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

function connect($r) {
		if($r == 0) echo "{$r}-CONX-OK|";
		if($r == 1) echo "{$r}-Connection refused (unacceptable protocol version)|";
		if($r == 2) echo "{$r}-Connection refused (identifier rejected)|";
		if($r == 3) echo "{$r}-Connection refused (broker unavailable )|";
}

function publish() {

}

function disconnect() {
        echo "Disconnected|";
}
*/
?>