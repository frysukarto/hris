<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Valdo | Home </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" rel="shortcut icon" type="image/x-icon" />
  <?php echo $html['css']; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper fixed">
  <?php echo $template['header']; ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <?php echo $template['sidebarmenu']; ?>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        HRD
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">HRD Management</li>
      </ol>
    </section>
     <?php echo $admin['datatable']?>
  </div>
  <?php echo $template['footer']?>
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
      "autoWidth": false
    });
  });
</script>
</body>
</html>