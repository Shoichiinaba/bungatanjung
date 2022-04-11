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
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- akhir konten wraper -->
</div>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": false,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": true,
      "processing": true,
      "scrollX": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= site_url('Data_transaksi/get_ajax') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [2, 3],
        "orderable": true,
      }],

      "dom": 'Bfrtip',
      "buttons": ['csv', 'excel', 'print'],
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

  });
</script>