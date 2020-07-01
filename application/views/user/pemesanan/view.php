<div class="row">
    <div class="col-lg-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Pemesanan</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-12" style="margin-bottom: 20px;">
                  <a href="<?= base_url() ?>index.php/user/pemesanan/form" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Pemesanan</a>
                </div>
                <?php 
                foreach ($row as $key => $value) {
                  $cek_pembayaran = $control->penjualans->cek_pembayaran($value->id);
                  if(count($cek_pembayaran)>0){
                      $st_pembayaran = "Telah Transfer";
                  }else{
                      $st_pembayaran = "Belum Transfer";
                  }?>
                  <div class="col-lg-6">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Pembelian No. <?= $value->kode_beli ?></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="table-responsive">
                          <p>Kepada Yth, <?= ucwords($value->nama_pelanggan) ?>.<br>Anda telah memesan barang dengan data seperti dibawah ini :</p>
                          <table class="table no-margin">
                            <tr>
                              <td>Tangal/Waktu</td>
                              <td><?= date('d-m-Y', strtotime($value->tgl_jual)).', '.$value->wkt_jual ?></td>
                            </tr>
                            <tr>
                              <td>Nama Produk</td>
                              <td><?= $value->nama_produk ?></td>
                            </tr>
                            <tr>
                              <td>Harga Satuan</td>
                              <td>Rp <?= number_format($value->harga_satuan, "0", ",", ".") ?>,-</td>
                            </tr>
                            <tr>
                              <td>Jumlah Qty</td>
                              <td><?= $value->jumlah_produk ?></td>
                            </tr>
                            <tr>
                              <td>Total Harga</td>
                              <td>Rp <?= number_format($value->harga_jual, "0", ",", ".") ?>,-</td>
                            </tr>
                            <tr>
                              <td>Status pembayaran</td>
                              <td><?= $st_pembayaran ?></td>
                            </tr>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer clearfix">
                        <?php if($st_pembayaran=="Belum Transfer"){ ?>
                        <center><a href="<?= base_url('index.php/user/pemesanan/form/'.$value->id) ?>" class="btn btn-sm btn-info btn-flat">TRANSFER</a></center>
                        <?php }else{ ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <center><p>Terima Kasih. Pemesanan anda akan segera diproses.<br>Proses pengiriman barang akan memakan waktu 1-2 hari.</p></center>  
                        </div>
                        <?php } ?>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
