
<div class="d-xl-flex justify-content-between align-items-start">
    <h1 class="text-dark font-weight-bold mb-2"> <?php echo $translations['overview-dashboard-title']['content'] ?> </h1>
</div>

<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

</div>

<?php
  $get_pro = "Select count(*) as ord from orders";

  $run_pro = mysqli_query($connection, $get_pro);

  $row_pro = mysqli_fetch_array($run_pro);
    
  $orders = $row_pro['ord'];

  $get_us = "Select count(*) as ord from users";

  $run_us = mysqli_query($connection, $get_us);

  $row_us = mysqli_fetch_array($run_us);
  
  $users = $row_us['ord'];
  
  $get_p = "Select count(*) as ord, sum(payment_sum) as psum from payments";

  $run_p = mysqli_query($connection, $get_p);

  $row_p = mysqli_fetch_array($run_p); 
  
  $payments_count = $row_p['ord'];

  $payments_sum = $row_p['psum'];

?>

<div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <a>
				<i class="fa fa-users fa-3x"></i>
		      </a>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">CUSTOMERS</p>
                <h4 class="mb-0"><?php echo $users ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a href="index.php?customers">
					<div class="panel-footer">
						<span class="pull-left">
							View Details
						</span>
						<span class="pull-right">
							<i class="fa fa-arrow-circle-right"></i>
						</span>
						<div class="clearfix"></div>
					</div>
				</a>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <a>
				<i class="fa fa-shopping-cart fa-3x"></i>
		      </a>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">ORDERS</p>
                <h4 class="mb-0"><?php echo $orders ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a href="index.php?orders">
					<div class="panel-footer">
						<span class="pull-left">
							View Details
						</span>
						<span class="pull-right">
							<i class="fa fa-arrow-circle-right"></i>
						</span>
						<div class="clearfix"></div>
					</div>
				</a>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <a>
				<i class="fa fa-money fa-3x"></i>
		      </a>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">PAYMENTS SUM</p>
                <h4 class="mb-0">$ <?php echo $payments_sum ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a href="index.php?payments">
					<div class="panel-footer">
						<span class="pull-left">
							View Details
						</span>
						<span class="pull-right">
							<i class="fa fa-arrow-circle-right"></i>
						</span>
						<div class="clearfix"></div>
					</div>
				</a>
            </div>
          </div>
        </div>


      </div>