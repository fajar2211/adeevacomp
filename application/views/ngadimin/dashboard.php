<!DOCTYPE html>
<html>

    <head>

        <?php $this->load->view("ngadimin/_partials/head.php") ?>

    </head>

    <body>

        <?php $this->load->view("ngadimin/_partials/navbar.php") ?>
        <?php $this->load->view("ngadimin/_partials/sidebar.php") ?>
        <div id="wrapper">

            <div id="page-wrapper">

                <div class="col-md-12">
                    <!--datatables-->

                    <div class="table-responsive">
                        <div class="col-md-12">
                            <h2 style="text-align: center;margin-bottom: 30px">welcome <?php echo $this->session->userdata('name') ?></h2>
                        </div>

                        <table class="table table-hover" id="dataTable" width="50%" cellspacing="0">
                            <tbody> 
                                <tr>
                                    <td><b>IP Address</b></td>
                                    <td><?php echo $ip_address; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Operating System</b></td>
                                    <td><?php echo $os; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Browser Details</b></td>
                                    <td><?php echo $browser . ' - ' . $browser_version; ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
            <?php $this->load->view("ngadimin/_partials/footer.php") ?>
        </div>
        <!-- /#wrapper -->

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

    </body>

</html>
