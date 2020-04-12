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

                <?php $this->load->view("home/_partials2/sidebar.php") ?>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">

                    <?php $this->load->view("home/_partials2/carousel.php") ?>
                    
                    <!-- /.search -->
                    <?php $this->load->view("home/_partials2/search.php") ?>

                    <div class="row">

                        <?php foreach ($search as $row) : ?>
                            <!--<input type="hidden" name="product_id" value="<?php echo $row->product_id ?>" />-->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="<?php echo site_url('home/detail/') . $row->product_id ?>"><img height="200" weight="300" class="card-img-top" src="<?php echo base_url('upload/product/') . $row->image1 ?>" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="<?php echo site_url('home/detail/') . $row->product_id ?>"><?php echo $row->name ?></a>
                                        </h5>
                                        <h5><?php echo 'Rp. ' . number_format($row->price, '2', ',', '.') ?></h5>
                                        <!--<p class="card-text"><?php echo $row->description ?></p>-->
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">&#9734; &#9734; &#9734; &#9734; &#9734;</small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!--                        <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                <a href="#">Item Two</a>
                                                            </h4>
                                                            <h5>$24.99</h5>
                                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                <a href="#">Item Three</a>
                                                            </h4>
                                                            <h5>$24.99</h5>
                                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                <a href="#">Item Four</a>
                                                            </h4>
                                                            <h5>$24.99</h5>
                                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                <a href="#">Item Five</a>
                                                            </h4>
                                                            <h5>$24.99</h5>
                                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                <a href="#">Item Six</a>
                                                            </h4>
                                                            <h5>$24.99</h5>
                                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                                        </div>
                                                    </div>
                                                </div>-->

                    </div>
                    <div class="row">
                        <div class="col">
                            <!--pagination-->
                            
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <?php $this->load->view("home/_partials2/footer.php") ?>

        <!-- Bootstrap core JavaScript -->
        <?php $this->load->view("home/_partials2/js.php") ?>

    </body>

</html>
