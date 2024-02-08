<ul class="nav flex-column bg-dark mynavbar">
  <li class="nav-item mybrand2 py-3">
    <a class="nav-link mybrand font-weight-bold" href="#">FOOD RECIPE</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;Dashboard</a>
  </li>
  <li class="nav-item jkhj" style="cursor:pointer;">
    <a class="nav-link"><i class="fa-regular fa-rectangle-list"></i>&nbsp;&nbsp;List your Recipe</a>
  </li>
  <div style="display:none;" class="myrecipe">
  <li class="nav-item">
    <a class="nav-link" href="add_recipe.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Recipe</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage_recipe.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Recipe</a>
  </li>
  </div>
  <li class="nav-item">
    <a class="nav-link" href="#"><i class="fa-solid fa-comment"></i>&nbsp;&nbsp;Comments</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="search.php"><i class="fa-solid fa-search"></i>&nbsp;&nbsp;Search</a>
  </li>
</ul>
<script>
  $(document).ready(function(){
   $(".jkhj").click(function(){
    $(".myrecipe").toggle("fast");
   });
  });
</script>
