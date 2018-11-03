

<?php

include('inc/temp/header.php');
include('inc/temp/navbar.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_loginadmin();



if(isset($_GET["places"]))
{
if($_SESSION['type']==1)
{
$id_cate=mysqli_real_escape_string($conn,$_GET["places"]);
$id1=(int)$id_cate;
$sql="DELETE FROM `places` WHERE id={$id1} LIMIT 1";
$result=mysqli_query($conn,$sql);
if ( $result && mysqli_affected_rows($conn)>0) {
   
   
    $_SESSION['msg']=secusse_msg_delete();
    redicrt("places.php");

}else{

    $_SESSION['msg']= error_msg_delete();
    redicrt("places.php");
}
}
}



?>


<div class="main">
  <div class="title">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="add_places.php"> <i class="fa fa-plus-square-o" style="font-size:34px;"> add places  </i></a></li>
   
   <li class="breadcrumb-item active" aria-current="page">places</li>
    </ol>

  <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
</nav>
</div> 


<div class="content"> 
<div class="container">

            <div class="row">
            <?php 

                         $query="SELECT   img ,id,`detials`,`address` FROM `places`";
                        $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_assoc($result)){ 
                          echo"
   
                    
                          <div class='col-sm-6 col-lg-4'>
                          <div class='card' style='width: 18rem;'>
                           <img class='card-img-top'  src='images/".mysqli_real_escape_string($conn,$row['img'])."' height='200' width='200' class='img-thumnail' alt='Card image cap'>
                           <div class='card-body'>
                           <P>
                            " .mysqli_real_escape_string($conn,$row['address'])."
                            </p>
                            
                            <a  class='btn btn-danger' role='button' href='places.php?places=".mysqli_real_escape_string($conn, $row["id"] )."'>
                            Delete</a>
                            </div>
                      
                            </div>
                          
                         
              
                           </div> ";
                          }
                          ?>

                  <div>
                  <div>
                  <div>

<?php
include('inc/temp/footer.php');
?>












