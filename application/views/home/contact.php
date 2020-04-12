<!DOCTYPE html>
<html lang="en">

    <head>

        <?php $this->load->view("home/_partials2/head.php") ?>

    </head>

    <body>

        <!-- Navigation -->
        <?php $this->load->view("home/_partials2/navbar.php") ?>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-12 mb-3 my-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-fw fa-user"></i> Kontak Kami
                        </div>

                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
                              integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
                              crossorigin=""/>

                        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
                                integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
                            accesskey=""crossorigin=""></script>

                        <div class="row">
                            <div class="col-md-12">
                                <div id="mapid" style='width: 500; height: 500px;'></div>
                            </div><hr>
                            <div class="card-body">
                                <?php foreach ($address as $row) : ?>
                                <div class="col-md-12">
                                    <br><p>Toko Offline :<br>
                                        <?php echo $row['shopname'] ?><br>
                                        <?php echo $row['address'] ?><br>
                                        <?php echo $row['contact'] ?><br>
                                        <!--Website : <a href="http://adeevacomp.com/">www.adeevacomp.com</a>-->
                                    </p>
                                    <br><p>Toko Online :<br>
                                        Tokopedia : <a href="<?php echo $row['url_tokopedia'] ?>"><?php echo $row['url_tokopedia'] ?></a><br>
                                        Bukalapak : <a href="<?php echo $row['url_bukalapak'] ?>"><?php echo $row['url_bukalapak'] ?></a><br>
                                        Shopee    : <a href="<?php echo $row['url_shopee'] ?>"><?php echo $row['url_shopee'] ?></a></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <?php $this->load->view("home/_partials2/footer.php") ?>

        <!-- Bootstrap core JavaScript -->
        <?php $this->load->view("home/_partials2/js.php") ?>
        
        <?php foreach ($address as $row) : ?>
        <script type="text/javascript">
//            var map = L.map('mapid').setView([-7.84454, 110.40021], 17);
            var map = L.map('mapid').setView([<?php echo $row['koordinat_x'] ?>, <?php echo $row['koordinat_y'] ?>], 17);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 50,
                id: 'mapbox/streets-v11',
                /*accessToken: 'pk.eyJ1IjoiZmFqYXIyMiIsImEiOiJjancxZ3FwbDYwNGl0M3lvOWpjYXo1ZGFuIn0.rHjNAIiBuPibjvL9knMEjw' */
                accessToken: 'pk.eyJ1IjoiZmFqYXIyMiIsImEiOiJjanc1cGdkZ2QxNGR1NGJxcnNqODI4dTkzIn0.N_v7NN6qao8y1D9QGWhpRg'
            }).addTo(map);
            
//            var marker = L.marker([-7.84454, 110.40021]).addTo(map);
//            marker.bindPopup("<b>Adeeva Computer</b>").openPopup();
            var marker = L.marker([<?php echo $row['koordinat_x'] ?>, <?php echo $row['koordinat_y'] ?>]).addTo(map);
            marker.bindPopup("<b><?php echo $row['shopname'] ?></b>").openPopup();
        </script>
        <?php endforeach; ?>
        
    </body>

</html>
