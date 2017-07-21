<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <button data-target=".bs-example-modal-lg" data-toggle="modal" type="button" class="btn btn-success">Add +</button>
       </div>
<!-- MODAL -->
<!--ADMIN EDIT START-->
<form  action="<?php echo base_url(); ?>admin-group" method="post" enctype="multipart/form-data">
    <div class="modal fade bs-example-modal-lg-group" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-title">
                        <div class="box-header with-border">
                            <h3 class="box-title">Group</h3>
                        </div>
                        <div class="box-body">
                           <div class="form-group">
                                <label>Group</label>
                                <input type="text" required name="group" class="form-control" placeholder="group ...">
                            </div>
                           <input type="submit"  id="submit" value="submit" class="btn btn-primary"><br>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
 <!--ADMIN EDIT END-->
 <!--ADMIN EDIT START-->
 <!--ADMIN EDIT END-->
<!--ADMIN MODAL ADD-->
    <form  action="<?php echo base_url(); ?>admin-add" method="post" enctype="multipart/form-data"><div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-title">
                        <div class="box-header with-border">
                            <h3 class="box-title">TAMBAH ADMIN</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" required name="fullname" class="form-control" placeholder="Nama Lengkap ...">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" required name="username" class="form-control" placeholder="username ...">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" required name="email" class="form-control" placeholder="Email ...">
                            </div>
                            <div class="form-group ol-xs-3">
                                <label>Passwrod</label>
                                <input type="password" required name="password" minlength=6 style="width: 300px;" id="pass1" class="form-control" placeholder="Password ...">
                            </div>
                            <div class="form-group ol-xs-3">
                                <label>Retype Password</label>
                                <input type="password" name="pass2" required style="width: 300px;" id="pass2" onkeyup="checkPass(); return false;" class="form-control" placeholder="Retype Password ..."><span id="confirmMessage" class="confirmMessage"></span>
                            </div><input type="submit"  id="submit" value="submit" class="btn btn-primary"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--ADMIN MODAL ADD END-->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Telpon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = count($list);
                for ($i = 0; $i < $total; $i++) { ?>
                    <tr>
                        <td><?php echo $list[$i]['fullname'] ?></td>
                        <td><?php echo $list[$i]['username'] ?></td>
                        <td><?php echo $list[$i]['email'] ?></td>
                        <td><?php echo $list[$i]['no_tlp'] ?></td>
                        <td>
                            <a class="delete-row-default" href="delete-admin/<?php echo $list[$i]['id_admin'] ?>/<?php echo slug($list[$i]['fullname']) ?>"><i title="delete" data-toggle="tooltip" class="fa fa-remove" ></i></a>
                            <a data-target=".bs-example-modal-lg-edit" data-toggle="modal" type="button" data-character-id="<?php echo $list[$i]['id_admin'] ?>" href="<?php echo $list[$i]['id_admin'] ?>"><i data-toggle="tooltip" title="edit" class="fa fa-edit"></i></a>
                            <a title="view" href=""><i data-toggle="tooltip" title="view" class="fa fa-eye"></i></a>
                        </td>
                    </tr>
            <?php } ?>
        </table>       
    </div>
</div>