 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header('Content-Disposition: attachment; filename="Laporan Penjualan '.$awal .' s/d '.$akhir.'.xls"');
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 <center><h3>Laporan Penjualan</h3><b>Tanggal <?= $awal.' s/d '.$akhir ?></b></center><br>
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
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
 		$total = 0;
 		foreach ($row as $key => $value) {
 			$total += $value->harga_jual;
 			?>
 			<tr>
 				<td nowrap><?= $control->tgl_indo($value->tgl_jual) ?></td>
 				<td><?= $value->kode_beli ?></td>
 				<td><?= $value->nama_pelanggan ?></td>
 				<td><?= $value->nama_produk ?></td>
 				<td align="right"><?= $value->harga_satuan ?></td>
 				<td align="center"><?= $value->jumlah_produk ?></td>
 				<td align="right"><?= $value->harga_jual ?></td>
 			</tr>
 		<?php } ?>
 	</tbody>
 	<tfoot>
 		<tr>
 			<td colspan="6"><b>Total Penjualan</b></td>
 			<td align="right"><b><?= $total ?></b></td>
 		</tr>
 	</tfoot>
 </table>  