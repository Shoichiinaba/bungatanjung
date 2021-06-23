
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
                          <td><?php echo $d->deposit_invoice; ?></td>
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