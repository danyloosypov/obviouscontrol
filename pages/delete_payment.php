
<?php

	if(isset($_GET['delete_payment'])) {

		$id = $_GET['delete_payment'];

		$sql = "Delete from payments where payment_id = '$id'";

		$res = mysqli_query($connection, $sql);

		if($res) {
			echo "<script>window.open('index.php?payments', '_self')</script>";
		}
	}
 ?>



