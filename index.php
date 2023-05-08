<?php 
session_start();
include 'dbconnect.php'; 
if(isset($_COOKIE['femail'])&& isset($_COOKIE['password'])){
    $id=$_COOKIE['femail'];
    $pass=$_COOKIE['password'];
}
else{
    $id="";
    $pass="";
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/faq.css">
    <link rel="stylesheet" href="assets/css/slide.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="rentalcar/js/size.js"></script> -->

    <title>CAR RENTAL</title>

</head>

<body><br> <br> <br> <br> <br> <br>
    <?php include('header1.php');?>
    <!-- <div id="toShowWarning">
    <p id="warn" style="color:red; text-align: center;"><u><b>For Better Use, Switch To Desktop Mode</b></u></p>
  </div> -->
<span id="heading" style="color:blue"><b>GET CARS ON RENT </b></span>
<div id="slider">  
<div class="slides">  
  <img src="img/homecar0.jpg" width="100%" />
 </div>
  
  <div class="slides">  
  <img src="img/homecar.jpg" width="100%" />
</div>
  
  <div class="slides">  
  <img src="img/homecar1.jpg" width="100%" />
</div>
   
<!-- <div class="slides">  
  <img src="img/homecar2.jpg" width="100%" />
</div>  -->
  
  <div id="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
 </div>



    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">
                <h3>10+</h3>
                <p>Branches</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-car"></i>
            <div class="content">
                <h3>200+</h3>
                <p>Booked Car</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-users"></i>
            <div class="content">
                <h3>150+</h3>
                <p>Happy clients</p>
            </div>
        </div>

    </section>



    <section class="services" id="services">

        <h1 class="heading"> our <span>services</span> </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-car"></i>
                <h3>Car Rent</h3>
                <p>Get Easily Car on Rent</p>
                <a href="#" class="btn"> read more</a>
            </div>

            <div class="box">
                <i class="fas fa-tools"></i>
                <h3>Get accessories</h3>
                <p>Get accessories while pickup Car</p>
                <a href="#" class="btn"> read more</a>
            </div>

            <div class="box">
                <i class="fas fa-car"></i>
                <h3>0-Rs Deposit</h3>
                <p>Get any car for rent with zero deposit fee</p>
                <a href="#" class="btn"> read more</a>
            </div>

            <div class="box">
                <i class="fas fa-headset"></i>
                <h3>24/7 support</h3>
                <p>Contact for any other related query</p>
                <a href="#" class="btn"> read more</a>
            </div>

        </div>

    </section>
    <br><br><br><br><br><br>

    <h1 class="heading" id="faqs"> <span>FAQS</span> </h1>
    <div class="container">
        <div class="col-sm-8 accordion_one">
            <div class="panel-group" id="accordionFourLeft">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a style="color:black" data-toggle="collapse"
                                data-parent="#accordion_oneLeft" href="#collapseFiveLeftone" aria-expanded="false"
                                class="collapsed"> What do I need to rent a Car? </a> </h4>
                    </div>
                    <div id="collapseFiveLeftone" class="panel-collapse collapse" aria-expanded="false" role="tablist"
                        style="height: 0px;">
                        <div class="panel-body">
                            <div class="img-accordion"> <img
                                    src="https://img.icons8.com/color/81/000000/person-female.png" alt=""> </div>
                            <div class="text-accordion">
                                <p> Each person who intends to Ride must submit a valid driver's license,Aadhar card and
                                    pancard. All of these items must be submitted after registeration then You can
                                    picked a car for rent. If you wish to pay in cash, you must also submit an item of
                                    identification (copies are acceptable) in addition to your driver's license.</p>
                            </div>
                        </div> <!-- end of panel-body -->
                    </div>
                </div> <!-- /.panel-default -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a style="color:black" class="collapsed" data-toggle="collapse"
                                data-parent="#accordion_oneLeft" href="#collapseFiveLeftTwo" aria-expanded="false"> How
                                do I know about booking confirmation? </a> </h4>
                    </div>
                    <div id="collapseFiveLeftTwo" class="panel-collapse collapse" aria-expanded="false" role="tablist"
                        style="height: 0px;">
                        <div class="panel-body">
                            <div class="img-accordion"> <img
                                    src="https://img.icons8.com/color/81/000000/person-female.png" alt=""> </div>
                            <div class="text-accordion">
                                <p>After completing the booking process, you will be able to track your reservations
                                    status by accessing your account with your registered login and password and go to
                                    my booking page. Once your reservation is confirmed, we´ll also send you a payment
                                    link.
                                </p>
                            </div>
                        </div> <!-- end of panel-body -->
                    </div>
                </div> <!-- /.panel-default -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a style="color:black" class="collapsed" data-toggle="collapse"
                                data-parent="#accordion_oneLeft" href="#collapseFiveLeftThree" aria-expanded="false">
                                What included in rental fee? </a> </h4>
                    </div>
                    <div id="collapseFiveLeftThree" class="panel-collapse collapse" aria-expanded="false"
                        role="tablist">
                        <div class="panel-body">
                            <div class="img-accordion"> <img
                                    src="https://img.icons8.com/color/81/000000/person-female.png" alt=""> </div>
                            <div class="text-accordion">
                                <p> The daily fee at some destinations depend on the pick-up and drop-off times established
                                    in the rental agreement. In such cases, even if your rental period does not complete
                                    24 hours, you will be charged for a 24 hour rental period. It is important to note that
                                    even if your rental period is less than 24 hours, if you don’t return the vehicle at
                                    the established time, you will be charged for an additional rental period of 24 hours.
                                    Extra charges will be taken if you return bike late . And the petrol price of 1L is
                                    included.
                                </p>
                            </div>
                        </div> <!-- end of panel-body -->
                    </div>
                </div> <!-- /.panel-default -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a style="color:black" class="collapsed" data-toggle="collapse"
                                data-parent="#accordion_oneLeft" href="#collapseFiveLeftFour" aria-expanded="false">
                                Can I cancel my Car rental?</a> </h4>
                    </div>
                    <div id="collapseFiveLeftFour" class="panel-collapse collapse" aria-expanded="false"
                        role="tablist">
                        <div class="panel-body">
                            <div class="img-accordion"> <img
                                    src="https://img.icons8.com/color/81/000000/person-female.png" alt=""> </div>
                            <div class="text-accordion">
                                <p> Yes, you can go ahead and cancel the car rental service. You can do it by contacting
                                    in contact section in the website, or just by making a call to Revv. The charges of canceling the booking depend upon the time when you inform the
                                    company. If you are taking the service of Revv, you can refer to their Fee policy to get
                                    in-depth information about the cancelling process.
                                </p>
                            </div>
                        </div> <!-- end of panel-body -->
                    </div>
                </div> <!-- /.panel-default -->
            </div>
            <!--end of /.panel-group-->
        </div>
    </div> <br><br><br><br><br><br>

    <h1 class="heading" id="aboutus" style="color:black"> <span>About Us</span> </h1>

    <div class="container">
        <p>Our mission is to help people pick the right rental. Before you book, we will show you everything you need to
            know. From past customer ratings, what's included and pick-up information, we give you all the facts, so
            that you can make the right rental choice for you.</p><br><br>
        <h2 style="background-color:#F1F777;color:black">Exclusive Lowest Prices!</h2><br>
        <p> We have access to exclusive lowest prices and free add-ons. Our smart booking search engine will ensure that
            we pass those savings on to you! We will show you the best and cheapest price for your rental requirements to
            help you find your ideal car.</p><br><br>
        <h3 style="background-color:#F1F777;color:black">Local Expertise! </h3><br>
        <p> We believe everyone should have a memorable and enjoyable experience with their car rental. For that reason
            we have selected suppliers that are friendly and helpful, reputable and have in-depth local knowledge to ensure
            you get the best out of your rental.</p>


    </div><br><br><br><br><br><br>
    <?php include 'footer.php';?>



    <script src="assets/js/index.js"></script>
    <script src="assets/js/slide.js"></script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js">
    < /scrip> <
    script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>