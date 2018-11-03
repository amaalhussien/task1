<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');


if(isset($_POST['submit'])){
    $username=htmlentities($_POST['username']);
    $pass=($_POST['pass']);
    
    $username1=mysqli_real_escape_string($conn,$username);
    $pass1=mysqli_real_escape_string($conn,$pass);
    $sql="SELECT  id,`user_name`,`password`,`type` FROM `users_or_admin` WHERE `user_name`='{$username1}' LIMIT 1";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
        if($result && mysqli_affected_rows($conn)>0)
        {
            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name']=$row['user_name'];
            $_SESSION['type']=$row['type'];

            


            if(password_verify($pass1,$row['password']))
            {
             redicrt('../index.php');
            }else{
                echo "ali";
                $_SESSION['msg']=error_msg_login();
               // redicrt('login.php');
            }
        }else{
            $_SESSION['msg']=error_msg_login();
            redicrt('login.php');
        }
    
    }





?>




<!--form register -->
<div class="header">
<h2>LogIN</h2>
</div>

  
     


   <div class="form_register">
            <form  action="login.php" method='POST' >
            <!--start msg error -->
            <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
            <div class="form_register">
            <form  action="login.php" method='POST' >
            <!--start msg error -->
            <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
               <!--end msg -->
               <!--start form log in -->

            <div class="form-group">
                <label for="text">username</label>
            <div class="input-group">
                    <input id="text" type="text" class="form-control" name="username" placeholder="اسم المستخدم">
                </div>
                <div class="form-group">
                <label for="text"> password</label>
                <div class="input-group">

                    <input id="text" type="text" class="form-control" name="pass" placeholder="كلمة السر">
                </div>
            </div>

              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">دخول</button>
              <a class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" href="register.php"> مستخدم جديد ؟ تسجيل </a>
              <hr>
            </form>
            </div>
    <!-- end form -->

    
<?php
include('inc/temp/footer.php');
?>

