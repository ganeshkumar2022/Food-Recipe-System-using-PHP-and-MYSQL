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
.mycardee
{
    cursor:pointer;
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

    <!-- recipe main start -->
    <h3 class="text-center text-dark">The Best Recipes</h3>
    <div class="container my-5">
    <div class="row">
        
        <?php
        include("db.php");
        $sql="select * from recipe limit 5";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                <div class="col-md-4">
                    <div class="card mycardee" style="border:none !important;" onclick="myfun2(<?=$row['rid']?>)">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                   <img src="user/<?=$row["pictures"]?>" style="height:50px;width:100%;">
                                </div>
                                <div class="col-md-9">
                                   <span class="text-success"><?=$row['created_at']?><br></span>
                                   <span class="text-uppercase"><b><?=$row['recipe_title']?></b></span>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                   
                </div>
                <?php
            }
        }
        ?>
    </div>
    </div>
    <!-- recipe main end -->

    <!-- footer content start -->
    <?php
    include("footer.php");
    ?>
    <!-- footer content end -->
<script>
    function myfun2(a)
    {
        window.location.replace("recipe-details.php?id="+a);
    }
</script>
<script>
  $(document).ready(function(){
    $(".recipe").addClass("myactive btn-success text-white");
  });
</script>
</body>
</html>