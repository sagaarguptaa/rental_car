<?php 
session_start();
include 'dbconnect.php'; 
if(!isset($_SESSION['femail']))
{
    echo '<script>alert("Please Login First")</script>';
    redirect('index.php');
}
$id2 = $_GET['id'];
$query="select * from tblbooking where sno='$id2'";
$query2 = mysqli_query($conn,$query);
if($query2->num_rows >0){
    while($res2=mysqli_fetch_assoc($query2)){
        $pemail = $res2['email'];
        $price  =$res2['price'];
        
        if(isset($_POST['submit'])){
            $existSql1 = "select * from `tblpayment` where email ='$pemail'";
            $result = mysqli_query($conn, $existSql1);
            $numRows = mysqli_num_rows($result);
            if($numRows>0)
            {
                echo '<script> alert("You have already Paid")</script>';
                header("location:mybooking.php");
            
            }
            else{


            $sql= "INSERT INTO `tblpayment` (`email`, `price`,`Status`, `date`) 
            VALUES ('$pemail','$price','paid', current_timestamp())";
            $result1 = mysqli_query($conn, $sql);
            if($result1){
                echo '<script>alert("Paid Successfully")</script>';
               
            }
            else{
                echo '<script>alert("Something went wrong")</script>';

            }
            }
        }}
    
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/payment.css">
  
</head>

<body>

    <?php include('header1.php');?>
        <div class="container">
            <form method="post">
                <div class="row">
                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
                        <label for="ccnum">Dedit card number</label>
                        <input type="text" id="ccnum" maxlength="16" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Date</label>
                                <input type="date" id="expyear" name="expyear" placeholder="2018" required>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" maxlength="3" name="cvv" placeholder="352" required>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-success" name="submit">Continue to Checkout</button>
            </form>
        </div>
    
    <div class="col-25">
        <div class="container">
            <p>Total <span class="price" style="color:black"><b>Rs <?php echo $price ?></b></span></p>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</body>

</html>