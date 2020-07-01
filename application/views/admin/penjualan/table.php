<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Penjualan</h3>
            </div>
      		<div class="box-body">
              	<table id="tables" class="table table-bordered table-striped">
	                <thead>
		                <tr>
                            <th width="1%" nowrap><center>Tanggal Jual</center></th>
		                  	<th width="1%" nowrap><center>Kode Jual</center></th>
                            <th><center>Nama Pembeli</center></th>
                            <th><center>Produk</center></th>
                            <th><center>Harga Satuan</center></th>
                            <th width="1%" nowrap><center>Jumlah Jual</center></th>
                            <th><center>Harga Jual</center></th>
		                  	<th width="1%"><center>Status</center></th>
                            <th></th>
		                </tr>
	                </thead>
	                <tbody></tbody>
              </table>          
      		</div>
  		</div>
	</div>
</div>
<script>
function confirmdel(url) {
  if (confirm("Apakah Kamu Yakin ?")) {
   document.location = "<?php echo base_url() ?>index.php/admin/penjualan/hapus/"+url;
  }
}

var table;
var session= <?php echo $_SESSION['level'] ?>;
$(document).ready(function() {
 
    //datatables
    table = $('#tables').DataTable({ 
        "bLengthChange": false,
        "retrieve": true,
        "info": false,
        "destroy": true,
        "autoWidth": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('admin/penjualan/ajax_list')?>",
           "type": "POST"
        },
        //Set column definition initialisation properties.
        "columns": [
        { 
          "data": "tgl_jual", 
          "sClass": "text-center",
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('white-space', 'nowrap')
          }
        },{ 
          "data": "kode_beli",  
          "orderable": false,
          "sClass": "text-center",
        },{ 
          "data": "nama_pelanggan",   
          "orderable": false,
        },{ 
          "data": "nama_produk",  
          "orderable": false,
        },{ 
          "data": "harga_satuan",  
          "orderable": false,
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).addClass('text-right');
          }
        },{ 
          "data": "jumlah_produk",  
          "orderable": false,
          "sClass": "text-center",
        },{ 
          "data": "harga_jual",  
          "orderable": false,
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).addClass('text-right');
          }
        },{ 
          "data": "status",  
          "orderable": false,
          "sClass": "text-center",
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('white-space', 'nowrap')
          }
        },{ 
          "data": "aksi", 
          "orderable": false,
          "sClass": "text-center",
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('white-space', 'nowrap')
          }
        }
        ],
        responsive: !0
    });
});
 
</script>