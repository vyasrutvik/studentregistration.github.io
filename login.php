<?php
  session_start();
?>

<?php
include 'conn.php';

include 'links.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php

    if(isset($_POST['login']))
    {
       $email= $_POST['email'];
       $pass= $_POST['pass'];

       $emailsearch = "SELECT * FROM `createacc` WHERE email='$email' ";

       $query =mysqli_query($con,$emailsearch);

       $email_count = mysqli_num_rows($query);

       if($email_count)
       {
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass =$email_pass['password'];

            $_SESSION['username']= $email_pass['name'];

            $pass_decode = password_verify($pass,$db_pass);


            if($pass_decode)
            {
                ?>
                <script>
                        location.replace("home.php");
                </script>

                
                <?php
                
            }
            else
            {
                ?>
                <script>
                    alert("sorry! password are wrong");
                </script>
                <?php
            }
            
       }
       else
       {
        ?>
        <script>
            alert("invalid Email");
        </script>
        <?php
       }

    }

    ?>


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width:400px;">
           <h4 class="card-title mt-3 text-center">LOGIN</h4>
            <p class="text-center">Get Started With Your Free Account</p>
            <p>
                <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>  Login via Gmail</a>
                <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook"></i>  Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
        <form action="" method="POST">
           
        

        <div class="form-group input-group mt-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="text" name="email" class="form-control" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>

        

        <div class="form-group input-group mt-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="height:50px;"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" name="pass" class="form-control" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>

        
        <div class="form-group  mt-3">
                <button class="form-control btn btn-primary" name="login" type="submit">Login Now</button>
        </div>
        <p class="text-center mt-2">Don't Have an Account? <a href="registration.php">Sing Up Here</a></p>


        
        
    </form>
    </article>
    </div>
    
</body>
</html>