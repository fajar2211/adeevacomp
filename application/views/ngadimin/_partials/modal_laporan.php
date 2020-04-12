<!-- ============ MODAL ADD PRODUK =============== -->
        
        <div class="modal fade" id="modal_add_new_laporan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Laporan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'ngadimin/laporan/all/simpan_laporan'?>" enctype="multipart/form-data">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >BLTH</label>
                        <div class="col-xs-8">
                            <input name="blth" class="form-control" type="date" placeholder="blth" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >User</label>
                        <div class="col-xs-8">
                        <select required name="ngadimin_id" class="form-control">
                           <option value="" selected>-- Pilih --</option>
                            
                            <?php foreach($user as $row): {?>
                                <option value="<?php echo $row['ngadimin_id'];?>"><?php echo $row['username'];?></option>
                            <?php } endforeach;?>
 
			</select>                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Filename</label>
                        <div class="col-xs-8">
                            <input name="filename" class="form-control-file" type="file" placeholder="filename" required>
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

    <?php foreach ($laporan as $lap): ?>
    <div class="modal fade" id="modal_edit_laporan<?php echo $lap['laporan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Ubah Laporan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'ngadimin/laporan/all/edit_laporan'?>" enctype="multipart/form-data">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >BLTH</label>
                        <div class="col-xs-8">
                            <input name="blth" value="<?php echo $lap['blth']; ?>" class="form-control" type="date" placeholder="blth" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >User</label>
                        <div class="col-xs-8">
                        <select required name="ngadimin_id" class="form-control" disabled>
                           <option value="" selected>-- Pilih --</option>
                            
                            <?php foreach($user as $row): ?>
                            <?php if($row['ngadimin_id']==$lap['ngadimin_id']) { ?>
                                <option value="<?php echo $row['ngadimin_id'];?>" selected="selected"><?php echo $row['username'];?></option>
                            <?php } else { ?>
                                      <option value="<?php echo $row['ngadimin_id'];?>" > <?php echo $row['username'];?></option>
                                    <?php } endforeach;?>
 
			</select>                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Filename</label>
                        <div class="col-xs-8">
                            <input name="filename" class="form-control-file" type="file" placeholder="filename" required>
                            <input type="hidden" name="old_file" value="<?php echo ($lap['filename']); ?>" />
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
<?php  endforeach;?>
    <!--END MODAL-->
    
<!-- Delete Confirmation-->
<?php foreach ($laporan as $lap): ?>
<div class="modal fade" id="modal_delete_laporan<?php echo $lap['laporan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Laporan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'ngadimin/laporan/all/hapus_laporan'?>">
                <div class="modal-body">Apakah yakin dihapus ?</div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div> 
            </div>
</div>
<?php  endforeach;?>
<!--END MODAL-->
    
<script type="text/javascript" src="<?php echo base_url().'html/assets/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'html/assets/bootstrap.js'?>"></script>  
<script type="text/javascript">
    $(document).ready(function(){
        $('#category_id').change(function(){
            var id_category=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>ngadimin/master/subcategory/getSubCategory",
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
</script>
