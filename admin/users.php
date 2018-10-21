<?php

include('inc/temp/header.php');
include('inc/temp/navbar.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_login();

?>
<div class="main">
  <div class="title">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="add_users_or_admin.php"> <i class="fa fa-plus-square-o" style="font-size:34px;"> add users  </i></a></li>
   
   <li class="breadcrumb-item active" aria-current="page">users</li>
    </ol>

  <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
</nav>
</div> 

                  <div class="container">
                  <table class="table table-hover">
                       <thead>
                         <tr>
                           <th scope="col">User_name</th>
                             <th scope="col">Email</th>
                             <th scope="col">Delete</th>
                           

                        <?php
                        $query="SELECT `id`, `user_name`, `email` FROM `users_or_admin` WHERE `type`=0";
                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0)
                        {
                          while($row=mysqli_fetch_assoc($result)){
                         ?>
                            
                                <tbody>
                                 <tr>
                                 <?php  
                                 echo "<td>".mysqli_real_escape_string($conn,$row['user_name'])."</td>";
                                  echo"<td>".mysqli_real_escape_string($conn,$row['email'])."</td>";
                                 echo"<td> <a  class='btn btn-danger' role='button' href='delete_user.php?user=".mysqli_real_escape_string($conn, $row["id"] )."'>Delete</a></td>";
                                  

                                 
                               echo"</tr>";

                                ?>




                                        <?php
          }}?>
                                </tbody>
                            </table>
                            <!--end tabel -->

                    </div>



<?php
include('inc/temp/footer.php');
?>

    
