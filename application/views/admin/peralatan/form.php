<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Peralatan</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/peralatan/'.$aksi) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kode Alat</label>
                            <input type="text" class="form-control" name="kode_alat" value="<?= $item['kode_alat'] ?>" placeholder="Kode Alat">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Alat</label>
                            <input type="text" class="form-control" name="nama_alat" value="<?= $item['nama_alat'] ?>" placeholder="Nama Alat">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" class="form-control" name="merek" value="<?= $item['merek'] ?>" placeholder="Merek">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" value="<?= $item['ukuran'] ?>" placeholder="Ukuran">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Bahan</label>
                            <input type="text" class="form-control" name="bahan" value="<?= $item['bahan'] ?>" placeholder="Bahan">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected>Pilih Status</option>
                                <option <?php if($item['status']=="Baik") echo "selected"; ?> value="Baik">Baik</option>
                                <option <?php if($item['status']=="Buruk") echo "selected"; ?> value="Buruk">Buruk</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" value="<?= $item['jumlah'] ?>" placeholder="Jumlah">
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