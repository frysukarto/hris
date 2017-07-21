<div class="box">
    <div class="box-body">
        <?php if (count($menudrop) > 0) { ?>
            <form class="form-horizontal" action="<?php echo base_url(); ?>group-menu-set/<?php echo $this->uri->segment(2); ?>/<?php echo $this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">
                <fieldset><div class="form-actions">
                        <div class="form-group">
                            <div class="col-md-5"><select class="form-control" name="id_admin_menu" id="selectError3">
                                <?php $total_m = count($menudrop);
                                for ($b = 0; $b < $total_m; $b++) {
                                    ?>
                                <option  value="<?php echo $menudrop[$b]['id_admin_menu'] ?>"><?php echo $menudrop[$b]['menu'] ?></option>
    <?php } ?>
                            </select></div>  <button data-rel="tooltip" class="btn btn-success" title="Add Menu" type="submit">Add +</button>
                        </div>
                    </div>        
                </fieldset>
            </form>        
            <?php } ?>     
        <!-- Post -->
        <table id="example2" class="table table-bordered table-striped">
            <thead><tr>
                    <th>Menu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_menu = count($menu);
                for ($i = 0; $i < $total_menu; $i++) {
                    ?>
                    <tr>
                        <td><?php echo $menu[$i]['menu'] ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>delete-menu-set/<?php echo $menu[$i]['id_admin_group'] ?>/<?php echo slug($menu[$i]['nama_group']) ?>/<?php echo $menu[$i]['id_admin_group_menu'] ?>"><i title="delete" data-toggle="tooltip" class="fa fa-remove" ></i></a>
                        </td>
                    </tr>
        <?php } ?>
        </table>
    </div>
</div>