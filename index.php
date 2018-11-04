<?php

include_once('admin/inc/public_temp/header.php');
include_once('admin/inc/public_temp/navbar.php');
include_once('admin/database/connected_db.php');

?>

<!-- over viwe -->
<div class="overviwe">
          <div class="container text-center">
          <p> استكشف محافظة واسط</p>
          </div>
           </div>
<!--end over viwe -->


<!-- Start popular-destination Area -->
<div class="content"> 
        <div class="container">
 
                    <div class="row">
                              
                    <?php 

                         $query="SELECT `id`, `name`, `img` FROM `catergoires` WHERE 1";
                        $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_assoc($result)){ 
                         echo"
   
                        <div class='col-sm-6 col-lg-4'>
                         <div class='card' style='width: 18rem ;align:center '>
                          <img class='card-img-top'  src='admin/images/".$row['img']."' height='200' width='200' class='img-thumnail' alt='Card image cap'>
                          <div class='card-body'>
                          <a  class='btn btn btn-block  btn-danger ' role='button' href='places.php?cate=".mysqli_real_escape_string($conn, $row["id"] )."'>"
                          
                          
                          .mysqli_real_escape_string($conn,$row['name'])."</a>
                         </div>
        
                          </div>
                           <hr>
                              </div>
                    
                    "          ;}?>
                    </div>
                </div>
                </div>


<?php
include_once('admin/inc/public_temp/footer.php');
?>


 



 