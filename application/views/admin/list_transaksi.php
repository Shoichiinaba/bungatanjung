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
        <table id="example2" class="table table-bordered table-striped">
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
    $("#example2").DataTable({
      "responsive": false,
      "lengthChange": false,
      "autoWidth": true,
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
        "orderable": false,
      }],
      initComplete: function() {
        this.api().columns().every(function() {
          var column = this;
          // console.log(column);
          if (column[0][0] != 0 && column[0][0] != 0) {
            var select = $('<select><option value=""></option></select>')
              .appendTo($(column.footer()).empty())
              .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );
                column.search(val ? '^' + val + '$' : '', true, false)
                  .draw();
              });
            column.data().unique().sort().each(function(d, j) {
              select.append('<option value="' + d + '">' + d + '</option>')
            });
          }
        });
      },
      "dom": 'Bfrtip',
      "buttons": ['csv', 'excel', 'print'],
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

  });
</script>