
<?php

	if(isset($_GET['delete_user'])) {

		$id = $_GET['delete_user'];



		$sql = "Delete from users where user_id = '$id'";

		$res = mysqli_query($connection, $sql);

		if($res) {
			echo "<script>window.open('index.php?customers', '_self')</script>";
		}
	}
 ?>



