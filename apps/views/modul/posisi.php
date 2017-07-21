<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add +</button>
          </div>

        <div class="box-body">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Posisi</th>
                     <th>Level</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
</div>
</div>
<script src="<?php echo base_url('assets/bootstrap/js/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.min.js')?>"></script>

<script type="text/javascript">
var save_method; 
var table;

$(document).ready(function() {
    table = $('#table').DataTable({ 

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('modul/posisi/ajax_list')?>",
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
        format: "dd-mm-yyyy",
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
    $('.modal-title').text('Tambah Posisi'); 
}

function edit_person(id_modul_job_position_setting)
{
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty();
    $.ajax({
        url : "<?php echo site_url('modul/posisi/ajax_edit')?>/" + id_modul_job_position_setting,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_modul_job_position_setting"]').val(data.id_modul_job_position_setting);
            $('[name="nama_posisi"]').val(data.nama_posisi);
            $('[name="level"]').val(data.level);
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
        url = "<?php echo site_url('modul/posisi/ajax_add')?>";
    } else {
        url = "<?php echo site_url('modul/posisi/ajax_update')?>";
    }

    // ajax adding data to database
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
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
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

function delete_person(id_modul_job_position_setting)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('modul/posisi/ajax_delete')?>/" + id_modul_job_position_setting,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
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
                    <input type="hidden" value="" name="id_modul_job_position_setting"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Posisi</label>
                            <div class="col-md-9">
                                <input name="nama_posisi" placeholder="Nama Posisi" class="form-control" type="text">
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-9">
                                <input name="level" placeholder="Level" class="form-control" type="text">
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