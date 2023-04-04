<?php

include("translatesite.php");

?>


<?php
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	}

  include('dbconnect.php');

    $results = $db->query("SELECT * FROM sensor where sensor_id = '$id'");
	   
		$row = $results->fetchArray();

    $sensor_name = $row['sensor_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Obvious Control</title>
  <!-- CSS only -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/logo-mini1.png" />
  <style>
  

  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      include('partials/navbar.php');
      ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
        include('partials/sidebar.php');
        ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <h1 style="color: black"><?php echo $sensor_name ?></h1>
            <?php


              if (!check_auth()) {
                echo "<script>window.open('login.php', '_self')</script>";
              }
            ?>

            <br>
            <br>

            <canvas class="mt-4" id="myChart" style="width:100%;max-width:600px"></canvas>



            <!-- JavaScript Bundle with Popper -->
          </div>

        </div>
        <!-- content-wrapper ends -->
        <?php
          include('partials/footer.php');
          ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>

  <script>

    function reset() {
      let res = fetch('api/resetespapi.php').then(response => response.json())
        .then(data => {
          console.log(data);
        }).catch(err => console.error(err));
        alert("ESP was reseted successfully");
    }


  </script>
</body>

</html>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
var xValues;
var yValues;
var minval;
var maxval;
var mindate;
var maxdate;


	const res = fetch('api/sensor_statistics.php?id=<?php echo $id ?>')
	.then(response => response.json())
    .then(data =>
		{
			xValues = data.arrx;
			yValues = data.arry;
			minval = Number(data.minval);
			maxval = Number(data.maxval);
			mindate = data.mindate;
			maxdate = data.maxdate;

			build(xValues, yValues, minval, maxval, mindate, maxdate);


		}
	)
	.catch(err => console.error(err));

function build(xValues, yValues, minval, maxval, mindate, maxdate) {
	new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: minval, max:maxval}}],
      xAxes: [{ticks: {min: mindate, max:maxdate}}]
    }
  }
});
}

</script>
