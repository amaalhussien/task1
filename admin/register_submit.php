<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('database/connected_db.php');
include_once('inc/function/function.php'); ?>


<?php




if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["username"])));
    $email=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["email"])));
    $pass=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["pass"])));
    $pass1=password_hash($pass,PASSWORD_BCRYPT);
    
      
     if(!empty($errors)){
         $_SESSION['errors']=$errors;
         redicrt('admin.php');
     } 
     
     
     
     
  
     $sql="INSERT INTO `users_or_admin`(`user_name`,`email`, `password`) VALUES
     ('{$username}','{$email}','{$pass1}')";
     if (mysqli_query($conn, $sql) &&mysqli_affected_rows($conn)>0) {
     $_SESSION['msg']=secusse_msg_reg() ;
       redicrt("../index.php");
    }else{
        $_SESSION['msg']=error_msg_admin();
        redicrt("register.php");
        
    }

}else
{
    $_SESSION['msg']=error_msg_addadmin();
    redicrt('register.php');
}

?>