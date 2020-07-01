<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bread Shop</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>asset/user/img/logo.ico">    
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/admin/bootstrap/css/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/admin/bootstrap/css/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/admin/dist/css/skins/_all-skins.min.css">
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url()?>asset/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url()?>asset/admin/bootstrap/js/bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  body{
      height: 100px;
      width: 100%;
      background: url("<?= base_url('asset/user/img/1.jpg') ?>") no-repeat center;
      border-radius: 0 0 50% 50% / 4%;
  }
  </style>
</head>
<body class="hold-transition login-page" style="height: 80%;background: url('<?= base_url('asset/user/img/1.jpg') ?>') no-repeat bottom;border-radius: 0 0 50% 50% / 4%;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>" style="color: #fff"><b>SISTEM ROTI</b><br></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start</p>

    <form action="<?= base_url() ?>index.php/login/login" method="post">
        <?php
        // Cek apakah terdapat session nama message
        if($this->session->flashdata('pesan')){ // Jika ada ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b><?= $this->session->flashdata('pesan'); ?></b>
        </div>
        <?php } if($this->session->flashdata('daftar')){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b><?= $this->session->flashdata('daftar'); ?></b>
        </div>
        <?php } ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="username" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
      <br>
    <a href="<?= base_url() ?>index.php/login/register" class="text-center" style="margin-left: 110px;">Register Member</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
