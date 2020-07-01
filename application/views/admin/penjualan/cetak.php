<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/user/img/logo.ico">
    <title>Bread Shop</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
<style type="text/css">
    body{
    	color: black;
    	padding-bottom: 20px; 
        font-size: 13px;
        font-family: "cambria";
    }
    .main{
    	margin:auto;
        height: 50%;
        padding-bottom: 10px;
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
    h4{
        border-bottom: 1px dashed #000;
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .title{
        font-size: 13px;
        padding: 2px;
        width: 60%;
        border: 1px solid #000;
        margin-bottom: 5px;
    }
    .kepada{
        padding: 2px;
        width: 75%;
        border: 1px solid #000;
        margin-bottom: 5px;
    }
    .panel-body{
        margin-top: 10px;
    }
    .m-t-30{
        margin-top: 8px;
    }
    .m-l-30{
        margin-left: 50px;
    }
    .m-b-15{
        margin-bottom: 15px;
    }
    @media (min-width: 992px) {
      .col-md-12 {
        float: left;
    	width: 100%;
      }
    }
    table{
        font-size: 14px;
    }
    thead tr{
        height: 25px;
        text-align : center;
        font-weight: bold;
    }
    tbody tr{
        height: 20px;
    }
    thead tr th{
        padding: 2px;
        border-top : 1px solid #000;
        border-right: 1px solid #000;
        border-left: 1px solid #000;
        border-bottom: 1px solid #000;
        border-collapse: collapse;
    }
    tbody tr td{
        padding: 0px 4px;
        border-right: 1px solid #000;
        border-left: 1px solid #000;
    }
    tfoot tr td{
        padding: 0px 2px 2px 5px;
    }
    .bold{
        font-weight: bold;
    }
    .br{
        border-right: 1px solid #000;
    }
    .bl{
        border-left: 1px solid #000;
    }
    .bt{
        border-top: 1px solid #000;
    }
    .bb{
        border-bottom: 1px solid #000;
    }
    .bn{
        border: none;
    }
    .isi{
        padding: 3px;
        height: 27px;
        border: 1px solid #000;
    }
    .isi2{
        padding: 5px;
        border: 1px solid #000;
        font-size: 12px;
        margin-right: 10px;
    }
    .bln{
        border-left: none;
    }
    .brn{
        border-right: none;
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
    }*/
    .footer{
    	width:80%;
        margin: auto;
    }
    .right{
        font-size: 14px;
    	float:right;
    	width:48%;
    }
    .right2{
        font-size: 14px;
        float:right;
        width:48%;
        margin-bottom: 5px;
    }
    .left{
    	float:left;
    	width:50%;
    }
    /*.table-striped>tbody>tr:nth-of-type(odd){
    	background-color:#f9f9f9;
    } */
</style>
</head>
 <!-- onload="window.print()" -->
<body class="main" onload="window.print()">
    <div class="footer">
        <div class="left">
            <div class="title m-l-30"><h4>Roti Sari Roti</h4><?= ucwords($kontak->alamat) ?><br>No HP. <?= $kontak->no_hp ?></div>
            <div style="margin-top: 20px; margin-bottom: 20px; margin-left: 10px;"><h2>SURAT JALAN</h2>No. <?= $item[0]['id'] ?><br>Order No. <?= $item[0]['kode_beli'] ?></div>
        </div>
        <div class="right2">
            <div class="kepada m-l-30">Kepada Yth,<br><span style="padding-top:5px;font-size: 14px;">Bapak Bagian Purchase<br><?= ucwords($pelanggan['nama_pelanggan']) ?><br><?= ucwords($pelanggan['alamat_pelanggan']) ?></span></div>
        </div>
    </div>
	<div class="panel-body">
        <table width="80%" align="center">
            <thead>
                <tr align="center">
                    <th width="4%" >No</th>
                    <th >Nama Barang</th>
                    <th>Qty</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody style="border-bottom: px solid #000000;">
                <?php 
                for ($i=1; $i < 10 ; $i++) { 
                    if(count($item)>=$i){
                ?>
                <tr>
                    <td align="center"><?= $i ?>.</td>
                    <td><?= ucwords($item[($i-1)]['nama_produk']) ?></td>
                    <td align="center"><?= $item[($i-1)]['jumlah_produk'] ?></td>
                    <td></td>
                </tr>
                <?php }else{ ?>
                <tr>
                    <td align="center"></td>
                    <td></td>
                    <td align="center"></td>
                    <td></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>

    <div class="footer" style="margin-top: 30px;">
        <table width="100%" class="bn">
            <tr>
                <td width="30%" class="bn" align="center">Tanda Terima</td>
                <td width="30%" class="bn" align="center" nowrap>Hormat Kami<br><span style="font-size: 12px;"><b><?= $jud ?></b></span></td>
            </tr>
            <tr valign="bottom">
                <td class="bn" style="height: 80px;padding-left: 6%;">(<span class="wit"></span>)</td>
                <td class="bn" style="height: 80px;padding-left: 6%;">(<span class="wit"></span>)</td>
            </tr>
        </table>
    </div>
</body>