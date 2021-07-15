 <!-- alert -->
       <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal.fire({
              title: 'Data Toko Shopee!!',
              text: "<?php echo $this->session->flashdata('sukses');?>",
              type: 'success'
            });
          </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')):?>
          <script>
            swal.fire({
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
            <h1>List Toko Di Shopee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Upload_data'); ?>">Marketplace</a></li>
              <li class="breadcrumb-item active">List Toko</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
    <h3 class="mt-4 mb-4"></h3>
    <center>
    <div class="col-md-8">
            <!-- DIRECT CHAT DANGER -->
            <div class="card card-danger direct-chat direct-chat-danger">
              <div class="card-header">
                <h3 class="card-title">Daftar Toko</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-toko">
                    <i class="fas fa-cart-plus"> Tambah Toko</i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="direct-chat-messages">
                  <!-- conten -->
                  <div class="card-body">
                <table class="table table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 3px">Upload</th>
                      <th style="width: 3px">NO</th>
                      <th style="width: 6px">ID Toko</th>
                      <th style="width: 50px">Nama Toko</th>
                      <th style="width: 20px" >Keterangan</th>
                      <th style="width: 10px">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no= 0; foreach ($list as $g ): $no++;?>
                      <tr>
                        <td>
                          <a  class="btn btn-outline-danger btn-xs toastsDefaultFull" id="error" data-placement="top"  title="upload"><i class="fas fa-cloud-upload-alt"></i></a>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $g->Id_toko; ?></td>
                        <td><?php echo $g->Nama_toko; ?></td>
                        <td><?php echo $g->keterangan; ?></td>
                        <td align="center">
                          <a href="<?php echo site_url('Upload_data/delete_shope/'.$g->Id_toko); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="fa fa-trash"></i></a>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </center>
    
</div>
<!-- Modal tambah toko -->
<div class="modal fade" id="tambah-toko">
        <div class="modal-dialog">
          <form action="<?php echo site_url('Upload_data/tambah_shope'); ?>" method="post">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" readonly="" value="<?= $nomer; ?>" name="Id_toko" disable >
                    <div class="input-group-append">
                      <div class="input-group-text"><i class="fas fa-qrcode"></i></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="Nama_toko" placeholder="Masukan Nama Toko">
                    <div class="input-group-append">
                      <div class="input-group-text"><i class="fas fa-store"></i></div>
                    </div>
                </div>
                  <div class="input-group">
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan">
                    <div class="input-group-append">
                      <div class="input-group-text"><i class="fas fa-comments"></i></div>
                    </div>
                  </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-light">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->