<html>
    <head>
      <!--<title>Form Import</title>-->
        <?php $this->load->view("ngadimin/_partials/head.php") ?>
        <!-- Load File jquery.min.js yang ada difolder js -->
        <!--<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>-->

        <script>
            $(document).ready(function () {
                // Sembunyikan alert validasi kosong
                $("#kosong").hide();
            });
        </script>
    </head>
    <body>
        <?php $this->load->view("ngadimin/_partials/navbar.php") ?>
        <?php $this->load->view("ngadimin/_partials/sidebar.php") ?>
        <!--  <h3>Form Import</h3>
          <hr>-->
        <div id="wrapper" >
            <div id="page-wrapper">
                <div class="col-md-12">
                    <h2 style="text-align: center;margin-bottom: 30px">Import Produk</h2>
                    <div class="card-header">
                        <a class="btn btn-sm btn-info" href="<?php echo base_url("upload/product/format.xlsx"); ?>">Download Format</a>
                    </div>
                    <!--  <br>
                      <br>
                    -->
                    <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  
                    <form class="form-inline" method="post" action="<?php echo base_url("ngadimin/product/form"); ?>" enctype="multipart/form-data">
                        <!-- 
                        -- Buat sebuah input type file
                        -- class pull-left berfungsi agar file input berada di sebelah kiri
                        -->
                        <div class="form-group">
                        <input type="file" name="file">
                        </div>
                        <!--
                        -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                        -->
                        <div class="form-group">
                        <input type="submit" name="preview" value="Preview">
                        </div>                            
                    </form>
                
        <?php
        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form 
            if (isset($upload_error)) { // Jika proses upload gagal
                echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
                die; // stop skrip
            }

            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='" . base_url("ngadimin/product/import") . "'>";

            // Buat sebuah div untuk alert validasi kosong
            echo "<div style='color: red;' id='kosong'>
            Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
            </div>";
                    echo "<table border='1' cellpadding='8'>
            <tr>
              <th colspan='20'>Preview Data</th>
            </tr>
            <tr>
              <th>Product Code</th>
              <th>Manufacturer ID</th>
              <th>Category ID</th>
              <th>Sub Category ID</th>
              <th>Status ID</th>
              <th>Kondisi ID</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Berat</th>
              <th>Stok</th>
              <th>Deskripsi</th>
              <th>Image1</th>
              <th>Image2</th>
              <th>Image3</th>
              <th>Image4</th>
              <th>Image5</th>
              <th>Link Tokopedia</th>
              <th>Link Bukalapak</th>
              <th>Link Shopee</th>
              <th>Aktif</th>
            </tr>";

            $numrow = 1;
            $kosong = 0;

            // Lakukan perulangan dari data yang ada di excel
            // $sheet adalah variabel yang dikirim dari controller
            foreach ($sheet as $row) {
                // Ambil data pada excel sesuai Kolom
                $product_code = $row['A']; // Ambil data NIS
                $manufacturer_id = $row['B']; // Ambil data nama
                $category_id = $row['C']; // Ambil data jenis kelamin
                $sub_category_id = $row['D']; // Ambil data alamat
                $status_id = $row['E']; // Ambil data NIS
                $condition_id = $row['F']; // Ambil data nama
                $name = $row['G']; // Ambil data jenis kelamin
                $price = $row['H']; // Ambil data alamat
                $weight = $row['I']; // Ambil data NIS
                $quantity = $row['J']; // Ambil data nama
                $description = $row['K']; // Ambil data jenis kelamin
                $image1 = $row['L']; // Ambil data alamat
                $image2 = $row['M']; // Ambil data alamat
                $image3 = $row['N']; // Ambil data alamat
                $image4 = $row['O']; // Ambil data alamat
                $image5 = $row['P']; // Ambil data alamat
                $link_tokopedia = $row['Q']; // Ambil data alamat
                $link_bukalapak = $row['R']; // Ambil data alamat
                $link_shopee = $row['S']; // Ambil data alamat
                $aktif = $row['T']; // Ambil data alamat
                // Cek jika semua data tidak diisi
                if ($product_code == "" && $manufacturer_id == "" && $category_id == "" && $sub_category_id == "" && $status_id == "" && $condition_id == "" && $name == "" && $price == "" && $weight == "" && $quantity == "" && $description == "" && $image1 == "" && $image2 == "" && $image3 == "" && $image4 == "" && $image5 == "" && $link_tokopedia == "" && $link_bukalapak == "" && $link_shopee == "" && $aktif == "") {
                    continue;
                } // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                    $product_code_td = (!empty($product_code)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $manufacturer_id_td = (!empty($manufacturer_id)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $category_id_td = (!empty($category_id)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $sub_category_id_td = (!empty($sub_category_id)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                    $status_id_td = (!empty($status_id)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $condition_id_td = (!empty($condition_id)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $name_td = (!empty($name)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $price_td = (!empty($price)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                    $weight_td = (!empty($weight)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $quantity_td = (!empty($quantity)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $description_td = (!empty($description)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $image1_td = (!empty($image1)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                    $image2_td = (!empty($image2)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $image3_td = (!empty($image3)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $image4_td = (!empty($image4)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $image5_td = (!empty($image5)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                    $link_tokopedia_td = (!empty($link_tokopedia)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $link_bukalapak_td = (!empty($link_bukalapak)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $link_shopee_td = (!empty($link_shopee)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $aktif_td = (!empty($aktif)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                    // Jika salah satu data ada yang kosong
                    if ($product_code == "" or $manufacturer_id == "" or $category_id == "" or $sub_category_id == "" or $status_id == "" or $condition_id == "" or $name == "" or $price == "" or $weight == "" or $quantity == "" or $description == "" or $image1 == "" or $image2 == "" or $image3 == "" or $image4 == "" or $image5 == "" or $link_tokopedia == "" or $link_bukalapak == "" or $link_shopee == "" or $aktif == "") {
                        $kosong++; // Tambah 1 variabel $kosong
                    }

                    echo "<tr>";
                    echo "<td" . $product_code_td . ">" . $product_code . "</td>";
                    echo "<td" . $manufacturer_id_td . ">" . $manufacturer_id . "</td>";
                    echo "<td" . $category_id_td . ">" . $category_id . "</td>";
                    echo "<td" . $sub_category_id_td . ">" . $sub_category_id . "</td>";
                    echo "<td" . $status_id_td . ">" . $status_id . "</td>";
                    echo "<td" . $condition_id_td . ">" . $condition_id . "</td>";
                    echo "<td" . $name_td . ">" . $name . "</td>";
                    echo "<td" . $price_td . ">" . $price . "</td>";
                    echo "<td" . $weight_td . ">" . $weight . "</td>";
                    echo "<td" . $quantity_td . ">" . $quantity . "</td>";
                    echo "<td" . $description_td . ">" . $description . "</td>";
                    echo "<td" . $image1_td . ">" . $image1 . "</td>";
                    echo "<td" . $image2_td . ">" . $image2 . "</td>";
                    echo "<td" . $image3_td . ">" . $image3 . "</td>";
                    echo "<td" . $image4_td . ">" . $image4 . "</td>";
                    echo "<td" . $image5_td . ">" . $image5 . "</td>";
                    echo "<td" . $link_tokopedia_td . ">" . $link_tokopedia . "</td>";
                    echo "<td" . $link_bukalapak_td . ">" . $link_bukalapak . "</td>";
                    echo "<td" . $link_shopee_td . ">" . $link_shopee . "</td>";
                    echo "<td" . $aktif_td . ">" . $aktif . "</td>";
                    echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
            }

            echo "</table>";

            // Cek apakah variabel kosong lebih dari 0
            // Jika lebih dari 0, berarti ada data yang masih kosong
            if ($kosong > 0) {
                ?>  
                <script>
                    $(document).ready(function () {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
            <?php
                } else { // Jika semua data sudah diisi
                    echo "<hr>";

                    // Buat sebuah tombol untuk mengimport data ke database
                    echo "<button type='submit' name='import'>Import</button>";
                    echo "<a href='" . base_url("ngadimin/product") . "'>Cancel</a>";
                }

                echo "</form>";
            }
            ?>
                </div>
            </div>
        </div>
        <?php $this->load->view("ngadimin/_partials/js.php") ?>

</body>

