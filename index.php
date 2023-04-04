
<?php
  session_start();

  include("includes/db.php");

  include('functions.php');

  include('translatesite.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Obvious Control</title>

    <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">  </script>  
    <!-- CSS only -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
              <div class="col-md-12">
              </div>
					<?php
         		if(isset($_GET['dashboard'])) {
							include("pages/dashboard.php");
						}
						if(isset($_GET['customers'])) {
							include("pages/customers.php");
						}
						if(isset($_GET['orders'])) {
							include("pages/orders.php");
						}
            if(isset($_GET['delete_order'])) {
              include("pages/delete_order.php");
            }
            if(isset($_GET['delete_user'])) {
              include("pages/delete_user.php");
            }
            if(isset($_GET['edit_order'])) {
              include("pages/order.php");
            }
						if(isset($_GET['products'])) {
							include("pages/products.php");
						}
						if(isset($_GET['add_customer'])) {
							include("pages/add_customer.php");
						}
            if(isset($_GET['block_user'])) {
              include("pages/block_user.php");
            }
            if(isset($_GET['unblock_user'])) {
              include("pages/unblock_user.php");
            }
            if(isset($_GET['settings'])) {
              include("pages/settings.php");
            }
            if(isset($_GET['edit_user'])) {
              include("pages/user.php");
            }
            if(isset($_GET['payments'])) {
              include("pages/payments.php");
            }
            if(isset($_GET['delete_payment'])) {
              include("pages/delete_payment.php");
            }
                 	?>
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
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!--<script src="assets/js/dashboard.js"></script>-->
    <!-- End custom js for this page -->



    <script>
      MQTTconnect();
      function onConnectionLost(){
        console.log("connection lost");
        document.getElementById("status").innerHTML = "Connection Lost";
        document.getElementById("messages").innerHTML ="Connection Lost";
        connected_flag=0;
      }
      function onFailure(message) {
        console.log("Failed");
        console.log(message);
        document.getElementById("messages").innerHTML = "Connection Failed- Retrying";
        setTimeout(MQTTconnect, reconnectTimeout);
      }
      function onMessageArrived(r_message){
        out_msg="Message received "+r_message.payloadString+"<br>";
        out_msg=out_msg+"Message received Topic "+r_message.destinationName;
        console.log("Message received ",r_message.payloadString);
        console.log(out_msg);
        //document.getElementById("messages").innerHTML =out_msg;
      }
      function onConnected(recon,url){
        console.log(" in onConnected " +reconn);
      }
      function onConnect() {
        // Once a connection has been made, make a subscription and send a message.
        //document.getElementById("messages").innerHTML ="Connected to "+host +"on port "+port;
        connected_flag=1
        //document.getElementById("status").innerHTML = "Connected";
        console.log("on Connect "+connected_flag);
        sub_topics();
        //mqtt.subscribe("sensor1");
        //message = new Paho.MQTT.Message("Hello World");
        //message.destinationName = "sensor1";
        //mqtt.send(message);
      }

    function MQTTconnect() {
      //document.getElementById("messages").innerHTML ="";
      var s = "192.168.0.5";
      var p = "9001";
      if (p!="")
      {
        console.log("ports");
        port=parseInt(p);
        console.log("port" +port);
        }
      if (s!="")
      {
        host=s;
        console.log("host");
        }
      console.log("connecting to "+ host +" "+ port);
      var x=Math.floor(Math.random() * 10000);
      var cname="orderform-"+x;
      mqtt = new Paho.MQTT.Client(host,port,cname);
      //document.write("connecting to "+ host);
      var options = {
            timeout: 3,
        onSuccess: onConnect,
        onFailure: onFailure,

         };

            mqtt.onConnectionLost = onConnectionLost;
            mqtt.onMessageArrived = onMessageArrived;
        mqtt.onConnected = onConnected;
      //
      mqtt.connect(options);
      return false;
    }
  function sub_topics(){
   /* document.getElementById("messages").innerHTML ="";*/
    /*if (connected_flag==0){
      out_msg="<b>Not Connected so can't subscribe</b>"
      console.log(out_msg);
      //document.getElementById("messages").innerHTML = out_msg;
      return false;
    }*/
    //var stopic= document.forms["subs"]["Stopic"].value;
    console.log("Subscribing to topic =");
    mqtt.subscribe('#');
    return false;
  }
  function send_message(){
    document.getElementById("messages").innerHTML ="";
    if (connected_flag==0){
    out_msg="<b>Not Connected so can't send</b>"
    console.log(out_msg);
    document.getElementById("messages").innerHTML = out_msg;
    return false;
    }
    var msg = document.forms["smessage"]["message"].value;
    console.log(msg);

    var topic = document.forms["smessage"]["Ptopic"].value;
    message = new Paho.MQTT.Message(msg);
    if (topic=="")
      message.destinationName = "test-topic"
    else
      message.destinationName = topic;
    mqtt.send(message);
    return false;
  }


    </scren>
  </body>
</html>