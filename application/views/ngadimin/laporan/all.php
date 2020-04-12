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
                    <h2 style="text-align: center;margin-bottom: 30px">Laporan</h2>
                    <!--datatables-->
                    <div class="card-header">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new_laporan"> Add New</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>BLTH</th>
                                    <th>User</th>
                                    <th>Filename</th>
                                    <th>Tgl Upload</th>
                                    <th>Tgl Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan as $laporanall): ?>
                                    <tr>
                                        <td width="150" align="center">
                                            <?php echo $laporanall['blth'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $laporanall['username'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $laporanall['filename'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $laporanall['date_added'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $laporanall['date_modified'] ?>
                                        </td>
                                        <td width="150" align="center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit_laporan<?php echo $laporanall['laporan_id']; ?>"> Edit</a>
                                            <!--<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_laporan<?php echo $laporanall['laporan_id']; ?>"> Hapus</a>-->    
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

        <?php $this->load->view("ngadimin/_partials/modal_laporan.php") ?>

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>

    </body>

</html>
