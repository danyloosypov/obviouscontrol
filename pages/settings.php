
<style>
  .gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
</style>

<?php

  $query = "Select * from admin";

  $run = mysqli_query($connection, $query);

  while($row = mysqli_fetch_array($run)) {
    $email = $row['email'];

    $pass = $row['password'];

  }


?>

<form action="" method="POST">
    <section class="vh-100" style="background-color: #f4f5f7;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
              <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white"
                  style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                  <h5>Admin page</h5>
                  <p>WELCOME</p>
                </div>
                <div class="col-md-8">
                  <div class="card-body p-4">
                    <h6>Information</h6>
                    <hr class="mt-0 mb-4">

                    <div class="row pt-1">
                      <div class="col-12 mb-3">
                        <h6>Email</h6>
                        <input class="form-control" name="email" type="text" value="<?php echo $email ?>">
                      </div>
                    </div>
                    <div class="row pt-1">
                      <div class="col-12 mb-3">
                        <h6>Password</h6>
                        <input class="form-control" name="password" type="text" value="<?php echo $pass ?>">
                      </div>
                    </div>
                    <h6>---------------------------------------------------</h6>
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <input class="btn btn-outline-primary ms-1" type="submit" name="update" value="Update">
                      </div>
                      <div class="col-6 mb-3">
                        <input class="btn btn-outline-primary ms-1" type="submit" name="close" value="Close">
                      </div>
                    </div>
                    <div class="d-flex justify-content-start">
                      <a href=""><i class="fa fa-facebook-square fa-lg me-3" aria-hidden="true"></i></a>
                      <a href=""><i class="fa fa-instagram fa-lg me-3" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</form>


<?php


    if(isset($_POST['update'])) {

      $email = $_POST['email'];

      $password = $_POST['password'];

      $sql = "update admin set email = '$email', password = '$password'";

      $res = mysqli_query($connection, $sql);

      echo "<script>window.open('index.php?dashboard', '_self')</script>";


    }
  ?>