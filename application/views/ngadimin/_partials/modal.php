<!-- ============ MODAL ADD PRODUK =============== -->

<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Produk</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'ngadimin/product/simpan_product_all' ?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Produk</label>
                        <div class="col-xs-8">
                            <input name="product_code" class="form-control" type="text" placeholder="Kode Produk" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pabrikan</label>
                        <div class="col-xs-8">
                            <select required name="manufacturer_id" class="form-control">
                                <option value="" selected>-- Pilih --</option>

                                <?php foreach ($manufacturer as $row): { ?>
                                        <option value="<?php echo $row['manufacturer_id']; ?>"><?php echo $row['manufacturer_name']; ?></option>
                                    <?php } endforeach; ?>

                            </select>                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($category as $row): { ?>
                                        <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                    <?php } endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Sub Kategori</label>
                        <div class="col-xs-8">
                            <select name="sub_category_id" class="sub_category_id form-control">
                                <option value="" selected>-- Pilih --</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Produk</label>
                        <div class="col-xs-8">
                            <input name="name" class="form-control" type="text" placeholder="Nama Produk" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-8">
                            <input name="price" class="form-control" type="text" placeholder="Harga" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Berat</label>
                        <div class="col-xs-8">
                            <input name="weight" class="form-control" type="text" placeholder="Berat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Deskripsi</label>
                        <div class="col-xs-8">
                            <textarea name="description" class="form-control" type="text" placeholder="" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image 1</label>
                        <div class="col-xs-8">
                            <input name="image1" class="form-control-file" type="file" placeholder="Image1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image 2</label>
                        <div class="col-xs-8">
                            <input name="image2" class="form-control-file" type="file" placeholder="Image2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image 3</label>
                        <div class="col-xs-8">
                            <input name="image3" class="form-control-file" type="file" placeholder="Image3" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image 4</label>
                        <div class="col-xs-8">
                            <input name="image4" class="form-control-file" type="file" placeholder="Image4" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image 5</label>
                        <div class="col-xs-8">
                            <input name="image5" class="form-control-file" type="file" placeholder="Image5" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Tokopedia</label>
                        <div class="col-xs-8">
                            <input name="link_tokopedia" class="form-control" type="text" placeholder="Link Tokopedia" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Bukalapak</label>
                        <div class="col-xs-8">
                            <input name="link_bukalapak" class="form-control" type="text" placeholder="Link Bukalapak" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Shopee</label>
                        <div class="col-xs-8">
                            <input name="link_shopee" class="form-control" type="text" placeholder="Link Shopee" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-8">
                            <select required name="status_id" class="form-control">
                                <option value="">-- Pilih --</option>

                                <option value="0">OUT OF STOCK</option>
                                <option value="1">READY</option>

                            </select>          
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-8">
                            <input name="quantity" class="form-control" type="text" placeholder="Stok" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kondisi</label>
                        <div class="col-xs-8">
                            <select required name="condition_id" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="1">Baru</option>
                                <option value="0">Bekas</option>
                            </select>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Aktif</label>
                        <div class="col-xs-8">
                            <select required name="aktif" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="1">TRUE</option>
                                <option value="0">FALSE</option>
                            </select>  
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--END MODAL ADD PRODUK-->

<!--MODAL EDIT PRODUK ALL-->

<?php
foreach ($product as $productall):
    $status_id = $productall['status_id'];
    $aktif = $productall['aktif'];
    $condition_id = $productall['condition_id'];
    ?>
    <div class="modal fade" id="modal_edit_all<?php echo $productall['product_code']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Ubah Produk</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'ngadimin/product/edit_product_all' ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Produk</label>
                            <div class="col-xs-8">
                                <input name="product_code" value="<?php echo $productall['product_code']; ?>" class="form-control" type="text" placeholder="Kode Produk" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Pabrikan</label>
                            <div class="col-xs-8">
                                <select required name="manufacturer_id" class="form-control">
                                    <option value="" selected>-- Pilih --</option>

                                    <?php foreach ($manufacturer as $row): ?>
                                        <?php if ($row['manufacturer_id'] == $productall['manufacturer_id']) { ?>
                                            <option value="<?php echo $row['manufacturer_id']; ?>" selected="selected"><?php echo $row['manufacturer_name']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['manufacturer_id']; ?>" > <?php echo $row['manufacturer_name']; ?></option>
                                        <?php } endforeach; ?>

                                </select>                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-8">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" selected>-- Pilih --</option>
                                    <?php foreach ($category as $row): ?>
                                        <?php if ($row['category_id'] == $productall['category_id']) { ?>
                                            <option value="<?php echo $row['category_id']; ?>" selected="selected"><?php echo $row['category_name']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['category_id']; ?>" > <?php echo $row['category_name']; ?></option>
                                        <?php } endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Sub Kategori</label>
                            <div class="col-xs-8">
                                <select name="sub_category_id" class="sub_category_id form-control">
                                    <option value="" selected>-- Pilih --</option>
                                    <?php foreach ($subcategory as $row): ?>
                                        <?php if ($row['sub_category_id'] == $productall['sub_category_id']) { ?>
                                            <option value="<?php echo $row['sub_category_id']; ?>" selected="selected"><?php echo $row['sub_category_name']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['sub_category_id']; ?>" > <?php echo $row['sub_category_name']; ?></option>
                                        <?php } endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Produk</label>
                            <div class="col-xs-8">
                                <input name="name" value="<?php echo $productall['name']; ?>" class="form-control" type="text" placeholder="Nama Produk">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga</label>
                            <div class="col-xs-8">
                                <input name="price" value="<?php echo $productall['price']; ?>" class="form-control" type="text" placeholder="Harga">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Berat</label>
                            <div class="col-xs-8">
                                <input name="weight" value="<?php echo ($productall['weight']); ?>" class="form-control" type="text" placeholder="Berat" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Deskripsi</label>
                            <div class="col-xs-8">
                                <textarea name="description" class="form-control" type="text" placeholder="" ><?php echo ($productall['description']); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Image 1</label>
                            <div class="col-xs-8">
                                <input name="image1" class="form-control-file" type="file" placeholder="Image1" >
                                <input type="hidden" name="old_image1" value="<?php echo ($productall['image1']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Image 2</label>
                            <div class="col-xs-8">
                                <input name="image2" class="form-control-file" type="file" placeholder="Image2" >
                                <input type="hidden" name="old_image2" value="<?php echo ($productall['image2']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Image 3</label>
                            <div class="col-xs-8">
                                <input name="image3" class="form-control-file" type="file" placeholder="Image3" >
                                <input type="hidden" name="old_image3" value="<?php echo ($productall['image3']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Image 4</label>
                            <div class="col-xs-8">
                                <input name="image4" class="form-control-file" type="file" placeholder="Image4" >
                                <input type="hidden" name="old_image4" value="<?php echo ($productall['image4']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Image 5</label>
                            <div class="col-xs-8">
                                <input name="image5" class="form-control-file" type="file" placeholder="Image5" >
                                <input type="hidden" name="old_image5" value="<?php echo ($productall['image5']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Link Tokopedia</label>
                            <div class="col-xs-8">
                                <input name="link_tokopedia" value="<?php echo ($productall['link_tokopedia']); ?>" class="form-control" type="text" placeholder="Link Tokopedia" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Link Bukalapak</label>
                            <div class="col-xs-8">
                                <input name="link_bukalapak" value="<?php echo ($productall['link_bukalapak']); ?>" class="form-control" type="text" placeholder="Link Bukalapak" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Link Shopee</label>
                            <div class="col-xs-8">
                                <input name="link_shopee" value="<?php echo ($productall['link_shopee']); ?>" class="form-control" type="text" placeholder="Link Shopee" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Status</label>
                            <div class="col-xs-8">
                                <select required name="status_id">
                                    <option value="">-- Pilih --</option>
                                    <?php if ($status_id == '0'): ?>  
                                        <option value="0" selected>OUT OF STOCK</option>
                                        <option value="1">READY</option>
                                    <?php elseif ($status_id == '1'): ?>
                                        <option value="0">OUT OF STOCK</option>
                                        <option value="1" selected="">READY</option>
                                    <?php endif; ?>
                                </select>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-8">
                                <input name="quantity" value="<?php echo $productall['quantity'] ?>" class="form-control" type="text" placeholder="Stok" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kondisi</label>
                            <div class="col-xs-8">
                                <select required name="condition_id" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php if ($condition_id == '1'): ?> 
                                        <option value="1" selected>Baru</option>
                                        <option value="0">Bekas</option>
                                    <?php elseif ($condition_id == '0'): ?>
                                        <option value="1">Baru</option>
                                        <option value="0" selected>Bekas</option>
                                    <?php endif; ?>
                                </select>  
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Aktif</label>
                            <div class="col-xs-8">
                                <select required name="aktif" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php if ($aktif == '0'): ?> 
                                        <option value="1">TRUE</option>
                                        <option value="0" selected>FALSE</option>
                                    <?php elseif ($aktif == '1'): ?>
                                        <option value="1" selected>TRUE</option>
                                        <option value="0">FALSE</option>
                                    <?php endif; ?>
                                </select>  
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--END MODAL-->

<!-- Delete Confirmation-->
<?php foreach ($product as $productall): ?>
    <div class="modal fade" id="modal_delete_all<?php echo $productall['product_code']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Hapus Produk</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'ngadimin/product/hapus_product_all' ?>">
                    <div class="modal-body">Apakah yakin dihapus ?</div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
<?php endforeach; ?>
<!--END MODAL-->

<!--MODAL EDIT PRODUK AKTIF-->

<?php
foreach ($productaktif as $productaktif):
    $status_id = $productaktif['status_id'];
    ?>
    <div class="modal fade" id="modal_edit<?php echo $productaktif['product_code']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Ubah Produk</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'ngadimin/product_aktif/edit_product_aktif' ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Produk</label>
                            <div class="col-xs-8">
                                <input name="product_code" value="<?php echo $productaktif['product_code']; ?>" class="form-control" type="text" placeholder="Kode Produk" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Produk</label>
                            <div class="col-xs-8">
                                <input name="name" value="<?php echo $productaktif['name']; ?>" class="form-control" type="text" placeholder="Nama Produk" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga</label>
                            <div class="col-xs-8">
                                <input name="price" value="<?php echo $productaktif['price']; ?>" class="form-control" type="text" placeholder="Harga">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Status</label>
                            <div class="col-xs-8">
                                <select required name="status_id">
                                    <option value="">-- Pilih --</option>
    <?php if ($status_id == '0'): ?>  
                                        <option value="0" selected>OUT OF STOCK</option>
                                        <option value="1">READY</option>
    <?php elseif ($status_id == '1'): ?>
                                        <option value="0">OUT OF STOCK</option>
                                        <option value="1" selected="">READY</option>
    <?php endif; ?>
                                </select>          
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-8">
                                <input name="quantity" value="<?php echo $productaktif['quantity'] ?>" class="form-control" type="text" placeholder="Stok" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--END MODAL-->

<script type="text/javascript" src="<?php echo base_url() . 'html/assets/jquery/jquery.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'html/assets/bootstrap.js' ?>"></script>  
<script type="text/javascript">
    $(document).ready(function () {
        $('#category_id').change(function () {
            var id_category = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>ngadimin/master/subcategory/getSubCategory",
                method: "POST",
                data: {id_category: id_category},
                async: false,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].sub_category_id + '>' + data[i].sub_category_name + '</option>';
                    }
                    $('.sub_category_id').html(html);

                }
            });
        });
    });
</script>
