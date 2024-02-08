<?php
session_start();
if(!isset($_SESSION["uid"]))
{
    echo "<script>window.location.replace('login.php')</script>";
}

?>