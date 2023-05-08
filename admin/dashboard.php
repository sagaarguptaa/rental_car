<?php
session_start();
include 'dbconnect.php';
$message="";
if($_SESSION['ADMIN_USER']==""){	
header('location:adminlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    table.table td .add {
        display: none;
    }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets2/css/dashboard.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/cjs/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js">
    </script>

</head>

<body>
    <?php include 'leftbar.php';?>
     <h3 style="text-align:center;color:white;background:black">DASHBOARD</h3>
    <div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="dbox dbox--color-1">
				<div class="dbox__body">
                <?php $res1="SELECT * FROM tbluser";
                 $res2 = mysqli_query($conn,$res1);
                 $count= mysqli_num_rows($res2);
                 ?>
					<span class="dbox__count"><?php echo $count ?></span>
					<span class="dbox__title">Total users</span>
				</div>
				
				<div class="dbox__action">
					<a href="manage_user.php" class="dbox__action__btn">More Info</a>
				</div>				
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-2">
				<div class="dbox__body">
                <?php $res3="SELECT * FROM tblsubscribers";
                 $res4 = mysqli_query($conn , $res3);
                 $count1= mysqli_num_rows($res4);
                 ?>
					<span class="dbox__count"><?php echo $count1 ?></span>
					<span class="dbox__title">Total Subscribers</span>
				</div>
				<!-- <div class="dbox__action">
					<a href="manage_user.php" class="dbox__action__btn">More Info</a>
				</div>	 -->
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-3">
				<div class="dbox__body">
                <?php $res5="SELECT * FROM tblvehicle";
                 $res6= mysqli_query($conn,$res5);
                 $count2= mysqli_num_rows($res6);
                 ?>
					<span class="dbox__count"><?php echo $count2 ?></span>
					<span class="dbox__title">Total vehicle</span>
				</div>
				
				<div class="dbox__action">
                <a href="manage_vehicle.php" class="dbox__action__btn">More Info</a>
				</div>				
			</div>
		</div>
        <div class="col-md-4">
			<div class="dbox dbox--color-2">
				<div class="dbox__body">
                <?php $res7="SELECT * FROM tblpayment";
                 $res8 = mysqli_query($conn,$res7);
                 $count3= mysqli_num_rows($res8);
                 ?>
					<span class="dbox__count"><?php echo $count3 ?></span>
					<span class="dbox__title">Payment History</span>
				</div>
				
				<div class="dbox__action">
                <a href="manage_pay.php" class="dbox__action__btn">More Info</a>
				</div>				
			</div>
		</div>
        <div class="col-md-4">
			<div class="dbox dbox--color-2">
				<div class="dbox__body">
                <?php $res9="SELECT * FROM tblcontactus";
                 $res10 = mysqli_query($conn,$res9);
                 $count4= mysqli_num_rows($res10);
                 ?>
					<span class="dbox__count"><?php echo $count4 ?></span>
					<span class="dbox__title">Queries</span>
				</div>
				
				<div class="dbox__action">
                <a href="manage_contactus.php" class="dbox__action__btn">More Info</a>
				</div>				
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-1">
				<div class="dbox__body">
                <?php $res11="SELECT * FROM tblbooking";
                 $res12 = mysqli_query($conn,$res11);
                 $count= mysqli_num_rows($res12);
                 ?>
					<span class="dbox__count"><?php echo $count ?></span>
					<span class="dbox__title">New Booking</span>
				</div>
				
				<div class="dbox__action">
					<a href="manage_booking.php" class="dbox__action__btn">More Info</a>
				</div>				
			</div>
		</div>
	</div>
</div>

</body>
</html>
