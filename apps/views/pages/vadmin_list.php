<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Valdo | Home </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo $html['css']; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php echo $template['header']; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php echo $template['sidebarmenu']; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kandidat Management</li>
      </ol>
    </section>

    <!-- Main content -->
     <?php echo $admin['datatable']?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $template['footer']?>
  <!-- Control Sidebar -->
  
  <div class="control-sidebar-bg"></div>
</div>
<?php echo $html['js']; ?>

<script>
  $.widget.bridge('uibutton', $.ui.button);
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>


</body>
</html>
