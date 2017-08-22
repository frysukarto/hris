<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Valdo | Home </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" rel="shortcut icon" type="image/x-icon" />
        <?php echo $html['css']; ?>
        <style>
            #parent{display: flex;}
            #narrow {width: 100px;}#wide {flex:1;}
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
                    <h1>Dashboard<small>Control panel</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <?php echo $kandidat['datatable'] ?>
                    </div>
                </section>
            </div>
            <?php echo $template['footer'] ?>
            <div class="control-sidebar-bg"></div>
        </div>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script type="application/javascript">
            function isNumberKey(e){var h=e.which?e.which:event.keyCode;return h>31&&(48>h||h>57)?!1:!0}
        </script>
        <?php echo $html['js']; ?>
        <style>
            body {
                font-family: arial;
            }
            .hide {
                display: none;
            }
            p {
                font-weight: bold;
            }
        </style>
        <script>
            function show1() {
                document.getElementById('div1').style.display = 'none';
            }
            function show2() {
                document.getElementById('div1').style.display = 'block';
            }
            function show3() {
                document.getElementById('div2').style.display = 'none';
            }
            function show4() {
                document.getElementById('div2').style.display = 'block';
            }
            function show5() {
                document.getElementById('div3').style.display = 'none';
            }
            function show6() {
                document.getElementById('div3').style.display = 'block';
            }
        </script>
        <script>
            function checkEmailAvailability() {
                jQuery.ajax({
                    url: "<?php echo site_url('kandidat/add_kandidat/check_email_exists') ?>",
                    data: 'email=' + $("#email").val(),
                    type: "POST",
                    success: function (data) {
                        $("#user-availability-status").html(data);
                    },
                    error: function () {}
                });
            }
            function checkKtpAvailability() {
                jQuery.ajax({
                    url: "<?php echo site_url('kandidat/add_kandidat/check_ktp_exists') ?>",
                    data: 'no_ktp=' + $("#no_ktp").val(),
                    type: "POST",
                    success: function (data) {
                        $("#user-ktp-status").html(data);
                    },
                    error: function () {}
                });
            }
        </script>
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