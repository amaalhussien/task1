
<?php

include('inc/temp/header.php');
include('inc/temp/navbar.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_loginadmin();


 //add catergoires to database
if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    $opt=(int)$_POST["optradio"];
    $address=mysqli_real_escape_string($conn,check_empty(check_input($_POST["guide"])));
   

    // image file directory
    $target ="images/".basename($image);

    $sql = "INSERT INTO  `catergoires`(`name`,`img`,`visible`) VALUES ('$address','$image','$opt')";  
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        redicrt('add_catergoires.php.php');
    } 
    // uplode img for file
    mysqli_query($conn, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
       
    }else{
        
    }
    if(mysqli_affected_rows($conn)>0) {
      
        $_SESSION['msg']=secusse_msg_add_gat();
          redicrt("catergoires.php");
       }else{
           $_SESSION['msg']=error_msg_add_cat();
           redicrt("catergoires.php");
           
       }


}


?>
<div class="main">
  <div class="title">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="catergoires.php"> 
   <i class="fa fa-toggle-left" style="font-size:30px">
   catergoires
  
   </i></a></li>

   <li class="breadcrumb-item active" aria-current="page">catergoires</li>
    </ol>
    
  
</nav>
</div>
<div class="container">
                <div class="row">
                    <div class="col-2">
                      </div>
                         <div class="col-10">
                        <div class="card"  style="width: 28rem;">
                           
                            <div class="card-body">
                          

                              <form method="POST" action="add_catergoires.php" enctype="multipart/form-data">
                              <div class="form-group">
                             <label for="text">تصنيف</label>
                                 <div class="input-group">
                                    <span class="input-group-addon"></span>
                             <input id="text" type="text"  class="form-control" name="guide" placeholder="مثلآ: مطاعم "  required>
                                </div>
                             </div>
 
                             <div class="form-check form-check-inline">
  
                               <label for="text"> visible :  &nbsp;  &nbsp; &nbsp; 
                                <input type="radio" class="form-check-input" name="optradio" value='1' required> yes  &nbsp;  &nbsp;&nbsp;
                                 <input type="radio" class="form-check-input" name="optradio" value='0' required> no
                                </label> 
                            </div>
                          
                          
                            <div class="form-group">
                             <label for="text">add  img</label>
                             <div class="input-img">
                           
                              <input type="hidden" name="size" value="1000000" >
                         	<div>
                            <input type="file" name="image" required>
                           </label>
                          </div>
                           </div>
                           </div>

                     	<div>
                         
  	                  	<button class="btn  btn-block "   type="submit" name="upload" >upload</button>
                        </div> 
                       
                             
                            </div>

                        </div>

                    </div>



<?php
include('inc/temp/footer.php');
?>