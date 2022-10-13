<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1> Add Item </h1>
            <?=isset($error) ? $error: ''   ?>
            <?= validation_errors()?> <!-- shows form validation errors after submitting-->
              <?=form_open_multipart(current_url())?>
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php set_value('title')?>" >
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="number" class="form-control" min="0" step="0.01" id="price" name="price" value ="<?php set_value('price')?>" >
                </div>
                <div class="form-group">
                    <label for="image">Image File Input</label>
                    <input type="file" class="form-control-file" id="image" name="image" >
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control id="description" name="description" value ="<?php set_value('description')?>"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add New</button>
               <?=form_close()?>
        </div>
        </div>
    </div>
   