<?php

include_once('admin/inc/public_temp/header.php');
include_once('admin/inc/public_temp/navbar.php');
include_once('admin/database/connected_db.php');


$id_cate=mysqli_real_escape_string($conn,$_GET["cate"]);
$id1=(int)$id_cate;
?>

<div class="overviwe">
          <div class="container text-center">
          <p> استكشف محافظة واسط</p>
          </div>
           </div>



           <!-- Start popular-destination Area -->
<div class="content_place"> 
        <div class="container">
 
        
                              
                    <?php 

                         $query="SELECT `id`,`detials`, `address`, `location`, `img` FROM `places` WHERE `id_catergo`=$id1";
                        $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_assoc($result)){ 
                         echo"
   
                         <div class='posts-wrapper'>
                        
                          <img class='card-img-top'  src='admin/images/".mysqli_real_escape_string($conn,$row['img'])."' height='200' width='200' class='img-thumnail' alt='Card image cap'>
                          <div class='card-body'>
                         <p>
                         ".mysqli_real_escape_string($conn,$row['address'])."
                         </p>
                         <p>
                         ".mysqli_real_escape_string($conn,$row['detials'])."
                         &nbsp;
                         
                          </div>
                          <div class='card-footer'>
                        
                          <a href=".mysqli_real_escape_string($conn,$row['location'])."> 
                          <i class='fa fa-map-marker' style='font-size:20px;'>  ".mysqli_real_escape_string($conn,$row['address'])."</i>
                          </a>

                        
                      </div>
        
                          </div>
                           <hr>
                              </div>
                          
                          </div>
                        
                    
                         ";
                         } 
                         ?>

                        
                         
                            
      	 
      		            

	    
     
       























 
                    </div>
                </div>
                </div>
               <?php include_once('admin/inc/public_temp/footer.php');
           
           ?>

          