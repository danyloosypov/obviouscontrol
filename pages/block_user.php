
<?php

	if(isset($_GET['block_user'])) {

		$id = $_GET['block_user'];

	 	$get_pro = "Select username from users where user_id = '$id'";

        $run_pro = mysqli_query($connection, $get_pro);

        while($row_pro = mysqli_fetch_array($run_pro)) {

          $username = $row_pro['username'];
      	}

		block_user($username);

		$sql = "Update users set user_status = 'Unactive' where user_id = '$id'";

		$res = mysqli_query($connection, $sql);

		if($res) {
			echo "<script>window.open('index.php?customers', '_self')</script>";
		}
	}
 ?>



