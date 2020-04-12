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
                    <h2 style="text-align: center;margin-bottom: 30px">Kontak</h2>
                    <!--datatables-->
                    <div class="card-header">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_address"> Add New</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Toko</th>
                                    <!--<th>Alamat Toko</th>-->
                                    <!--<th>Telp</th>-->
                                    <th>URL Tokopedia</th>
                                    <th>URL Bukalapak</th>
                                    <th>URL Shopee</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Tgl Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($address as $row): ?>
                                    <tr>
                                        <td width="50" align="center">
                                            <?php echo $row['address_id'] ?>
                                        </td>
                                        <td  width="250">
                                            <?php echo $row['shopname'] ?>
                                        </td>
<!--                                        <td  width="150">
                                            <?php echo $row['address'] ?>
                                        </td>-->
<!--                                        <td  width="150">
                                            <?php echo $row['contact'] ?>
                                        </td>-->
                                        <td  width="150">
                                            <?php echo $row['url_tokopedia'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $row['url_bukalapak'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $row['url_shopee'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $row['koordinat_x'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $row['koordinat_y'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $row['date_modified'] ?>
                                        </td>

                                        <td width="150" align="center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit_address<?php echo $row['address_id']; ?>"> Edit</a>

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

        <?php $this->load->view("ngadimin/_partials/modal_address.php") ?>

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>

    </body>

</html>
