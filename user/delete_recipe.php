<?php
$id=$_GET["id"];
include("../db.php");
$sql="delete from recipe where rid=$id";
if(mysqli_query($con,$sql))
{
    $sql2="delete from ingredient where recipe_id=$id";
    if(mysqli_query($con,$sql2))
    {
        echo "<script>window.history.back();</script>";
    }
    else
    {
        echo "<script>window.history.back();</script>";
    }
}
?>