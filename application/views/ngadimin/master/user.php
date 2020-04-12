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
                    <h2 style="text-align: center;margin-bottom: 30px">User</h2>
                    <!--datatables-->
                    <div class="card-header">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_user"> Add New</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID User</th>
                                    <th>Role User</th>
                                    <th>Username</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>IP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $userall): ?>
                                    <tr>
                                        <td width="150" align="center">
                                            <?php echo $userall['ngadimin_id'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $userall['role'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $userall['username'] ?>
                                        </td>

                                        <td  width="150">
                                            <?php echo $userall['name'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $userall['email'] ?>
                                        </td>
                                        <td  width="150">
                                            <?php echo $userall['ip'] ?>
                                        </td>

                                        <td width="150" align="center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit_user<?php echo $userall['ngadimin_id']; ?>"> Edit</a>

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

        <?php $this->load->view("ngadimin/_partials/modal_user.php") ?>

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>

    </body>

</html>
