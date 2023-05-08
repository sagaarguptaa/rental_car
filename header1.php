<?php
error_reporting(0); 
include 'dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='yes'){
  $loggedin= true;

}
else{
  $loggedin = false;
}
$q = "select * from tbluser where email = '".$_SESSION['femail']."'";
$q1 = mysqli_query($conn , $q);
        
while($q2=$q1->fetch_assoc()){
  $name= $q2['name'];
}
echo '<header class="header" style="background-color:grey">

<div id="menu-btn" class="fas fa-bars"></div>

<a href="#" class="logo">Car Rental </a>

<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="car_listing.php">Vehicles</a>
    <a href="myprofile.php">My Profile</a>
    <a href="mybooking.php">My Booking</a>
    <a href="contact.php">Contact</a>
    <a href="tandc.php">T&C</a>
</nav>
';
         if($loggedin){
        echo '<div class="d-flex align-items-center"></div> 
        <p class="text-light my-0 mx-2" >Welcome '.$name .'</p>
        <button><a class="btn" href="logout.php" >Logout</a></button>';
         }
         if(!$loggedin){
         echo '<div id="login-btn">
         <button class="btn" data-toggle="modal"  data-target="#loginform">Login/Signup</button>
         <i class="far fa-user"></i>
        </div>';
         }
  echo' </header> ';
    ?>
<?php
include 'login.php';
include 'signup.php';


?>



