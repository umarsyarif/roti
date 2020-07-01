<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Form Rekening</h3>
            </div>
      		<div class="box-body">
      			<form role="form" action="<?= base_url('index.php/admin/rekening/'.$aksi) ?>" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input type="text" class="form-control" name="nm_bank" value="<?= $item['nm_bank'] ?>" placeholder="Nama Bank">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" name="no_rek" value="<?= $item['no_rek'] ?>" placeholder="Nomor Rekening">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input type="text" class="form-control" name="an" value="<?= $item['an'] ?>" placeholder="Nomor Rekening">
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