<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); 
check_login();
?>



<!--form register -->
<div class="header">
<h2>Add users or Admin</h2>

</div>









    <div class="form_register">

          
<form  action='add_submit.php' method='POST'>
            <?php echo msg(); ?>
            <?php $errors=er(); ?>
            <?php errors_function($errors);
               ?>
<div class="form-group">
    <label for="text">username</label>
    <div class="input-group">
        <input id="text" type="text" class="form-control" name="username" placeholder="username">
    </div>
</div>


<div class="form-group">
    <label for="text">email</label>
    <div class="input-group">

        <input id="text" type="email" class="form-control" name="email" placeholder="email">
    </div>
</div>
<div class="form-group">
    <label for="text"> password</label>
    <div class="input-group">

        <input id="text" type="text" class="form-control" name="pass" placeholder="password">
</div>
    </div>

    <div class="form-check form-check-inline">
  
   <label for="text"> admin :
   <input type="radio" class="form-check-input" name="optradio" value='1'> yes  
    <input type="radio" class="form-check-input" name="optradio" value='0'> no
   </label> 
</div>




<div>
    <input type='submit' name='submit' value='insert'>
</div>
   </form>


   <?php
include('inc/temp/footer.php');
?>