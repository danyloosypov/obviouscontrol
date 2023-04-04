<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item documentation-link">
      <a class="nav-link" href="documentation.pdf" target="_blank">
        <span class="icon-bg">
          <i class="mdi mdi-file-document-box menu-icon"></i>
        </span>
        <span class="menu-title"><?php echo $translations['documentation-btn-title']['content'] ?></span>
      </a>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" onclick="reset()" class="nav-link" data-toggle="modal" data-target="#staticBackdrop"><i class="mdi mdi-restart menu-icon"></i>
          <span class="menu-title"><?php echo $translations['restart-btn-title']['content'] ?></span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" onclick="subscription()" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="mdi mdi-backup-restore menu-icon"></i>
          <span class="menu-title"><?php echo $translations['subscription-btn-title']['content'] ?></span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="index.php?settings" class="nav-link" data-toggle="modal" data-target="#staticBackdrop"><i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title"><?php echo $translations['settings-btn-title']['content'] ?></span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title"><?php echo $translations['logout-btn-title']['content'] ?></span></a>
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

$db = new SQLite3('clientdb.db');
$email;
$address;
$contacts;
$result = $db->query('SELECT * FROM system');
while ($row = $result->fetchArray()) {
  if($row['param_name'] == "contacts") {
    $contacts = $row['param_value'];
  }
  if($row['param_name'] == "user_address") {
    $address = $row['param_value'];
  }
  if($row['param_name'] == "user_email") {
    $email = $row['param_value'];
  }

  if($row['param_name'] == "date_start") {
    $date_start = $row['param_value'];
  }

  if($row['param_name'] == "date_end") {
    $date_end = $row['param_value'];
  }
}


?>

<form action="api/update_info.php" method="put">
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

                    <input type="hidden" name="username" value='<%= Session["username"] %>'>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" value="<?php echo $email ?>" name="email" >
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" value="<?php echo $address ?>" id="address" name="address" >
                    </div>
                    <div class="mb-3">
                      <label for="contacts" class="form-label">Contacts</label>
                      <input type="text" class="form-control" value="<?php echo $contacts ?>" id="contacts" name="contacts" >
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Date Start</label>
                      <input type="text" class="form-control" id="date_start" value="<?php echo $date_start ?>" name="email" >
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Date End</label>
                      <input type="text" class="form-control" id="date_end" value="<?php echo $date_end ?>" name="email" >
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Change</button>
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


          </div>
      </div>
  </div>
</div>




<?php 
$json = file_get_contents("http://192.168.0.5/priceperday.php");

$price = json_decode($json, true);
?>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

          <input type="hidden" id="priceday" value="<?php echo $price ?>">
          <div class="row text-center">
              <div class="w-100 mx-auto" id="infosection">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal ">
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="days">Number of Days:</label>
                        <div class="col-md-12">
                          <input type="number" onchange="changePrice()" min="1" id="days" name="days">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Total Amount</label>
                        <div class="col-md-12">
                          <input type="text" name="text" id="amountTotal" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-12">
                              <div id="paypal-button-container"></div>

                        </div>
                      </div>

                      </div>

                    </form>

                    <script src="https://www.paypal.com/sdk/js?client-id=ActW03rpTfJEB5jb3HpKoDuYpOhNMxBNJs2gowtyMp8SbPAvD_qZ2ETo1vyw3u5QQuwXpcBvk7woWUYz&currency=USD&disable-funding=credit,card"></script>
              <!-- Set up a container element for the button -->
              <script>


                paypal.Buttons({
                  // Sets up the transaction when a payment button is clicked

                  createOrder: (data, actions) => {
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                          value: document.getElementById("amountTotal").value // Can also reference a variable or function


                        }
                      }]
                    });
                  },
                  // Finalize the transaction after payer approval
                  onApprove: (data, actions) => {

                    return actions.order.capture().then(function(orderData) {
                      let days = document.getElementById("days").value;
                      /*fetch('api/update_period.php?days=' + days).then(response => response.json())
                      .then(data => {
                        console.log(data);
                      }).catch(err => console.error(err));*/
                      window.location.replace('api/update_period.php?days=' + days);
                    alert("Success");

                    });
                  }

                }).render('#paypal-button-container');
              </script>
                <script>

              function changePrice() {
                let days = document.getElementById("days").value;
                let total = days * document.getElementById("priceday").value;
                //console.log(total);
                document.getElementById("amountTotal").setAttribute('value', total);
              }


            </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
