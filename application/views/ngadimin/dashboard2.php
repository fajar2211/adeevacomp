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
                    
                    <!--chart-->
                    <div class="row">
                    <div class="row col-md-12">
                    <div class="card row col-md-12">
                    <figure class="highcharts-figure">    
                    <div id="container"></div>
                    <?php foreach($grafik as $row){
                        $category_name[] = $row->category_name;
                        $jumlah[] = (float) $row->jumlah;
                    }
                    ?>  
                    </figure>
                    <script src="<?php echo base_url();?>html/highcharts/highcharts-8-0-4.css"></script>
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script type="text/javascript">
                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Produk Berdasar Kategori'
//                                align: 'left'
                            },
                            subtitle: {
                                text: 'Sumber: mediakomp'
//                                align: 'left'
                            },
                            xAxis: {
                                categories: <?php echo json_encode($category_name);?>,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Jumlah Produk (item)'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y} item</b></td></tr>',
//                                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Produk',
                                data: <?php echo json_encode($jumlah);?>
                            }]
                        });
                    </script>

                    </div>
                    
                    <div class="card row col-md-12">
                    <figure class="highcharts-figure">    
                    <div id="container1"></div>
                    <?php foreach($grafiksub as $row){
                        $sub_category_name[] = $row->sub_category_name;
                        $jml[] = (float) $row->jml;
                    }
                    ?>  
                    </figure>
                    <script src="<?php echo base_url();?>html/highcharts/highcharts-8-0-4.css"></script>
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script type="text/javascript">
                        Highcharts.chart('container1', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Produk Berdasar Sub Kategori'
//                                align: 'left'
                            },
                            subtitle: {
                                text: 'Sumber: mediakomp'
//                                align: 'left'
                            },
                            xAxis: {
                                categories: <?php echo json_encode($sub_category_name);?>,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Jumlah Produk (item)'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y} item</b></td></tr>',
//                                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Produk',
                                data: <?php echo json_encode($jml);?>
                            }]
                        });
                    </script>

                    </div>
                        
                    </div> 
                    </div>     
                    <!--end chart-->  
                </div>

            </div>
            
            <?php $this->load->view("ngadimin/_partials/footer.php") ?>
        </div>
        <!-- /#wrapper -->

        <!-- Core Scripts - Include with every page -->
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

    </body>

</html>
