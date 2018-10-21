<?php
include('inc/session/session.php');
?>



<div class="sidenav">
  <a href="places.php">places</a>

  <a href="catergoires.php">catergoris</a>
  <a href="users.php">users</a>
  <a href="admin.php">admin</a>
</div>

<div class="main">
  <nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="navbar-nav ml-auto">
     
  
        <?php 
           if(isset($_SESSION['user_name']))
            {



              echo '

              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-address-card"    style="font-size:30px;color:white; padding:1px;margin:2px;"> 
              
              </i> ';
             
               echo $_SESSION['user_name'] ;
               echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="edit_info.php">edit info '.$_SESSION['user_name'].'</a>
               <a class="dropdown-item" href="admin.php">admin manage</a>

               <a class="dropdown-item" href="add_users_or_admin.php">Add users</a>
               <a class="dropdown-item" href="../index.php">home page</a>
               <a class="dropdown-item" href="logout.php">logout</a>
               
              
               </a>
               </li>
          
               </ul>
         ';
              }

 ?> 

       
       
    
  </div>
</nav>
  
