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
    <i class="fa-solid fa-comment"></i>&nbsp;&nbsp;All Comments
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
                        <div class="card-header bg-success text-white text-center">All Comments</div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Food name</th>
                                    <th>Status</th>
                                    <!--<th>Action</th>-->
                                </tr>
<?php
include("../db.php");
$sql="select * from comments inner join recipe on comments.recipe_id=recipe.rid where recipe.user_id=".$_SESSION["uid"];
$result=mysqli_query($con,$sql);
$i=1;
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["message"]?></td>
            <td><?=$row["recipe_title"]?></td>
            <td>
                <?php
                if($row["status"]=="Approved")
                {
                    ?>
                    <span class="badge badge-success"><?=$row["status"]?></span></td>
                    <?php
                }
                elseif($row["status"]=="Rejected")
                {
                    ?>
                    <span class="badge badge-danger"><?=$row["status"]?></span></td>
                    <?php
                }
                elseif($row["status"]=="Waiting for Approval")
                {
                    ?>
                    <span class="badge badge-primary"><?=$row["status"]?></span></td>
                    <?php
                }
                ?>
            <!--<td>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?=$row['cid']?>">
                    <select class="form-control form-control-sm" name="status">
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                    <input type="submit" class="btn btn-success btn-sm" name="update" value="update">
                </form>
            </td>-->
        </tr>
        <?php
        $i++;
    }
}
?>
                            </table>
<?php
if(isset($_POST["update"]))
{
    $cid=$_POST["id"];
    $status=$_POST["status"];
    include("../db.php");
    $sql="update comments set status='$status' where cid=$cid";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('comments updated successfully');window.location.replace(window.location.href);</script>";
    }
    else
    {
        echo "<script>alert('Error to update comments');window.location.replace(window.location.href);</script>";
    }
}
?>
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