<?php
$username="root";
$pass="";
$server="localhost";
$db="registration";


$con = mysqli_connect($server,$username,$pass,$db);

if(!$con)
{
    dia("no connaction". mysqli_connect_error());
}


?>