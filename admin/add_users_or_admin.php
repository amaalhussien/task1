<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_loginadmin();
//
if(isset($_POST['submit'])){
   if($_SESSION['type']==1)
    {
    $username=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["username"])));
    $email=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["email"])));
    $opt=(int)$_POST["optradio"];
    $pass=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["pass"])));
    $pass=check_lenghtpaa($_POST["pass"],24,8);
    $pass1=password_hash($pass,PASSWORD_BCRYPT);

     if(!empty($errors)){
         $_SESSION['errors']=$errors;
         redicrt('add_users_or_admin.php');
     }
  
     $sql="INSERT INTO `users_or_admin`(`user_name`,`email`, `password`, `type` ) VALUES
     ('{$username}','{$email}','{$pass1}','{$opt}')";
    
    if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
     $_SESSION['msg']=secusse_msg_admin();
       redicrt("users.php");
    }else{
        $_SESSION['msg']=error_msg_admin();
        redicrt("add_users_or_admin.php");
        
    }
}else
{
    $_SESSION['msg']=error_msg_admin();
    redicrt("add_users_or_admin.php");

}
}


?>



<!--form register -->
<div class="header">
<h2>Add users or Admin</h2>
</div>
    <div class="form_register">

          
<form  action='add_users_or_admin.php' method='POST'>
            <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
        <div class="form-group">
    <label for="text">username</label>
    <div class="input-group">
        <input id="text" type="text" class="form-control" name="username" placeholder="username" required>
     </div>
         </div>
            <div class="form-group">
              <label for="text">email</label>
                <div class="input-group">

        <input id="text" type="email" class="form-control" name="email" placeholder="email" required>
    </div>
</div>
<div class="form-group">
    <label for="text"> password</label>
    <div class="input-group">

        <input id="text" type="text" class="form-control" name="pass" placeholder="password" required>
</div>
    </div>

    <div class="form-check form-check-inline">
  
   <label for="text"> admin :
   <input type="radio" class="form-check-input" name="optradio" value='1'required> yes  
    <input type="radio" class="form-check-input" name="optradio" value='0' required> no
   </label> 
</div>




<div>
    <input type='submit' name='submit' value='insert'>
</div>
   </form>


   <?php
include('inc/temp/footer.php');
?>