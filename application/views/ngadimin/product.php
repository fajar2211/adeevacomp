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
                    <div class="card-header">
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Add New</a>
                        <a class="btn btn-sm btn-success" href="<?php echo base_url("ngadimin/product/form"); ?>">Add Banyak Produk</a><br><br>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Kondisi</th>
                                    <th>Stok</th>
                                    <th>Tgl Update</th>
                                    <th>Aktif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($product as $productall): ?>
                                    <tr>
                                        <td width="150" align="center">
                                            <?php echo $productall['product_code'] ?>
                                        </td>
                                        <td  width="300">
                                            <?php echo $productall['name'] ?>
                                        </td>
                                        <td width="150" align="right">
                                            <?php echo 'Rp. ' . number_format($productall['price'], '2', ',', '.') ?>
                                        </td>
                                        <td width="150" align="center">
                                            <?php echo $productall['status'] ?>
                                        </td>
                                        <td width="150" align="center">
                                            <?php echo $productall['condition'] ?>
                                        </td>
                                        <td width="100" align="center">
                                            <?php echo $productall['quantity'] ?>
                                        </td>
                                        <td width="150" align="center">
                                            <?php echo $productall['date_modified_qty'] ?>
                                        </td>
                                        <td width="50" align="center">
                                            <?php echo $productall['aktif'] ?>
                                        </td>

                                        <td width="150" align="center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit_all<?php echo $productall['product_code']; ?>"> Edit</a>
                                            <!--<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_all<?php echo $productall['product_code']; ?>"> Hapus</a>-->    
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
//                "pageLength": 50;
            });
        </script>

    </body>

</html>
