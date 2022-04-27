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
        </table>
      </div>
    </div>
  </section>
  <!-- akhir konten wraper -->
</div>


<script>
  $(function() {
    var urlAjaxDatatable = "<?= site_url('Data_deposit/get_ajax') ?>";
    window.crud = $("#example").DataTable({
      "responsive": false,
      "lengthChange": false,
      "autoWidth": true,
      "ordering": false,
      "processing": true,
      'serverSide': true,
      "info": true,
      "ajax": {
        "url": urlAjaxDatatable,
        "type": "POST"
      },
      initComplete: function(s, json) {
        var data = null;
        if (json.data != undefined) {
          data = json.data;
        }
        this.api().columns().every(function() {
          var column = this;
          // console.log(column);
          if (column[0][0] == 2 && column[0][0] != 0) {
            var select = $(`<select></select>`);
            var valueS = [];
            if (data != null) {
              data.forEach(function(item, index) {
                if (valueS.indexOf(item[2]) == -1)
                  valueS.push(item[2]);
              });
            }
            select.append(`<option value="">Nama Toko</option>`);
            valueS.forEach(function(d, i) {
              select.append(`<option value="${d}">${d}</option>`);
            });
            select.appendTo($(column.header()).empty())
              .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );
                var parameter = "nama_toko";
                var ajax_table = $("#example").DataTable();
                var current_url = ajax_table.ajax.url();
                var new_url = addOrUpdateUriParameter(current_url, parameter, val);
                new_url = normalizeAmpersand(new_url.toString());
                ajax_table.ajax.url(new_url).load();
                // column.search(val ? '^' + val + '$' : '', true, false)
                // .draw();
              });
          }

          if (column[0][0] == 3 && column[0][0] != 0) {
            var select = $(`<select></select>`);
            var valueS = [];
            if (data != null) {
              data.forEach(function(item, index) {
                if (valueS.indexOf(item[3]) == -1)
                  valueS.push(item[3]);
              });
            }
            select.append(`<option value="">Status</option>`);
            valueS.forEach(function(d, i) {
              select.append(`<option value="${d}">${d}</option>`);
            });
            select.appendTo($(column.header()).empty())
              .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );
                var parameter = "status";
                var ajax_table = $("#example").DataTable();
                var current_url = ajax_table.ajax.url();
                var new_url = addOrUpdateUriParameter(current_url, parameter, val);
                new_url = normalizeAmpersand(new_url.toString());
                ajax_table.ajax.url(new_url).load();
                // column.search(val ? '^' + val + '$' : '', true, false)
                // .draw();
              });
          }

          if (column[0][0] == 4 && column[0][0] != 0) {
            var select = $(`<select></select>`);
            var valueS = [];
            if (data != null) {
              data.forEach(function(item, index) {
                if (valueS.indexOf(item[4]) == -1)
                  valueS.push(item[4]);
              });
            }
            select.append(`<option value="">Invoice</option>`);
            valueS.forEach(function(d, i) {
              select.append(`<option value="${d}">${d}</option>`);
            });
            select.appendTo($(column.header()).empty())
              .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );
                var parameter = "invoice";
                var ajax_table = $("#example").DataTable();
                var current_url = ajax_table.ajax.url();
                var new_url = addOrUpdateUriParameter(current_url, parameter, val);
                new_url = normalizeAmpersand(new_url.toString());
                ajax_table.ajax.url(new_url).load();
                // column.search(val ? '^' + val + '$' : '', true, false)
                //   .draw();
              });
          }
          // if (column[0][0] != 0 && column[0][0] != 0) {
          //   var select = $('<select><option value=""></option></select>')
          //     .appendTo($(column.header()).empty())
          //     .on('change', function() {
          //       var val = $.fn.dataTable.util.escapeRegex(
          //         $(this).val()
          //       );
          //       column.search(val ? '^' + val + '$' : '', true, false)
          //         .draw();
          //     });
          //   column.data().unique().sort().each(function(d, j) {
          //     select.append('<option value="' + d + '">' + d + '</option>')
          //   });
          // }
        });
      },
      "dom": 'Bfrtip',
      "buttons": ['csv', 'excel', 'print'],
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

  });
</script>