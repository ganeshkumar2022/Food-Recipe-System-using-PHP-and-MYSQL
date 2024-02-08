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
  <link rel="stylesheet" href="https://unpkg.com/@icon/icofont/icofont.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/style.css">
<style>
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
            <h3>About us</h3>
        </div>
        <div class="mt-5 text-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">About Us</h4>

                        <h3 class="mt-4 text-center font-weight-bold">Welcome to Food receipe System</h3>
                        <p class="font-weight-bold mypara mb-4 mt-4 text-justify">
A food recipe system is a digital platform or application designed to organize, manage, and share recipes. It provides users with the ability to discover, create, and explore a wide variety of recipes, often including details such as ingredients, preparation steps, cooking instructions, and images. These systems can cater to a diverse range of users, from home cooks looking for new ideas to professional chefs seeking inspiration.
                        </p>
                        <p class="font-weight-bold mypara text-justify">The specific features and functionalities can vary depending on the intended audience and purpose of the food recipe system. Some platforms focus on simplicity and user-generated content, while others may incorporate advanced features for professional chefs or nutrition enthusiasts. The development of such a system typically involves a combination of web development technologies, databases, and possibly integration with external APIs for features like real-time ingredient pricing or online shopping.</p>
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
    $(".about").addClass("myactive btn-success text-white");
  });
</script>
</body>
</html>