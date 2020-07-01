<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Layanan</h3>
            </div>
      		<div class="box-body">
      			<a href="<?= base_url('index.php/admin/layanan/form/'.$row->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th><center>Layanan Konsumen</center></th>
		                  	<th><center>Layanan Pemesanan</center></th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr>
	                  		<td><?= $row->isi_layanan_konsumen ?></td>
	                  		<td><?= $row->isi_pemesanan ?></td>
	              		</tr>
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