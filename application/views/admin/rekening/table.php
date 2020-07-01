<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Rekening</h3>
            </div>
      		<div class="box-body">
      			<a href="<?= base_url('index.php/admin/rekening/form') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Rekening</a>
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th><center>Nama Bank</center></th>
                        <th><center>Nomor Rekening</center></th>
                        <th><center>Atas Nama</center></th>
                        <th width="1%"></th>
		                </tr>
	                </thead>
	                <tbody>
                    <?php foreach ($row as $value) { ?>
	                	<tr>
                        <td><?= $value->nm_bank ?></td>
                        <td><?= $value->no_rek ?></td>
                        <td><?= $value->an ?></td>
                        <td nowrap>
                          <a href="<?= base_url('index.php/admin/rekening/form/'.$value->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="<?= base_url('index.php/admin/rekening/hapus/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash"></i></a>
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