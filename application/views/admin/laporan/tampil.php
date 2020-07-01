<a href="<?= base_url('index.php/admin/lpenjualan/cetak/'.$awal.' '.$akhir) ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Cetak</a>
<a href="<?= base_url('index.php/admin/lpenjualan/download/'.$awal.' '.$akhir) ?>" class="btn btn-success" target="_blank"><i class="fa fa-download"></i> Download</a>
<center><h3>Laporan Penjualan<br>Bread Shop</h3><b>Tanggal <?= $awal.' s/d '.$akhir ?></b></center><br>
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
			<td align="right"><?= number_format($value->harga_satuan, "0", ",", ".") ?></td>
			<td align="center"><?= $value->jumlah_produk ?></td>
			<td align="right"><?= number_format($value->harga_jual, "0", ",", ".") ?></td>
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6"><b>Total Penjualan</b></td>
			<td align="right"><b><?= number_format($total, "0", ",", ".") ?></b></td>
		</tr>
	</tfoot>
</table>  