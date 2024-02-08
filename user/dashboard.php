<?php
include("ses.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food receipe system user panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<div style="width:20%;height:100vh;float:left;" class="bg-dark">
<?php
include("includes/leftbar.php");
?>
</div>
<div style="width:80%;float:left;height:100vh;background-color:lightblue;" >
<!-- header content start -->
<header class="text-white bg-primary">
    <h4 class="py-4 ml-3 text-primary">
    <i class="fa-solid fa-unlock"></i>&nbsp;&nbsp;Update password
    <div class="dropdown float-right mr-2">
  <button type="button" class="btn btn-info mybtn dropdown-toggle" data-toggle="dropdown">
    User
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="index.php">Profile</a>
    <a class="dropdown-item" href="change_password.php">Change password</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
    </h4>
</header>
<!-- header content end -->
<?php
include("../db.php");
$sql="select count(*) as total from recipe where user_id=".$_SESSION["uid"];
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$a=$row["total"];

$sql2="select count(*) as total from comments inner join recipe on comments.recipe_id=recipe.rid where recipe.user_id=".$_SESSION["uid"];
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);
$b=$row2["total"];

$sql3="select count(*) as total from comments inner join recipe on comments.recipe_id=recipe.rid where comments.status='Waiting for Approval' and recipe.user_id=".$_SESSION["uid"];
$result3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_assoc($result3);
$c=$row3["total"];

$sql4="select count(*) as total from comments inner join recipe on comments.recipe_id=recipe.rid where comments.status='Approved' and recipe.user_id=".$_SESSION["uid"];
$result4=mysqli_query($con,$sql4);
$row4=mysqli_fetch_assoc($result4);
$d=$row4["total"];

$sql5="select count(*) as total from comments inner join recipe on comments.recipe_id=recipe.rid where comments.status='Rejected' and recipe.user_id=".$_SESSION["uid"];
$result5=mysqli_query($con,$sql5);
$row5=mysqli_fetch_assoc($result5);
$rej=$row5["total"];
?>
<!-- main content start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mt-2">
                    <div class="card" style="background-color:RoyalBlue;color:white;">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th><i class="fa-solid fa-utensils" style="font-size:40px;"></i></th>
                                    <th><h4 class="ml-3">Total Food Recipe<br><?=$a?></h4></th>
                                </tr>
                            </table>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card" style="background-color:Lime;color:white;">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th><i class="fa-solid fa-comment" style="font-size:40px;"></i></th>
                                    <th><h4 class="ml-3">All Comments<br><?=$b?></h4></th>
                                </tr>
                            </table>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card" style="background-color:Magenta;color:white;">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th><i class="fa-solid fa-comment" style="font-size:40px;"></i></th>
                                    <th><h4 class="ml-3">New Comments<br><?=$c?></h4></th>
                                </tr>
                            </table>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card" style="background-color:black;color:white;">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th><i class="fa-solid fa-comment" style="font-size:40px;"></i></th>
                                    <th><h4 class="ml-3">Rejected Comments<br><?=$rej?></h4></th>
                                </tr>
                            </table>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card" style="background-color:LightSalmon;color:white;">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th><i class="fa-solid fa-comment" style="font-size:40px;"></i></th>
                                    <th><h4 class="ml-3">Approved Comments<br><?=$d?></h4></th>
                                </tr>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main content end -->
</div>

</div>
</body>
</html>