<!DOCTYPE html>
<html>

    <head>

        <?php $this->load->view("ngadimin/_partials/head.php") ?>
        
        <?php foreach($grafik as $row){
            $category_name[] = $row->category_name;
            $jumlah[] = (float) $row->jumlah;
        }
        ?>

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
                            <h2 style="text-align: center;margin-bottom: 30px">welcome home <?php echo $this->session->userdata('name') ?></h2>
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
                    
                    <div>
                    <canvas id="canvas" width="1200" height="500"></canvas>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
                    <script>
 
                    var lineChartData = {
                        labels : <?php echo json_encode($category_name);?>,
                        datasets : [

                            {
                                fillColor: "rgba(60,141,188,0.9)",
                                strokeColor: "rgba(60,141,188,0.8)",
                                pointColor: "#3b8bba",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(152,235,239,1)",
                                data : <?php echo json_encode($jumlah);?>
                            }

                        ]
                    }
                    
//                    var lineChartData1 = {    
//                        options: [{
//                               title: [{
//                                    display: true,
//                                    text: 'Jumlah Produk Berdasar Kategori'
//                                    }],
//                               legend: [{
//                                    display: true,
//                                    labels: [{
//                                        fontColor: 'rgb(255, 99, 132)'
//                                        }]
//                                }]
//                            }
//                        ]
//
//                    }

                    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);

                    </script>
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
