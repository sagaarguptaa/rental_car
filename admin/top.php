<?php
session_start();
include 'dbconnect.php';
if($_SESSION['ADMIN_USER']=="")
	{	
header('location:adminlogin.php');
}?>
<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px;">Car Rental Portal | Admin Panel</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down"></i></a>
				<ul>
					
					<li><a href="adminlogout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
