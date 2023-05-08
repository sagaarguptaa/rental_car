
<script type="text/javascript">
 function Validate() {
        var password = document.getElementById("pwd").value;
        var confirmPassword = document.getElementById("cpwd").value;
        if (password != confirmPassword) {
            alert("Password and Confirm Password do not match.");
            return false;
        }
        return true;
    }
</script>

<?php
if(isset($_POST['signup']))
{
    include 'dbconnect.php';
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $license = $_POST['license'];
    $aad = $_POST['aad'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    // Check whether this email exists
    $existSql = "select * from `tbluser` where email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        echo '<script>alert("Email already in use")</script>';
       echo '<script>location.href="index.php";</script> ';
    }
    else
    {
        if($password == $cpassword) 
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tbluser` (`name`, `email`, `phone`, `aadhar`,`license`, `password`, `datetime`) 
            VALUES ('$user_name', '$user_email', '$user_phone','$aad','$license','$hash', current_timestamp())";
            $result1 = mysqli_query($conn, $sql);
            
            if($result1)
            {             
                echo '<script>alert("You can now login")</script>';
                echo '<script>location.href="index.php";</script> ';
                // header("location:index.php");
            }
           
        }
    }
}
?>
<script>
function myFunction1() {
  var y = document.getElementById("cpwd");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
</script>

<script>
function toLowerCase(email) {
    strInput.value=strInput.value.toLowerCase();
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
}
</script>

<head>
    <div class="container mt-3">
        <!-- The Modal -->
        <div class="modal fade" id="signupform">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="color:black">Sign Up To Car Rental Website</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="container">
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="name" pattern="[a-zA-Z ]+" maxlength="20"  placeholder="Enter Name"
                                    name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" style="text-transform: lowercase" class="form-control" id="email" placeholder="Enter Your Email"
                                    name="email" pattern=".+@gmail\.com|.+@yahoo\.com|.+@hotmail\.com"
                             required>
                            </div>
                            <div class="form-group">
                                <label >Phone</label>
                                <input type="int" maxlength="10"  class="form-control" id="phone"
                                    placeholder="Enter Phone Number" name="phone" pattern="(0|91)?[7-9][0-9]{9}" required>
                            </div>
                            <div class="form-group">
                                <label>Enter Aadhaar No</label>
                                <input type="int" style="color:black" id="aad" maxlength="12" placeholder="111122223333" pattern="^[0-9]{12}$" name="aad" onchange="validateAadNumber(this)" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label>Enter Driving License no</label>
                            <input type="text" onkeyup="this.value = this.value.toUpperCase()" style="color:black" maxlength="15" id="license" name="license" pattern="^[A-Za-z][0-9/\W/]{2,20}$" class="form-control" placeholder="D123456789012334" required>
                        </div>
                        
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" id="pwd" name="pass" required>
                                <input type="checkbox" onclick="myFunction()"><label style="color:black">Show Password</label>
                            </div>
                            <div class="form-group">
                                <label for="cpwd">Confirm Password</label>
                                <input type="password" class="form-control" id="cpwd" name="cpass" required>
                                <input type="checkbox" onclick="myFunction1()"><label style="color:black">Show Password</label>
                            </div>
                            
                        
                            <div class=" d-flex align-items-start justify-content-between">
                            <div><input type="checkbox" id="terms_agree" required="required" checked="">
                            <span>I Agree with <a href="tandc.php">Terms and Conditions</a></span>
                                 </div>
                            
                                <button type="submit" onclick="return Validate()" class="btn btn-success" name="signup">Sign Up</button>

</div>
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</head>

