<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>System | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="<?= base_url('assets/dist/img/') ?>logo.png" type="image/x-icon">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?= base_url('')?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url('')?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('')?>assets/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?= base_url('')?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('')?>assets/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    </head>
    <?=
      "<style>
      body{
        background-image:url(".base_url()."assets/img/beck.png);
        background-attachment:fixed;
        background-size:100% 100%;
      }
      </style>";
      ?>
    <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <small>
             <img src="assets/img/.png" alt="" />
          </small>
          <a href=""><b class= "text-indigo" >Bunga</b> <i class="text-fuchsia">Tanjung </i></a>
        </div>
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Masukan Username Dan Password</p>
            <form action="<?= site_url('Auth/login')?>" method="post">
            <!-- Alert -->
            <?php
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                        ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_login'); ?>
                        </div>    
            <?php } ?>
                      
            <?php 
                    $data=$this->session->flashdata('sukses');
                    if($data!=""){ ?>
                    <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
            <?php } ?>
  
              <div class="input-group mb-3">
                <input type="text" class="form-control"  name="username" id="username" required="" autocomplete="off" placeholder="Enter username Anda...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" required="" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="customCheck">
                      <label for="customCheck">
                        Show Password
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn bg-lime btn-block btn-flat" name="login">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
            </form>
        </div>
<!-- /.login-box -->
</div>
      <div class="lockscreen-footer text-center">
                <b class="text-orange">
                Copyright &copy; <script>document.write(new Date().getFullYear());</script> <strong>Bunga Tanjung</strong> All Rights Reserved
      </div>
</div>





<!-- jQuery -->
<script src="<?= base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets')?>/dist/js/adminlte.min.js"></script>
<!-- show password -->
<script>
    $(document).ready(function(){
      $('#customCheck').click(function(){
        if($(this).is(':checked')){
          $('#password').attr('type','text');
        }else{
          $('#password').attr('type','password');
        }
      });
    });
  </script>
</body>
</html>