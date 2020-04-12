<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php foreach ($carousel as $row) : ?>
            <div class="carousel-item active">
                <!--<img class="d-block img-fluid" src="" alt="First slide">-->
                <img class="d-block img-fluid" src="<?php echo base_url('/upload/carousel/') . $row->carousel_name ?>" width="1100" height="300">

            </div>
        <?php endforeach; ?>
        <?php foreach ($carousel_item as $row1) : ?>
            <div class="carousel-item">
                <!--<img class="d-block img-fluid" src="/upload/logo.jpeg" alt="Second slide">-->
                <img class="d-block img-fluid" src="<?php echo base_url('/upload/carousel/') . $row1->carousel_name ?>" width="1100" height="300">

            </div>
        <?php endforeach; ?>
        <!--                            <div class="carousel-item">
                                        <img class="d-block img-fluid" src="/upload/logo.jpeg" alt="Third slide">
                                        <img class="d-block img-fluid" src="<?php echo base_url('/upload/carousel/') . $row->carousel_name ?>" width="1100" height="500">
                                    </div>-->
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>