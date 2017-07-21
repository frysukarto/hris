<div class="box box-info"><div class="box-header with-border">
    <h3 class="box-title">Log Activity Admin</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
</div>
<div class="box-body">
    <div class="table-responsive">
        <table class="table no-margin">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Activity</th>
                    <th>Time</th>
                    <th>Browser</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = count($log);
                for ($i = 0; $i < $total; $i++) { ?>
                <tr>
                    <td><?php echo $log[$i]['fullname'] ?></td>
                    <td><?php echo $log[$i]['log'] ?></td>
                    <td><?php echo indonesian_dates($log[$i]['time']) ?></td>
                    <td><?php echo textlimit($log[$i]['browser'],20) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>