
<?php
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
?>



<?php
   if (isset($_POST['upload'])) {
       //get id_catergo
       $cater=$_POST['catergo'];
       $sql="SELECT  id FROM `catergoires` WHERE `name`='{$cater}' LIMIT 1";
       $result=mysqli_query($conn,$sql);
       $row=mysqli_fetch_assoc($result);
       $id=$row['id'];
    // Get image name
    $image = $_FILES['image']['name'];
  
    $opt=(int)$_POST["optradio"];
    $address=mysqli_real_escape_string($conn,check_empty(check_input($_POST["guide"])));
    $detials=mysqli_real_escape_string($conn,check_empty(check_input($_POST["detials"])));
    $location=mysqli_real_escape_string($conn,check_empty(check_input($_POST["location"])));
   

    // image file directory
    $target ="images/".basename($image);

    $sql = "INSERT INTO  `places`(`id_catergo`,`detials`,`address`,`img`,`location`,`status`)
     VALUES ($id,'$detials','$address','$image','$location',$opt)";
     
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        redicrt('add_places.php');
    } 
    //uplode image to file 
    mysqli_query($conn, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
       
    }else{
        
    }
    if(mysqli_affected_rows($conn)>0) {
      
        $_SESSION['msg']=secusse_msg_add_paces();
          redicrt("../index.php");
       }else{
           $_SESSION['msg']=error_msg_add();
           redicrt("places.php");
           
       }


}

/* Delete places from database */
if(isset($_GET["places"]))
{

$id_cate=mysqli_real_escape_string($conn,$_GET["places"]);
$id1=(int)$id_cate;
$sql="DELETE FROM `places` WHERE id={$id1} LIMIT 1";
$result=mysqli_query($conn,$sql);
if ( $result && mysqli_affected_rows($conn)>0) {
   
   
    $_SESSION['msg']=secusse_msg_delete();
    redicrt("places.php");

}else{

    $_SESSION['msg']= error_msg_delete();
    redicrt("places.php");
}
}





?>