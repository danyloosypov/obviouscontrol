<?php
session_start();


include("translatesite.php");
/*
$query1 = "Insert into translations (language, element_id, content) values ('en', 'more-btn-title', 'More Info')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'more-btn-title', 'Більше')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'restart-btn-title', 'Restart')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'restart-btn-title', 'Скинути налаштування')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'subscription-btn-title', 'Subscription')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'subscription-btn-title', 'Підписка')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'settings-btn-title', 'Settings')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'settings-btn-title', 'Налаштування')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'logout-btn-title', 'Log Out')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'logout-btn-title', 'Логаут')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'documentation-btn-title', 'Documentation')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'documentation-btn-title', 'Документація')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'options-btn-title', 'Options')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'options-btn-title', 'Опції')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'actions-btn-title', 'Actions')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'actions-btn-title', 'Дії')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'on-btn-title', 'On')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'on-btn-title', 'Вкл')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('en', 'off-btn-title', 'Off')";

$result1 = $db->query($query1);

$query1 = "Insert into translations (language, element_id, content) values ('ua', 'off-btn-title', 'Вимкн')";

$result1 = $db->query($query1);*/

/*$query = "Select * from translations";

$result = $db->query($query);

while ($row = $result->fetchArray()) {
  echo $row;
}*/

      
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
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script>
      function setCookie(cName, cValue, expDays) {
        let date = new Date();
        date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
      }

      $(document).ready(function() {
        $("#language-switcher").val('<?php 
            if(isset($_COOKIE['lang'])) {
              $language = $_COOKIE['lang'];
            }
            echo $language;
            ?>');

        $("#language-switcher").on("change", function() {
          if($(this).val() == "en") {
            setCookie('lang', "en", 30);
          } else {
            setCookie('lang', "ua", 30);
          }
          window.location.reload();
        });

      });

</script>
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
            <h1 class="ml-4" style="color: black"><?php echo $translations['dashboard-title']['content'] ?></h1>
            <?php

              include('dbconnect.php');

              if (!check_auth()) {
                echo "<script>window.open('login.php', '_self')</script>";
              }
            ?>

            <br>
            <br>

            <div class="d-flex flex-wrap" id="add_after_me">
            
            </div>
  


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

    httpGet();

    function service() {
      let res = fetch('api/service.php').then(response => response.json())
        .then(data => {
          console.log(data);
        }).catch(err => console.error(err));
    }


    function httpGet() {
      let res = fetch('api/sensors.php').then(response => response.json())
        .then(data => {
          data.data.forEach((sensor) => {
            var checked;
            var value;
            if (sensor.sensor_on) {
              checked = "checked";
              color = "yellow";
              value = "On";
            } else {
              color = "#F5F5F5";
              checked = "";
              value = "Off";
            }
            

            if (sensor.sensor_type == "SensorInt") {
              value = "";
              fetch('api/sensorlastvalue.php?id=' + sensor.sensor_id).then(response => response.json())
              .then(data => {
                value = data.data;
                console.log(data);
                document.getElementById("add_after_me").innerHTML += `
                <div class="card w-25 p-3 ml-4 mt-4">
                  <div class="card-header p-3 pt-2">
                    <div>
                      <img style="width: 64px; height: 64px;" src="assets/img/${sensor.img_name}.png" alt="">
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize">${sensor.sensor_name}</p>
                      <h4 class="mb-0" id="value${sensor.sensor_id}"> ${value}</h4>
                    </div>
                  </div>
                  <hr class="dark horizontal mt-1 my-0">
                    <div class="card-footer p-3">
                      <a href="sensor_stat.php?id=${sensor.sensor_id}"> <?php echo $translations['more-btn-title']['content']  ?> </a>
                    </div>
                </div>
              `
              }).catch(err => console.error(err));
              
            } else {
              console.log(color);
              document.getElementById("add_after_me").innerHTML += `
              <div class="card w-25 p-3 ml-4 mt-4">
                <div style="background: ${color}" class="card-header p-3 pt-2" id="card${sensor.sensor_id}">
                  <div>
                    <img style="width: 64px; height: 64px;" src="assets/img/${sensor.img_name}.png" alt="">
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">${sensor.sensor_name}</p>
                    <h4 class="mb-0" id="value${sensor.sensor_id}"> ${value}</h4>
                  </div>
                </div>
                <hr class="dark horizontal mt-1 my-0">
                  <div class="card-footer p-3">
                    <input type="checkbox" onchange='changeStatusapi(${sensor.sensor_id})' id='blockedapi${sensor.sensor_id}'  ${checked} />
                  </div>
              </div>
              `
            }
            
            })
        }).catch(err => console.error(err));
    }


    function changeStatusapi(id) {
      if (document.getElementById('blockedapi' + id).checked) {
        let res = fetch('api/sensorcontrollerapi.php?idon=' + id).then(response => response.json())
          .then(data => {
            console.log(data);
          }).catch(err => console.error(err));
            document.getElementById("value" + id).innerHTML = "On";
            document.getElementById("card" + id).style.backgroundColor = "yellow";
      } else {
        let res = fetch('api/sensorcontrollerapi.php?idoff=' + id).then(response => response.json())
          .then(data => {
            console.log(data);
          }).catch(err => console.error(err));
          document.getElementById("value" + id).innerHTML = "Off";
          document.getElementById("card" + id).style.backgroundColor = "#F5F5F5	";

      }
    }


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

