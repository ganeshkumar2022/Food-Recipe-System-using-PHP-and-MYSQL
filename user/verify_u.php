<?php
session_start();
include("../db.php");

//update profile start
if(isset($_POST["update"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $sql="update user set name='$name',email='$email',phone='$phone' where id=".$_SESSION["uid"];
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('user profile updated successfully');
        window.location.replace('index.php');</script>";
    }
    else
    {
        echo "<script>alert('Error to update profile');
        window.location.replace('index.php');</script>";
    }
}
//update profile end

//update password start
if(isset($_POST["update_password"]))
{
    $current_password=$_POST["current_password"];
    $new_password=$_POST["new_password"];
    $confirm_password=$_POST["confirm_password"];
    $sql="select * from user where id=".$_SESSION["uid"];
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $verify=password_verify($current_password,$row["password"]);
    if($verify)
    {
        if($current_password==$new_password)
        {
        echo "<script>alert('New password must be a different one');
        window.location.replace('change_password.php');</script>";
        }
        else
        {
            if($new_password==$confirm_password)
            {
                $new_password=password_hash($new_password,PASSWORD_DEFAULT);
                $sql2="update user set password='$new_password' where id=".$_SESSION["uid"];
                if(mysqli_query($con,$sql2))
                {
                    echo "<script>alert('Password updated successfully');
                    window.location.replace('change_password.php');</script>";
                }
                else
                {
                    echo "<script>alert('Error to update a password');
                    window.location.replace('change_password.php');</script>";
                }
            }
            else
            {
              echo "<script>alert('New password and confirm password not match');
              window.location.replace('change_password.php');</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('Current password not match');
        window.location.replace('change_password.php');</script>";
    }
}
//update password end

//add recipe start

if(isset($_POST["add_recipe"]))
{
    $recipe_title=$_POST["recipe_title"];
    $prepare_time=$_POST["prepare_time"];
    $user_id=$_POST["user_id"];
    $cook_time=$_POST["cook_time"];
    $yields=$_POST["yields"];
    $description=$_POST["description"];
    $ingredients=$_POST["ingredients"];
    $upload_dir="foods/";
    $upload_file=$upload_dir.basename($_FILES["myimage"]["name"]);
    if(strstr($upload_file,".jpg") || strstr($upload_file,".jpeg") || strstr($upload_file,".png"))
    {
        if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$upload_file))
        {
            $sql="insert into recipe values (NULL,$user_id,'$recipe_title','$prepare_time','$cook_time','$yields',
            '$description','$upload_file',NULL)";
            if(mysqli_query($con,$sql))
            {
                $last_id=mysqli_insert_id($con);
                foreach($ingredients as $ingredient)
                {
                    $sql2="insert into ingredient values (NULL,'$ingredient',$last_id)";
                    if(mysqli_query($con,$sql2))
                    {
                        
                    }
                }
                echo "<script>alert('Recipe added successfully');
                window.location.replace('add_recipe.php');</script>";
            }
            else
            {
                echo "<script>alert('Error to add a recipe');
                window.location.replace('add_recipe.php');</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('please upload jpg,png,jpeg formats only');
        window.location.replace('add_recipe.php');</script>";
    }
}

//add recipe end

//edit recipe start
if(isset($_POST["update_recipe"]))
{

    $recipe_title=$_POST["recipe_title"];
    $prepare_time=$_POST["prepare_time"];
    $cook_time=$_POST["cook_time"];
    $yields=$_POST["yields"];
    $rid=$_POST["rid"];
    $user_id=$_POST["user_id"];
    $description=$_POST["description"];
    $ingredients=$_POST["ingredients"];
    $upload_dir="foods/";
    if($_FILES["myimage"]["name"]!="")
    {
        $upload_file=$upload_dir.basename($_FILES["myimage"]["name"]);
        if(strstr($upload_file,".jpg") || strstr($upload_file,".jpeg") || strstr($upload_file,".png"))
        {
            if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$upload_file))
            {
                $sql="update recipe set recipe_title='$recipe_title',prepare_time='$prepare_time',cook_time='$cook_time',yields='$yields',description='$description',pictures='$upload_file' where rid=$rid";
                if(mysqli_query($con,$sql))
                {
                    $last_id=$rid;
                    $sql2="delete from ingredient where recipe_id=$rid";
                    if(mysqli_query($con,$sql2))
                    {

                    }
                    $ingredients=explode(",",$ingredients);
                    foreach($ingredients as $ingredient)
                    {
                        $sql2="insert into ingredient values (NULL,'$ingredient',$last_id)";
                        if(mysqli_query($con,$sql2))
                        {
                            
                        }
                    }
                    echo "<script>alert('Recipe updated successfully');
                    window.history.back();</script>";
                }
                else
                {
                    echo "<script>alert('Error to update a recipe');
                    window.history.back();</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('please upload jpg,png,jpeg formats only');
            window.history.back();</script>";
        }
    }
    else
    {
        $sql="update recipe set recipe_title='$recipe_title',prepare_time='$prepare_time',cook_time='$cook_time',yields='$yields',description='$description' where rid=$rid";
        if(mysqli_query($con,$sql))
        {
            $last_id=$rid;
            $sql2="delete from ingredient where recipe_id=$rid";
            if(mysqli_query($con,$sql2))
            {

            }
            $ingredients=explode(",",$ingredients);
            foreach($ingredients as $ingredient)
            {
                $sql2="insert into ingredient values (NULL,'$ingredient',$last_id)";
                if(mysqli_query($con,$sql2))
                {
                    
                }
            }
            echo "<script>alert('Recipe updated successfully');
            window.history.back();</script>";
        }
        else
        {
            echo "<script>alert('Error to update a recipe');
            window.history.back();</script>";
        }
    }
    
}
//edit recipe end

?>