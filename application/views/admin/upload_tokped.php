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
              <li class="breadcrumb-item active"><a href="<?php echo site_url('Upload_data'); ?>">Upload Tokped</a></li>
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
          <div class="widget-user-header bg-green">
            <h3 class="widget-user-username">Pilih File</h3>
            <h5 class="widget-user-desc">Dari Tokopedia</h5>
          </div>
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="<?php echo base_url(); ?>assets/dist/img/marketplace/tokped.png" alt="User Avatar">
            </div><br>
              <d class="card-footer">
                <td>
                  <a href="<?php echo base_url("import"); ?>" type="button" class="btn btn-block btn-outline-success btn-sm">Upload Deposit</a>
                </td>
                <td>
                  <a href="<?php echo base_url("Upload_data/transaksi"); ?>" type="button" class="btn btn-block btn-outline-success btn-sm">Upload Transaksi</a>
                </td>
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