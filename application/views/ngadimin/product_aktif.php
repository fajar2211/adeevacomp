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
                    <h2 style="text-align: center;margin-bottom: 30px">Katalog Produk</h2>
                    <!--datatables-->

                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Tgl Update</th>
                                    <th>Status</th>


                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productaktif as $productaktif): ?>
                                    <tr>
                                        <td width="150" align="center">
                                            <?php echo $productaktif['product_code'] ?>
                                        </td>
                                        <td  width="350">
                                            <?php echo $productaktif['name'] ?>
                                        </td>
                                        <td width="100" align="right">
                                            <?php echo 'Rp. ' . number_format($productaktif['price'], '2', ',', '.') ?>
                                        </td>
                                        <td width="100" align="center">
                                            <?php echo $productaktif['quantity'] ?>
                                        </td>
                                        <td width="150" align="center">
                                            <?php echo $productaktif['date_modified_qty'] ?>
                                        </td>
                                        <td width="150" align="center">
                                            <?php if ($productaktif['status_id'] === '1') {
                                                echo '<button class="btn btn-success")>READY</button>' ?>
                                            <?php } else { ?>
                                                <?php echo '<button class="btn btn-danger")>OUT OF STOCK</button>' ?>
                                            <?php } ?>	
                                        </td>



                                        <td width="150" align="center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $productaktif['product_code']; ?>"> Edit</a>

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
