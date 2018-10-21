<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('database/connected_db.php');
include_once('inc/function/function.php'); ?>


<?php




if(isset($_POST['submit'])){
    $id=$_SESSION['user_id'];
    $username=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["username"])));
    $email=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["email"])));
    $opt=(int)$_POST["optradio"];
    $pass=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["pass"])));
    $pass1=password_hash($pass,PASSWORD_BCRYPT);
    
      
     if(!empty($errors)){
         $_SESSION['errors']=$errors;
         redicrt('add_user_or_admin.php');
     } 
     
     
     
     
  
     $sql="UPDATE  `users_or_admin` SET`user_name`='{$username}',`email`='{$email}', `password`='{$pass1}'
     , `type`='{$opt}' WHERE id='{$id}'";
    
    
    if (mysqli_query($conn, $sql) &&mysqli_affected_rows($conn)>0) {
     $_SESSION['msg']=secusse_msg_admin();
       redicrt("admin.php");
    }else{
        $_SESSION['msg']=error_msg_edit_info();
        redicrt("edit_info.php");
        
    }

}else
{
    $_SESSION['msg']=error_msg_edit_info();
    redicrt('add_user_or_admin.php');
}

?>