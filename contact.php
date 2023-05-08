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


if(isset($_POST['send']))
{
    include 'dbconnect.php';
    $fullname = $_POST['username'];
    $email = $_SESSION['femail'];
    $message = $_POST['message'];
            $sql = "INSERT INTO `tblcontactus` (`fullname`, `email`, `message`, `date`) 
            VALUES ('$fullname', '".$_SESSION['femail']."', '$message', current_timestamp())";
            $result1 = mysqli_query($conn, $sql);
            if($result1){
                echo '<script> alert("Query sent,we will contact you shortly")</script>';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <?php include('header1.php');?>
   <br><br><br><br><br><br>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">For any Queries</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">

                    <div class="container">
                        <form method="post">
                            <div class="form-group">
                                <label style="color:Black">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email" style="color:Black">Email</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['femail']?>" placeholder="Enter Your Email"
                                    name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message" style="color:Black">Issue</label>
                                <textarea type="text" class="form-control" placeholder="Tell Your Issue" name="message"
                                    required></textarea>
                            </div>

                            <div class="form-group">
                                <button
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                    name="send" type="submit">SEND</button>
                            </div>
                        </form>
                        <br><br>
                        
                    </div>
                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                        <a class="text-indigo-500">carrental@gmail.com</a>
                        <p class="leading-normal my-5">Maharashtra,India
                            <br>Car rental dombivli(E).
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include 'footer.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</body>

</html>