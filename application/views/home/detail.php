<!DOCTYPE html>
<html lang="en">

    <head>

        <?php $this->load->view("home/_partials2/head.php") ?>
        
    </head>

    <body>

        <!-- Navigation -->
        <?php $this->load->view("home/_partials2/navbar.php") ?>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <?php foreach ($detail as $row) : ?>
                    <input type="hidden" name="product_id" value="<?php echo $row->product_id ?>" />
                    <div class="col-md-12 col-sm-12">
                        <div class="row col-md-12 col-sm-12">
                            <div class="card-body row col-lg-6 col-md-6 col-sm-6 my-3">
                                <!--<a target="_blank" href="<?php echo base_url('upload/product/') . $row->image1 ?>">-->
                                <!--                                <div class="card-img">
                                                                    <img hidden id="myImg" class="card-img" src="<?php echo base_url('upload/product/') . $row->image1 ?>" alt=""></div>-->
                                <img id="expandedImg" class="card-img" src="<?php echo base_url('upload/product/') . $row->image1 ?>" alt="" height="400px" weight="400px">
                            </div>
                            <div class="card-img row col-lg-6 col-md-6 col-sm-6 my-3 ml-3">
                                <div class="card-img col-md-12">
                                    <h5><?php echo $row->name ?></h5>
                                </div>
                                <hr width=100%>
                                <div class="card-img col-md-2">
                                    <h5><div class="card-text">Harga</div></h5>
                                </div>
                                <div class="card-img col-md-10">
                                    <h5><div class="card-text"><?php echo 'Rp. ' . number_format($row->price, '2', ',', '.') ?></div></h5>
                                </div>
                                <hr width=100%>
                                <div class="card-img col-md-2">

                                    <h5><div class="card-text">Stok</div></h5>
                                </div>
                                <div class="card-img col-md-10">

                                    <h5><div class="card-text"><?php echo $row->quantity ?> <label>item</label> | <?php echo $row->status ?></div></h5>
                                </div>
                                <hr width=100%>
                                <div class="card-img col-md-2">

                                    <h5><div class="card-text">Berat</div></h5>
                                </div>
                                <div class="card-img col-md-10">

                                    <h5><div class="card-text"><?php echo $row->weight ?> <label>gr</label></div></h5>
                                </div>
                                <hr width=100%>
                                <div class="card-img col-md-2">

                                    <h5><div class="card-text">Kondisi</div></h5>
                                </div>
                                <div class="card-img col-md-10">

                                    <h5><div class="card-text"><?php echo $row->condition ?> </div></h5>
                                </div>
                                <hr width=100%>
                                
<!--                                <div class="card-img col-md-2">
                                    <h5><div class="card-text">Status</div></h5>
                                </div>
                                    <div class="card-img col-md-10">
                                    <h5><div class="card-text"><?php echo $row->status ?> </div></h5>
                                </div>
                                <hr width=100%>-->
                                
                                <div class="card-img col-md-3 col-sm-3 ml-5">
                                    <a href="<?php echo $row->link_tokopedia ?>" class="btn btn-lg btn-outline-success" style="width:125%"><i class="fa fa-shopping-cart"></i> Tokopedia</a>

                                </div>

                                <div class="card-img col-md-3 col-sm-3 ml-3">
                                    <a href="<?php echo $row->link_bukalapak ?>" class="btn btn-lg btn-outline-danger" style="width:125%"><i class="fa fa-shopping-cart"></i> Bukalapak</a>

                                </div>

                                <div class="card-img col-md-3 col-sm-3 ml-3">
                                    <a href="<?php echo $row->link_shopee ?>" class="btn btn-lg btn-outline-warning" style="width:125%"><i class="fa fa-shopping-cart"></i> Shopee</a>

                                </div>
                            </div>
                        </div>
                        <hr width=100%>
                        <div class="col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-6">
                                <!--<div class="row col-md-12 col-sm-12">-->
                                <div class="column col-md-2 my-2 mb-3">
                                    <!--<div class="card-body row col-lg-2 col-md-2 col-sm-2 my-3">-->
                                    <img height="75" weight="75" class="card-img" src="<?php echo base_url('upload/product/') . $row->image1 ?>" alt="" onclick="myFunction(this);">
                                </div>
                                <div class="column col-md-2 my-2 mb-3">
                                    <img height="75" weight="75" class="card-img" src="<?php echo base_url('upload/product/') . $row->image2 ?>" alt="" onclick="myFunction(this);">
                                </div>
                                <div class="column col-md-2 my-2 mb-3">
                                    <img height="75" weight="75" class="card-img" src="<?php echo base_url('upload/product/') . $row->image3 ?>" alt="" onclick="myFunction(this);">
                                </div>
                                <div class="column col-md-2 my-2 mb-3">
                                    <img height="75" weight="75" class="card-img" src="<?php echo base_url('upload/product/') . $row->image4 ?>" alt="" onclick="myFunction(this);">
                                </div>
                                <div class="column col-md-2 my-2 mb-3">
                                    <img height="75" weight="75" class="card-img" src="<?php echo base_url('upload/product/') . $row->image5 ?>" alt="" onclick="myFunction(this);">
                                </div>


                            </div>
                        </div>
                        <hr width=100%>
                        <div class="row col-md-24 my-3">
                            <div class="card w-100">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Deskripsi</a>
                                        </li>
                                    </ul>
                                    <!--<h5 class="card-title">Deskripsi</h5>-->
                                </div>
                                <div class="card-body">
                                    <h7><?php echo $row->description ?></h7>
                                </div>
                            </div>
                        </div>



                    <?php endforeach; ?>

                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Modal -->
        <?php $this->load->view("home/_partials2/modal_images.php") ?>

        <!-- Footer -->
        <?php $this->load->view("home/_partials2/footer.php") ?>

        <!-- Bootstrap core JavaScript -->
        <?php $this->load->view("home/_partials2/js.php") ?>

<!--        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
            // captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

        </script>-->
        <script>
            //expanded images//
            function myFunction(imgs) {
                var expandImg = document.getElementById("expandedImg");
                var imgText = document.getElementById("imgtext");
                expandImg.src = imgs.src;
                imgText.innerHTML = imgs.alt;
                expandImg.parentElement.style.display = "block";
            }

            //modal images//
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("expandedImg");
            var modalImg = document.getElementById("img01");
//            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                // captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>

    </body>

</html>
