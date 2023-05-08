<?php

include 'dbconnect.php';
if($_SESSION['ADMIN_USER']=="")
	{	
header('location:adminlogin.php');
}
?>
<!DOCTYPE html>
<html>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right"  id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="postvehicle.php" class="w3-bar-item w3-button">Post Vehicle</a>
  <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
  <a href="manage_vehicle.php" class="w3-bar-item w3-button">Manage Vehicle</a>
  <a href="manage_booking.php" class="w3-bar-item w3-button">Manage Booking</a>
  <a href="manage_contactus.php" class="w3-bar-item w3-button">Manage ContactUs</a>
  <a href="manage_user.php" class="w3-bar-item w3-button">Manage Users</a>
  <a href="manage_pay.php" class="w3-bar-item w3-button">Manage Payment</a>
  <a href="manage_cancel.php" class="w3-bar-item w3-button">Manage Cancellation</a>
 
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
CAR RENTAL ADMIN PANEL
    <a  class="btn btn-danger" href="adminlogout.php" type='button' style="position:absolute;right:10px; top:5px">Logout</a>
    </div>



<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
