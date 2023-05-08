<?php
include 'dbconnect.php'; 
session_start();
?>

<?php
function redirect($link){?>
<script>
window.location.href = '<?php echo $link?>';
</script>
<?php die(); }
?>


<?php
if(!isset($_SESSION['femail']) && !isset($_SESSION['loggedin']))
{ 
    echo '<script>alert("Please Login First")</script>';
    redirect('index.php');
}


if(isset($_POST['submit'])){
    $email=$_SESSION['femail'];
    $address = $_POST["add"];
    

    $update = "UPDATE `tbluser` SET `address`='$address' WHERE email='$email'";
    $query1= mysqli_query($conn,$update);
    if($query1){
        echo '<script>alert("Updated Successfully")</script>';
    }
   
    
}

      
         
?>




<!Doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">


    <title>My profile</title>

</head>

<body style="background:#86E2FC">
    <?php include('header1.php');?>
<br><br><br><br><br><br><br>
    <h1 style="text-align:center;color:black">My Profile</h1>
    <div class="container">
   <?php    $email1 = $_SESSION['femail'];
            $query2 = "Select * from tbluser where email='$email1'";
            $res1 = mysqli_query($conn,$query2);
        // $result2 = mysqli_fetch_array($res1);
        while($result2=mysqli_fetch_array($res1)){
?>
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"  value="<?php echo $result2['name'] ?>" name="name"
                    disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?php echo $email1;?>" name="email" disabled>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="int" max-length=10 class="form-control"  value="<?php echo $result2['phone'] ?>"
                    name="phone" disabled>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control"  name="add" value="<?php echo $result2['address'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Enter Aadhaar No</label>
                <input type="int" style="color:black"  value="<?php echo $result2['aadhar'] ?>" name="aad" class="form-control" readonly>
            </div>
            
            <div class="form-group">
                <label>Enter Driving License no</label>
                <input type="text" style="color:black" value="<?php echo $result2['license']?>" class="form-control" readonly>
            </div>
           <?php } ?>
            <div class="form-group">
                <button type="submit" class="btn btn-warning" name="submit" >Update</button><br><br>

            </div>
        </form>
    </div>
         <br><br><br><br>   
    <?php include 'footer.php';?>
   
</body>

</html>
<?php require 'login.php'; ?>