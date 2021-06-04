
 <?php if ($this->session->flashdata('sukses')):?>
                  <script>
                    swal({
                      title: 'Data Profil!!',
                      text: "<?php echo $this->session->flashdata('sukses');?>",
                      type: 'success'
                    });
                  </script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('pas')):?>
                  <script>
                    swal({
                      title: 'PASSWORD!!',
                      text: "<?php echo $this->session->flashdata('pas');?>",
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

<div class="content-wrapper">  
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo site_url('Profile'); ?>">Profil</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-warning card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/dist/img/<?php echo $userdata->foto; ?>" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center"> <?php echo $userdata->nama; ?></h3>
              <p class="text-muted text-center"> <?php echo $userdata->role; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="float-right"><?php echo $userdata->username; ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="card card-warning card-outline">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ubah Password</a></li>
              </ul>
            </div> 
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?php echo base_url('Profile/update') ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $userdata->username; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNama" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Name" name="nama" value="<?php echo $userdata->nama; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputFoto" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" placeholder="Foto" name="foto">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning"><i class="fa fa-thumbs-up"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="password">
                    <form class="form-horizontal" action="<?php echo base_url('Profile/ubah_password') ?>" method="POST">
                      <div class="form-group row">
                        <label for="passLama" class="col-sm-2 control-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Password Lama" name="passLama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning"> <i class="fa fa-thumbs-up"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
  </section>
</div>