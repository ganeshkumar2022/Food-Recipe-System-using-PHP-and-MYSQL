<?php
session_start();
if(isset($_SESSION["uid"]))
{
    echo "<script>window.location.replace('index.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/user_login.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <style>
#sign:hover
{
    background-color: rgb(231, 138, 203);
    color:white !important;
}
.mysignin
{
    color:white !important;
}
.mylogin-card .card-body .i-box:focus
{
    box-shadow:none !important;
}
  </style>
</head>
<body class="user-login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5">
                <div class="card mylogin-card">
                    <div class="card-body">
                        <div>
                        <h4 class="text-center font-weight-bold mt-3 mb-4 l-title">FOOD RECEIPE SYSTEM</h4>
                        <hr class="hari">
                        <h5 class="text-center font-weight-bold">Sign In Now</h5>
                        <p id="success-message" class="text-center text-danger font-weight-bold"></p>
                        <form action="" id="alogform" method="post" autocomplete="off">
                            <div class="form-group">
                              
                                <input type="text" class="form-control i-box" name="email" placeholder="Email" id="email">
                                <span class="text-danger va_email"></span>
                            </div>
                            <div class="form-group">
                               
                                <input type="password" class="form-control i-box" name="password" placeholder="Password" id="password">
                                <span class="text-danger va_password"></span>
                                <p>
                                    <a href="forgot_password.php" class="text-decoration-none text-white">Forgot password?</a>
                                </p>
                            </div>
                            <center>
                                 <button type="submit" id="login" class="btn mysignin mt-3 px-4 py-2">SIGN IN</button>
                                 <br>
                                 <p class="mt-3">
                                    <a href="../index.php" class="text-decoration-none text-white"><i class="fa-solid fa-house"></i> Home Page</a>
                                 </p>
                            </center>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $("#alogform").submit(function(e){
            e.preventDefault();
            const email=$("#email").val();
            const password=$("#password").val();
            var valid=true;

            //email start
            var emailpattern=/^[A-Za-z0-9.-_]+@[A-Za-z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if(email.length==0)
            {
                $(".va_email").text("Please fill email field");
                var valid=false;
            }
            else if(!emailpattern.test(email))
            {
                $(".va_email").text("Please enter a valid email");
                var valid=false;
            }
            else
            {
                $(".va_email").text("");
            }
            //email end

            //password start
            if(password.length==0)
            {
                $(".va_password").text("Please fill password field");
                var valid=false;
            }
            else
            {
                $(".va_password").text("");
            }
            //password end


            if(valid)
            {
                
                $.post("../verify.php",{
                    email:email,
                    password:password,
                    alogin:"reg"
                },function(data,status){
                    if(status=="success")
                    {
                         $("#success-message").html(data);
                         
                    }
                    else
                    {
                        $("#success-message").text(data);
                    }
                    
                });
                $("#alogform")[0].reset();
               
            }
            
           

        });
    });
</script>
</body>
</html>