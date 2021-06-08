
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Cek Transaksi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
      <!-- end Content Header (Page header) -->

      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Hasil Cek transaksi</h3>
              <div>
                <a href="<?php echo site_url('Cek_transaksi/export_excel/'); ?>" class="btn btn-success float-right">
                  <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel" viewBox="0 0 16 16">
                  <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
                  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                </svg></i> Export </a>
              </div>
            <!-- /.card-header -->
          </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="bg-teal">Date</th>
                    <th class="bg-teal">Status</th>
                    <th class="bg-teal">Invoice</th>
                    <th class="bg-teal">Nominal (Rp)</th>
                    <th class="bg-teal">Balance</th>
                    <th class="bg-gray disabled" width='1%'></th>
                    <th class="bg-lime">Invoice Trx</th>
                    <th class="bg-lime">Product Name</th>
                    <th class="bg-lime">Price</th>
                    <th class="bg-lime">Total Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no= 0; foreach ($list as $d ): $no++;?>
                      <tr>
                          <!-- <td><?php echo $no; ?></td> -->
                          <td><?php echo $d->date; ?></td>
                          <td><?php echo $d->status; ?></td>
                          <td><?php echo $d->invoice; ?></td>
                          <td><?php echo $d->nominal; ?></td>
                          <td><?php echo $d->balance; ?></td>
                          <td class="bg-gray disabled"></td>
                          <td><?php echo $d->invoice; ?></td>
                          <td><?php echo $d->product_name; ?></td>
                          <td><?php echo $d->price; ?></td>
                          <td><?php echo $d->total_amount; ?></td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
        </div>
      </section> 
<!-- akhir konten wraper -->
</div>
