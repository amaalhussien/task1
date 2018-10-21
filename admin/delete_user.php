<?php
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
?>


<?php

$id_cate=mysqli_real_escape_string($conn,$_GET["user"]);
$id1=(int)$id_cate;
$query1="DELETE FROM `users_or_admin` WHERE  id=$id1 and `type`=0  LIMIT   1 ";
$result1=mysqli_query($conn,$query1);
if(mysqli_num_rows($result1)>0){

        $_SESSION['msg']=error_msg_delete_caterg();
        redicrt('catergoires.php');
    }else{
           $_SESSION['msg']=secusse_msg_delete();
            redicrt("catergoires.php");

}    


  
      
?>


