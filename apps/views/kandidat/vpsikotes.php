<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3><a data-toggle="tooltip" href="#" title="Set External Psikotes" onclick="set_external_psikotes()" ><i class="glyphicon glyphicon-th-list"></i> External Psikotes</a>
    </div>
    <div class="box-body">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
<script src="<?php echo base_url('assets/bootstrap/js/jquery.js') ?>"></script>
<script type="text/javascript">
    var save_method;
    var table;
    var modal_add_jadwal_itv;
    var modal_psikotes_set_status;
    
    function edit_psikotes(id_kandidat)
    {
        save_method = 'update';
        $('#set_status')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/psikotes/ajax_edit') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="pendidikan_level"]').val(data.pendidikan_level);
                $('#modal_psikotes_set_status').modal('show');
                $('.modal-title').text('Psikotes');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    
    function save_psikotes_stat()
    {
        $('#btnSavePsikotesSta').text('saving...');
        $('#btnSavePsikotesSta').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/psikotes/ajax_update') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#set_status').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_psikotes_set_status').modal('hide');
                    location.reload();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavePsikotesSta').text('save');
                $('#btnSavePsikotesSta').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSavePsikotesSta').text('save');
                $('#btnSavePsikotesSta').attr('disabled', false);
            }
        });
    }
    
    
    $(document).ready(function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('kandidat/psikotes/ajax_list') ?>",
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
    
    function set_external_psikotes()
    {
        save_method = 'add';
        $('#form_external')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form_external_psikotes').modal('show');
        $('.modal-title').text('External psikotes');
    }

    function call_person(id_kandidat){
        save_method = 'update';
        $('#call_form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url: "<?php echo site_url('kandidat/psikotes/ajax_set_jadwal') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="pendidikan_level"]').val(data.pendidikan_level);
                $('[name="no_tlp"]').val(data.no_tlp);
                $('[name="no_hp"]').val(data.no_hp);
                $('[name="nama_lengkap"]').val(data.nama_lengkap);
                $('[name="status_kandidat"]').val(data.status_kandidat);
                $('[name="email"]').val(data.email);
                $('#modal_add_jadwal_itv').modal('show');
                $('.modal-title').text('Kirim Psikotes');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
        $(".docs-date").datepicker();
    }
    function reload_table()
    {
        table.ajax.reload(null, false);
    }
    function save_jadwal()
    {
        $('#btnSavejw').text('Sending Email...');
        $('#btnSavejw').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/psikotes/ajax_kirim_email') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#call_form').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_jadwal_itv').modal('hide');
                    location.reload();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavejw').text('save');
                $('#btnSavejw').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                location.reload();
            }
        });
    }
    
    function save_jadwal_ext()
    {
        $('#btnSavejwex').text('Sending Email...');
        $('#btnSavejwex').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/psikotes/ajax_kirim_email') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_external').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_form_external_psikotes').modal('hide');
                    location.reload();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavejwEx').text('save');
                $('#btnSavejwex').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                location.reload();
            }
        });
    }
    
$(document).ready(function() {
	$("#id_ist").click(function() {
  	if (!$(this).is(":checked")){
         $("input[name='ist']").val("");
         $("#ist").hide();}
            else{
            $("#ist").show();    
            $("input[name='ist']").val($("input[name='hidden_url_instruksi_psikotest']").val()+"/"+$('#id_kandidat').val()+"/"+$('#pendidikan_level').val()+"?psikotes=ist");}
  
});
});   

$(document).ready(function() {
	$("#id").click(function() {
  	if (!$(this).is(":checked")){
            $("input[name='papi']").val("");
            $("#papi").hide();
    }
    else
    {
        $("#papi").show();
            $("input[name='papi']").val($("input[name='papi_kostik']").val()+"/"+$('#id_kandidat').val()+"?psikotes=papi");}
    });
});

$(document).ready(function() {
	$("#id_cfit").click(function() {
  	if (!$(this).is(":checked")){
            $("input[name='cfit']").val("");
            $("#cfit").hide();
    }
  else{
    $("#cfit").show();
    $("input[name='cfit']").val($("input[name='cfits']").val()+"/"+$('#id_kandidat').val()+"?psikotes=cfit");}
});
});

$(document).ready(function() {
	$("#id_disk").click(function() {
  	if (!$(this).is(":checked")){
            $("input[name='disk']").val("");
            $("#disk").hide();
    }
    else{ $("#disk").show();
        $("input[name='disk']").val($("input[name='disks']").val()+"/"+$('#id_kandidat').val()+"?psikotes=disk");}
});
});

$(document).ready(function() {
	$("#id_ist2").click(function() {
  	if (!$(this).is(":checked")){
         $("input[name='ist2']").val("");
         $("#ist2").hide();}
            else{
            $("#ist2").show();    
            $("input[name='ist2']").val($("input[name='hidden_url_instruksi_psikotest2']").val()+"?psikotes=ist");}
  
});
}); 

$(document).ready(function() {
	$("#id2").click(function() {
  	if (!$(this).is(":checked")){
            $("input[name='papi2']").val("");
            $("#papi2").hide();
    }
    else{
        $("#papi2").show();
            $("input[name='papi2']").val($("input[name='papi_kostik2']").val()+"?psikotes=papi");}
});
});

$(document).ready(function() {
	$("#id_cfit2").click(function() {
  	if (!$(this).is(":checked")){
            $("input[name='cfit2']").val("");
            $("#cfit2").hide();
    }
    else{
         $("#cfit2").show();
         $("input[name='cfit2']").val($("input[name='cfits2']").val()+"?psikotes=cfit");}
});
});

$(document).ready(function() {
	$("#id_disk2").click(function() {
  	if (!$(this).is(":checked")){
            $("input[name='disk2']").val("");
            $("#disk2").hide();
    }
    else{ $("#disk2").show();
        $("input[name='disk2']").val($("input[name='disks2']").val()+"?psikotes=disk");}
});
});

</script>
<div class="modal fade" id="modal_add_jadwal_itv" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Psikotes Form</h3>
            </div>
            <div class="modal-body call_form">
                <form action="#" id="call_form" class="form-horizontal">
                    <input type="hidden" value="" id="id_kandidat" name="id_kandidat"/> 
                    <input  type="hidden" value="" id="pendidikan_level" name="pendidikan_level"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">SEND TO</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="Email" class="form-control" type="text">
                            </div>
                        </div>
                        <input  placeholder="Link will generate" id="id_ist" type="checkbox"> IST  
                        <input  placeholder="Link will generate" id="id"      type="checkbox"> PAPI 
                        <input  placeholder="Link will generate" id="id_cfit" type="checkbox"> CFIT 
                        <input  placeholder="Link will generate" id="id_disk" type="checkbox"> DISK <br>
                        <input style="display: none" class="form-control" id="ist" name="ist">
                        <input style="display: none" class="form-control" id="papi" name="papi">
                        <input style="display: none" class="form-control" id="cfit" name="cfit">
                        <input style="display: none" class="form-control" id="disk" name="disk">                        
                        <input type="hidden" name="hidden_url_instruksi_psikotest" value="<?php echo base_url() ?>instruksi-psikotes">
                        <input type="hidden" name="papi_kostik" value="<?php echo base_url() ?>instruksi-psikotes">
                        <input type="hidden" name="cfits" value="<?php echo base_url() ?>instruksi-psikotes">
                        <input type="hidden" name="disks" value="<?php echo base_url() ?>instruksi-psikotes">
                     </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavejw" onclick="save_jadwal()" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_psikotes_set_status" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Psikotes Form</h3>
            </div>
            <div class="modal-body set_status">
                <form action="#" id="set_status" class="form-horizontal">
                    <input type="hidden" value="" id="id_kandidat" name="id_kandidat"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Kandidat</label>
                            <div class="col-md-9">
                                <select name="status_kandidat" id="status_kandidat" class="form-control">
                                    <option value="">--pilih--</option>
                                    <option value="6">Disarankan</option>
                                    <option value="7">Dipertimbangkan</option>
                                    <option value="8">Tidak disarankan</option>
                                </select>
                            </div>
                        </div>  
                     </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavePsikotesSta" onclick="save_psikotes_stat()" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_form_external_psikotes" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Psikotes Form</h3>
            </div>
            <div class="modal-body form_external">
                <form action="#" id="form_external" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3">SEND TO</label>
                        <div class="col-md-9">
                            <input name="email" placeholder="Email" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-body">
                       <input  placeholder="Link will generate" id="id_ist2" type="checkbox"> IST  
                        <input  placeholder="Link will generate" id="id2"      type="checkbox"> PAPI 
                        <input  placeholder="Link will generate" id="id_cfit2" type="checkbox"> CFIT 
                        <input  placeholder="Link will generate" id="id_disk2" type="checkbox"> DISK <br>
                        <input style="display: none" class="form-control" id="ist2" name="ist2">
                        <input style="display: none" class="form-control" id="papi2" name="papi2">
                        <input style="display: none" class="form-control" id="cfit2" name="cfit2">
                        <input style="display: none" class="form-control" id="disk2" name="disk2">
                        <input type="hidden" name="hidden_url_instruksi_psikotest2" value="<?php echo base_url() ?>instruksi-psikotes">
                        <input type="hidden" name="papi_kostik2" value="<?php echo base_url() ?>instruksi-psikotes">
                        <input type="hidden" name="cfits2" value="<?php echo base_url() ?>instruksi-psikotes">
                        <input type="hidden" name="disks2" value="<?php echo base_url() ?>instruksi-psikotes">
                     </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavejwex" onclick="save_jadwal_ext()" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>