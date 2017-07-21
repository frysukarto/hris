<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add +</button>
    </div>
    <div class="box-body">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Area</th>
                            <th>Nama Cabang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody><?php $jum = count($list);
                        for ($i = 0; $i < $jum; $i++) { ?>
                            <tr>
                                <td><?php echo $list[$i]['nama_area'] ?></td>
                                <td><?php echo $list[$i]['nama_cabang'] ?></td>
                                <td>
                                    <a data-toggle="tooltip" class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('<?php echo $list[$i]['id_area'] ?>')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a data-toggle="tooltip" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('<?php echo $list[$i]['id_area'] ?>')"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr> <?php } ?>
                    </tbody>
                 
                </table>
            </div>
        </div>
       <!-- <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Nama Lengkap</th>
                  <th>No KTP</th>
                  <th>No Tlp</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th style="width:125px;">Action</th>
              </tr>
          </thead>
      </table>-->
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
                        "url": "<?php echo site_url('modul/area/ajax_list') ?>",
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
                $('.modal-title').text('Tambah Area');
            }
            function edit_person(id_area)
            {
                save_method = 'update';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $.ajax({
                    url: "<?php echo site_url('modul/area/ajax_edit') ?>/" + id_area,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data)
                    {
                        $('[name="id_area"]').val(data.id_area);
                        $('[name="nama_area"]').val(data.nama_area);
                        $('[name="nama_cabang"]').val(data.nama_cabang);
                        $('#modal_form').modal('show');
                        $('.modal-title').text('Edit Area');
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
                    url = "<?php echo site_url('modul/area/ajax_add') ?>";
                } else {
                    url = "<?php echo site_url('modul/area/ajax_update') ?>";
                }
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
                            location.reload();
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
            function delete_person(id_area)
            {
                if (confirm('Are you sure delete this data?'))
                {
                    // ajax delete data to database
                    $.ajax({
                        url: "<?php echo site_url('modul/area/ajax_delete') ?>/" + id_area,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            //if success reload ajax table
                            $('#modal_form').modal('hide');
                            location.reload();
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
                    <input type="hidden" value="" name="id_area"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Area</label>
                            <div class="col-md-9">
                                <input name="nama_area" placeholder="Nama Area" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Cabang</label>
                            <div class="col-md-9">
                                <select name="id_cabang" class="form-control">
                                    <?php $to= count($cabang); for($i=0;$i<$to;$i++) { ?>
                                    <option value="<?php echo $cabang[$i]['id_cabang'] ?>"><?php echo $cabang[$i]['nama_cabang'] ?></option>
                                    <?php } ?>
                                    </select>
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