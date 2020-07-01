<ul class="sidebar-menu" data-widget="tree">   
  <li class="header">Main</li>
  <li <?php if($modul=='main'){ echo 'class="active"'; } ?>>
    <a href="<?php echo base_url()?>index.php/main">
      <i class="fa fa-home"></i> <span>Home</span>
    </a>
  </li>
<?php if($_SESSION['level']==0){ ?>
  <li class="header">Tampilan</li>
  <li class="treeview <?php if($modul=='layanan' || $modul=='galeri' || $modul=='sertifikat' || $modul=='produk' || $modul=='profil' || $modul=='kontak' || $modul=='rekening'){ echo 'active'; } ?>">
    <a href="#">
      <i class="fa fa-table"></i> <span> Data Tampilan </span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li <?php if($modul=='layanan'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/layanan"><i class="fa fa-circle-o"></i>Layanan</a></li>
      <li <?php if($modul=='galeri'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/galeri"><i class="fa fa-circle-o"></i>Galeri</a></li>
      <li <?php if($modul=='sertifikat'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/sertifikat"><i class="fa fa-circle-o"></i>Sertifikat</a></li>
      <li <?php if($modul=='produk'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/produk"><i class="fa fa-circle-o"></i>Produk</a></li>
      <li <?php if($modul=='profil'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/profil"><i class="fa fa-circle-o"></i>Profil</a></li>
      <li <?php if($modul=='kontak'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/kontak"><i class="fa fa-circle-o"></i>Kontak</a></li>
      <li <?php if($modul=='rekening'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/rekening"><i class="fa fa-circle-o"></i>Rekening</a></li>
    </ul>
  </li>
  <li class="header">Penjualan</li>
  <li class="treeview <?php if($modul=='penjualan' || $modul=='peralatan' || $modul=='pelanggan'){ echo 'active'; } ?>">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Data master</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li <?php if($modul=='penjualan'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/penjualan"><i class="fa fa-circle-o"></i>Data penjualan</a></li>
      <li <?php if($modul=='peralatan'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/peralatan"><i class="fa fa-circle-o"></i>Data peralatan</a></li>
      <li <?php if($modul=='pelanggan'){ echo 'class="active"'; } ?>><a href="<?php echo base_url()?>index.php/admin/pelanggan"><i class="fa fa-circle-o"></i>Data Pelanggan</a></li>
    </ul>
  </li>
  <li class="header">Laporan</li>
  <li <?php if($modul=='lpenjulan'){ echo 'class="active"'; } ?>>
    <a href="<?php echo base_url()?>index.php/admin/lpenjualan">
      <i class="fa fa-clipboard"></i> <span>Penjualan</span>
    </a>
  </li>
<?php }else{ ?>
  <li class="header">Pemesanan</li>
  <li>
    <a href="<?php echo base_url()?>index.php/user/pemesanan">
      <i class="fa fa-shopping-cart"></i> <span>Pemesanan</span>
    </a>
  </li>
<?php } ?>
</ul>