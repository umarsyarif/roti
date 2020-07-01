<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Produk</h3>
            </div>
      		<div class="box-body">
      			<a href="<?= base_url('index.php/admin/produk/form') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Produk</a>
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th><center>Kode Produk</center></th>
                        <th><center>Nama Produk</center></th>
                        <th><center>Harga Produk</center></th>
                        <th><center>Keterangan</center></th>
		                  	<th><center>Gambar</center></th>
                        <th width="1%"></th>
		                </tr>
	                </thead>
	                <tbody>
                    <?php foreach ($row as $value) { ?>
	                	<tr>
                        <td><?= $value->kode_produk ?></td>
                        <td><?= $value->nama_produk ?></td>
                        <td>Rp <?= $value->harga ?></td>
	                  		<td><?= $value->keterangan ?></td>
                        <td><center><img src="<?= base_url().$value->gambar ?>" height="100" width="60"></center></td>
                        <td nowrap>
                          <a href="<?= base_url('index.php/admin/produk/form/'.$value->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="<?= base_url('index.php/admin/produk/hapus/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash"></i></a>
                        </td>
	              		</tr>
                    <?php } ?>
	                </tbody>
              </table>          
      		</div>
  		</div>
	</div>
</div>
<script>
  $(function () {
    $('#tables').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
  });
</script>