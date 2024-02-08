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
    <h4 class="py-4 ml-3">
    <i class="fa-solid fa-user"></i>&nbsp;&nbsp;Profile
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
//user details
include("../db.php");
$sql="select * from user where id=".$_SESSION["uid"];
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<!-- main content start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- change profile start -->
                    <div class="card">
                        <div class="card-header bg-success text-white">User Profile</div>
                        <div class="card-body">
                            <form method="post" autocomplete="off" action="verify_u.php">
                            <div class="row">
                                <div class="col-md-3"><p class="font-weight-bold text-right mt-1">Full name</p></div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?=$row['name']?>" name="name" id="name" required>
                                </div>
                                <div class="col-md-3"></div>
                                
                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Email</p></div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?=$row['email']?>" name="email" id="email" required>
                                </div>
                                <div class="col-md-3"></div>
                                
                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Mobile no</p></div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?=$row['phone']?>" maxlength="10" name="phone" id="phone" required>
                                </div>
                                <div class="col-md-3"></div>
                                
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <center>
                                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                                    </center>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- change profile end -->
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