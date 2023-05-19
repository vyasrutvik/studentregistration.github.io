<?php
  session_start();
    
  if(!isset($_SESSION['username']))
  {
    header("location:login.php");
  }
?>

<?php
  include 'conn.php';

  include 'links.php';
?>


<?php

  
echo $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
    <title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <form action="" method="POST">
        <a href="logout.php">logout</a>
    </form>
    
</body>
</html>