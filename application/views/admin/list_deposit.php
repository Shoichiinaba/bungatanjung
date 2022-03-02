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
        <table id="example" class="table table-bordered table-striped">
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
            </tr>
          </thead>
          <tbody>

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
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>
  <!-- akhir konten wraper -->
</div>


<script>
  $(function() {
    $("#example").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": true,
      "ordering": true,
      "processing": true,
      "ajax": {
        "url": "<?= site_url('Data_deposit/get_ajax') ?>",
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
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

  });
</script>