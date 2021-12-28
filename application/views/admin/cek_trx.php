<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pencocokan Transaksi</h1>
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
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Hasil Cek transaksi</h3>
        <div class="text-right">
          <a href="<?php echo site_url('Cek_transaksi'); ?>">
            <button type="button" class="btn btn-success btn-sm">
              <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                </svg>
              </i> Tokopedia
            </button>
          </a>
          <a href="<?php echo site_url('Cek_transaksi/cek_trx_shopee'); ?>">
            <button type="button" class="btn btn-outline-warning btn-sm">
              <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
              </i> Shopee
            </button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th colspan="6" class="bg-teal text-center">Data Deposit</th>
              <th colspan="4" class="bg-lime text-center">Data Transaksi</th>
            </tr>
            <tr>
              <th class="bg-teal">Date</th>
              <th class="bg-teal">Nama Toko</th>
              <th class="bg-teal">Status</th>
              <th class="bg-teal">Invoice</th>
              <th class="bg-teal">Nominal (Rp)</th>
              <th class="bg-teal">Balance</th>
              <th class="bg-lime">Invoice Trx</th>
              <th class="bg-lime">Product Name</th>
              <th class="bg-lime">Price</th>
              <th class="bg-lime">Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;
            foreach ($list as $d) : $no++; ?>
              <tr>
                <!-- <td><?php echo $no; ?></td> -->
                <td><?php echo $d->date; ?></td>
                <td><?php echo $d->Nama_toko; ?></td>
                <td><?php echo $d->status; ?></td>
                <td><?php echo $d->deposit_invoice; ?></td>
                <td><?php echo $d->nominal; ?></td>
                <td><?php echo $d->balance; ?></td>
                <td><?php echo $d->invoice; ?></td>
                <td><?php echo $d->product_name; ?></td>
                <td><?php echo $d->price; ?></td>
                <td><?php echo $d->total_amount; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <td>Date</td>
              <td>Nama Toko</td>
              <td>Status</td>
              <td>Invoice</td>
              <td>Nominal (Rp)</td>
              <td>Balance</td>
              <td>Invoice Trx</td>
              <td>Product Name</td>
              <td>Price</td>
              <td>Total Amount</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>
  <!-- akhir konten wraper -->
</div>