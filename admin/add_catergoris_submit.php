


<?php
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
?>




<?php
   if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    $opt=(int)$_POST["optradio"];
    $address=mysqli_real_escape_string($conn,check_empty(check_input($_POST["guide"])));
   

    // image file directory
    $target ="images/".basename($image);

    $sql = "INSERT INTO  `catergoires`(`name`,`img`,`visible`) VALUES ('$address','$image','$opt')";
     
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        redicrt('add_catergoires.php.php');
    } 
    // execute query
    mysqli_query($conn, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
       
    }else{
        
    }
    if(mysqli_affected_rows($conn)>0) {
      
        $_SESSION['msg']=secusse_msg_add_gat();
          redicrt("catergoires.php");
       }else{
           $_SESSION['msg']=error_msg_add_cat();
           redicrt("catergoires.php");
           
       }


}
?>