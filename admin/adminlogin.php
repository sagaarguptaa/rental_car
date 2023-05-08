<?php
session_start();
include('../dbconnect.php');

if(isset($_POST['login'])){
	$username=($_POST['username']);
	$password=($_POST['password']);
	
	$sql="select * from admin where username='$username' and password='$password'";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['alogin']='yes';
		$_SESSION['ADMIN_USER']=$username;
		redirect('dashboard.php');
	}else{
		echo '<script>alert("Please Enter Valid Details")</script>';
	}
}
?>

<?php
function redirect($link){?>
<script>
window.location.href = '<?php echo $link?>';
</script>
<?php die(); }
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="assets2/css/login.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form  method="post" class="box">
                        <h1>Car Rental Admin</h1>
                        <p class="text-muted"> Please enter your login and password!</p> <input type="text"
                        name="username" placeholder="Username" required> <input type="password"
                        name="password" placeholder="Password" required> <input type="submit" name="login"
                        value="Login">

                    </form>
                </div>
            </div>
        </div>
    </div>
       

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>