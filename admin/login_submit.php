
<?php

session_start();


?>

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
    
    }else{
        redicrt('login.php');
    }
    ?>
         