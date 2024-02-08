<?php
session_start();
if(!isset($_SESSION["aid"]))
{
    echo "<script>window.location.replace('login.php')</script>";
}

?>