<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <!--<div id="caption"></div>-->
<!--  
  tambahan
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
      <img src="<?php echo base_url('upload/product/') . $row->image1 ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
      <img src="<?php echo base_url('upload/product/') . $row->image2 ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
      <img src="<?php echo base_url('upload/product/') . $row->image3 ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
      <img src="<?php echo base_url('upload/product/') . $row->image4 ?>" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
      <img src="<?php echo base_url('upload/product/') . $row->image5 ?>" style="width:100%">
  </div>
  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

</script>-->