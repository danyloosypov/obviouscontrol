<?php 

$statusmsg = "";	
$rcv_message = "";
//global $client = "";
$username = '';
$active = 0;
//$db = new SQLite3('clientdb.db');

/*$results = $db->query('SELECT * FROM system');
while ($row = $results->fetchArray()) {
    echo $row['param_value'] . "\n";
}
*/
init();


function publish_message($msg, $topic, $server, $port, $keepalive) {
	$client = new Mosquitto\Client();
	$client->onConnect('connect');
	$client->onDisconnect('disconnect');
	$client->onPublish('publish');
	$client->connect($server, $port, $keepalive);

	try {
		$client->loop();
		$mid = $client->publish($topic, $msg);
		$client->loop();
	} catch(Mosquitto\Exception $e){
		echo 'Exception';
		return;
	}
    $client->disconnect();
	unset($client);
}

function read_topic($topic, $server, $port, $keepalive, $timeout) {
	$client = new Mosquitto\Client();
	$client->onConnect('connect');
	$client->onDisconnect('disconnect');
	$client->onSubscribe('subscribe');
	$client->onMessage('message');
	$client->connect($server, $port, $keepalive);
	$client->subscribe($topic, 1);

	$date1 = time();
	$GLOBALS['rcv_message'] = '';
	while (true) {
			$client->loop();
			sleep(1);
	}

	$client->disconnect();
	unset($client);
}

/*****************************************************************
 * Call back functions for MQTT library
 * ***************************************************************/
function connect($r) {
		if($r == 0) echo "{$r}-CONX-OK|";
		if($r == 1) echo "{$r}-Connection refused (unacceptable protocol version)|";
		if($r == 2) echo "{$r}-Connection refused (identifier rejected)|";
		if($r == 3) echo "{$r}-Connection refused (broker unavailable )|";
}

function publish() {
        global $client;
        echo "Mesage published:";
}

function disconnect() {
	echo "Disconnected|";
}


function subscribe() {
	    //**Store the status to a global variable - debug purposes
	$GLOBALS['statusmsg'] = $GLOBALS['statusmsg'] . "SUB-OK|";
}

function message($message) {
	global $client;
	global $username;
	global $active;
	$db = new SQLite3('clientdb.db');
	echo "MSG " . $message->payload . "\n";
	echo "MSG " . $message->topic . "\n";

	if(strpos($message->topic, $username . '/esp') !== false) {
		sleep(10);
		$results = $db->query('SELECT * FROM sensor');
		while ($row = $results->fetchArray()) {
			publish_message($row['sensor_on'], $username . "/controller/" . $row['sensor_id'], 'localhost', 1883, 5);
		   // echo $row['param_value'] . "\n";
		}
	}

	if(strpos($message->topic, $username . '/service') !== false)
	{
		if ($message->payload == 'block_user')
		{
			$statement = $db->prepare("update system set param_value = :value where param_name = 'active'");
			$statement->bindValue(':value', 0);
			$result = $statement->execute();

			$active = 0;
		}

		if ($message->payload == 'unblock_user')
		{

			$statement = $db->prepare("update system set param_value = :value where param_name = 'active'");
			$statement->bindValue(':value', 1);
			$result = $statement->execute();

			$active = 1;
		}

		if($message->topic == $username . '/service/datestart') {
			$statement = $db->prepare("update system set param_value = :value where param_name = 'date_start'");
			$statement->bindValue(':value', $message->payload);
			$result = $statement->execute();
		}

		if($message->topic == $username . '/service/dateend') {
			$statement = $db->prepare("update system set param_value = :value where param_name = 'date_end'");
			$statement->bindValue(':value', $message->payload);
			$result = $statement->execute();

		}
	}
	else if (strpos($message->topic, '/sensors/value') !== false)
	{
		checkPeriod();

		$array_name = explode('/', $message->topic);

		if(count($array_name) == 4) {
			$senNum = $array_name[3];

			if ($active) {
				$statement = $db->prepare("insert into sensor_value values (:id, :value, :time)");
				$statement->bindValue(':id', $senNum);
				$statement->bindValue(':value', $message->payload);
				$statement->bindValue(':time', date("Y-m-d H:i:s"));
				$result = $statement->execute();
			}
		}

	}
	$db->close();
	unset($db);

}

function init() {
	$db = new SQLite3('clientdb.db');
	global $username;
	global $active;

	$results = $db->query('SELECT * FROM sensor');
	while ($row = $results->fetchArray()) {
	    echo $row['sensor_name'] . "\n";
	}

	$results = $db->query('SELECT * FROM system');
	while ($row = $results->fetchArray()) {
	    echo $row['param_name'] . " " . $row['param_value'] . "\n";
	}

	checkPeriod();

	$results = $db->query("SELECT param_value FROM system where param_name = 'active'");
	$row = $results->fetchArray();
	$active = $row['param_value'];
	//echo $active . "\n";



	$results = $db->query("SELECT param_value FROM system where param_name = 'user_name'");
	$row = $results->fetchArray();
	$username = $row['param_value'];

	$db->close();
	unset($db);

	//echo $username . "\n";

	read_topic($username . '/#', 'localhost', 1883, 6000, 5);
}


function checkPeriod() {
	$db = new SQLite3('clientdb.db');
	global $active;

	$today = date("Y-m-d");

	$date1 = new DateTime($today);

	$results = $db->query("SELECT param_value FROM system where param_name = 'date_end'");

	$row = $results->fetchArray(SQLITE3_ASSOC);

	$dateend = $row['param_value'];

	$date2 = new DateTime($dateend);

	$interval = $date1->diff($date2);

	if($interval->days <= 0) {
		$statement = $db->prepare("update system set param_value = :value where param_name = 'active'");

		$statement->bindValue(':value', 0);

		$result = $statement->execute();

		$active = 0;
	}

	$db->close();
	unset($db);
}

?>