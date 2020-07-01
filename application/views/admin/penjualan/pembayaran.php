<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Data Pembayaran</h3>
            </div>
      		<div class="box-body">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
        			<form role="form" action="<?= base_url() ?>index.php/admin/penjualan/update_pembayaran" method="post">
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <?php if($list[0]->status=="Lunas"){ ?>
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b><center>Telah Lunas</center></b>
                  </div>
                  <?php } ?>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label>Tanggal Jual</label>
                          <input type="text" class="form-control" name="tgl_jual" value="<?= $control->tgl_indo($item[0]['tgl_jual']) ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label>Kode Jual</label>
                          <input type="text" class="form-control" name="kode_beli" value="<?= $item[0]['kode_beli'] ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label>Nama Pelanggan</label>
                          <input type="text" class="form-control" name="nama_pelanggan" value="<?= $item[0]['nama_pelanggan'] ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" class="form-control" name="nama_produk" value="<?= ucwords($item[0]['nama_produk']) ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Harga Satuan</label>
                          <input type="text" class="form-control" name="harga_satuan" value="<?= $control->tgl_indo($item[0]['harga_satuan']) ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Jumalah Qty</label>
                          <input type="text" class="form-control" name="jumlah_produk" value="<?= $control->tgl_indo($item[0]['jumlah_produk']) ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Harga Jual</label>
                          <input type="text" class="form-control" name="harga_jual" value="<?= $item[0]['harga_jual'] ?>" disabled>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label>Bukti Pembayaran</label>
                          <div>
                            <a href="<?= base_url().$list[0]->bukti ?>" target="_blank"><img src="<?= base_url().$list[0]->bukti ?>" height="150" width="100"></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label>Status Pembayaran</label>
                          <select name="status" class="form-control">
                              <option value="" disabled selected>Pilih Status</option>
                              <option <?php if($list[0]->status=="") echo "selected"; ?> value="">Belum Lunas</option>
                              <option <?php if($list[0]->status=="Lunas") echo "selected"; ?> value="Lunas">Lunas</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="box-footer text-center">
                          <a class="btn btn-danger" href="<?= base_url() ?>index.php/admin/penjualan">Cancel</a>
                          <button type="submit" class="btn btn-info">Simpan</button>
                      </div>
                  </div>
              </form>
            </div>
      		</div>
  		</div>
	</div>
</div>