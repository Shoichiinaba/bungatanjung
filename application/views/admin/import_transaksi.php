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
              <li class="breadcrumb-item active"><a href="<?php echo site_url('Upload_data/tokopedia/'); ?>">Upload Tokped</a></li>
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
            <h5 class="widget-user-desc">Data Transaksi</h5>
          </div>
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="<?php echo base_url(); ?>assets/dist/img/marketplace/tokped.png" alt="User Avatar">
            </div>
              <div class="card-footer">
                  <?= form_open_multipart("Import/transaksi"); ?>
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <div class="form-group">
					                  <input type="file" name="excel">
			              	    </div>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                    </div>
                    <div class="col-sm-4">
                      <div class="description-block">
                        <button class='btn btn-success swalDefaultError' name="submit" type="submit" value="upload">
						            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			    		          Import
					              </button>
                      </div>
                    </div>
                    </div>
                  <?= form_close(); ?>
                  <?php if(!empty($this->session->flashdata('error'))){ ?>
			            <div class="alert-danger" role="alert"><?= $this->session->flashdata('error'); ?></div>
			            <?php } ?>
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