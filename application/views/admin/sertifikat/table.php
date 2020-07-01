<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Sertifikat</h3>
            </div>
      		<div class="box-body">
      			<a href="<?= base_url('index.php/admin/sertifikat/form') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Sertifikat</a>
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th width="20%"><center>Logo</center></th>
                        <th><center>Judul</center></th>
		                  	<th><center>Keterangan</center></th>
                        <th width="1%"></th>
		                </tr>
	                </thead>
	                <tbody>
                    <?php foreach ($row as $value) { ?>
	                	<tr>
	                  		<td><center><img src="<?= base_url().$value->logo ?>" height="100" width="60"></center></td>
                        <td><?= $value->judul ?></td>
	                  		<td><?= $value->keterangan ?></td>
                        <td nowrap>
                          <a href="<?= base_url('index.php/admin/sertifikat/form/'.$value->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="<?= base_url('index.php/admin/sertifikat/hapus/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash"></i></a>
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