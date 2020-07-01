<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Peralatan</h3>
            </div>
      		<div class="box-body">
      			<a href="<?= base_url('index.php/admin/peralatan/form') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Peralatan</a>
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th><center>Kode alat</center></th>
                        <th><center>Nama alat</center></th>
                        <th><center>Merek</center></th>
                        <th><center>Ukuran</center></th>
                        <th><center>Bahan</center></th>
                        <th><center>Status</center></th>
		                  	<th><center>Jumlah</center></th>
                        <th width="1%"></th>
		                </tr>
	                </thead>
	                <tbody>
                    <?php foreach ($row as $value) { ?>
	                	<tr>
                        <td><?= $value->kode_alat ?></td>
                        <td><?= ucwords($value->nama_alat) ?></td>
                        <td><?= ucwords($value->merek) ?></td>
                        <td><?= $value->ukuran ?></td>
                        <td><?= $value->bahan ?></td>
                        <td><center><?= $value->status ?></center></td>
	                  		<td><center><?= $value->jumlah ?></center></td>
                        <td nowrap>
                          <a href="<?= base_url('index.php/admin/peralatan/form/'.$value->kode_alat) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="<?= base_url('index.php/admin/peralatan/hapus/'.$value->kode_alat) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash"></i></a>
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