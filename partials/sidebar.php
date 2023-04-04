<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="index.php?dashboard">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title"><?php echo $translations['dashboard-title']['content'] ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#customers" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title"><?php echo $translations['customers-title']['content'] ?></span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="customers">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="index.php?customers"><?php echo $translations['customers-title']['content'] ?></a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php?add_customer"><?php echo $translations['add-customer-title']['content'] ?></a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php?orders">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title"><?php echo $translations['orders-title']['content'] ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php?payments">
        <span class="icon-bg"><i class="mdi mdi-cash-multiple menu-icon"></i></span>
        <span class="menu-title"><?php echo $translations['payments-title']['content'] ?></span>
      </a>
    </li>
    <li class="nav-item documentation-link">
      <a class="nav-link" href="documentation.pdf" target="_blank">
        <span class="icon-bg">
          <i class="mdi mdi-file-document-box menu-icon"></i>
        </span>
        <span class="menu-title"><?php echo $translations['documentation-title']['content'] ?></span>
      </a>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="index.php?settings" class="nav-link" data-toggle="modal" data-target="#staticBackdrop"><i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title"><?php echo $translations['settings-title']['content'] ?></span>
        </a>
      </div>
    </li>

    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title"><?php echo $translations['logout-title']['content'] ?></span></a>
      </div>
    </li>
  </ul>
</nav>




<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body ">
              <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>


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
    <section class="" style="background-color: #f4f5f7;">
      <div class="container ">
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col col-lg-12 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
              <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white"
                  style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <img src="assets/images/cloud.png"
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
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <input class="btn btn-outline-primary ms-1" type="submit" name="update" value="Update">
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

          </div>
      </div>
  </div>
</div>