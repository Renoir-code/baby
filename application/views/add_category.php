<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1> Add Category </h1>
            <?= validation_errors()?> <!-- shows form validation errors after submitting-->
              <?=form_open(base_url('home/add_category'))?> <!-- grabs value from url-->
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php set_value('title')?>" >
                </div>
                <button type="submit" class="btn btn-success">Add New</button>
               <?=form_close()?>
        </div>
        </div>
    </div>
   