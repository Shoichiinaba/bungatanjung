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
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.min">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/plugins/toastr/toastr.min.css">  
                     

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
        
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
        <!-- page script -->
        <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": true,
                "buttons": ["csv", "excel", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });
            });
        </script>
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