<div class="col-lg-3">                    
    <h1 class="my-4">Etalase</h1>
    <div class="list-group">
        <a href="<?php echo base_url('') ?>" class="list-group-item">Semua Etalase</a>
    </div>
    <?php foreach ($category as $row1) : ?>
        <div class="list-group">
            <a href="<?php echo base_url('home/etalase/') . $row1['category_id'] ?>" class="list-group-item"><?php echo $row1['category_name'] ?></a>
            <!--                        <a href="#" class="list-group-item">Category 2</a>
                                    <a href="#" class="list-group-item">Category 3</a>-->
        </div>
    <?php endforeach; ?>
    
    <div class="card">
        <video width="250" autoplay loop muted>
            <source src="<?php echo base_url('/upload/carousel/video1.mp4') ?>" type="video/mp4"/>
        </video>
<!--        <div class="embed-responsive embed-responsive-1by1">
            <iframe class="embed-responsive-item" src=""></iframe>
          </div>-->
    </div>
       
</div>
