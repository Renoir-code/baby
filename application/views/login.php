

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-md-3 text-center">
            <h1 class="mb-3">Login</h1>
            <?= validation_errors()?> <!-- shows form validation errors after submitting-->
              <?=form_open(base_url('home/login'))?> <!-- grabs value from url-->
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" required id="email" name="email" value="<?php set_value('email')?>" >
                    
                    <label for="password">Password</label>
                    <input type="password" class="form-control" required id="password" name="password" value="<?php set_value('password')?>" >
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enter</button>
               <?=form_close()?>
               <div class="row">
                <div class="col-12">
                <a class="btn btn-outline-success mt-4" href="<?=base_url('home/register') ?>">Register</a>
                </div>
               </div>
               
        </div>
        </div>
    </div>
   