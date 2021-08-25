
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Deposit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">List Deposit</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
      <!-- end Content Header (Page header) -->

      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Deposit</h3>
        </div>
            <!-- /.card-header -->
              <div class="card-body">
                <table id="example1"  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Date</th>
                    <th>
                      Nama Toko
                    </th>
                    <th>Stetus</th>
                    <th>Invoice</th>
                    <th>Nominal (Rp)</th>
                    <th>Balance</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no= 0; foreach ($list as $g ): $no++;?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->date; ?></td>
                      <td><?php echo $g->Nama_toko; ?></td>
                      <td><?php echo $g->status; ?></td>
                      <td><?php echo $g->invoice; ?></td>
                      <td><?php echo $g->nominal; ?></td>
                      <td><?php echo $g->balance; ?></td>
                      <td>
                      <a href="<?php echo site_url('data_deposit/hapus/'.$g->invoice); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-danger btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash"></i></a>
                  </tr>
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>NO</td>
                      <td>Date</td>
                      <td>Nama Toko</td>
                      <td>Stetus</td>
                      <td>Invoice</td>
                      <td>Nominal (Rp)</td>
                      <td>Balance</td>
                      <td>action</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
        </div>
      </section> 
<!-- akhir konten wraper -->
</div>