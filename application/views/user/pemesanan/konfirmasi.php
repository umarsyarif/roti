<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Konfirmasi Pembayaran</h3>
            </div>
      		<div class="box-body">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
          			<form role="form" action="<?= base_url() ?>index.php/user/pemesanan/transfer" method="post" enctype="multipart/form-data">
                        <p>Pilih Transfer Ke Rekening Dibawah Ini :<br>
                            <?php foreach ($list_rekening as $key => $value) {
                                echo $value->nm_bank.' : '.$value->no_rek.' a/n '.$value->an.'<br>';
                            } ?></p>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Foto resi transfer</label>
                                <input type="file" name="bukti" accept="image/*">
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
</div>