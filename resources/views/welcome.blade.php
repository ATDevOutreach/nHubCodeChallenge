
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terminus.ng > Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- jQuery min js -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/fav-icon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav-icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="assets/img/fav-icon/favicon-64x64.png">
  </head>
    
  <body>
    <!-- Preloader start -->
    <div class="cleaning-site-preloader-wrap">
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
      <!-- Preloader end -->
        
    <!-- Top Header -->
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <a href="mailto:info@terminus.ng">
              <i class="fa fa-envelope"></i> 
              Mail: info@terminus.ng
            </a> 
            <span class="seprator">|</span>
            <a href="#"><i class="fa fa-phone"></i> Call Us: +234 905 873 9225</a>
          </div>
          <div class="col-md-3 text-right">
            <div class="social-icon">  
              <a href="https://web.facebook.com/terminus.ng" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/terminus_ng" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="terminus.ng:2096" target="_blank"><i class="fa fa-envelope"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Top Header -->
      
    <!-- Main Menu -->
    <div class="mainmenu-area">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="logo">
              <a href="index.php"><img src="assets/img/tlogo.jpeg" alt="Logo"></a>
            </div>
            <!-- Responsive Menu -->
            <div class="responsive-menu-wrap"></div>
          </div>
          <div class="col-md-10">
            <div class="mainmenu">
              <ul id="navigation">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{ route('how') }}">How It Works</a></li>                                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Main Menu -->

    <!-- Start Subcription Area -->
    <section class="cleaning-content-block subscription" style="min-height: 465px;">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <p>Buy Direct from trusted shops from Terminus.ng</p>
            <h2>Get Started</h2>
            <div class="subscribe-form">
              <form action="{{ route('sendChatMessage') }}" method="POST">
                <input type="text" name="phone_number" placeholder="Enter your WhatsApp Number e.g.(2347035039214)" required>
                <button type="submit" name="sub">Begin</button>
              </form>
            </div>
            <span class="subscribe-form"><i class="fa fa-lock"></i> We never share your Number with others</span>
          </div>
        </div>
      </div>
    </section>
    <!-- End Subcription Area -->

    <!-- Start scroll to top feature -->
    <a href="#" id="back-to-top" title="Back to Top">
      <i class="fa fa-long-arrow-up"></i>
    </a>
    <!-- End scroll to top feature -->
        
      <!-- Footer Area -->
    <footer class="site-footer">
      <!-- Footer Top Area -->
      <div class="footer-top-area">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="footer-wid">
                <h3 class="footer-wid-title">Locate Us</h3>
                <h2 class="footer-logo"><img src="assets/img/tlogo.jpeg" alt="Logo"></h2>
                              
                <p>nHub Nigeria, <br />3rd Floor, TAEN Business Complex, <br >Opposite former Nitel office, Yakubu, Gowon Way, Jos</p>
                <div class="address-info">
                  <span>Phone 1: +234 818 718 5700</span>
                  <span>Phone 2: +234 905 873 9225</span>
                  <span>Email: info@terminus.ng</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="footer-wid footer-menu">
                <h3 class="footer-wid-title">Quick Links</h3>
                <ul>
                  <li><a href="index.php"><i class="fa fa-chevron-circle-right"></i> Home</a></li>
                  <li><a href="how-it-works.php"><i class="fa fa-chevron-circle-right"></i> How It Works</a></li>
                  <li><a href="/tstv"><i class="fa fa-chevron-circle-right"></i> Pre-Order TSTV</a></li>
                  <li><a href="categories.php"><i class="fa fa-chevron-circle-right"></i> Categories</a></li>
                  <li><a href="contact-us.php"><i class="fa fa-chevron-circle-right"></i> Contact Us</a></li>
                  </ul>
                  </div>
                </div>
              <div class="col-md-3 col-sm-6">
              <div class="footer-wid">
                <h3 class="footer-wid-title">Categories</h3>
                <a class="single-footer-iem" href="#">
                  <p>Cakes</p>
                </a>
                <a class="single-footer-iem" href="#">
                  <p>Boutiques</p>
                </a>
                <a class="single-footer-iem" href="#">
                  <p>Electronics</p>                        
                </a>
              </div>
            </div>
                           
            <div class="col-md-3 col-sm-6">
              <div class="footer-wid">
                <h3 class="footer-wid-title">Opening Hours</h3>                  
                  <ul class="opening-hour"> 
                    <li>Monday - Friday : <span>08.00 am - 10.00 pm</span></li>
                    <li>Saturday : <span>8.00am - 2.00pm</span></li>
                    <li>Sunday : <span>Closed</span></li>
                  </ul>
                  <div class="social-icos">    
                    <ul>
                      <li><a href="https://web.facebook.com/terminus.ng" target="_blank"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="https://twitter.com/terminus_ng" target="_blank"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="terminus.ng:2096" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Footer Top -->
            
        <!-- Footer Bottom Area -->
        <div class="footer-copyright-area">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                Copyright &copy; Terminus.ng
                <?php 
                  $startYear = 2016; 
                  $currentYear = date('Y');
                  echo $startYear . (($startYear != $currentYear) ? '-' . $currentYear : '');
                ?>
                . All Rights Reserved
              </div>
              <div class="col-md-6 text-right">
                <ul class="list-inline">
                  <!-- <li><img src="assets/img/mastercard.png" alt="payment"></li> -->
                  <!-- <li><img src="assets/img/paypal.png" alt="payment"></li> -->
                  <!-- <li><img src="assets/img/visa02.png" alt="payment"></li> -->
                  <!-- <li><img src="assets/img/americanexpress.png" alt="payment"></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div> <!-- End Footer Bottom Area -->
      </footer> <!-- End Footer Area -->
        
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/mixitup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/active.js"></script>
  </body>
</html>