


<?php
	include("includes/db.php");

	if(isset($_GET['edit_order'])) {
		$edit_id = $_GET['edit_order'];

		$get_p = "Select * from orders where order_id = '$edit_id'";

		$run_edit = mysqli_query($connection, $get_p);

		$row_edit = mysqli_fetch_array($run_edit);

		$order_status = $row_edit['order_status'];

		$user_id = $row_edit['user_id'];

		$order_date = $row_edit['order_date'];

		$query = "Select * from users where user_id = '$user_id'";

		$run = mysqli_query($connection, $query);

		$row = mysqli_fetch_array($run);

		$contacts = $row['contacts'];

		$email = $row['user_email'];

		$user_address = $row['user_address'];


	}



?>



	<div class="d-xl-flex justify-content-between align-items-start">
    	<h1 class="text-dark font-weight-bold mb-2"> Edit Order</h1>
	</div>

	<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" name="o_id" value="<?php echo $edit_id ?>" class="form-control">
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Contacts</label>
							<div class="col-md-6">
								<input type="text" value="<?php echo $contacts ?>" disabled class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" value="<?php echo $email ?>" disabled class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" value="<?php echo $user_address ?>" disabled class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Order Status</label>
							<div class="col-md-6">
								<input type="text" name="order_status" value="<?php echo $order_status ?>" required class="form-control">
							</div>
						</div>
						<!--<div class="form-group">
							<label for="" class="col-md-3 control-label">Order Date</label>
							<div class="col-md-6">
								<input type="text" name="order_date" value="<?php echo $order_date ?>" required class="form-control">
							</div>
						</div>-->
						<div class="form-group">
			              <label for="" class="col-md-3 control-label">Date End</label>
			              <div class="col-md-6">
			                <input type="date" name="order_date" class="form-control" value="<?php echo $order_date ?>">
			              </div>
			            </div>

						<div class="form-group">
							<label for="" class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" name="update" value="Update Order" class="btn btn-primary form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
		if(isset($_POST['update'])) {
			$o_id = $_POST['o_id'];

			$order_status = $_POST['order_status'];
			$order_date = $_POST['order_date'];



			$update = "update orders set order_status = '$order_status', order_date = '$order_date' where order_id = '$o_id'";

			$res = mysqli_query($connection, $update);

			if($res) {
				echo "<script> window.open('index.php?orders', '_self') </script>";
			} else {
				echo "<script> alert('Failed to update') </script>";
			}
		}
	?>

