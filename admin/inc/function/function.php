<?php


$errors=array();

function check_login(){
    if(!isset($_SESSION['user_id'])){
        redicrt('login.php');
    }
}



function check_loginadmin(){
    if(!(isset($_SESSION['user_id'])&&$_SESSION['type']==1)){
        redicrt('login.php');
    }
}

function secusse_msg_admin(){
    $emsg="<div class='alert alert-success alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Success!</strong>Successful  Add admin.";
    $emsg.="</div>";



   
    return($emsg);

}
function secusse_msg_add_paces(){
    $emsg="<div class='alert alert-success alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Success!</strong>Successful  Add places.";
    $emsg.="</div>";



   
    return($emsg);

}
function secusse_msg_add_gat(){
    $emsg="<div class='alert alert-success alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Success!</strong>Successful  Add catergoris.";
    $emsg.="</div>";



   
    return($emsg);

}

function error_msg_add_cat()
{
    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t add catergoris ";
    $emsg.="</div>";

   
    return($emsg); 
}




function secusse_msg_reg(){
    $emsg="<div class='alert alert-success alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>!</strong>تم تسجيلك بنجاح يرجى اعادة تسجيل الدخول";
    $emsg.="</div>";



   
    return($emsg);

}
function error_msg_edit_info()
{
    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t edit info ";
    $emsg.="</div>";

   
    return($emsg); 
}

function error_msg_delete_caterg()
{
    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t delete catergoires ";
    $emsg.="</div>";

   
    return($emsg); 
}

function error_msg_admin(){

    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t add admin.";
    $emsg.="</div>";

   
    return($emsg);
}

function error_msg_uplode(){

    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t uplode imgae.";
    $emsg.="</div>";

   
    return($emsg);


}
function error_msg_login(){

    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t login .";
    $emsg.="</div>";

   
    return($emsg);


}


function secusse_msg_delete(){
    $emsg="<div class='alert alert-success alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Success!</strong>Successful delete.";
    $emsg.="</div>";

   
    return($emsg);


}

function error_msg_delete(){
    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>cann’t delete.";
    $emsg.="</div>";

   
    return($emsg);

}


function error_msg_addadmin(){
    $emsg="<div class='alert alert-danger alert-dismissible'>";
    $emsg.="<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    $emsg.="<strong>Warning!</strong>Can not Add Admin.";
    $emsg.="</div>";

   
    return($emsg);

}



function redicrt($url){
    header("location:".$url);
     
    exit();
}
function check_input($data){
    $data=str_replace("-"," ",$data);
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
     return $data;

}
function check_input_admin($data){
    $data=str_replace("-"," ",$data);
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

function check_lenghtpass($data,$max,$min){
global $errors ;
if(strlen($data)<$min)
{
   $errors['tooshort']="password is short ";

}elseif(strlen($data)>$max){
   $errors['toolong']="password is long";

}else{
   return $data;
}
}

function check_empty($data){
    global $errors;
    $data=trim($data);
    if(isset($data)==true && $data===''){
        $errors['empty']="empty fielad";

    }else{
        return $data;

    }
}

function errors_function($errors=array())
{
   if(!empty($errors)){

    foreach ($errors as $key => $value) {
     echo"<div class='alert alert-danger alert-dismissible'>";
 echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
 echo "<strong>Warning!</strong> worng {$key}=>${value}.";
  echo "</div>";
    }

}
}





?>