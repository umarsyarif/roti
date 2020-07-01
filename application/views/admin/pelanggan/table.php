<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Pelanggan</h3>
            </div>
      		<div class="box-body">
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th><center>Nama Pelanggan</center></th>
                        <th><center>Alamat Pelanggan</center></th>
                        <th><center>No HP</center></th>
                        <th><center>Email</center></th>
                        <th><center>Kategori</center></th>
                        <th width="1%"></th>
		                </tr>
	                </thead>
	                <tbody>
                    <?php foreach ($row as $value) { ?>
	                	<tr>
                        <td><?= ucwords($value->nama_pelanggan) ?></td>
                        <td><?= ucwords($value->alamat_pelanggan) ?></td>
                        <td><?= $value->no_hp ?></td>
                        <td><?= $value->email ?></td>
                        <td><?= $value->kategori ?></td>
                        <td nowrap>
                          <a href="<?= base_url('index.php/admin/pelanggan/hapus/'.$value->id_pelanggan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash"></i></a>
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
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
  });
</script>