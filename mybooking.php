<?php
session_start();
include('dbconnect.php');
error_reporting(0);

if(!isset($_SESSION['femail']))
{
    echo '<script>alert("Please Login First")</script>';
    redirect('index.php');
}
?>
<?php
function redirect($link){?>
<script>
window.location.href = '<?php echo $link?>';
</script>
<?php die(); }
?>
<?php 
          if(isset($_POST['cancel'])){
            $existSql12 = "select * from `tblcancel` where email ='".$_SESSION['femail']."'";
            $result2 = mysqli_query($conn, $existSql12);
            $numRows = mysqli_num_rows($result2);
            if($numRows>0)
            {
                echo '<script> alert("You have already Cancelled")</script>';
                header("location:mybooking.php");
            
            }
            else{


            $sql11= "INSERT INTO `tblcancel` (`email`, `date`) 
            VALUES ('".$_SESSION['femail']."', current_timestamp())";
            $result112 = mysqli_query($conn, $sql11);
            if($result112){
                echo '<script>alert("Wait for cancellation")</script>';
               
            }
            else{
                echo '<script>alert("Something went wrong")</script>';

            }
            }
        }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Car List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <?php include('header1.php');?>
    <!--Page Header-->
    <section class="page-header listing_page">
        <div class="container">
            <br><br><br><br><br><br><br>
            <div class="page-heading">
            <h1 style="text-align:center;color:black;background:#ECF77A ">
                    Booking</h1>
            </div>

            <?php $query="SELECT * FROM tblbooking where email='".$_SESSION['femail']."'";
                    $result = $conn->query($query);
                    if($result->num_rows > 0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $id1 = $row['sno'];
                            $bid = $row['vid'];
                            $fromdate = $row["fromdate"];
                            $todate = $row["todate"];
                            $price1 = $row["price"];
                            $pickup = $row['pickupadd'];
                            $status = $row['status'];

                            $query="SELECT * FROM tblvehicle where id='$bid'";
                    $result = $conn->query($query);
                    if($result->num_rows > 0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $id = $row["id"];
                            $brand = $row["brand"];
                            $model = $row["model"];
                            $overview = $row["overview"];
                            $price = $row["price/day"];
                            $img = $row['image1'];
                        


            ?>
            <section class="text-gray-600 body-font overflow-hidden">
                <div class="container px-5 py-24 mx-auto">
                    <div class="lg:w-4/5 mx-auto flex flex-wrap">
                        <img alt="ecommerce" class="lg:w-1/2 w-100 lg:h-auto h-64 object-cover object-center rounded" width="50%" height="50%"
                            src="<?php echo $img;?>">
                        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <h2 class="text-gray-900 text-3xl title-font font-medium mb-1">Brand : <?php echo $brand; ?></h2><br>
                            <h3 class="text-gray-900 text-3xl title-font font-medium mb-1">Model : <?php echo $model; ?></h3><br>
                            <h3 class="text-gray-900 text-3xl title-font font-medium mb-1">From : <?php echo $fromdate; ?></h3><br>
                            <h3 class="text-gray-900 text-3xl title-font font-medium mb-1">To : <?php echo $todate; ?><br><br>
                            </h3>
                            <h3 class="text-gray-900 text-3xl title-font font-medium mb-1">Pickup Address: <?php echo $pickup; ?>
                            </h3><br>
                            <div class="flex">
                                <span class="title-font font-medium text-2xl text-gray-900">Price :- <?php echo $price1;?>
                                    Rs</span><br><br>
                            </div>
                            <?php if($status==1) { ?>
                            <div > <a href="#" class="btn btn-outline-success " disabled>Confirmed</a>
                                <div class="clearfix"></div>
                            </div>

                            <?php } else if($status==2) { ?>
                            <div> <a href="#" class="btn btn-outline-danger" disabled>Cancelled</a>
                                <div class="clearfix"></div>
                            </div>
                            <?php } else { ?>
                            <div > <a href="#" class="btn btn-outline-warning " disabled>Not Confirm yet</a>
                                <div class="clearfix"></div>
                            </div>
                            <?php } ?>
                            <form method="post">
                            <button type="submit" class="btn btn-danger" name="cancel">Cancel</button></form><br><br>
                            <br><br>
                            <?php if($status==1){?>
                            <h3 style="color:black"> <b>You can Pay online /Ignore If paid</b></h3>
                            <div > <a href="payment.php?id=<?php echo $id1?>" class="btn btn-outline-success "> PAY </a>
                                <div class="clearfix"></div>
                            </div>
                                <?php } ?><br><br>
                                <?php 
                                 $query11="SELECT * FROM tblpayment where email='".$_SESSION['femail']."'";
                                 $result11 = $conn->query($query11);
                                 if($result11->num_rows > 0)
                                 {
                                ?><h3 style="color:green">Paid Successfully</h3>
                                <?php }elseif($status==1){ ?>
                                    <h3 style="color:red">Not Paid</h3>
                               <?php } else {?>
                              
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php }}}}?>
    </section><br><br><br><br><br><br>
    <!-- /Page Header-->
    <?php include 'footer.php';?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</body>

</html>