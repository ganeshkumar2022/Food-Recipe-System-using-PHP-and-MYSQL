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
<div style="width:80%;float:left;height:100vh;overflow:hidden;background-color:lightblue;" >
<!-- header content start -->
<header class="text-white bg-primary">
    <h4 class="py-4 ml-3">
    <i class="fa-solid fa-bowl-food"></i>&nbsp;&nbsp;Edit Recipe
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

<!-- main content start -->
<div class="container-fluid"  style="height:90vh;overflow:scroll;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- change profile start -->
                    <div class="card">
                        <div class="card-header bg-success text-white text-center">Edit Recipe details</div>
                        <div class="card-body">
<?php
include("../db.php");
$id=$_GET["id"];
$sql="select * from recipe where rid=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);


$sql2="select * from ingredient where recipe_id=$id";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
    $a=[];
    while($row2=mysqli_fetch_assoc($result2))
    {
        array_push($a,$row2["ingredient_name"]);
    }
    $a=implode(",",$a);
}
?>
                            <form method="post" autocomplete="off" action="verify_u.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3"><p class="font-weight-bold text-right mt-1">Recipe title</p></div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="recipe_title" id="recipe_title" value='<?=$row["recipe_title"]?>' required>
                                    <input type="hidden" class="form-control" value="<?=$_SESSION['uid']?>" name="user_id" id="user_id" required>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-12">
                                <input type="hidden" class="form-control" name="rid" id="rid" value='<?=$row["rid"]?>' required>
                                </div>
                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Recipe preparation time (in minutes)</p></div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="prepare_time" id="prepare_time" value='<?=$row["prepare_time"]?>' required>
                                </div>
                                <div class="col-md-3"></div>
                                
                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Recipe cook time (in minutes)</p></div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="cook_time" value='<?=$row["cook_time"]?>' id="cook_time" required>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Yields (Eg.8 servings)</p></div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="yields" id="yields" value='<?=$row["yields"]?>' required>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Recipe ingredients</p></div>
                                <div class="col-md-6 mb-2">
                                    <textarea class="form-control" name="ingredients" id="ingredients" rows="6" required><?=$a?></textarea>
                                </div>
                                <div class="col-md-3"><!--<button class="btn btn-success add-more" type="button">Add more</button>--></div>
                                <div class="col-md-12 myreci"></div>
                                <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Description</p></div>
                                <div class="col-md-6">
                                    <textarea name="description" rows="5" class="form-control" required><?=$row["description"]?></textarea>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3 mt-2"><p class="text-right font-weight-bold mt-1">Choose picture</p></div>
                                <div class="col-md-6 mt-2">
                                    <img src="<?=$row['pictures']?>" style="height:250px;">
                                    <input type="file" name="myimage" class="mt-2 form-control">
                                </div>
                                <div class="col-md-3"></div>
                                
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <center>
                                        <input type="submit" name="update_recipe" class="btn btn-primary mt-2" value="Update">
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
<script>
    $(document).ready(function(){
        $(".add-more").click(function(){
            var text=`
            <div class="col-md-12 jolly">
            <div class="row">
            <div class="col-md-3"><p class="text-right font-weight-bold mt-1">Recipe ingredients</p></div>
            <div class="col-md-6">
            <input type="text" class="form-control" name="ingredients[]" required>
            </div>
            <div class="col-md-3"><a class="btn myvaaa btn-danger" onclick="dum(this)">&times;</a></div>
            </div></div>`;
            $(".myreci").after(text);
        });
    });
    function dum(a)
    {
        $(a).parent().parent().remove();
    }
</script>
</body>
</html>