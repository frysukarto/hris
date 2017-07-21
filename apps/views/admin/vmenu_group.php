  <form  action="<?php echo base_url(); ?>menu-add" method="post" enctype="multipart/form-data">
        <div class="modal fade bs-example-modal-addmenu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-title">
                        <div class="box-header with-border">
                            <h3 class="box-title">Menu</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Menu</label>
                                <input type="text" required name="menu" class="form-control" placeholder="Menu ...">
                            </div>
                            <input type="submit"  id="submit" value="submit" class="btn btn-primary"><br>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </form>
    <!--ADMIN MENU END-->
 <!--Group START-->
    <form  action="<?php echo base_url(); ?>group-add" method="post" enctype="multipart/form-data">
        <div class="modal fade bs-example-modal-xs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-title">
                        <div class="box-header with-border">
                            <h3 class="box-title">Group</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Group</label>
                                <input type="text" required name="nama_group" class="form-control" placeholder="Group ...">
                            </div>
                            <input type="submit" id="submit" value="submit" class="btn btn-primary"><br>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Group END-->
    
<div class="box-body">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Group</a></li>
            <li><a href="#timeline" data-toggle="tab">Menu</a></li>
        </ul>
        <div class="tab-content">
            <div class=" tab-pane" id="timeline">
                <!-- Post -->
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr><button data-target=".bs-example-modal-addmenu" data-toggle="modal" type="button" class="btn btn-success">Add +</button>
                    <th>Menu</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_m = count($menu);for ($b = 0; $b < $total_m; $b++) {?>
                            <tr>
                                <td><?php echo $menu[$b]['menu'] ?></td>
                                <td>
                                    <a class="delete-row-default" href="delete-menu/<?php echo $menu[$b]['id_admin_menu'] ?>/<?php echo slug($menu[$b]['menu']) ?>"><i title="delete" data-toggle="tooltip" class="fa fa-remove" ></i></a>
                                </td>
                            </tr>
                    <?php } ?>
                </table>
                <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="active tab-pane" id="activity">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr><button data-target=".bs-example-modal-xs" data-toggle="modal" type="button" class="btn btn-success">Add +</button>
                    <th>Group</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_g = count($group); for ($c = 0; $c < $total_g; $c++) {?>
                            <tr>
                                <td><a href="<?php echo base_url() ?>group-menu-set/<?php echo $group[$c]['id_admin_group'] ?>/<?php echo $group[$c]['nama_group'] ?>"><?php echo $group[$c]['nama_group'] ?></a></td>
                                <td>
                                    <a href="<?php echo base_url() ?>group-menu-set/<?php echo $group[$c]['id_admin_group'] ?>/<?php echo $group[$c]['nama_group'] ?>"><i class="fa fa-edit"></i></a>
                                    <a class="delete-row-default" href="delete-group/<?php echo $group[$c]['id_admin_group'] ?>/<?php echo slug($group[$c]['nama_group']) ?>"><i title="delete" data-toggle="tooltip" class="fa fa-remove" ></i></a>
                                </td>
                            </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>