<?php
if(isset($_POST['emailsubscribe']))
{
    include 'dbconnect.php';
    $email_subscriber = $_POST['emailid'];
    $existemail = "select * from `tblsubscribers` where subscriberemail = '$email_subscriber'";
    $query1 = mysqli_query($conn, $existemail);
    $check = mysqli_num_rows($query1);
    if($check>0)
    {
        echo "<script>alert('Already Subscribed.');</script>";
        // header("Location: home.php");
    }
    else{
      $emailsql = "INSERT INTO `tblsubscribers` (`subscriberemail`,`date`) 
            VALUES ('$email_subscriber', current_timestamp())";
            $query2 = mysqli_query($conn, $emailsql);
            if($query2){
                  echo "<script>alert('Subscribed successfully.');</script>";
      //  header("Location: home.php");
    }}
  }
 
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link rel="stylesheet" href="assets/css/footer.css" />
<footer id="dk-footer" class="dk-footer">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="dk-footer-box-info">
                <a href="index.php" class="footer-logo">
                    <img src="img/logo.jpg" style="width:150px;height:150px;" alt="footer_logo" class="img-fluid">
                </a>
                <p class="footer-info-text" style="color:white">
                    Car-Rental is the provider of rental cars in Mumbai. Get any rental car on daily or
                    weekly rental plan. Why pay higher when
                    you can rent a car at really cheap prices.
                </p>
                <div class="footer-social-link">
                    <h3>Follow us</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Social link -->
            </div>
            <!-- End Footer info -->
        
            <div class="footer-awarad">
                <img src="images/icon/best.png" alt="">
                <p>Online Car Rental</p>
            </div>
        </div>
        <!-- End Col -->
        <div class="col-md-12 col-lg-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us">
                        <div class="contact-icon">
                            <i class="fa fa-map-o" aria-hidden="true"></i>
                        </div>
                        <!-- End contact Icon -->
                        <div class="contact-info">
                            <h3>Maharashtra India</h3>
                            <p style="color:white">Car Rent Dombivli </p>
                        </div>
                        <!-- End Contact Info -->
                    </div>
                    <!-- End Contact Us -->
                </div>
                <!-- End Col -->
                <div class="col-md-6">
                    <div class="contact-us contact-us-last">
                        <div class="contact-icon">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        </div>
                        <!-- End contact Icon -->
                        <div class="contact-info" style="color:white">
                            <h3>+91 9137953511</h3>
                            <p style="color:white">Give us a call</p>
                        </div>
                        <!-- End Contact Info -->
                    </div>
                    <!-- End Contact Us -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Contact Row -->
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="footer-widget footer-left-widget">
                        <div class="section-heading">
                            <h3>More </h3>
                            <span class="animate-border border-black"></span>
                        </div>
                        <ul>
                            <li>
                                <a href="admin/adminlogin.php">Admin Panel</a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="contact.php">Contact us</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Footer Widget -->
                </div>
                <!-- End col -->
                <div class="col-md-12 col-lg-6">
                    <div class="footer-widget">
                        <div class="section-heading">
                            <h3>Subscribe</h3>
                            <span class="animate-border border-black"></span>
                        </div>
                        <p style="color:white"> Don’t miss to subscribe to our new feeds
                        </p>
                        <form method="post">
                            <div class="form-row">
                                <div class="col dk-footer-form">
                                    <input type="email" class="form-control" name="emailid" placeholder="Email Address">
                                    <button type="submit" name="emailsubscribe" required>
                                        <i class="fa fa-send"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- End form -->
                    </div>
                    <!-- End footer widget -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Widget Row -->
    </div>
    <!-- End Contact Container -->


    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Copyright © 2022, All Right Reserved </span>
                </div>
                <!-- End Col -->
                <div class="col-md-6">
                    <div class="copyright-menu">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="tandc.php">Terms and Condition</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
        <!-- End Back to top -->
</footer>