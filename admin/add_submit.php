<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('database/connected_db.php');
include_once('inc/function/function.php'); ?>


<?php




if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["username"])));
    $email=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["email"])));
    $opt=(int)$_POST["optradio"];
    $pass=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["pass"])));
    $pass1=password_hash($pass,PASSWORD_BCRYPT);
    
      
     if(!empty($errors)){
         $_SESSION['errors']=$errors;
         redicrt('add_user_or_admin.php');
     } 
     
     
     
     
  
     $sql="INSERT INTO `users_or_admin`(`user_name`,`email`, `password`, `type` ) VALUES
     ('{$username}','{$email}','{$pass1}','{$opt}')";
    
    if (mysqli_query($conn, $sql) &&mysqli_affected_rows($conn)>0) {
     $_SESSION['msg']=secusse_msg_admin();
       redicrt("users.php");
    }else{
        $_SESSION['msg']=error_msg_admin();
        redicrt("add_user_or_admin.php");
        
    }

}else
{
    $_SESSION['msg']=error_msg_addadmin();
    redicrt('add_user_or_admin.php');
}

?>