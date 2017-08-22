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
<div class="wrapper">
  <?php echo $template['header']; ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <?php echo $template['sidebarmenu']; ?>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Modul
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Modul Management</li>
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
  
  $('#myDropdown').on('hide.bs.dropdown', function () {
    return false;
});
  $('#myDropdown .dropdown-menu').on({
    "click":function(e){
      e.stopPropagation();
    }
});
</script>
<!-- <script>
        $('#sc_get_prov').change(function () {
            var form_data = { 
                provinsi_id : $('#sc_get_prov').val()
            };
            $.ajax({
                url: "<?php echo site_url('kandidat/add_kandidat/ajax_call') ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc="";
                    $.each(msg, function (key, val) {
                        sc+= '<option value="' +val.kota_id+ '">' +val.kokab_nama+ '</option>';
                    });
                    $("#sc_show_kota option").remove();
                    $("#sc_show_kota").append(sc);
                }
            });
        });
        </script>-->

<script>
           $('#sc_get_cabang').change(function () {
               var form_data = { 
                   id_cabang : $('#sc_get_cabang').val()
               };
               $.ajax({
                   url: "<?php echo site_url('modul/client/ajax_call') ?>",
                   type: 'POST',
                   dataType: 'json',
                   data: form_data,
                   success: function (msg) {
                       var sc="";
                       $.each(msg, function (key, val) {
                           sc+= '<option value="' +val.id_area+ '">' +val.nama_area+ '</option>';
                       });
                       $("#sc_show_area option").remove();
                       $("#sc_show_area").append(sc);
                   }
               });
           });

   </script>
</body>
</html>