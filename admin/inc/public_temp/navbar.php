<?php


include('admin/inc/session/session.php');
include('admin/inc/function/function.php');
include_once('admin/database/connected_db.php');

?>


<!--nav start -->
<?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <?php
  
  if(isset($_SESSION['user_name']))
  {
    $type=$_SESSION['type'];
    if($type==1){
    
      echo'<a class="nav-link" href="admin/logout.php">تسجيل الخروج</a>';
    

     
      echo'<a class="nav-link" href="admin/catergoires.php"> <i class="fa fa-cog" style="font-size:20px">' .$_SESSION['user_name'].'</i></a>';
     
    

    }else
    {
      
        echo'<a class="nav-link" href="admin/logout.php">تسجيل الخروج</a>';
       
        echo  $_SESSION['user_name'];
    }
  }else
  {
 
    echo'<a class="nav-link" href="admin/login.php">  تسجيل الدخول</a>';
    echo'<a class="nav-link" href="admin/register.php">التسجيل</a>';
   

  }

  ?>
  </ul>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="#"> الاماكن المفضله </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/add_places.php">اضافة مكان </a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          الدليل
         
        </a>
        <?php 

             

        $query="SELECT `id`, `name` FROM `catergoires` WHERE 1";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){ 
          echo'
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="places.php?cate='.mysqli_real_escape_string($conn, $row["id"] ).'">
          
          
          
          
         '.$row['name'].'</a>
          

          ';}?>
      </li>
  
      <li class="nav-item">
        <a class="nav-link disabled" href="#">الصفحه الرئيسيه</a>
      </li>
    </ul>
   
  </div>
</nav>
<!-- end nav bar -->
<!--start slider -->
<div class="slider">
<div id="main-slider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#main-slider" data-slide-to="0" class="active"></li>
    <li data-target="#main-slider" data-slide-to="1"></li>
    <li data-target="#main-slider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item  carousel-one  active ">
    <img class="d-block w-100" src="admin/images/img/img1.jpg" alt="First slide">
    </div>
    <div class="carousel-item  carousel-two">
    <img class="d-block w-100" src="admin/images/img/img2.jpg" alt="First slide">
    
    </div>
    <div class="carousel-item  carousel-three">
    <img class="d-block w-100" src="admin/images/img/img3.jpg" alt="First slide">
    
    </div>
  </div>

 </div>
</div>
<!--end slider -->

