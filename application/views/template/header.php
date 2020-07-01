<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url()?>asset/admin/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= $_SESSION['nama'] ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>asset/admin/dist/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url()?>asset/admin/dist/img/user.png" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION['nama'].' - RAC' ?>
                </p>
              </li>
              <li class="user-footer">
                <a href="<?= base_url() ?>index.php/login/logout" class="btn btn-block btn-default btn-flat">Sign out</a>
              </li>
            </ul>
          </li>
        </ul>
    </div>
    </nav>
</header>