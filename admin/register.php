<?php

include_once('inc/temp/header.php');
include_once('inc/session/session.php');
include_once('inc/function/function.php'); ?>



<!--form register -->
<div class="header">
<h2>Register</h2>
</div>

    
      
 



            <div class="form_register">

          
            <form  action='register_submit.php' method='POST'>
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



            <div>
                <input type='submit' name='submit' value='insert'>
            </div>
            <p>
    alraady member ? <a href="login.php">sigin</a>
</p>
        </form>
</div>

       

       
   