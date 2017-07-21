<div<div class="box-header">
        <h3 class="box-title"></h3>
        <button data-target=".bs-example-modal-lg" data-toggle="modal" type="button" class="btn btn-success">Add +</button>
    </div> 
    <div class="box-header">
        <h3 class="box-title"></h3>
        <button data-target=".bs-example-modal-lg" data-toggle="modal" type="button" class="btn btn-success">Add +</button>
    </div>

    <!-- Modal -->
    <!--ADMIN MENU START-->
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
    
    <script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#bs-example-modal-edit").modal('show');
                $.post('admin',
                    {id_admin:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
    <!--ADMIN EDIT START-->
    <form  action="<?php echo base_url(); ?>admin-edit/<?php echo $this->input->post('id_admin') ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade bs-example-modal-edit" id="bs-example-modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-title">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit</h3>
                        </div>                     
                        <div class="box-body">    
                            <?php $total_edit = count($edit); 
                        for ($e = 0; $e < $total_edit; $e++) {?>
                            <input type="text"  required name="id_admin" value="<?php echo $edit[$e]['id_admin'];?>" class="form-control" >
                            <div class="form-group">    
                                <label>Nama Lengkap</label>
                                <input type="text" required name="fullname" value="<?php echo $edit[$e]['fullname'];?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" required name="username" value="<?php echo $edit[$e]['username'];?>"class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" required name="email" value="<?php echo $edit[$e]['email'];?>"class="form-control" >
                            </div><?php } ?>
                            <input type="submit"  id="submit" value="submit" class="btn btn-primary"><br>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    <!--ADMIN EDIT END-->
    <!--ADMIN MODAL ADD-->
    <form action="<?php echo base_url(); ?>admin-add" method="post" enctype="multipart/form-data">
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                for ($i = 0; $i < $total; $i++) {
                    ?>
                    <tr>
                        <td><?php echo $list[$i]['fullname'] ?></td>
                        <td><?php echo $list[$i]['username'] ?></td>
                        <td><?php echo $list[$i]['email'] ?></td>
                        <td><?php echo $list[$i]['no_tlp'] ?></td>
                        <td><a class="delete-row-default" href="delete-admin/<?php echo $list[$i]['id_admin'] ?>/<?php echo slug($list[$i]['fullname']) ?>"><i title="delete" data-toggle="tooltip" class="fa fa-remove" ></i></a>
                            <a data-target=".bs-example-modal-edit" class="edit-record" data-toggle="modal" data-id="<?php echo $list[$i]['id_admin'] ?>" href="#"><i data-toggle="tooltip" title="edit" class="fa fa-edit"></i></a>
                            <a title="view" href=""><i data-toggle="tooltip" title="view" class="fa fa-eye"></i></a>
                        </td>
                    </tr>
            <?php } ?>
        </table>
    </div>
<div class="box-body">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Menu</a></li>
            <li><a href="#timeline" data-toggle="tab">Group</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
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
            <div class="tab-pane" id="timeline">
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
                                <td><?php echo $group[$c]['nama_group'] ?></td>
                                <td>
                                    <a class="delete-row-default" href="delete-group/<?php echo $group[$c]['id_admin_group'] ?>/<?php echo slug($group[$c]['nama_group']) ?>"><i title="delete" data-toggle="tooltip" class="fa fa-remove" ></i></a>
                                </td>
                            </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">

var save_method;
var table;

$(document).ready(function() {
    table = $('#table').DataTable({ 

        "processing": true, 
        "serverSide": true,
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('admin/person/ajax_list')?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
});

function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Add Person'); 
}

function edit_person(id_admin)
{
    save_method = 'update';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty();
    $.ajax({
        url : "<?php echo site_url('admin/person/ajax_edit/')?>/" + id_admin,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_admin"]').val(data.id_admin);
            $('[name="fullname"]').val(data.fullname);
            $('[name="username"]').val(data.username);
            $('[name="email"]').val(data.email);
            $('[name="no_tlp"]').val(data.no_tlp);
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Person'); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function reload_table()
{
    table.ajax.reload(null,false); 
}

function save()
{
    $('#btnSave').text('saving...');
    $('#btnSave').attr('disabled',true); 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('admin/person/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/person/ajax_update')?>";
    }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) 
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save');
            $('#btnSave').attr('disabled',false); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 

        }
    });
}
function delete_person(id_admin)
{
    if(confirm('Are you sure delete this data?'))
    {
        $.ajax({
            url : "<?php echo site_url('admin/person/ajax_delete')?>/"+id_admin,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}
</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="tgl_lahir"  class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>