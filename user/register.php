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
    <title>Register panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="../assets/css/user_login.css">
  <style>
#sign:hover
{
    background-color: rgb(231, 138, 203);
    color:white;
}
.mylogin-card .card-body .i-box:focus
{
    box-shadow:none !important;
}
.user-login
{
    background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);
    height:100vh;
    width:100%;
    background-attachment: fixed;
}
  </style>
</head>
<body class="user-login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 mb-5 mt-5">
                <div class="card mylogin-card">
                    <div class="card-body">
                        <div>
                        <h4 class="text-center font-weight-bold mt-3 mb-4 l-title">FOOD RECEIPE SYSTEM</h4>
                        <hr class="hari">
                        <h5 class="text-center font-weight-bold">Register Now</h5>
                        <p id="success-message" class="text-center text-danger font-weight-bold"></p>
                        <form id="regform" method="post" autocomplete="off">
                            <div class="form-group">
                              
                                <input type="text" class="form-control i-box" name="name" placeholder="NAME" id="name">
                                <span class="text-danger va_name"></span>
                            </div>
                            <div class="form-group">
                              
                              <input type="email" class="form-control i-box" name="email" placeholder="E-MAIL" id="email">
                              <span class="text-danger va_email"></span>
                            </div>
                            <div class="form-group">
                              
                              <input type="text" class="form-control i-box" onkeypress="return num_check(event)" name="phone" placeholder="PHONE" pattern="[0-9]+" title="Please enter only numbers" id="phone" maxlength="10">
                              <span class="text-danger va_phone"></span>
                            </div>
                            <script>
                                function num_check(event)
                                {
                                    var d=event.keyCode;
                                    if(d<48 || d>57)
                                    {
                                        return false;
                                    }
                                    
                                }
                            </script>
                            <div class="form-group">
                               
                                <input type="password" class="form-control i-box" name="password" placeholder="PASSWORD" id="password">
                                <span class="text-danger va_password"></span>
                            </div>
                            <div class="form-group">
                               
                                <input type="password" class="form-control i-box" name="confirm_password" placeholder="REPEAT PASSWORD" id="confirm_password">
                                <span class="text-danger va_confirm_password"></span>
                                <p class="text-white mt-2"><input type="checkbox" name="check" id="check"> I agree to the terms of service and privacy policy<br>
                                <span class="text-danger va_check"></span></p>
                            </div>
                            <center>
                                 <button type="submit" id="sign" class="btn mysignin mt-3 px-4 py-2">SUBMIT</button>
                                 <br>
                                 <p class="mt-2">
                                    <b class="text-white">Already registered ?</b>
                                    <a href="login.php" class="text-decoration-none text-white">Login</a>
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
        $("#regform").submit(function(e){
            e.preventDefault();
            const name=$("#name").val();
            const email=$("#email").val();
            const phone=$("#phone").val();
            const password=$("#password").val();
            const confirm_password=$("#confirm_password").val();
            const check=$("#check").val();
            var valid=true;

            //name start
            var namepattern=/^[A-Za-z][A-Za-z0-9_]*$/;
            if(name.length==0)
            {
                $(".va_name").text("Please fill name field");
                var valid=false;
            }
            else if(name.length<5)
            {
                $(".va_name").text("Name must contain atleast 5 character");
                var valid=false;
            }
            else if(!namepattern.test(name))
            {
                $(".va_name").text("field name not valid field name contains alphabets,numeric and underscore only");
                var valid=false;
            }
            else
            {
                $(".va_name").text("");
            }
            //name end

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

            //phone start
            var phonepattern=/^[6-9]\d{9}$/;
            if(phone.length==0)
            {
                $(".va_phone").text("Please fill phone field");
                var valid=false;
            }
            else if(!phonepattern.test(phone))
            {
                $(".va_phone").text("please enter a valid mobile number");
                var valid=false;
            }
            else
            {
                $(".va_phone").text("");
            }
            //phone end
            
            //password start
            if(password.length==0)
            {
                $(".va_password").text("Please fill password field");
                var valid=false;
            }
            else if(password.length<6)
            {
                $(".va_password").text("password field atleast 6 characters");
                var valid=false;
            }
            else
            {
                $(".va_password").text("");
            }
            //password end

            
            //confirm password start
            if(confirm_password.length==0)
            {
                $(".va_confirm_password").text("Please fill confirm password field");
                var valid=false;
            }
            else if(password!=confirm_password)
            {
                $(".va_confirm_password").text("password and confirm password not match");
                var valid=false;
            }
            else
            {
                $(".va_confirm_password").text("");
            }
            //confirm password end

            //check start
            if($("#check").is(":checked"))
            {
                $(".va_check").text("");
            }
            else
            {
                $(".va_check").text("Please check terms and conditions");
                var valid=false;
            }
            //check end


            if(valid)
            {
                
                $.post("../verify.php",{
                    name:name,
                    email:email,
                    phone:phone,
                    password:password,
                    register:"reg"
                },function(data,status){
                    if(status=="success")
                    {
                         $("#success-message").text(data);
                    }
                    else
                    {
                        $("#success-message").text(data);
                    }
                    
                });
                $("#regform")[0].reset();
               
            }
            
           

        });
    });
</script>
</body>
</html>