<?php 
 
include 'dbconnect.php';
if(isset($_POST['login']))
{
   
    $femail = $_POST['femail'];
    $password = $_POST['password'];

    $email_search = "Select * from tbluser where email='$femail'";
    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);
    //$row1 = mysqli_fetch_array($query);
  
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        if(password_verify($password, $email_pass['password']))
        {
            session_start();
            $_SESSION['loggedin'] = "yes";
            $_SESSION['femail']= $femail;
            if(isset($_POST['remember'])){
                setcookie('femail',$_POST['femail'],time()+ (60*60));
                setcookie('password',$_POST['password'],time()+ (60*60));
            }
            else{
                setcookie('femail','',time() - (60*60));
                setcookie('password','',time() - (60*60)); 
            }
            header("Location: index.php");
            exit();
        }else{
           echo '<script> alert("Invalid Password ")</script>';
        }
       
    }else{
        echo '<script> alert("Invalid Email ")</script>';
    }


}

?>


       
<div class="container mt-3">
    <!-- The Modal -->
    <div class="modal fade" id="loginform">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="color:black">Login To Car Rental Website</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="container">
                
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="varchar" class="form-control" style="text-transform: lowercase" id="email" value="<?php echo $id ?>" placeholder="Enter email"
                                name="femail"  required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="password" value="<?php echo $pass ?>" placeholder="Enter password"
                                name="password" required>
                        </div>
                        <!-- <div class="form-group form-check"> -->
                            <label>
                                <input type="checkbox"  name="remember"> Remember me
                            </label>
                        <!-- </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="login">Login</button><br><br>
                            <p>Don't have an account? <a href="#signupform" data-toggle="modal"
                                    data-dismiss="modal">Signup Here</a></p>
                            <p><a href="#forgetpassword" data-toggle="modal" data-dismiss="modal">Forgot Password
                                    ?</a></p>
                        </div>
                    </form>
                </div>
            <style>
            label{
                color:black;
            }
            p{
                color:black;
            }
            </style>
            </div>
        </div>
    </div>
</div>

<?php include 'signup.php';?>
<?php require 'forgetpassword.php' ; ?>
