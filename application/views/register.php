

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-md-3 text-center">
            <h1 class="mb-3">Register</h1>
            <?if(isset($success) && $success):?>
                 <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                          Registration Completed Successfully. <br>
                          <a href="<?=base_url()?>">Home</a>
                        </div>
                    </div>
                 </div>
                <?else:?>
            <?=validation_errors()?> <!-- shows form validation errors after submitting-->
              <?=form_open(base_url('home/register'))?> <!-- grabs value from url-->
                <div class="form-group">
                    <input type="email" class="form-control" required 
                    name="email" value="<?php set_value('email')?>" placeholder="Email Address" >
                </div>
                    
                <div class="form-group">
                    <input type="text" class="form-control" required id="first_name" 
                    name="first_name" value="<?php set_value('first_name')?>" placeholder="Enter your First Name" >
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" required id="last_name" 
                    name="last_name" value="<?php set_value('last_name')?>" placeholder="Enter your Last Name" >
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" required 
                    name="password" value="<?php set_value('password')?>" placeholder="Password" >
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" required  
                    name="passconf" value="<?php set_value('passconf')?>" placeholder="Confirm Password" >

                </div>
                <button type="submit" class="btn btn-primary btn-block">Register User</button>
               <?=form_close()?>
               <div class="row">
                <div class="col-12">
                <a class="btn btn-outline-success mt-4" href="<?=base_url('home/login')?>">Back to Login</a>
                </div>
               </div>
               <?endif;?>
        </div>
        </div>
    </div>
   