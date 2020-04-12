<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("ngadimin/_partials/head.php") ?>
    </head>
    <body>

        <div class="container" align="center">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form class="form-signin" action="<?php echo site_url('ngadimin/login/auth'); ?>" method="post">
                        <!--<div class="row">-->
                        <h2 class="form-signin-heading text-center" >Login</h2>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="col form-group input-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="col form-group input-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>         
                        </div>

                        <!--<div class="row form-group input-group">-->
                        <div class="col form-group input-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p id="captcha-img"><?php echo $captcha; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <a href="javascript:void(0);" class="refresh-captcha btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>
                                </div>
                                <div class="col-sm-6">
                                    <label for="captcha" class="sr-only">Captcha</label>
                                    <!--<a href="javascript:void(0);" class="captcha-refresh" ></a>-->
                                    <!--<a href="#" class="reload-captcha refreshCaptcha btn btn-info btn-sm" ><i class="glyphicon glyphicon-refresh"></i></a>-->
                                    <input type="text" name="captcha" class="form-control" placeholder="Captcha" required>
                                    <!--<input type="hidden" name="captcha_real" class="form-control" value="<?php echo $captcha ?>">-->       
                                    <!--<span class="input-group-addon"><i class="fa fa-key"></i></span>--> 
                                </div>
                            </div>
                        </div>
                        <!--</div>-->

                        <div class="checkbox form-group input-group">
                            <label>
                                <input type="checkbox" value="remember-me">Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <!--                    </div>    -->
                    </form>
                </div>
            </div>    
        </div> <!-- /container -->

<!--        <script>
    $(document).ready(function(){
        $('.captcha-refresh').on('click', function(){
            $.get('<?php echo base_url() . 'login/refreshCaptcha'; ?>', function(data){
                $('#image_captcha').html(data);
            });
        });
    });
</script>-->

<!--        <script>
    $( document ).ready( function (){
            var base_url = '<?php echo base_url(); ?>';
            $('.reload-captcha').click(function(event){
                    event.preventDefault();
                    $.ajax({
                            url:base_url+'login/refresh',
                            dataType: "text",  
                            cache:false,
                            success:function(data){
                                    $('.captcha-img').attr("src", data);
                            }
                    });
            });            
    });
</script>-->



        <?php $this->load->view("ngadimin/_partials/js.php") ?>
        <script>
            jQuery(document).ready(function () {
                jQuery('a.refresh-captcha').on('click', function () {
                    jQuery.get('<?php print base_url() . 'ngadimin/login/refreshCaptcha'; ?>', function (data) {
                        jQuery('p#captcha-img').html(data);
                    });
                });
            });
        </script>
    </body>
</html>