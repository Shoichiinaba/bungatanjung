<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Data Excel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Upload Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<h3 class="mt-4 mb-4"></h3>
  <div class="row">
    <div class="col-md-4">

    </div>
    <!-- /.col -->
      <div class="col-md-4">
        <!-- Konten -->
        <div class="card card-widget widget-user">
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">Pilih Upload File</h3>
            <h5 class="widget-user-desc">Dari Marketplace</h5>
          </div>
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="<?php echo base_url(); ?>assets/dist/img/marketplace/marketplace.png" alt="User Avatar">
            </div>
              <div class="card-footer">
                <!-- Tombol TOKPED-->
                <div class="lockscreen-item ">
                  <div class="lockscreen-image">
                    <img src="<?php echo base_url(); ?>assets/dist/img/marketplace/tokped.png" alt="User Image">
                  </div>
                    <form action="<?php echo site_url('Upload_data/tokopedia/'); ?>" class="lockscreen-credentials bg-green">
                      <div class="input-group">
                        <input  class="form-control " placeholder=" Dari Tokopedia">
                          <div class="input-group-append bg-green">
                            <button type="submit"  class="btn"><i class="fas fa-upload text-muted"></i></button>
                          </div>
                       </div>
                    </form>
                </div>
                <br>
                <!-- tombol Shopee -->
                <div class="lockscreen-item">
                  <div class="lockscreen-image">
                    <img src="<?php echo base_url(); ?>assets/dist/img/marketplace/shopee.png" alt="User Image">
                  </div>
                    <form class="lockscreen-credentials">
                      <div class="input-group">
                        <input  class="form-control" disabled placeholder=" Dari Shopee">
                          <div class="input-group-append">
                            <button type="button" disabled class="btn"><i class="fas fa-upload text-muted"></i></button>
                          </div>
                       </div>
                    </form>
                </div>
                <br>
                <!-- Tombol T-->
                <div class="lockscreen-item">
                  <div class="lockscreen-image">
                    <img src="<?php echo base_url(); ?>assets/dist/img/marketplace/bukalapak.png" alt="User Image">
                  </div>
                    <form class="lockscreen-credentials">
                      <div class="input-group">
                        <input  class="form-control" disabled placeholder=" Dari Bukalapak">
                          <div class="input-group-append">
                            <button type="button" class="btn" disabled ><i class="fas fa-upload text-muted"></i></button>
                          </div>
                       </div>
                    </form>
                </div>
              </div>
        </div>
        <!-- akhir konten -->
      </div>
          <!-- /.col -->
          <div class="col-md-4">
          </div>
          <!-- /.col -->
  </div>
  <!-- /.row -->


</div>