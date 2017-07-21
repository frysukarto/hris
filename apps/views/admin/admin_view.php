<div class="box">
<div class="box-header">
    <h3 class="box-title"></h3>
    <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add +</button>
</div>
<div class="box-body">
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th style="width:130px;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
<script src="<?php echo base_url('assets/bootstrap/js/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
<script type="text/javascript">
            var save_method;
            var table;
            $(document).ready(function () {
                table = $('#table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        "url": "<?php echo site_url('admin/admin/ajax_list') ?>",
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [-1],
                            "orderable": false,
                        },
                    ],
                });
                $('.datepicker').datepicker({
                    autoclose: true,
                    format: "dd-mm-yyyy",
                    todayHighlight: true,
                    orientation: "top auto",
                    todayBtn: true,
                    todayHighlight: true,
                });
                $("input").change(function () {
                    $(this).parent().parent().removeClass('has-error');
                    $(this).next().empty();
                });
                $("textarea").change(function () {
                    $(this).parent().parent().removeClass('has-error');
                    $(this).next().empty();
                });
                $("select").change(function () {
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
                    url: "<?php echo site_url('admin/admin/ajax_edit/') ?>/" + id_admin,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data)
                    {
                        $('[name="id_admin"]').val(data.id_admin);
                        $('[name="fullname"]').val(data.fullname);
                        $('[name="email"]').val(data.email);
                        $('[name="SIP"]').val(data.SIP);
                        $('[name="username"]').val(data.username);
                        $('[name="tgl_lahir"]').val(data.tgl_lahir);
                        $('[name="id_admin_group"]').val(data.id_admin_group);
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
                table.ajax.reload(null, false);
            }
            function save()
            {
                $('#btnSave').text('saving...');
                $('#btnSave').attr('disabled', true);
                var url;
                if (save_method == 'add') {
                    url = "<?php echo site_url('admin/admin/ajax_add') ?>";
                } else {
                    url = "<?php echo site_url('admin/admin/ajax_update') ?>";
                }
                // ajax adding data to database
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function (data)
                    {
                        if (data.status)
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                        } else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                            }
                        }
                        $('#btnSave').text('save');
                        $('#btnSave').attr('disabled', false);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnSave').text('save');
                        $('#btnSave').attr('disabled', false);
                    }
                });
            }
            function delete_person(id_admin)
            {
                if (confirm('Are you sure delete this data?'))
                {
                    // ajax delete data to database
                    $.ajax({
                        url: "<?php echo site_url('admin/admin/ajax_delete') ?>/" + id_admin,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
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
            
            function reset_admin(id_admin)
            {
                if (confirm('Are you sure reset this Account?'))
                {
                    $.ajax({
                        url: "<?php echo site_url('admin/admin/ajax_reset_admin') ?>/"+id_admin,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error reseting data');
                        }
                    });
                }
            }
</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_admin"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="fullname" placeholder="Fullname" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">UserName</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="Username" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">SIP</label>
                            <div class="col-md-9">
                                <input type="SIP" name="SIP" placeholder="SIP" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">PIC Valdo</label>
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="bandung">Bandung</option>
                                    <option value="medan">Medan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Group</label>
                            <div class="col-md-9">
                                <select name="id_admin_group" class="form-control">
                                    <option value="">--Select Group--</option>
                                    <?php $total_g = count($group);
                                for ($c = 0; $c < $total_g; $c++) { ?>
                                        <option value="<?php echo $group[$c]['id_admin_group'] ?>"><?php echo $group[$c]['nama_group'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="tgl_lahir" id="tgl_lahir" placeholder=" DD-mm-yyyy" class="form-control datepicker" type="text">
                            </div>
                        </div>

                      
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>