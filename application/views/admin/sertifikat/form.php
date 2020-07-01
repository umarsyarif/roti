<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Sertifikat</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/sertifikat/'.$aksi) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="logo_lama" value="<?= $item['logo'] ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?= $item['judul'] ?>" placeholder="Judul">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="logo" accept="image/*">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea rows="4" class="form-control" name="keterangan" required><?= strip_tags($item['keterangan']) ?></textarea>
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