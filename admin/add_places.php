<?php

include('inc/temp/header.php');

include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_login();
?>
                            



    <div class="header">
        <h2>Add places</h2>
        </div>     
        <div class="form_register">
                     

                            <form method="POST" action="add_delete_places.php" enctype="multipart/form-data">
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
                              <input type="hidden" name="size" value="10000000" required >
                         	<div>
                            <input type="file" name="image"  >
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
                         
  	                  	<button class="btn  btn-block "   type="submit" name="upload" >upload</button>
                        </div> 
                      </form>
                          
 <?php
include('inc/temp/footer.php');
?>