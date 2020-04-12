<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content">

  <!-- Modal Caption (Image Text) -->
  <!--<div id="caption"></div>-->
  <?php foreach ($detail as $row) : ?>
  <!--tambahan-->
  <div class="mySlides">
    <!--<div class="numbertext">1 / 6</div>-->
      <img src="<?php echo base_url('upload/product/') . $row->image1 ?>" style="width:25%;height:25%;">
  </div>

  <div class="mySlides">
    <!--<div class="numbertext">2 / 6</div>-->
      <img src="<?php echo base_url('upload/product/') . $row->image2 ?>" style="width:25%;height:25%;">
  </div>

  <div class="mySlides">
    <!--<div class="numbertext">3 / 6</div>-->
      <img src="<?php echo base_url('upload/product/') . $row->image3 ?>" style="width:25%;height:25%;">
  </div>

  <div class="mySlides">
    <!--<div class="numbertext">4 / 6</div>-->
      <img src="<?php echo base_url('upload/product/') . $row->image4 ?>" style="width:25%;height:25%;">
  </div>

  <div class="mySlides">
    <!--<div class="numbertext">5 / 6</div>-->
      <img src="<?php echo base_url('upload/product/') . $row->image5 ?>" style="width:25%;height:25%;">
  </div>
  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
  <?php endforeach; ?>
</div>