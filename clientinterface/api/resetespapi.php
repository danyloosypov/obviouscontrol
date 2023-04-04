<?php
	$db = new SQLite3('./../clientdb.db');

	$statement = $db->prepare("update sensor set sensor_on = :value");
	$statement->bindValue(':value', 0);
	$result = $statement->execute();

	$results = $db->query("SELECT param_value FROM system where param_name = 'user_name'");
	$row = $results->fetchArray();
	$username = $row['param_value'];

	publish_message('0', $username . '/controller/restart', 'localhost', 1883, 5);

	$db->close();
	unset($db);

	echo json_encode("restarted");








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
        /*global $client;
        //echo "Mesage published:";
echo "<script> window.open('index.html', '_self') </script>";*/
}

function disconnect() {
        echo "Disconnected|";
}


?>