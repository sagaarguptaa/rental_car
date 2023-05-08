<?php
session_start();
include 'dbconnect.php';
$message="";
if($_SESSION['ADMIN_USER']==""){	
header('location:adminlogin.php');
}

if(isset($_GET['action']) && $_GET['action']=='delete' &&  isset($_GET['id']) && !empty($_GET['id']))
{
    $query2 = "DELETE FROM tblbooking WHERE sno= '".$_GET['id']."'";
    $conn->query($query2);
    header("location:manage_booking.php");
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
    <h3 style="text-align:center;color:white;background:black">Manage Booking</h3>
    <div>
        <!-- <h6><?php //echo $message; ?></h6> -->
        <div class="row">
            <table class="table text-center mt-1 table-bordered" style="margin-right:10px">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>EMAIL</th>
                        <th>Vehicle_id</th>
                        <th>From</th>
                        <th>To</th>
                        
                        <th>Day</th>
                        <th>Price</th>
                        <th>Pickup Address</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                        <!-- <th>Status</th> -->
                    </tr>
                </thead>
                
              <tbody>
                    <tr>
                <?php  $res11="SELECT * FROM tblbooking";
                       $res12 = $conn->query($res11);
                    if($res12->num_rows > 0)
                    {
                        while($row=$res12->fetch_assoc())
                        {
                            $id = $row["sno"];
                            $vid = $row["vid"];
                            $bemail = $row["email"];
                            $fromdate = $row["fromdate"];
                            $todate = $row["todate"];
                           
                            $day = $row['day'];  
                            $price= $row['price'];
                            $pickupadd = $row['pickupadd'];  
                            $status = $row['status']; 

                            $query1="select * from tblvehicle where id='$vid'";
                            $result1 = $conn->query($query1);
                            if($result1->num_rows > 0)
                            {
                            while($rows=$result1->fetch_assoc())
                            {
                                $image = $rows["image1"];
                            ?>                         
                        
              
                        <td><img src="<?php echo $image ?>" style="width:100px"></td> <?php  }} ?>
                        <td><?php echo $bemail?></td>
                        <td><?php echo $vid?></td>
                        <td><?php echo $fromdate?></td>
                        <td><?php echo $todate?></td>
                        
                        <td><?php echo $day?></td>
                        <td><?php echo $price?></td>
                        <td><?php echo $pickupadd?></td>
                        <td><?php 
                                if($status==0){
                                        echo htmlentities('Not Confirmed yet');
                                } else if ($status==1) {
                                        echo htmlentities('Confirmed');
                                }
                                 else{
 	                                    echo htmlentities('Cancelled');
                                }
				    ?></td>
                        <td>
                            <a href="edit_booking.php?id=<?php echo $id;?>">
                                    <i class="material-icons text-warning">&#xE254;</i></a>

                                    <a href="?action=delete&id=<?php echo $id; ?>" class="delete" title="Delete"
                                        data-toggle="tooltip"
                                        onclick="return confirm('Are you sure to remove this query?')">
                                        <i class="btn material-icons text-danger">&#xE872;</i></a>

                        </td>
                    </tr>
                </tbody>
                        <?php }}?>
              </table>
</body>
</html>