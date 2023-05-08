<?php
session_start();
include('dbconnect.php');

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
    <link rel="stylesheet" href="assets/css/carlist.css">
</head>

<body>
    <?php include('header1.php');?>
    <br><br><br><br><br><br><br>
    <section class="page-header listing_page">


        <div class="page-heading">
            <h1 style="text-align:center;color:black;background:#ECF77A ">

                Vehicles</h1>
        </div>
        <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <?php
        $query="Select * from tblvehicle where status = 1";
        $result=$conn->query($query);
        if($result->num_rows>0)
        {
          while($row=$result->fetch_assoc()){
            $vid= $row['id'];
            $brand = $row["brand"];
            $model = $row["model"];
            $price = $row["price/day"];
            $img = $row["image1"];
            ?>
                 <div class="col-sm-12 col-md-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions"> <img src="<?php echo $img ?>" class="card-img img-fluid"
                                    width="96px" height="350px" alt=""> </div>
                        </div>
                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h4 class="font-weight-semibold mb-2" style="color:black"> <a class="text-default mb-2"
                                        data-abc="true"><?php echo $model ?></a> </h4> <a style="color:black" href="#"
                                    class="text-muted" data-abc="true"><?php echo $brand ?></a>
                            </div>
                            <?php
                            
?>
  
                            <h3 class="mb-0 font-weight-semibold" style="color:black"><?php echo $price ?> Rs/Day</h3>     
                            <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i
                                    class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                            <div class="text-muted mb-3">100+ reviews</div>
                           <?php $existSql1 = "Select * from `tblbooking` where vid='$vid'";
                                $check = mysqli_query($conn, $existSql1);
                                $numRows = mysqli_num_rows($check);
                                    if($numRows>0)
                                    { 
                                      echo ' <a href="#" class="btn btn-outline-danger" disabled>Not Available</a> '; 
                                    // $sql1 = "select * from tblvehicle where id='$vid'";
                                    // $upd = "UPDATE `tblvehicle` SET `status`= 0 , WHERE id='$vid'";
                                    // $rescheck = mysqli_query($conn , $upd);
                                     } else{?>
                                <a type="button"
                                     href="car_details.php?id=<?php echo $row['id'];?>" class="btn bg-book"><i
                                    class="fa fa-book mr-2"></i> Book Now</a>
                                    <?php } ?>
                        </div> 
                         
                    </div>
                </div> 

                <?php  }
        }
        ?>
           </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section><br><br><br><br><br>
    <!-- /Page Header-->
    <?php include 'footer.php';?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>