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
    <body class="hold-transition skin-blue sidebar-mini" style="background-color:#808080;">
        <div style="background-color: #ebebe0;">
            <?php echo $template['header']; ?>
            <section class="content-header">
            </section>
            <section class="content">
                <div class="row">
                    <h1 align="center"><?php echo $title ?><br></h1> 
                    <h5 align="center">Berikut adalah panduan untuk mengerjakan psikotes<br></h5> 
                    <h4 align="center"> 
                        <a download href="<?php echo $download_pdf ?>"><i class="fa fa-file-pdf-o"></i>Download instruksi pdf</a><br>
                        <a download href="<?php echo $download_ppt ?>" href=""><i class="fa fa-file-powerpoint-o"></i>Download instruksi excel</a></h4>
                        <h2 align="center"> <br><a href="<?php echo $startpsikotes ?>"><button type="button" class="btn btn-info btn-flat">START PSIKOTES</button></a></h2>
                </div>
            </section> 
        </div>
        <?php echo $html['js']; ?>
    </body>
</html>