<?php
	//$connection = mysqli_connect("localhost", "root", "", "obviouscontrol");
    	checkPayments();

/*function create_user($user, $pass, $customertopic) {
	echo getcwd() . "<br>";
	chdir('D:\Install\mosquittoBroker\mosquitto');

	//exec("mosquitto_passwd -U passwordfile");
	exec("mosquitto_passwd -b passwordfile " . $user . " " . $pass);

	//publish_message("mosquitto_passwd -U passwordfile", $customertopic, '192.168.0.102', 8883, 5);
	//publish_message($user . " " . $pass, $customertopic . "/createuser", '192.168.0.102', 8883, 5);
}*/

function block_user($username) {
	chdir('D:\Install\mosquittoBroker\mosquitto');
	/*echo getcwd() . "<br>";
	echo $username;*/
	exec('mosquitto_pub -h 192.168.0.5 -t "' . $username . '/service" -m "block_user"');
	//publish_message("block_user", "all/" . $username . "/", '192.168.0.102', 8883, 5);
}

function unblock_user($username) {
	chdir('D:\Install\mosquittoBroker\mosquitto');

	exec('mosquitto_pub -h 192.168.0.5 -t "' . $username . '/service" -m "unblock_user"');
	//echo "all/" . $username . "/";
	//error_log("all/" . $username . "/", 0);
	//error_log(1111,0);
	//publish_message("block_user", "all/user1/", '192.168.0.102', 8883, 5);
}

function changeDates($username, $datestart, $dateend) {
	chdir('D:\Install\mosquittoBroker\mosquitto');

	exec('mosquitto_pub -h 192.168.0.5 -t "' . $username . '/service/datestart" -m "' . $datestart . '"');
	exec('mosquitto_pub -h 192.168.0.5 -t "' . $username . '/service/dateend" -m "' . $dateend . '"');
}

function checkPayments() {

	$connection = mysqli_connect("localhost", "root", "", "obviouscontrol");

	$sql = "Select * from users";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) {
	  while($row = mysqli_fetch_assoc($result)) {
	    	$user_id = $row['user_id'];
        	$username = $row['username'];
        	$dateend = $row['dateend'];

        	$user_status = $row['user_status'];

        	$user_email = $row['user_email'];

		$date2 = new DateTime($dateend);

		$today = date("Y-m-d");

        	$date1 = new DateTime($today);

        	$interval = $date1->diff($date2);

        	if($interval->days == 1) {
        		$to = $user_email;
			$subject = "Obvious Control Subscription";
			$message = "Tommorow ends your subscription. If you want to continue working with us, please pay for it.";

			mail($to, $subject, $message);
        	}
		else if($interval->days == 0) {
        		$to = $user_email;
			$subject = "Obvious Control Subscription";
			$message = "Today ends your subscription. If you want to continue working with us, please pay for it.";

			mail($to, $subject, $message);

			$query = "update users set user_status = 'Unactive' where user_id = '$user_id'";

		        $run_pro = mysqli_query($connection, $query);

		        block_user($username);
        	}


	  }
	}
}


?>