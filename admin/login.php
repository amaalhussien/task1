<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); ?>




<!--form register -->
<div class="header">
<h2>LogIN</h2>
</div>

  
     


   <div class="form_register">
            <form  action="login_submit.php" method='POST' >
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
                    <input id="text" type="text" class="form-control" name="username" placeholder="places">
                </div>
                <div class="form-group">
                <label for="text"> password</label>
                <div class="input-group">

                    <input id="text" type="text" class="form-control" name="pass" placeholder="places">
                </div>
            </div>

              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">LOG in</button>
              <hr>
            </form>
            </div>
    <!-- end form -->