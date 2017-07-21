<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Valdo | Home </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php echo $html['css']; ?>
        <style>
            .status-available{color:#2FC332;}
            .status-not-available{color:#D60202;}
        </style>
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
                        Admin
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Kandidat Management</li>
                    </ol>
                </section>
                <?php echo $admin['datatable'] ?>
            </div>
            <?php echo $template['footer'] ?>
            <div class="control-sidebar-bg"></div>
        </div>
        <?php echo $html['js']; ?>
        <script>
            $(function () {
                $(".select2").select2();
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
                $(".my-colorpicker1").colorpicker();
                $(".my-colorpicker2").colorpicker();
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>
        <script>
            function checkPass()
            {
                var pass1 = document.getElementById('pass1');
                var pass2 = document.getElementById('pass2');
                var oldpassword = document.getElementById('oldpassword');
                var message = document.getElementById('confirmMessage');
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                if (pass1.value == "") {
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Tidak Boleh Kosong !"
                    document.getElementById("myBtn").disabled = true;
                } else if (oldpassword.value == "") {
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Tidak Boleh Kosong !"
                    document.getElementById("myBtn").disabled = true;
                } else if (oldpassword.value == pass1.value) {
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Same with old Password !"
                    document.getElementById("myBtn").disabled = true;
                } else if (pass1.value == pass2.value) {
                    pass2.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Passwords Match!"
                    document.getElementById("myBtn").disabled = false;
                } else {
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    document.getElementById("myBtn").disabled = true;
                    message.innerHTML = "Passwords Do Not Match!"
                }
            }</script>
        <script>
            function checkPassAvailability() 
            {
                jQuery.ajax({
                    url: "<?php echo site_url('admin/ganti_password/check_oldpassword') ?>",
                    data: 'oldpassword=' + $("#oldpassword").val(),
                    type: "POST",
                    success: function (data) {
                        $("#user-password-status").html(data);
                    },
                    error: function () {}
                });
            }
        </script>
    </body>
</html>
