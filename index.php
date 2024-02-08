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

    <!-- carousel start -->
    <div class="slide-show mt-n5">
    <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/c2.jpg" alt="Los Angeles" style="width:100vw;height:400px;">
    </div>
    <div class="carousel-item">
      <img src="assets/images/c3.jpg" alt="Chicago" style="width:100vw;height:400px;">
    </div>
    <div class="carousel-item">
      <img src="assets/images/c1.jpg" alt="New York" style="width:100vw;height:400px;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</div>
    <!-- carousel end -->

    <!-- footer content start -->
    <?php
    include("footer.php");
    ?>
    <!-- footer content end -->

<script>
  $(document).ready(function(){
    $(".home").addClass("myactive btn-success text-white");
  });
</script>
</body>
</html>