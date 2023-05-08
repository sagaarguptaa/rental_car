<?php
session_start();
include 'dbconnect.php';
$message="";
if($_SESSION['ADMIN_USER']==""){	
header('location:adminlogin.php');
}
$ids = $_GET['id'];

$showquery = "select * from tblvehicle where id=($ids)";

$showdata = mysqli_query($conn,$showquery);

$arrdata = mysqli_fetch_array($showdata);
  

$msg="";
if(isset($_POST['submit'])){
    $idupd= $_GET['id'];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $overview = $_POST["overview"];
    $pricehr = $_POST["price/day"];
 

    $update = "UPDATE `tblvehicle` SET `model`='$model',`brand`='$brand',
    `overview`='$overview',`price/day`='$pricehr',`upd_date`= current_timestamp() WHERE id=$idupd";
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
    <div class="container mt-5 w-50 p-5 rounded shadow-1g" style="background:black">
        <span class="text-danger"><?php echo $msg; ?></span>
        <form method="post" class="text-white" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Brand </label>
                    <input type="text" class="form-control form-control sm" name="brand"
                        value="<?php echo $arrdata['brand']?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Model</label>
                    <input type="text" class="form-control form-control sm" name="model"
                        value="<?php echo $arrdata['model']?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Overview</label>
                    <input type="text-area" class="form-control form-control sm" name="overview"
                        value="<?php echo $arrdata['overview']?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="int" class="form-control form-control sm" name="price/day"
                        value="<?php  echo $arrdata['price/day']?>" required>RS/hr
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-success" name="submit">Update </button><br><br>

            </div>
            <div>
        </form>
</body>

</html>