<?php
$servername="localhost";
$username="root";
$password="";
$database="food_receipe";

$con=mysqli_connect($servername,$username,$password,$database);
if(!$con)
{
    die("Error to connect :".mysqli_connect_error());
}
?>