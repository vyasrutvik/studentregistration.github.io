<?php
session_start();
?>

<?php
include 'conn.php';

include 'links.php';

?>

<?php




if(isset($_POST['createaccount']))
{
    @$name= mysqli_real_escape_string($con,$_POST['username']);
    @$email= mysqli_real_escape_string($con,$_POST['email']);
    @$phone= mysqli_real_escape_string($con,$_POST['phone']);
    @$pass= mysqli_real_escape_string($con,$_POST['pass']);
    @$cpass= mysqli_real_escape_string($con,$_POST['cpass']);

    $password = password_hash($pass, PASSWORD_BCRYPT);
    $cpassword = password_hash($cpass, PASSWORD_BCRYPT);

    $emailquery="SELECT * FROM `createacc` WHERE email='$email' ";

    $query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query); 

    if($emailcount > 0)
    {
        ?>
         <script>
              alert("This Email Already Exists");
         </script>
        <?php
    }
    else
    {
        if($pass === $cpass)
        {
            $insert = "INSERT INTO createacc(name, email, mobile, password, cpassword) VALUES ('$name','$email','$phone','$password','$cpassword')";

            $iquery=mysqli_query($con,$insert);

           
            ?>
            <script>
                location.replace("dmm.php");
            </script>
            <?php
            if($iquery)
            {
               ?>
                <script>
                    alert("Registered succsesfully!");   
                </script>
              <?php    
            }
        }
        else
        {
            ?>
            <script>
                alert("password are not same");
            </script>
            <?php
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width:400px;">
           <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get Started With Your Free Account</p>
            <p>
                <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>  Login via Gmail</a>
                <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook"></i>  Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
           
        <div class="form-group input-group mt-3">
            <div class="input-group-prepend" >
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control" placeholder="Full Name" required>
        </div>

        <div class="form-group input-group mt-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="text" name="email" class="form-control" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>

        <div class="form-group input-group mt-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-phone"></i></span>
            </div>
            <input type="tel" name="phone" class="form-control" placeholder="Enter Number" maxlength="10" required>
        </div>

        <div class="form-group input-group mt-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" name="pass" class="form-control" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>

        <div class="form-group input-group mt-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" name="cpass" class="form-control" placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>

        <div class="form-group  mt-3">
                <button class="form-control btn btn-primary" name="createaccount" type="submit">Create Account</button>
        </div>
        <p class="text-center mt-2">Have an Account? <a href="login.php">Log In</a></p>


        
        
    </form>
    </article>
    </div>
    
</body>
</html>