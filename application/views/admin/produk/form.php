<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Produk</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/produk/'.$aksi) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="gambar_lama" value="<?= $item['gambar'] ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kode Produk</label>
                            <input type="text" class="form-control" name="kode_produk" value="<?= $item['kode_produk'] ?>" placeholder="Kode Produk">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" value="<?= $item['nama_produk'] ?>" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="number" class="form-control" name="harga" value="<?= $item['harga'] ?>" placeholder="Harga Produk">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" accept="image/*">
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