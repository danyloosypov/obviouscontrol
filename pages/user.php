


<?php
	include("includes/db.php");

	if(isset($_GET['edit_user'])) {
		$edit_id = $_GET['edit_user'];

		$get_p = "Select * from users where user_id = '$edit_id'";

		$run_edit = mysqli_query($connection, $get_p);

		$row_edit = mysqli_fetch_array($run_edit);

		$contacts = $row_edit['contacts'];

		$user_address = $row_edit['user_address'];

		$user_email = $row_edit['user_email'];

		$username = $row_edit['username'];

		$user_pass = $row_edit['user_pass'];

		$user_status = $row_edit['user_status'];

		$dateend = $row_edit['dateend'];

		$datestart = $row_edit['datestart'];


	}



?>



	<div class="d-xl-flex justify-content-between align-items-start">
    	<h1 class="text-dark font-weight-bold mb-2"> Edit User</h1>
	</div>

	<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" name="u_id" value="<?php echo $edit_id ?>" class="form-control">
						<input type="hidden" name="username" value="<?php echo $username ?>" class="form-control">
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Contacts</label>
							<div class="col-md-6">
								<input type="text" name="contacts" value="<?php echo $contacts ?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" name="email" value="<?php echo $email ?>"  class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Address</label>
							<div class="col-md-6">
								<input type="text" name="address" value="<?php echo $user_address ?>"  class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" value="<?php echo $username ?>" disabled class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Password</label>
							<div class="col-md-6">
								<input type="text" name="password" value="<?php echo $user_pass ?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
								<input type="text" value="<?php echo $user_status ?>" disabled class="form-control">
							</div>

						</div>
						<div class="form-group">
							<div class="col-md-3">
								<div class="col-md-6 custom-control custom-switch">
			                      <input type="checkbox" name="block" class="custom-control-input" id="blocked<?php echo $user_id ?>" <?php if($user_status == "Active") {echo " checked";} ?>>
			                      <label class="custom-control-label" for="blocked<?php echo $user_id ?>">Block</label>
			                  	</div>
							</div>

						</div>

						<div class="form-group">
							<label for="" class="col-md-3 control-label">Date Start</label>
							<div class="col-md-6">
								<input type="date" name="datestart" id="start" class="form-control" name="datestart" value="<?php echo $datestart ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-3 control-label">Date End</label>
							<div class="col-md-6">
								<input type="date" name="dateend" class="form-control" name="dateend" value="<?php echo $dateend ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" name="submit" value="Update User" class="btn btn-primary form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
		if(isset($_POST['submit'])) {
			$u_id = $_POST['u_id'];
			$contacts = $_POST['contacts'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$address = $_POST['address'];
			$password = $_POST['password'];
			$check_value = isset($_POST['block']) ? 1 : 0;
			if ($check_value) {
				$block = "Active";
			} else {

			   	$block = "Unactive";
			}
			//$block = $_POST['block'];
			$datestart = $_POST['datestart'];
			$dateend = $_POST['dateend'];




			$update = "update users set contacts = '$contacts', user_email = '$email', user_address = '$address', user_pass = '$password', user_status = '$block', datestart = '$datestart', dateend = '$dateend' where user_id = '$u_id'";

			$res = mysqli_query($connection, $update);

			if($res) {
				echo "<script> window.open('index.php?customers', '_self') </script>";
				changeDates($username, $datestart, $dateend);
			} else {
				echo "<script> alert('Failed to update') </script>";
			}
		}
	?>

