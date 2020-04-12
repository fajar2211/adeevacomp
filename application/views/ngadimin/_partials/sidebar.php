
        <?php if($this->session->userdata('ngadimin_role_id')==='1'):?>
        <!-- /.navbar-collapse -->
        <div class="collapse navbar-collapse" id="sidebar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-book"></i> Master <i class="fa fa-caret-down"></i></a>
                
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('ngadimin/master/address') ?>"><i class="fa fa-book fa-fw"></i> Kontak</a></li>
                        <li><a href="<?php echo site_url('ngadimin/master/user') ?>"><i class="fa fa-book fa-fw"></i> User</a></li>
                        <li><a href="<?php echo site_url('ngadimin/master/manufacturer') ?>"><i class="fa fa-book fa-fw"></i> Pabrikan</a></li>
                        <li><a href="<?php echo site_url('ngadimin/master/category') ?>"><i class="fa fa-book fa-fw"></i> Kategori</a></li>
                        <li><a href="<?php echo site_url('ngadimin/master/subcategory') ?>"><i class="fa fa-book fa-fw"></i> Sub Kategori</a></li>
                        <li><a href="<?php echo site_url('ngadimin/master/carousel') ?>"><i class="fa fa-book fa-fw"></i> Carousel</a></li>
                    </ul>
                </li>
                <li>
                         <a href="<?php echo site_url('ngadimin/product') ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-table"></span>  Product
                         </a>  
                </li>
                <li><a href="<?php echo site_url('ngadimin/laporan/all') ?>"><i class="fa fa-book"></i> Laporan</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
            
            </ul>
        </div><!-- /.navbar-collapse -->
        
        <?php elseif($this->session->userdata('ngadimin_role_id')=='2'):?>
        <!-- /.navbar-collapse -->
        <div class="collapse navbar-collapse" id="sidebar-collapse">
            <ul class="nav navbar-nav">
                <li>
                         <a href="<?php echo site_url('ngadimin/product_aktif') ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-table"></span>  Product
                         </a>  
                </li>
                <li><a href="<?php echo site_url('ngadimin/laporan/all') ?>"><i class="fa fa-book"></i> Laporan</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        
        <?php elseif($this->session->userdata('ngadimin_role_id')=='3'):?>
        <!-- /.navbar-collapse -->
        <div class="collapse navbar-collapse" id="sidebar-collapse">
            <ul class="nav navbar-nav">
                <li>
                         <a href="<?php echo site_url('ngadimin/product_user') ?>" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-table"></span>  Product
                         </a>  
                </li>
                <li><a href="<?php echo site_url('ngadimin/laporan/lap_user') ?>"><i class="fa fa-book"></i> Laporan</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        
        <?php endif; ?>
