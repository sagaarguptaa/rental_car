<?php 
session_start();

if(isset($_POST['book']))
{
    include 'dbconnect.php';
    $ids = $_GET['id'];
    $em = $_SESSION['femail'];
    $day = $_POST['day'];
    $pickupadd = $_POST['pick'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $existSql1 = "Select * from `tblbooking` where email = '$em'";
    $result = mysqli_query($conn, $existSql1);
    $numRows = mysqli_num_rows($result);
        if($numRows>0)
        {
        echo '<script> alert("You have already booked one car")</script>';
        
        // redirect("car_listing.php");
        // exit();
        }
        else{
          $sql11 = "INSERT INTO `tblbooking`( `vid`, `email`, `day`, `pickupadd`,`fromdate`, `todate`) 
          VALUES ('$ids','$em','$day',' $pickupadd', '$fromdate', '$todate')";
          $result11 = mysqli_query($conn, $sql11);
          if($result11){
              echo '<script> alert("Booked,Wait for confirmation")</script>';    
          }   
          $sql12 = "INSERT INTO `tblbooked`( `vid`, `email`, `days`, `bookingdate`) 
          VALUES ('$ids','$em','$day',current_timestamp())";
          $result12 = mysqli_query($conn, $sql12); 
      }

    }
?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">


    <title>CAR RENTAL!</title>

</head>

<body>
    
    <?php 
    include('header1.php');?>
    <?php 
    $ids = $_GET['id'];
    $query="SELECT * FROM tblvehicle where id='$ids'";
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
    <br><br><br><br><br><br>
    <section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-100 lg:h-auto h-64 object-cover object-center rounded" src="<?php echo $img ?>">
      <div class="lg:w-1/2 w-auto lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h2 class="text-sm title-font text-gray-500 tracking-widest"><?php echo $brand ?></h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo $model ?></h1>
        <div class="flex mb-4">
          <span class="flex items-center">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <span class="text-gray-600 ml-3">100+ Reviews</span>
          </span>
          <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
        </div>
        <p class="leading-relaxed"><?php echo $overview ?></p>
        <form method="post">
        
        <br><br><span class="title-font font-medium text-2xl text-gray-900">For Days :- <input type="number" style="background-color:blue;color:white" id="day" value="1" max=31 min=1 name="day" step="1"></span>
        <br><br><span class="title-font font-medium text-2xl text-gray-900">Total :- <input type="number" style="background-color:white;color:black" id="price" value="<?php echo $price ?>" readonly></span>
        <br><br>
        <span class="title-font font-medium text-2xl text-gray-900"><label>From Date </label></span>
          <input type="date" class="form-control form-control sm" name="fromdate" id="fromdate"
          value="<?php echo $arrdata['fromdate']?>" required>
          <br>
        <span class="title-font font-medium text-2xl text-gray-900"><label>To Date</label></span>
          <input type="date" class="form-control form-control sm" name="todate" id="todate"
          value="<?php echo $arrdata['todate']?>" required>
          <br>
        <span class="title-font font-medium text-2xl text-gray-900">Pickup Add :- <textarea id="add" style="background-color:white;color:black" name="pick" class="form-control" style="height:200px" required></textarea></span>
        <br>
        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-900"><?php echo $price ?>Rs/Day</span>
          <?php if(isset($_SESSION['femail']))
              {?> 
          <button type="submit" name="book" class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-green hover:bg-green-600 rounded">Book</button>
          <?php }else{ ?>
          <a href="#loginform" data-toggle="modal" data-dismiss="modal" class="btn flex ml-auto text-black bg-yellow-500 border-0 py-2 px-6 focus:outline-orange hover:bg-orange-600 rounded">Login Now</a>

          <?php 
       
        }?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php }} ?>

     
       
    <br><br><br><br><br><br>
    <?php include 'footer.php';?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>




    <?php 
include 'login.php';?>


    <?php

function redirect($link){?>
    <script>
    window.location.href = '<?php echo $link?>';
    </script>
    <?php die(); }
?>
    

    <script>
     $(document).ready(function(){
            var price= $("#price").val();
            var day = $("#day").val();
            var add= day * price;
            $('#price').val(add);

           $('#day').change(function(){
               var day=$(this).val();
               var add = day * price;
               $('#price').val(add);
           
           });

        });


    </script>

</body>

</html>