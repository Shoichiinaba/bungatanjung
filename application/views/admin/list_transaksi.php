<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">List Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- end Content Header (Page header) -->

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data transaksi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <!-- <th>NO</th> -->
              <th>Count</th>
              <th>Order id</th>
              <th>Pagment Data</th>
              <th>invoice</th>
              <th>Order Status</th>
              <th>Product Id</th>
              <th>Product Name</th>
              <th>Qt</th>
              <th>SKU</th>
              <th>Notes</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Subsidi</th>
              <th>Cus Name</th>
              <th>Cus Phone</th>
              <th>Recipient</th>
              <th>Recipient Number</th>
              <th>Shipping Fee</th>
              <th>Insurance</th>
              <th>Tot shipping fee</th>
              <th>ToT Aamount</th>
              <th>AWB</th>
              <th>Jenis Layanan</th>
              <th>Bebas Ongkir</th>
              <th>Warehouse</th>
              <th>Campaign</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;
            foreach ($list as $a) : $no++; ?>
              <tr>
                <!-- <td><?php echo $no; ?></td> -->
                <td><?php echo $a->count; ?></td>
                <td><?php echo $a->order_id; ?></td>
                <td><?php echo $a->pagment_date; ?></td>
                <td><?php echo $a->invoice; ?></td>
                <td><?php echo $a->order_status; ?></td>
                <td><?php echo $a->product_id; ?></td>
                <td><?php echo $a->product_name; ?></td>
                <td><?php echo $a->quantity; ?></td>
                <td><?php echo $a->SKU; ?></td>
                <td><?php echo $a->notes; ?></td>
                <td><?php echo $a->price; ?></td>
                <td><?php echo $a->discount_amount; ?></td>
                <td><?php echo $a->subsidi_amount; ?></td>
                <td><?php echo $a->customer_name; ?></td>
                <td><?php echo $a->customer_phone; ?></td>
                <td><?php echo $a->recipient; ?></td>
                <td><?php echo $a->recipient_number; ?></td>
                <td><?php echo $a->shipping_price_fee; ?></td>
                <td><?php echo $a->insurance; ?></td>
                <td><?php echo $a->total_shipping_fee; ?></td>
                <td><?php echo $a->total_amount; ?></td>
                <td><?php echo $a->AWB; ?></td>
                <td><?php echo $a->jenis_layanan; ?></td>
                <td><?php echo $a->bebas_ongkir; ?></td>
                <td><?php echo $a->warehouse_origin; ?></td>
                <td><?php echo $a->campaign_name; ?></td>

                <!-- <a href="<?php echo site_url('Data_transaksi/hapus/' . $a->id_trx); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-danger btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash"></i></a> -->
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- akhir konten wraper -->
</div>