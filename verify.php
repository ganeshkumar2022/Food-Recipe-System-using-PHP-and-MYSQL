<?php
session_start();
include("db.php");

//contact start
if(isset($_POST["get_in_touch"]))
{
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];

$sql="insert into contact (name,email,subject,message) values ('$name','$email','$subject','$message')";
if(mysqli_query($con,$sql))
{
    echo "Contact Form submitted successfully";
}
else
{
    echo "Error to submit a form";
}
}
//contact end

//register start
if(isset($_POST["register"]))
{
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$password=password_hash($_POST["password"],PASSWORD_DEFAULT);

$sql2="select * from user where email='$email'";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
    echo "Email already exists";
}
else
{
    $sql="insert into user (name,email,phone,password) values ('$name','$email','$phone','$password')";
    if(mysqli_query($con,$sql))
    {
        echo "Registered successfully";
    }
    else
    {
        echo "Error to register";
    }
}

}
//register end

//login start

if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql="select * from user where email='$email'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $verify=password_verify($password,$row["password"]);
        if($verify)
        {
            $_SESSION["uid"]=$row["id"];
            echo "Login successfully <script>window.location.replace('index.php');</script>";
        }
        else
        {
            echo "Email or password incorrect";
        }
    }
    else
    {
        echo "No email exists";
    }
}

//login end


//comments start
if(isset($_POST["add_comments"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $recipe_id=$_POST["recipe_id"];
    $sql="insert into comments (name,email,message,recipe_id) values ('$name','$email','$message',$recipe_id)";
    if(mysqli_query($con,$sql))
    {
        echo "Comments added successfully";
    }
    else
    {
        echo "Error to add comments";
    }
}
//comments end


//admin login start

if(isset($_POST["alogin"]))
{
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $sql="select * from admin where email='$email' and password='$password'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $_SESSION["aid"]=$row["id"];
        echo "Login successfully<script>window.location.replace('index.php');</script>";
    }
    else
    {
        echo "Email or password incorrect";
    }
}

//admin login end
?>