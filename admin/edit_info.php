<?php

include_once('inc/temp/header.php');
include('inc/temp/navbar.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php');
include_once('database/connected_db.php'); 
check_loginadmin();



//submit edit start
if(isset($_POST['submit'])){
   if(isset($_SESSION['user_name'])&& $_SESSION['type']==1)
   
    {
    $id=$_SESSION['user_id'];
    $username=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["username"])));
    $email=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["email"])));
    $opt=(int)$_POST["optradio"];
    $pass=mysqli_real_escape_string($conn,check_empty(check_input_admin($_POST["pass"])));
    $pass=check_lenghtpaa($_POST["pass"],24,8);
    $pass1=password_hash($pass,PASSWORD_BCRYPT);
    
      
     if(!empty($errors)){
         $_SESSION['errors']=$errors;
         redicrt('edit_info.php');
     } 
     
     
  
     $sql="UPDATE  `users_or_admin` SET`user_name`='{$username}',`email`='{$email}', `password`='{$pass1}'
     , `type`='{$opt}' WHERE id='{$id}'";
    
    
    if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
     $_SESSION['msg']=secusse_msg_admin();
       redicrt("admin.php");
    }else{
        $_SESSION['msg']=error_msg_edit_info();
        redicrt("edit_info.php");
        
    }

}
}
//end submit code for edit


?>


<div class="main">
<div class="title">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  
   
   <li class="breadcrumb-item active" aria-current="page">edit_info</li>
    </ol>
<div class="content"> 
<div class="container">
 <div class="row">
     <div class="col-sm-10">
<?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
      
      ?>
     
<?php
if(isset($_SESSION['user_name'])){

     
         $id=$_SESSION['user_id'];
   
         $query="SELECT * FROM `users_or_admin` WHERE id=$id";
         $result=mysqli_query($conn,$query);
         while($row=mysqli_fetch_assoc($result))
     {
         

         echo '<form  action="edit_info.php" method="POST">';  
         echo '<div class="form-group"> '; 
         echo '<label for="text">username</label>';   
         echo '<div class="input-group">'; 
         echo '<input id="text" type="text" class="form-control" name="username" placeholder="username" value="'.$row["user_name"].'">';
         echo '</div>';
         echo '</div>';
           
            
         echo '<div class="form-group">'; 
         echo '<label for="text">email</label>';
         echo '<div class="input-group">'; 

         echo ' <input id="text" type="email" class="form-control" name="email" placeholder="email" value="'.$row["email"].'">';    
         echo '</div>'; 
         echo '</div>';
         echo '<div class="form-group">'; 
         echo '<label for="text"> password</label>';  
         echo '<div class="input-group">';
         echo '<input id="text" type="text" class="form-control" name="pass" placeholder="password">';   
         echo '</div>'; 
         echo '</div>'; 
         echo '<div class="form-check form-check-inline">';
         
         if($row['type']===1)
         {
           echo"  <label for='text'> admin: " ;
           echo"      <input type='radio' class='form-check-input' name='optradio' value='1' checked> Yes";
           echo" <input type='radio' class='form-check-input' name='optradio' value='0'> no";
         echo"</label>"; 
         }else
         {
             echo" <label for='text'> admin:    ";
             echo" <input type='radio' class='form-check-input' name='optradio' value='1' checked> Yes";
             echo" <input type='radio' class='form-check-input' name='optradio' value='0'> no";
              echo"</label>"; 
         }   
         echo '</div>';                
                
         echo '<div>';
         echo '<input type="submit" name="submit" value="UPDATE">';
         echo '</div>';      
         echo '</form>'; 


     
     }
    
}?> 

</div>


<?php
include('inc/temp/footer.php');
?>

