
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-cyan elevation-2 navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url(); ?>assets/dist/img/<?php echo $userdata->foto; ?>" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $userdata->nama; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?php echo base_url(); ?>assets/dist/img/<?php echo $userdata->foto; ?>" class="img-circle elevation-2" alt="User Image">

            <p style= 'color: purple'>
            <?php echo $userdata->nama; ?> / <?php echo $userdata->role; ?>
                  <small>Member since <?php echo $userdata->dibuat; ?></small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
          
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?php echo base_url()?>Profile" class="btn btn-default btn-flat">Profile</a>
            <a href="<?php echo base_url()?>Auth/logout" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  