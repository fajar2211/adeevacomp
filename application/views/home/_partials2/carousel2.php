<!--Carousel Wrapper-->
<div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#video-carousel-example" data-slide-to="1"></li>
    <li data-target="#video-carousel-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
      
    <div class="carousel-item active">
      <video class="video-fluid" autoplay loop muted>
          <source src="<?php echo base_url('/upload/carousel/video1.mp4') ?>" type="video/mp4" width="200" height="200"/>
      </video>
    </div>
     
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source src="<?php echo base_url('/upload/carousel/video1.mp4') ?>" type="video/mp4" width="200" height="200"/>
      </video>
    </div>
      
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source src="<?php echo base_url('/upload/carousel/video1.mp4') ?>" type="video/mp4" width="200" height="200"/>
      </video>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#video-carousel-example" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#video-carousel-example" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--Carousel Wrapper-->