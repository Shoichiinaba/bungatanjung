<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History Upload Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Upload_data/list_toko'); ?>">List Toko</a></li>
              <li class="breadcrumb-item active">History Upload</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

     <!-- alert -->
       <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal.fire({
              title: 'Data Upload!!',
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

</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header bg-pink">
            <h3 class="card-title">History Upload</h3>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-striped" >
                    <thead class="bg-pink disabled">
                      <tr>
                        <th>No</th>
                        <th>Tanggal Upload</th>
                        <th>id toko</th>
                        <th>Jumlah Data</th>
                        <th>Total Nominal</th>
                        <th>Total Balance</th>
                        <th>Upload Dari</th>
                        <th width ='6%'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no= 0; foreach ($list as $g ): $no++;?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $g->tgl_upload; ?></td>
                            <td><?php echo $g->id_toko; ?></td>
                            <td><?php echo $g->jumlah_data; ?></td>
                            <td><?php echo $format_number($g->total_nominal); ?></td>
                            <td><?php echo $format_number($g->total_balance); ?></td>
                            <td><?php echo $g->tipe_histori; ?></td>
                            <td align="center">
                            <a href="<?php echo site_url('Upload_data/delete_temp/'.$g->id_upload); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="fa fa-trash"></i></a>
                          </tr>
                        <?php endforeach;?>
                    </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
   </div>
</section>
</div>