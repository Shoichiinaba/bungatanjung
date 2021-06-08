  <link href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />
  
<div class="content-wrapper">

<?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Admin!!',
              text: "<?php echo $this->session->flashdata('sukses');?>",
              type: 'success'
            });
          </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')):?>
          <script>
            swal({
              title: 'Oops!!',
              text: "<?php echo $this->session->flashdata('error');?>",
              type: 'error'
            });
          </script>
        <?php endif; ?>
        <br><br><br>
<center>
    <body class="hold-transition register-page">
      <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
              <a href=""><b>Registrasi</b> Admin Baru</a>
            </div>
              <div class="card-body">
                  <p class="login-box-msg">Masukan Data Admin Baru</p>
                    <form action="<?= base_url('admin')?>" method="post">
                      <div class="form-group <?=form_error('nama') ? 'has-error' : null ?>">
                        <input type="text" name="nama" class="form-control" autofocus="" placeholder="Full name" value="<?= set_value('nama'); ?>">
                        <span class="form-control-feedback"></span>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                        <input type="text" name="username" class="form-control" placeholder="Username"  value="<?= set_value('username'); ?>">
                        <span class="form-control-feedback"></span>
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group <?=form_error('email') ? 'has-error' : null ?>">
                        <input type="email" name="email"class="form-control" placeholder="Email"  value="<?= set_value('email'); ?>">
                        <span class="form-control-feedback"></span>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group <?=form_error('password1') ? 'has-error' : null ?>">
                        <input type="password" name="password1" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group <?=form_error('password2') ? 'has-error' : null ?>">
                        <input type="password" name="password2"class="form-control" placeholder="Retype password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      </div>
                      <div class="form-group">
                        <select name="role" class="form-control">
                          <option value="">Pilih jabatan</option>
                          <option value="Admin Biasa">Admin</option>
                          <option value="Admin IT">Superadmin</option>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-info btn-block btn-flat">
                          <i class="fa fa-space-shuttle "> Register</i></button>
                        </div>      
                      </div>
                    </form>
                </div>
              </div>
        </div>  
      </div> 
    </body></center>
</div>



<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>