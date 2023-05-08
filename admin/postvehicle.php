<?php
include 'dbconnect.php';
session_start();
if($_SESSION['ADMIN_USER'] ==""){
    header("location:adminlogin.php");
}
$error="";
if(isset($_POST['submit'])){
    $b_brand=$_POST['b_brand'];
    $b_model=$_POST['b_model'];
    $b_overview=$_POST['b_overview'];
    $b_price=$_POST['b_price'];
    $uploadfile=$_FILES['uploadfile']['name'];
    $tmpname=$_FILES['uploadfile']['tmp_name'];
    $folder = "img/".$uploadfile;
    $folder1 = "admin/".$folder;
    move_uploaded_file($tmpname,$folder);
   
    
   
    $q = "INSERT INTO `tblvehicle`(`model`, `brand`, `overview`, `price/day`, `image1`, `reg_date`)
     VALUES ('$b_model',' $b_brand',' $b_overview',' $b_price',' $folder',current_timestamp())";
    $result1 = mysqli_query($conn, $q);
     if($result1){
        $error.= '<div class="alert alert-success">Car Added</div>';
        
     }
     else{
         $error.= '<div class="alert alert-danger">something went wrong</div>';
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'leftbar.php';?>
    <h3 style="text-align:center;color:white;background:black">Post Vehicle</h3>
    <div class="container mt-5 w-50 p-5 rounded shadow-1g" style="background:black">
        <span class="text-danger"><?php echo $error; ?></span>
        <form method="post" class="text-white" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Brand Name</label>
                    <input type="text" class="form-control form-control sm" name="b_brand" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Model Name</label>
                    <input type="text" class="form-control form-control sm" name="b_model" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Overview</label>
                    <input type="text-area" class="form-control form-control sm" name="b_overview" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="int" class="form-control form-control sm" name="b_price" required>Rs/Day
                </div>
            </div>
            <label for="customFile">Car Image</label>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="uploadfile" id="customFile" required>
                <label class="custom-file-label">Choose File</label>
            </div>
            <div class="">
                <button type="submit" class="btn btn-success" name="submit">Add </button><br><br>

            </div>
            <div>
        </form>
    </div>
    </div>
    <script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>

</html>