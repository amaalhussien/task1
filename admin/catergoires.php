
<?php

include('inc/temp/header.php');
include('inc/temp/navbar.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
include_once('database/connected_db.php');
check_loginadmin();
if(isset($_GET["cate"])){
  $cate_id_selected=$_GET["cate"];
  
}else{
  $cate_id_selected=null;
 

}
?>

<?php
//delete catergoris form database
if(isset($_GET["cate"])){
  if($_SESSION['type']==1)
  {
     
  $id_cate=mysqli_real_escape_string($conn,$_GET["cate"]);
  $id1=(int)$id_cate;
  $query1="SELECT * FROM `places` WHERE  places.id_catergo=".$id1;
  $result1=mysqli_query($conn,$query1);
  if(mysqli_num_rows($result1)>0){

        $_SESSION['msg']=error_msg_delete_caterg();
        redicrt('catergoires.php');
    }else{
       
         $sql="DELETE FROM `catergoires` WHERE id={$id1} LIMIT 1";
         $result=mysqli_query($conn,$sql);
        if ( $result && mysqli_affected_rows($conn)>0) {
   
   
           $_SESSION['msg']=secusse_msg_delete();
            redicrt("catergoires.php");

    }       else{


          $_SESSION['msg']= error_msg_delete();
           redicrt("catergoires.php");
}  
} 

  }}
?>






<div class="main">
  <div class="title">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="add_catergoires.php"> <i class="fa fa-plus-square-o" style="font-size:34px;"> add catergoires  </i></a></li>
   
   <li class="breadcrumb-item active" aria-current="page">catergoires</li>
    </ol>

  <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
</nav>
</div> 

<!-- display content catergoirs -->
 
<div class="content"> 
<div class="container">

            <div class="row">
            <?php 

                         $query="SELECT name , img ,id FROM `catergoires`";
                        $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_assoc($result)){ 
                         echo"
   
                        <div class='col-sm-6 col-lg-4'>
                         <div class='card' style='width: 18rem;'>
                          <img class='card-img-top'  src='images/".mysqli_real_escape_string($conn,$row['img'])."' height='200' width='200' class='img-thumnail' alt='Card image cap'>
                          <div class='card-body'>
                          <P>
                           " .mysqli_real_escape_string($conn,$row['name'])."
                           </p>
                           <a  class='btn btn-danger' role='button' href='catergoires.php?cate=".mysqli_real_escape_string($conn, $row["id"] )."'>
                           Delete</a>
                           </div>
                           <hr>
                              </div>
                         
  	                  	
             
                          </div> ";
                         }
                         ?>

                  <div>
                  <div>
                  <div>


                         
<?php
include('inc/temp/footer.php');
?>