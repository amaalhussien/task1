<?php

include('inc/temp/header.php');
include('inc/temp/navbar.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_loginadmin();

?>
<?php
//delete admin 
if(isset($_GET["admin"]))
{
  $type=$_SESSION["type"];
  if($type==1){
  $id_cate=mysqli_real_escape_string($conn,$_GET["admin"]);
  $id1=(int)$id_cate;
  $query1="DELETE FROM `users_or_admin` WHERE  id=$id1 and `type`=1  LIMIT   1 ";
  $result1=mysqli_query($conn,$query1);
  if(mysqli_num_rows($result1)>0){

        $_SESSION['msg']=error_msg_delete_caterg();
        redicrt('admin.php');
    }else{
           $_SESSION['msg']=secusse_msg_delete();
            redicrt("admin.php");

 }   
 } else{
  $_SESSION['msg']=secusse_msg_delete();
   redicrt("admin.php");
 }
 }
?>



<div class="main">
  <div class="title">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="add_users_or_admin.php"> <i class="fa fa-plus-square-o" style="font-size:34px;"> add admin  </i></a></li>
   
   <li class="breadcrumb-item active" aria-current="page">admin</li>
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
                        $query="SELECT `id`, `user_name`, `email` FROM `users_or_admin` WHERE `type`=1";
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
                               echo"<td> <a  class='btn btn-danger' role='button' href='admin.php?user=".mysqli_real_escape_string($conn, $row["id"] )."'>Delete</a></td>";
                                  

                                 
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

    
