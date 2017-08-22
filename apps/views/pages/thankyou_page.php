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
            .status-available{color:#2FC332;}
            .status-not-available{color:#D60202;}
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="background-color:#808080;">
        <div style="background-color: #ebebe0;">
            <?php echo $template['header']; ?>
            <section class="content-header">
            </section>
            <section class="content">
                <div class="row">
                    <h1 align="center">Anda sudah menyelesaikan psikotes<br>TERIMA KASIH<br>
                        <img src="<?php echo base_url() ?>/assets/images/checkmark1.png">
                    </h1>    
                </div>
            </section> 
        </div>
        <?php echo $html['js']; ?>
    </body>
</html>