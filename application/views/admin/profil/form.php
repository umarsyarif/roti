<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Profil</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/profil/update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Profil</label>
                            <textarea rows="4" class="form-control" name="profil" required><?= strip_tags($item['isi_teks_profil']) ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Visi</label>
                            <textarea rows="4" class="form-control" name="visi" required><?= strip_tags($item['isi_teks_visi']) ?></textarea>
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