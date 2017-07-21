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
        <div style="background-color: #ebebe0;">
            <?php echo $template['header']; ?>
                <section class="content-header">
                    <h1>Kandidat<small>Control panel</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Kandidat Management</li>
                    </ol>
                </section>
                <section class="content"><div class="row">
                        <?php echo $admin['datatable'] ?>
                    </div>
                </section>
            </div> 
        </div>
        <?php echo $html['js']; ?>
    </body>
</html>
