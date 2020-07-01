<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Peralatan</h3>
            </div>
      		<div class="box-body">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
          			<form role="form" action="<?= base_url() ?>index.php/user/pemesanan/insert" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Produk</label>
                                <select name="kode_produk" id="kode_produk" class="form-control">
                                    <option value="" disabled selected>Pilih Produk</option>
                                    <?php foreach ($list_produk as $key => $value) { ?>
                                        <option value="<?= $value->kode_produk ?>"><?= $value->nama_produk ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jumlah Qty</label>
                                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Qty">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="box-footer text-center">
                                <button type="button" class="btn btn-danger" onclick="history.go(-1);">Cancel</button>
                                <button type="submit" class="btn btn-success">Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
      		</div>
  		</div>
	</div>
</div>
<script>
    $('#kode_produk').on('change',function(){
        var kode_produk = $(this).val();
        if(kode_produk){

            $.ajax({
                type:'POST',
                url: "<?php echo base_url()  ?>index.php/user/pemesanan/ajax_produk",
                data:'kode_produk='+kode_produk,
                success:function(html){
                    var json = html,
                    isi = JSON.parse(json);
                    $('#harga_satuan').val(isi.harga);
                }
            });
        }
    });
</script>