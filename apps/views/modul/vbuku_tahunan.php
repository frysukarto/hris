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
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Asal Sekolah</th>
                <th>Gender</th>
                <th style="width:125px;">Action</th>
            </tr>
        </thead>
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
            "url": "<?php echo site_url('modul/buku_tahunan/ajax_list')?>",
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
    $('.modal-title').text('Add Person'); 
}
function edit_person(id_buku_tahunan)
{
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty();
    $.ajax({
        url : "<?php echo site_url('modul/buku_tahunan/ajax_edit')?>/" + id_buku_tahunan,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_buku_tahunan"]').val(data.id_buku_tahunan);
            $('[name="nama_lengkap_b"]').val(data.nama_lengkap_b);
            $('[name="no_telpon"]').val(data.no_telpon);
            $('[name="alamat_bt"]').val(data.alamat_bt);
            $('[name="asal_sekolah_bt"]').val(data.asal_sekolah_bt);
            $('[name="gender"]').val(data.gender);
            $('[name="pendidikan_terakhir"]').val(data.pendidikan_terakhir);
            $('[name="agama"]').val(data.agama);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="umur"]').val(data.umur);
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
        url = "<?php echo site_url('modul/buku_tahunan/ajax_add')?>";
    } 
    else {
        url = "<?php echo site_url('modul/buku_tahunan/ajax_update')?>";
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
function delete_person(id_buku_tahunan)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('modul/buku_tahunan/ajax_delete')?>/"+id_buku_tahunan,
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
setInterval(function ()
{
    $.ajax({
        type: "post",
        url: "<?php echo base_url() ?>new-entry",
        datatype: "html",
        success: function (data)
        {
             reload_table();

        }
    });
}, 10000);
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
                <form action="javascript:void(0)" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_buku_tahunan"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama_lengkap_b" placeholder="Nama Lengkap" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telpon</label>
                            <div class="col-md-9">
                                <input name="no_telpon" onkeypress="return isNumberKey(event)" placeholder="No Telpon" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat_bt" placeholder="Alamat" class="form-control" type="text"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Umur</label>
                            <div class="col-md-9">
                                <input name="umur" placeholder="umur" maxlength="2" minlength="2" class="form-control" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                       <label class="control-label col-md-3">Agama</label>
                         <div class="col-md-9">
                        <select class="form-control select2" name="agama" style="width: 100%;">
                            <option selected="selected" value="">Pilih</option>
                            <option  value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div></div>
                        
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                    <select  class="form-control" required name="provinsi" id="sc_get_prov"> 
                                    <option value="" >Pilih</option>
                                    <?php foreach ($dropdownprov as $a) {
                                        echo '<option value="'.$a["provinsi_nama"].'">'.$a["provinsi_nama"].'</option>';}
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-9">
                              <select class="form-control select2" name="pendidikan_terakhir" style="width: 100%;">
                                  <option selected="selected" value="">Pilih</option>      
                                        <option  value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA/SMK</option>
                                        <option value="d1">D1</option>
                                        <option value="d2">D2</option>
                                        <option value="d3">D3</option>
                                        <option value="s1">S1</option>
                                        <option value="s2">S2</option>
                                        <option value="s3">S3</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9"><select class="form-control" id="gender" name="gender" >
                                <option value="">Pilih</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div></div>
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