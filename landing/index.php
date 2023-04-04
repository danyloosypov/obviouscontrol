
<?php
    include("./../includes/db.php");

    include('./../translatesite.php');

    $startdate = date("Y-m-d");

    $startdate = date('Y-m-d', strtotime($startdate . ' + 10 days'));

    $query = "Select priceday from admin";

    $run = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($run);

    $price = $row['priceday'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Coop</title>
  <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="shortcut icon" href="/images/logo-mini1.png" />
  <script type="text/javascript" src="./../assets/js/jquery.js"></script>
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
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
            <a href='#header-section'><img src="images/logo.png" alt="" class="pb-2"></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="images/logo.png" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#header-section"><?php echo $translations['home-landing-title']['content'] ?> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features-section"><?php echo $translations['about-landing-title']['content'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#case-studies-section"><?php echo $translations['opportunities-landing-title']['content'] ?></a>
          </li>
          <li>
            <select class="form-control" id="language-switcher">
              <option value="en">EN</option>
              <option value="ua">UA</option>
            </select>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <a href="#"><button class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"><?php echo $translations['purchase-landing-title']['content'] ?></button></a>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <div class="banner" >
    <div class="container">
      <h1 class="font-weight-semibold">Great Bussiness Opportunity</h1>
      <h6 class="font-weight-normal text-muted pb-3">Simple and cheap solution for bussiness and individual needs</h6>
      <div>
        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><button class="btn btn-opacity-light mr-1"><?php echo $translations['purchase-landing-title']['content'] ?></button></a>
      </div>
      <img class="mt-4" src="images/smart.png" alt="" class="img-fluid">
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container">
      <section class="features-overview" id="features-section" >
        <div class="content-header">
          <h2>How does it works</h2>
          <h6 class="section-subtitle text-muted">Handy and powerfull tool in your hands, which will help you to make money</h6>
        </div>
        <div class="d-md-flex justify-content-between">
          <div class="grid-margin d-flex justify-content-start">
            <div class="features-width">
              <img src="images/Group12.svg" alt="" class="img-icons">
              <h5 class="py-3">Fast<br>operations</h5>
              <p class="text-muted">The system allows you to operate without any delay.</p>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-center">
            <div class="features-width">
              <img src="images/Group7.svg" alt="" class="img-icons">
              <h5 class="py-3">Business<br>Opportunity</h5>
              <p class="text-muted">An opportunity to make loads of money.</p>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-end">
            <div class="features-width">
              <img src="images/Group5.svg" alt="" class="img-icons">
              <h5 class="py-3">Precisive Control<br>And Reports</h5>
              <p class="text-muted">The system provides useful reports and handy controllers.</p>
            </div>
          </div>
        </div>
      </section>     
      <section class="digital-marketing-service" id="digital-marketing-section">
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
            <h3 class="m-0">We Offer a Complete Control System<br>of your coop!</h3>
            <div class="col-lg-7 col-xl-6 p-0">
              <p class="py-4 m-0 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
              <p class="font-weight-medium text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer</p>
            </div>    
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <img src="images/coop1.webp" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
            <img src="images/coop2.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
            <h3 class="m-0">Leading Digital Company<br>for IOT Business Solution.</h3>
            <div class="col-lg-9 col-xl-8 p-0">
              <p class="py-4 m-0 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, vitae distinctio rem. Tempora nulla voluptatem porro, ut. Beatae itaque eaque vero impedit tempore aperiam, quis consequatur incidunt necessitatibus, consectetur asperiores.</p>
              <p class="pb-2 font-weight-medium text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus temporibus unde dolor cumque vitae libero est nihil ullam expedita labore ut quasi dicta error, mollitia quisquam nemo, explicabo maxime quod?.</p>
            </div>
              <div>
                <button class="btn btn-opacity-light mr-1" data-toggle="modal" data-target="#exampleModalCenter">Purchase</button>
              </div>
          </div>
        </div>
      </section>     
      <section class="case-studies" id="case-studies-section">
        <div class="row grid-margin">
          <div class="col-12 text-center pb-5">
            <h2>Benefits of the system</h2>
            <h6 class="section-subtitle text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum.</h6>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-primary text-center card-contents">
                  <div class="card-image">
                    <img src="images/1.png" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">The first in the market</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">BESTESELLERS</h6>
                    <p>10 years experience</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-warning text-center card-contents">
                  <div class="card-image">
                      <img src="images/3.webp" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Easy Remote ocntrol</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Remote control</h6>
                    <p>From anywhere</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-violet text-center card-contents">
                  <div class="card-image">
                      <img src="images/4.png" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Cheap Solution</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">CHEAP</h6>
                    <p>Esay money</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-success text-center card-contents">
                  <div class="card-image">
                      <img src="images/2.webp" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Fast operations</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">No delay</h6>
                    <p>Fast solution</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>     

      <section class="contact-details" id="contact-details-section">
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <a href='#header-section'><img src="images/logo.png" alt="" class="pb-2"></a>

          </div>

          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Our Guidelines</h5>
            <a href="#"><p class="m-0 pb-2">Terms</p></a>   
            <a href="#" ><p class="m-0 pt-1 pb-2">Privacy policy</p></a> 
            <a href="#"><p class="m-0 pt-1 pb-2">Cookie Policy</p></a> 
            <a href="#"><p class="m-0 pt-1">Discover</p></a> 
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
              <h5 class="pb-2">Our address</h5>
              <p class="text-muted">Kharkiv<br>Svoboda street</p>
              <div class="d-flex justify-content-center justify-content-md-start">
                <a href="#"><span class="mdi mdi-facebook"></span></a>
                <a href="#"><span class="mdi mdi-twitter"></span></a>
                <a href="#"><span class="mdi mdi-instagram"></span></a>
                <a href="#"><span class="mdi mdi-linkedin"></span></a>
              </div>
          </div>
        </div>  
      </section>
      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2022  All rights reserved.</p>
      </footer>











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
                      <input type="hidden" name="datestart" value="<?php echo $startdate ?>">
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Contacts</label>
                        <div class="col-md-12">
                          <input type="text" name="contacts" id="contacts" value="" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Email</label>
                        <div class="col-md-12">
                          <input type="text" name="email" value=""  class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Address</label>
                        <div class="col-md-12">
                          <input type="text" name="address" value=""  class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Password</label>
                        <div class="col-md-12">
                          <input type="text" name="password" value="" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Subsciption starts from</label>
                        <div class="col-md-12">
                          <input type="text" name="startdate" value="<?php echo $startdate ?>" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="days">Number of Days:</label>
                        <div class="col-md-12">
                          <input type="number" onchange="changePrice()" min="10" id="days" name="days">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label">Total Amount</label>
                        <div class="col-md-12">
                          <input type="text" name="text" value="300" id="amountTotal" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-12">
                              <div id="paypal-button-container"></div>

                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                          <input type="submit" name="submit" value="Register" class="btn btn-primary form-control">
                        </div>-->
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
          let contacts = String(document.getElementsByName("contacts")[0].value);
                let email = document.getElementsByName("email")[0].value;
                let address = document.getElementsByName("address")[0].value;
                let password = document.getElementsByName("password")[0].value;
                let days = document.getElementsByName("days")[0].value;
                let startdate = document.getElementsByName("startdate")[0].value;
                let total = document.getElementById("amountTotal").value;
                      window.location.replace('success.php?contacts=' + contacts + "&email=" + email + "&address=" + address + "&password=" + password + "&days=" + days + "&datestart=" + startdate + "&total=" + total);
          //            actions.redirect('192.168.0.5/landing/success.php');
                    });
                  }

                }).render('#paypal-button-container');
              </script>
                <script>

              function changePrice() {
                let days = document.getElementById("days").value;
                let total = days * document.getElementById("priceday").value + 300;
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
      </div>





    </div> 
  </div>
  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>
</body>
</html>