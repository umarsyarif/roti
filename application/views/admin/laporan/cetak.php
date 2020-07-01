<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="<?php echo base_url()?>asset/user/img/logo.ico">
    <title>Bread Shop</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
<style type="text/css">
    body{
        color: black;
        padding-bottom: 20px; 
        font-size: 12px;
    }
    .main{
        margin:auto;
        height: 95%;
        margin-left:5%;
        margin-right:5%;
        border: 3px solid #000000;
    }
    .header{
        position:relative;
        width:100%;
        margin:auto;
        text-align:center;
        font-size: 12px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-bottom: 5px solid #000000;
    }
    .img1{
        padding-top: 12px;
        padding-left: 15px;
        width:12%;
        float:left;
        position: relative;
    }
    .img2{
        padding-top: 12px;
        padding-right: 15px;
        width:12%;
        float:right;
        position: relative;
    }
    h2{
        margin-top: 0px;
        margin-bottom: -2px;
    }
    .panel-body{
        margin-top: 10px;
    }
    .m-t-30{
        margin-top: 30px;
    }
    .m-l-30{
        margin-left: 50px;
    }
    @media (min-width: 992px) {
      .col-md-12 {
        float: left;
        width: 100%;
      }
    }
    table{
        font-size: 12px;
    }
    thead tr{
        height: 30px;
        text-align : center;
        font-weight: bold;
    }
    thead tr th{
        padding: 3px;
    }
    tbody tr td{
        padding: 2px;
    }
    tfoot tr td{
        padding: 5px 7px;
        font-weight: bold;
    }
    .table-bordered{border:1px solid #000;}.table-bordered>tbody>tr>td,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>td,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>thead>tr>th{border:1px solid #000;padding: 8px;}.table-bordered>thead>tr>td,.table-bordered>thead>tr>th{border-bottom-width:2px}
    .bold{
        font-weight: bold;
    }
    .wit{
        padding-left: 45%; 
        padding-right: 35%;
    }
    /* .perihal{
        margin-top:5%;
        width:100%;
    }
    .perihal1{
        padding-top:5%;
        padding-bottom: 1%;
        width:90%;
        margin: auto;
        text-align: justify;
    }
    .footer{
        margin-top:5%;
        width:100%;
    }
    .right{
        float:right;
        margin-right:1%;
        width:20%;
    }
    .left{
        float:left;
        margin-left:8%;
        width:35%;
    }
    .table-striped>tbody>tr:nth-of-type(odd){
        background-color:#f9f9f9;
    } */
</style>
</head>
 <!-- onload="window.print()" -->
<body class="main" onload="window.print()">
    <div class="header">
        <h3>Laporan Penjualan<br>Bread Shop</h3><b>Tanggal <?= $awal.' s/d '.$akhir ?></b>
    </div>
    
    <div class="panel-body m-t-30">    
        <table align="center" width="78%" class="table-bordered">
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
    </div>
    <div class="panel-body m-t-30 m-l-30">
        Demikian laporan penjualan dicetak.<br>
        <table width="100%" class="m-t-30">
            <tr>
                <td width="30%" style="padding-left: 10%;"><b></b></td>
                <td width="30%" style="padding-left: 10%;"><b></b></td>
                <td width="30%" style="padding-left: 6%;"><b>Pekanbaru,<br>Diketahui Oleh</b></td>
            </tr>
            <tr valign="bottom">
                <td style="height: 80px;padding-left: 10%;"></td>
                <td style="height: 80px;padding-left: 4%;"></td>
                <td style="height: 80px;padding-left: 6%;">(<span class="wit"></span>)</td>
            </tr>
        </table>
    </div>
</body>