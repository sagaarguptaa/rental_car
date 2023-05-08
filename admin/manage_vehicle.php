<?php
session_start();
include 'dbconnect.php';
$message="";
if($_SESSION['ADMIN_USER']==""){	
header('location:adminlogin.php');
}

if(isset($_GET['action']) && $_GET['action']=='delete' &&  isset($_GET['id']) && !empty($_GET['id']))
{
    $query2 = "DELETE FROM tblvehicle WHERE id= '".$_GET['id']."'";
    $conn->query($query2);
    header("location:manage_vehicle.php");
}

if(isset($_GET['action']) && $_GET['action']=='active' &&  isset($_GET['id']) && !empty($_GET['id']))
{
    $query21 = "UPDATE tblvehicle SET status = 0  WHERE id= '".$_GET['id']."'";
    $conn->query($query21);
    header("location:manage_vehicle.php");
}

if(isset($_GET['action']) && $_GET['action']=='deactive' &&  isset($_GET['id']) && !empty($_GET['id']))
{
    $query22 = "UPDATE tblvehicle SET status = 1  WHERE id= '".$_GET['id']."'";
    $conn->query($query22);
    header("location:manage_vehicle.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/cjs/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
</head>

<body>
    <?php include 'leftbar.php';?>
    <h3 style="text-align:center;color:white;background:black">Manage Vehicle</h3>
    <div class="container mt-5">
        <h6><?php echo $message; ?></h6>
        <div class="row">
            <a href="postvehicle.php" class="badge bg-primary text-white ml-auto p-2 mr-5">Add Car</a>
            <table class="table text-center mt-1 table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Overview</th>
                        <th>Rs/Day</th>
                       
                        <th class="text-center">Action</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <?php
                    $query="SELECT * FROM tblvehicle";
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
                            $img = $row['image1']
                                                     
                        
                ?>
                <tbody>
                    <tr>
                        <td><img src="<?php echo $img ?>" style="width:100px"></td>
                        <td><?php echo $id?></td>
                        <td><?php echo $model?></td>
                        <td><?php echo $brand?></td>
                        <td><?php echo $overview?></td>
                        <td><?php echo $price?></td>
                        <td>
                            <div class="btn-group">
                               
                                <a href="editvehicle.php?id=<?php echo $id;?>"  data-toggle="tooltip" title="edit">
                                    <i class="material-icons text-warning">&#xE254;</i></a>

                                <a href="?action=delete&id=<?php echo $id; ?>" class="delete" title="Delete"
                                    data-toggle="tooltip" onclick="return confirm('Are you sure to remove this Car?')">
                                    <i class="btn material-icons text-danger">&#xE872;</i></a>
                            </div>
                        </td>
                        <?php if($row['status']==0){ ?>
                            <td><a href="?action=deactive&id=<?php echo $id ?>" class="text-success" title="Click to Active"
                            data-toggle="tooltip"><i style="font-size:24px" class="fa">&#xf204;</i></a></td>

                            <?php } else{ ?>
                            <td><a href="?action=active&id=<?php echo $id ?>" class="text-success" title="Click to Deactive"
                            data-toggle="tooltip"><i style="font-size:24px" class="fa">&#xf205;</i></a></td>

                           <?php } ?></td>
                    </tr>
                </tbody>
                <?php }} ?>
            </table>
        </div>
    </div>


</body>

</html>