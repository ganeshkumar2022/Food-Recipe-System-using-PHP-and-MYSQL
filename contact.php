<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food receipe management system</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/style.css">
<style>
    
.contact-form input,textarea
{
font-style:italic;
background-color:lightgray !important;
border-radius:0px;
padding:20px;
}
.contact-form input:focus,textarea:focus
{
    box-shadow:none !important;
    border-color:transparent !important;
}
.scroll-bar-up .scroll-up
{
    display:inline-block;
    padding:10px 12px;
    color:white !important;
    background-color: green !important;
    position:fixed;
    z-index:5;
    right:10px;
    bottom:10px;
    scroll-behavior: smooth;
}
</style>
</head>
<body id="hhh">
<div class="scroll-bar-up">
    <a class="scroll-up" href="#hhh"><i class="fa-solid fa-angle-up"></i></a>
  </div>
    <!-- header start -->
    <?php
    include("header.php");
    ?>
    <!-- header end -->

    <!-- about content start -->
    <div id="about">
        <div class="container-fluid top-about">
            <h3>Contact us</h3>
        </div>
        <div class="mt-5 text-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-success font-weight-bold"><u>Contact Us</u></p>
                        <p class="font-weight-bold text-secondary small">Food Receipe management system</p>
                        <p>
                            <b>Contact number : </b> +91 9878961222<br>
                            <b>Email address : </b> foodreceipe@gmail.com<br>
                            <b>Address : </b> Anna nagar, Chenna.<br>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-center mt-5">Get in Touch</h3>
                        <form action="verify.php" id="contact_form" method="post" class="contact-form" autocomplete="off">
                        <div class="form-row mt-5">
                            <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            <span class="text-danger va_name"></span>
                            </div>
                            <div class="col">
                            <input type="text" class="form-control" placeholder="E-mail" name="email" id="email">
                            <span class="text-danger va_email"></span>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject">
                            <span class="text-danger va_subject"></span>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                        <span class="text-danger va_message"></span>
                        </div>
                        <button type="submit" name="get_in_touch" class="py-2 px-4 mx-auto d-block btn-success text-white myactive" style="border-left:5px solid green;">Send</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- about content end -->

    <!-- footer content start -->
    <?php
    include("footer.php");
    ?>
    <!-- footer content end -->

<script>
    $(document).ready(function(){
        $("#contact_form").submit(function(e){
            e.preventDefault();
            const name=$("#name").val();
            const email=$("#email").val();
            const subject=$("#subject").val();
            const message=$("#message").val();
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

            //subject start
            var subjectpattern=/^[A-Za-z0-9\s]+$/;
            if(subject.length==0)
            {
                $(".va_subject").text("Please fill subject field");
                var valid=false;
            }
            else if(!subjectpattern.test(subject))
            {
                $(".va_subject").text("subject field contains alphabets,numeric and space");
                var valid=false;
            }
            else
            {
                $(".va_subject").text("");
            }
            //subject end

            //message start
            var messagepattern=/^[A-Za-z0-9\s\.\/,#-]+$/;
            if(message.length==0)
            {
                $(".va_message").text("Please fill message field");
                var valid=false;
            }
            else if(!messagepattern.test(message))
            {
                $(".va_message").text("Please enter a correct format for message field");
                var valid=false;
            }
            else
            {
                $(".va_message").text("");
            }
            //message end

            if(valid)
            {
                $("#contact_form")[0].reset();
                $.post("verify.php",{
                    name:name,
                    email:email,
                    subject:subject,
                    message:message,
                    get_in_touch:"hello"
                },function(data,status){
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "success",
                    title: "Contact form submitted successfully"
                    });
                });
               
            }
            
           

        });
    });
</script>

<script>
  $(document).ready(function(){
    $(".contact").addClass("myactive btn-success text-white");
  });
</script>
</body>
</html>