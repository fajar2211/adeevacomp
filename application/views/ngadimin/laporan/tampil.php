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
                    <form method="get" action="<?php echo base_url("ngadimin/laporan/lap_user/tampil") ?>"> 
                        <label>BULAN</label>
                        <select name="bulan">
                            <option>-- BULAN --</option>

                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <!--<label>TAHUN</label>-->
                        <select name="tahun">
                            <option>-- TAHUN --</option>
                            <?php foreach ($tahun as $row): { ?>
                                    <option value="<?php echo $row['tahun']; ?>"><?php echo $row['tahun']; ?></option>
                                <?php } endforeach; ?>
                        </select>
                        <input type="submit" value="FILTER">
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>BLTH</th>
                                    <th>User</th>
                                    <th>Filename</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lap_user as $lap_user): ?>
                                    <tr>
                                        <td width="150" align="center">
                                            <?php echo $lap_user['blth'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $lap_user['username'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $lap_user['filename'] ?>
                                        </td>

                                        <td width="150" align="center">
                                            <a href="<?php echo base_url() . 'ngadimin/laporan/lap_user/download/' . $lap_user['filename']; ?>"><i class="fa fa-download"></i> Download</a>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <?php $this->load->view("ngadimin/_partials/footer.php") ?>

        <!-- /#wrapper -->

        <?php $this->load->view("ngadimin/_partials/modal.php") ?>

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>

    </body>

</html>
