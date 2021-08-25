<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem | Upload Data</title>
        <link rel="icon" type="image/png" href="<?= base_url()?>assets/dist/img/logo.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/bootstrap-slider/css/bootstrap-slider.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/toastr/toastr.min.css">  
                     

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
        




<div>
</body>
</html>
        <!-- jQuery -->
        <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables/ddtf.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>assets//plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-select/js/dataTables.select.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-select/js/select.bootstrap4.min.js"></script>
        
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
        <!-- Select2 -->
        <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
        <!-- page script -->
        <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, 
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "processing":true,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        // console.log(column);
                        if(column[0][0] != 0 && column[0][0] != 7){
                          var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column.search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                            } );
                          column.data().unique().sort().each( function ( d, j ) {
                              select.append( '<option value="'+d+'">'+d+'</option>' )
                          }); 
                        }   
                    });
                },
                "buttons": ["csv", "excel", "print"],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });

              $("#example3").DataTable({
                "responsive": false, 
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "processing":true,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        // console.log(column);
                        if(column[0][0] != 0 && column[0][0] != 9 && column[0][0] != 8){
                          var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column.search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                            } );
                          column.data().unique().sort().each( function ( d, j ) {
                              select.append( '<option value="'+d+'">'+d+'</option>' )
                          }); 
                        }   
                    });
                },
                "buttons": ["csv", "excel", "print"],
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
            });
            
            // $('#example1').DataTable({
                
            // });
         </script> 
         <!-- iki wingi q jajal gawe iki  -->

<script type="text/javascript">
  $(function() {
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Aplikasi membutuhkan update untuk menggunakan fitur upload shopee...!!!',
        title: 'Coming Soon!!!',
        subtitle: 'Versi belum tersedia',
        class: 'bg-maroon',
        icon: 'fas fa-envelope fa-lg',
        autohide: true,
        position: 'topLeft',
        delay: 3500,
      })
    });
    $('.toastsDefaultFull1').click(function() {
      $(document).Toasts('create', {
        body: 'Aplikasi membutuhkan update untuk menggunakan fitur tambah toko bukalapak...!!!',
        title: 'Coming Soon!!!',
        subtitle: 'Versi belum tersedia',
        class: 'bg-danger',
        icon: 'fas fa-cart-plus fa-lg',
        autohide: true,
        position: 'topLeft',
        delay: 3500,
      })
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 load_data();

 function load_data(is_toko)
 {
  var dataTable = $('#data_toko').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "buttons": ["csv", "excel", "print"],
   "ajax":{
    url:"http://localhost/bunga_tanjung/Data_deposit/data_filter",
    type:"POST",
    data:{is_toko:is_toko}
   },
   "columnDefs":[
    {
     "targets":[2],
     
     "orderable":false,
    },
   ],
  }).buttons().container().appendTo('#data_toko_wrapper .col-md-6:eq(0)');
 }

 $(document).on('change', '#toko', function(){
  var category = $(this).val();
  $('#data_toko').DataTable().destroy();
  if(toko != '')
  {
   load_data(toko);
  }
  else
  {
   load_data();
  }
 });
});
</script>