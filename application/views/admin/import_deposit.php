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
          <h5 class="widget-user-desc">Data Deposit</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle elevation-2" src="<?php echo base_url(); ?>assets/dist/img/marketplace/tokped.png" alt="User Avatar">
        </div>
        <div class="card-footer">
          <?= form_open_multipart("Import"); ?>
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <div class="form-group">
                  <input type="file" name="excel" id="file">
                </div>
              </div>
            </div>
            <div class="col-sm-4 border-right">
            </div>
            <div class="col-sm-4">
              <div class="description-block">
                <button class='btn btn-success swalDefaultError' id="upload" name="submit" type="submit" value="upload">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  Import
                </button>
              </div>
            </div>
          </div>
          <?= form_close(); ?>
          <?php if (!empty($this->session->flashdata('error'))) { ?>
            <div class="alert-danger" role="alert"><?= $this->session->flashdata('error'); ?></div>
          <?php } ?>
        </div>
      </div>
      <!-- akhir konten -->
      <div class="progress">
        <progress id="progressBar" value="0" max="100" style="width:100%; display: none;"></progress>
        <h3 id="status"></h3>
        <p id="loaded_n_total"></p>
      </div>

      <!-- <div class="progress">
        <div class="progress-bar bg-primary progress-bar-striped" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
          <span id="status"></span>
        </div>
      </div> -->

    </div>
    <!-- /.col -->
    <div class="col-md-4">
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

<!-- Progress Bar -->

<!-- <script>
  function ambilId(file) {
    return document.getElementById(file);
  }

  $(document).ready(function() {
    $("#upload").click(function() {
      ambilId("progressBar").style.display = "block";
      var file = ambilId("file").files[0];

      if (file != "") {
        var formdata = new FormData();
        formdata.append("excel", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "<?php echo site_url('Import'); ?>", true);
        ajax.send(formdata);
      }
    });
  });

  function progressHandler(event) {
    ambilId("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    ambilId("progressBar").value = Math.round(percent);
    ambilId("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
  }

  function completeHandler(event) {
    ambilId("status").innerHTML = event.target.responseText;
    ambilId("progressBar").value = 0;
  }

  function errorHandler(event) {
    ambilId("status").innerHTML = "Upload Failed";
  }

  function abortHandler(event) {
    ambilId("status").innerHTML = "Upload Aborted";
  }
</script> -->