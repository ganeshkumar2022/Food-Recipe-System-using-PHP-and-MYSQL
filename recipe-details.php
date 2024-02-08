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
.muunoder li
{
    margin-top:20px;
    font-weight:bold;
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
            <h3>Recipe</h3>
        </div>
        <div class="mt-5 text-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- recipe details start -->
                        <?php
                        include("db.php");
                        $sql3="select * from recipe inner join ingredient on recipe.rid=ingredient.recipe_id where recipe.rid=".$_GET["id"];
                        $result3=mysqli_query($con,$sql3);
                        $row3=mysqli_fetch_assoc($result3);
                        ?>
                        <center>
                        <img src="user/<?=$row3['pictures']?>" class="img-fluid" style="height:300px;">
                        </center>
                        <div class="row" style="margin-top:100px;">
                            <div class="col-md-8">
                                <p><?=$row3["created_at"]?></p>
                                <h3 class="mt-n3"><?=$row3["recipe_title"]?></h3>

                                <div class="py-2 px-4 my-4" style="border-left:4px solid rgb(0,128,0);">
                                    <p><b>
                                        Prep : <?=$row3["prepare_time"]?> mins<br>
                                        Cook : <?=$row3["cook_time"]?> mins<br>
                                        Yields : <?=$row3["yields"]?> servings
                                    </b></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <button type="submit" name="get_in_touch" class="py-2 px-4 mx-auto d-block btn-success text-white myactive float-right" style="border-left:5px solid green;">Beginners</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                
                            <p class="text-justify">
                                    <?=$row3["description"]?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3>Ingredients</h3>
                                <ul class="list-unstyled muunoder">
                                    <?php
                                    $sql4="select * from ingredient where recipe_id=".$_GET["id"];
                                    $result4=mysqli_query($con,$sql4);
                                    if(mysqli_num_rows($result4)>0)
                                    {
                                        while($row4=mysqli_fetch_assoc($result4))
                                        {
                                            ?>
                                            <li><input type="checkbox"> <?=$row4["ingredient_name"]?></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- recipe details end -->
                    </div>
                    <div class="col-md-12">
                        <h3 class=" mt-5">Leave a Comment</h3>
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
                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                        <span class="text-danger va_message"></span>
                        </div>
                        <input type="hidden" name="recipe_id" value="<?=$_GET['id']?>" id="recipe_id">
                        <button type="submit" name="get_in_touch" class="py-2 px-4  btn-success text-white myactive" style="border-left:5px solid green;">Post Comments</button>
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
            const message=$("#message").val();
            const recipe_id=$("#recipe_id").val();
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
                    message:message,
                    recipe_id:recipe_id,
                    add_comments:"hello"
                },function(data,status){
                    if(status=="success")
                    {
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
                        title: "Comments Sended successfully"
                        });
                    }
                    else
                    {
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
                        icon: "error",
                        title: "Error to add comments"
                        });
                    }
                    
                });
               
            }
            
           

        });
    });
</script>
<script>
  $(document).ready(function(){
    $(".recipe").addClass("myactive btn-success text-white");
  });
</script>
</body>
</html>