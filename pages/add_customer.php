

<div class="d-xl-flex justify-content-between align-items-start">
    <h1 class="text-dark font-weight-bold mb-2"> <?php echo $translations['create-user-title']['content'] ?> </h1>
</div>

<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

</div>

<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
              <label for="" class="col-md-3 control-label"><?php echo $translations['contacts-label-title']['content'] ?></label>
              <div class="col-md-6">
                <input type="text" name="contacts" value="" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-3 control-label"><?php echo $translations['email-label-title']['content'] ?></label>
              <div class="col-md-6">
                <input type="text" name="email" value=""  class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-3 control-label"><?php echo $translations['address-label-title']['content'] ?></label>
              <div class="col-md-6">
                <input type="text" name="address" value=""  class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-3 control-label"><?php echo $translations['password-label-title']['content'] ?></label>
              <div class="col-md-6">
                <input type="text" name="password" value="" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <div class="col-md-6 custom-control custom-switch">
                  <input type="checkbox" name="block" class="custom-control-input" id="blocked">
                  <label class="custom-control-label" for="blocked"><?php echo $translations['block-label-title']['content'] ?></label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-3 control-label"><?php echo $translations['datestart-label-title']['content'] ?></label>
              <div class="col-md-6">
                <input type="date" name="datestart" id="start" class="form-control" name="datestart" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-3 control-label"><?php echo $translations['dateend-label-title']['content'] ?></label>
              <div class="col-md-6">
                <input type="date" name="dateend" class="form-control" name="dateend" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-md-3 control-label"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" value="<?php echo $translations['create-user-btn-title']['content'] ?>" class="btn btn-primary form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<script>

</script>



<?php
  if(isset($_POST['submit'])) {
      $contacts = $_POST['contacts'];

      $email = $_POST['email'];

      $address = $_POST['address'];

      $password = $_POST['password'];

      $block = $_POST['block'];

      if($block == "on") {
        $block = "Active";
      } else {
        $block = "Unactive";
      }

      $datestart = $_POST['datestart'];

      $dateend = $_POST['dateend'];

      $query = "SELECT user_id FROM `users` order by user_id desc limit 1";

      $res = mysqli_query($connection, $query);

      $row_edit = mysqli_fetch_array($res);

      $user_id = $row_edit['user_id'];

      $int_value = intval( $user_id );

      $int_value += 1;


      $query = "Insert into users (contacts, username, user_address, user_email, user_pass, user_status, datestart, dateend)
       values ('$contacts', 'user" . $int_value . "', '$address', '$email', '$password', '$block', '$datestart', '$dateend')";

      $res = mysqli_query($connection, $query);

      echo "<script> window.open('index.php?customers', '_self') </script>";
  }
?>