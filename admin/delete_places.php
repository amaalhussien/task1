

<?php
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
?>


<?php
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
?>