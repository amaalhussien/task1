<?php

include('inc/temp/header.php');

include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_login();

if (isset($_POST['upload'])) {
    //get id_catergo
    $cater=$_POST['catergo'];
    $sql="SELECT  id FROM `catergoires` WHERE `name`='{$cater}' LIMIT 1";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $id=$row['id'];
 // Get image name
 $image = $_FILES['image']['name'];

   $opt=(int)$_POST["optradio"];
   $address=mysqli_real_escape_string($conn,check_empty(check_input($_POST["guide"])));
 $detials=mysqli_real_escape_string($conn,check_empty(check_input($_POST["detials"])));
 $location=mysqli_real_escape_string($conn,check_empty(check_input($_POST["location"])));


 // image file directory
 $target ="images/".basename($image);

 $sql = "INSERT INTO  `places`(`id_catergo`,`detials`,`address`,`img`,`location`,`status`)
  VALUES ($id,'$detials','$address','$image','$location',$opt)";
  
 if(!empty($errors)){
     $_SESSION['errors']=$errors;
     redicrt('add_places.php');
 } 
 // uplode img to file 
 mysqli_query($conn, $sql);
 if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    
 }else{
     
 }
 if(mysqli_affected_rows($conn)>0) {
   
     $_SESSION['msg']=secusse_msg_add_paces();
       redicrt("../index.php");
    }else{
        $_SESSION['msg']=error_msg_add();
        redicrt("places.php");
        
    }


}

?>
                            



    <div class="header">
        <h2>اضافة مكان</h2>
        <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
        </div>     
        <div class="form_register">
                     

                            <form method="POST" action="add_places.php" enctype="multipart/form-data">
                              <div class="form-group">
                             <label for="text">اسم المكان</label>
                                 <div class="input-group">
                                    <span class="input-group-addon"></span>
                             <input id="text" type="text"  class="form-control" name="guide" placeholder="اسم المكان" required>
                                </div>
                             </div>
                             <div class="form-group">
                             <label for="comment">وصف عن المكان</label>
                             <textarea class="form-control" rows="5" id="comment" name="detials" required></textarea>
                             </div>
 
                             <div class="form-group">
                              <label for="sel1">اختر التصنيف</label>
                                <select class="form-control" id="sel1" name="catergo"  required >
                                
                                 <?php
                                 $query="SELECT name FROM `catergoires`";
                                 $result=mysqli_query($conn,$query);
                                 if(mysqli_num_rows($result)>0)
                                 {
                                  while($row=mysqli_fetch_assoc($result)){ 
                                     ?>
                                     <option   value="<?php echo $row['name'];  ?>">
                                     <?php echo $row['name']; ?>
                                    
                                 </option>
                                 <?php
                                  }
                                }?>
                                  
                                </select>
                                </div>

                          
                            <div class="form-group">
                             <label for="text">رابط موقع المكان في خريطه</label>
                                 <div class="input-group">
                                    <span class="input-group-addon"></span>
                                 <input id="text" type="text"  class="form-control" name="location" placeholder="location in map" required>
                                </div>
                          
                            <div class="form-group">
                             <label for="text">أضف صورة</label>
                             <div class="input-img">
                              <input type="hidden" name="size" value="10000000" >
                         	<div>
                            <input type="file" name="image"  required>
                           </label>
                          
                             </div>

                          </div>
                           </div>
                           </div> 
                           
                            <div class="form-check form-check-inline">
  
                          <label for="text"> visabal :
                          <input type="radio" class="form-check-input" name="optradio" value='1'> yes  
                           <input type="radio" class="form-check-input" name="optradio" value='0'> no
                          </label> 
                        </div>

                     	<div>
                         
  	                  	<button class="btn btn-block "   type="submit" name="upload" >upload</button>
                        </div> 
                      </form>
                          
 <?php
include('inc/temp/footer.php');
?>