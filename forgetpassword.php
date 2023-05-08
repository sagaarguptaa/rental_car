<?php
session_start();
?>


<script type="text/javascript">
function valid1() {
    if (document.save.pass.value != document.save.cpass.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.save.cpass.focus();
        return false;
    }
    return true;
}
</script>
<?php
include 'dbconnect.php';
if(isset($_POST['save']))
{
$email=$_POST['email'];
$mobile=$_POST['phone'];
$newpassword=$_POST['pass'];
$hash = password_hash($newpassword, PASSWORD_DEFAULT);
$sql ="SELECT email FROM tbluser WHERE email='$email' and phone='$mobile'";
$query= mysqli_query($conn ,$sql);
      if($query1=mysqli_num_rows($query) > 0)
            {
            $con="UPDATE `tbluser` SET `password`='$hash' WHERE email='$email' AND phone='$mobile'";
            $chngpwd1 = mysqli_query($conn,$con);
            if($chngpwd1){
                // $_SESSION['status']="Your Password Successfully Changed";
                // header('location:index.php');
            echo "<script>alert('Your Password succesfully changed');</script>";
            }
            else {
                // $_SESSION['error']="Email id or Mobile no is invalid";
            echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
            }
}}
?>



<div class="modal" tabindex="-1" id="forgetpassword" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">Forget Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" name="save" onSubmit="return valid1();">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" style="text-transform: lowercase" id="email" placeholder="Enter Your Email"
                                name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="int" max-length=10 class="form-control" id="phone"
                                placeholder="Enter Phone Number" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">New Password</label>
                            <input type="password" class="form-control" id="pwd" name="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="cpwd">Confirm Password</label>
                            <input type="password" class="form-control" id="cpwd" name="cpass" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="save">Save</button><br><br>
                        </div>
                    </form>
                    <div class="modal-footer text-center">
                         <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>