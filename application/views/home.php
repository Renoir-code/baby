 <!-- Bootstrap Structures used so far -Card -->
<div class="container">
    <div class="row">
        <div class=" col-12">
            <h1>Products</h1>
        </div>
    </div>
 <div class="row">
    <?php if(count($items)== 0):?> <!-- php tags need to be used with "if" data structure-->
       <div class="col-6">
        <div class="alert alert-danger"> Product is really Not Found </div>
       </div>
    <?php endif;?>
        <?php foreach($items as $item): ?> <!-- use < php > tags with foreach data structure -->
            <div class="col-4">
                <div class="card">
                    <img src="<?=base_url('./uploads/'.$item->image)?>" class="card-img-top" alt="<?=$item->image?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$item->id .')'.$item->title?></h5>
                        <p class="card-text"><?=$item->price?> $</p>
                        <a href="<?=site_url('add/'. $item->id) ?>" class="btn btn-success">Add to Bag</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
        <div class="row">
            <div class="col-12  justify-content-center">
            <?=$pagination?>
        </div>
    </div>
</div>