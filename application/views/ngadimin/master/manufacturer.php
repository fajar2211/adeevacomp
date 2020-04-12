<!DOCTYPE html>
<html>

    <head>

        <?php $this->load->view("ngadimin/_partials/head.php") ?>

    </head>

    <body>
        <?php $this->load->view("ngadimin/_partials/navbar.php") ?>
        <?php $this->load->view("ngadimin/_partials/sidebar.php") ?>

        <!--    <div class="container" style="margin-top: 20px">
        -->
        <div id="wrapper" >
            <div id="page-wrapper">
                <div class="col-md-12">
                    <h2 style="text-align: center;margin-bottom: 30px">Manufacturer</h2>
                    <!--datatables-->
                    <div class="card-header">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_manufacturer"> Add New</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Manufacturer</th>
                                    <th>Nama Manufacturer</th>
                                    <th>Tgl Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($manufacturer as $manufacturerall): ?>
                                    <tr>
                                        <td width="150" align="center">
                                            <?php echo $manufacturerall['manufacturer_id'] ?>
                                        </td>
                                        <td  width="350">
                                            <?php echo $manufacturerall['manufacturer_name'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $manufacturerall['date_modified'] ?>
                                        </td>

                                        <td width="150" align="center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit_manufacturer<?php echo $manufacturerall['manufacturer_id']; ?>"> Edit</a>

                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!--</div>-->

                </div>
            </div>
        </div>
        <?php $this->load->view("ngadimin/_partials/footer.php") ?>

        <!-- /#wrapper -->

        <?php $this->load->view("ngadimin/_partials/modal_manufacturer.php") ?>

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>

    </body>

</html>
