<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Layanan</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/layanan/update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Layanan Konsumen</label>
                            <textarea rows="4" class="form-control" name="konsumen" required><?= strip_tags($item['isi_layanan_konsumen']) ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Layanan Pemesanan</label>
                            <textarea rows="4" class="form-control" name="pemesanan" required><?= strip_tags($item['isi_pemesanan']) ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="box-footer text-center">
                            <button type="button" class="btn btn-danger" onclick="history.go(-1);">Cancel</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
      		</div>
  		</div>
	</div>
</div>