
<?php

	if(isset($_GET['delete_order'])) {

		$id = $_GET['delete_order'];



		$sql = "Delete from orders where order_id = '$id'";

		$res = mysqli_query($connection, $sql);

		if($res) {
			echo "<script>window.open('index.php?orders', '_self')</script>";
		}
	}
 ?>



