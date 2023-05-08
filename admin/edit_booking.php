<?php
session_start();
include 'dbconnect.php';

if($_SESSION['ADMIN_USER']==""){	
header('location:adminlogin.php');
}
?>
<?php
     $ids = $_GET['id'];

$msg="";
if(isset($_POST['submit'])){
    $idupd= $_GET['id'];
    $fromdate = $_POST["fromdate"];
    $todate = $_POST["todate"];
    $price = $_POST["price"];
    $status = $_POST["status"];
 

    $update = "UPDATE `tblbooking` SET `todate`='$todate',`fromdate`='$fromdate',
    `price`='$price',`status`='$status' WHERE sno=$idupd";
    $query1= mysqli_query($conn,$update);
   if($query1){
       $msg='<div class="alert alert-success">Updated successfully</div>';
   }
   else{
    $msg ='<div class="alert alert-danger">Something went wrong</div>';
   }
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/cjs/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js">
    </script>

</head>

<body>
 
    <?php include 'leftbar.php';?>

    <?php 
      $val1 = "SELECT * FROM tblbooking WHERE sno='". $_GET['id']."'";
      $val2 = mysqli_query($conn,$val1);
      
     if($val2->num_rows > 0){
          while($arrdata=$val2->fetch_assoc()){
                $vid = $arrdata['vid'];
            ?>

    <div class="container mt-5 w-50 p-5 rounded shadow-1g" style="background:black">
        <span class="text-danger"><?php echo $msg; ?></span>
        <form method="post" class="text-white" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>From Date </label>
                    <input type="date" class="form-control form-control sm" name="fromdate"
                        value="<?php echo $arrdata['fromdate']?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label>To Date</label>
                    <input type="date" class="form-control form-control sm" name="todate"
                        value="<?php echo $arrdata['todate']?>" required>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="number" class="form-control form-control sm" name="price" 
                        value="<?php echo $arrdata['price']?>" required>
                </div>

                <div class="form-group col-md-6">
                    <label>Day </label>
                    <input type="number" maxlength="1" id="day" class="form-control form-control sm" name="day"
                        value="<?php echo $arrdata['day']?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <input type="number" max=2 min=0  class="form-control form-control sm" name="status"
                        value="<?php  echo $arrdata['status']?>" required>
                </div>
                <?php 
                $query="SELECT * FROM tblvehicle where id='$vid'";
                    $result = $conn->query($query);
                    if($result->num_rows > 0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $price_day = $row["price/day"]; }} ?>
                <div class="form-group col-md-6">
                    <label>Price/Day</label>
                    <input type="text" class="form-control form-control sm" name="price/day" id="price/day"
                        value="<?php  echo $price_day?>" disabled>
                </div>
              <?php }} ?>
            </div>

            <div class="">
                <button type="submit" class="btn btn-success" name="submit">Update </button><br><br>

            </div>

        </form>
    </div>



  

</body>

</html>