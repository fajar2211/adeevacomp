<!-- ============ MODAL ADD CAROUSEL =============== -->

<div class="modal fade" id="modal_add_carousel" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Carousel</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'ngadimin/master/carousel/simpan_carousel' ?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Carousel</label>
                        <div class="col-xs-8">
                            <input name="carousel_name" class="form-control-file" type="file" placeholder="Nama Carousel" required>
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

<!--END MODAL ADD MANUFACTURER-->

<!--MODAL EDIT MANUFACTURER-->

<?php
foreach ($carousel as $row):
    $carousel_id = $row['carousel_id'];
    $aktif = $row['aktif'];
//    $ngadimin_role_id = $row['ngadimin_role_id'];
//    $username = $row['username'];
//    $password = $row['password'];
//    $name = $row['name'];
//    $email = $row['email'];
    ?>
    <div class="modal fade" id="modal_edit_carousel<?php echo $row['carousel_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Ubah Pabrikan</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'ngadimin/master/carousel/edit_carousel' ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >ID Carousel</label>
                            <div class="col-xs-8">
                                <input name="carousel_id" value="<?php echo $row['carousel_id']; ?>" class="form-control" type="text" placeholder="ID Pabrikan" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Carousel</label>
                            <div class="col-xs-8">
                                <input name="carousel_name" class="form-control-file" type="file" placeholder="Nama Carousel">
                                <input type="hidden" name="old_carousel" value="<?php echo ($row['carousel_name']); ?>" />
                                
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
<!--    
 Delete Confirmation
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
END MODAL

MODAL EDIT PRODUK AKTIF

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
    END MODAL
    
<script type="text/javascript" src="<?php echo base_url() . 'html/assets/jquery/jquery.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'html/assets/bootstrap.js' ?>"></script>  
<script type="text/javascript">
    $(document).ready(function(){
        $('#category_id').change(function(){
            var id_category=$(this).val();
            $.ajax({
                url : "<?php echo base_url(); ?>ngadimin/master/subcategory/getSubCategory",
                method : "POST",
                data : {id_category: id_category},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].sub_category_id+'>'+data[i].sub_category_name+'</option>';
                    }
                    $('.sub_category_id').html(html);
                     
                }
            });
        });
    });
</script>-->
