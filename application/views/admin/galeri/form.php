<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Galeri</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/galeri/'.$aksi) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="foto_lama" value="<?= $item['foto'] ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Foto</label>
                            <input type="text" class="form-control" name="nama_foto" value="<?= $item['nama_foto'] ?>" placeholder="Nama Foto">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" accept="image/*">
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