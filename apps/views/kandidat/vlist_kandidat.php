<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <script>
            $('form').submit(function(){
                $(this).attr('action',$(this).attr('action')+$('#print').val());
                return true;
             });
            </script>
            <style>
                #parent {
                display: flex;
              }
              #narrow {
                width: 200px;
                background: lightblue;
              }
              #wide {
                flex: 1;
                background: lightgreen;
              }
              #wides {
                width: 100px;
                
              }
            </style>
           <!--
            <a download href="<?php echo base_url() ?>create-excel-list"><img width="25" src="<?php echo template_uri() ?>/images/excel.png"></a>
            <a download title="pdf" href="<?php echo base_url() ?>create-pdf-list"><img width="25" src="<?php echo template_uri() ?>/images/pdf.png"></a>-->                      
        <form action="<?php echo base_url() ?>report/report_kandidat/create_report">
            <div id="parent">
            <div id="wide" class="input-group col-md-3">
                <div class="input-group-addon">
                 <i class="fa fa-calendar"></i>
                </div>
            <input type="text" id="reservation" name="range" placeholder="Pilih Tanggal" required class="form-control pull-right">
           </div>
            <div id="wide" class="input-group col-md-1">
               <select id="print" name="print" class="form-control">
                    <option style="background-image:url(../../../public/assets/images/pdf.png);" value="pdf">PDF</option>
                    <option style="background-image:url(../../../public/assets/images/excel.png);" value="excel">EXCEL</option>
                </select>
           </div>
           <button type="submit" value="submit"><i class="fa fa-print"></i></button></div>
          
    </form><br>
           <div id="parent">
               <div id="wides" class="input-group col-md-2"><label>Public Link</label> </div>
               <div id="wide" class="input-group col-md-7"><input class="form-control" title="Hanya berlaku 1 hari"  value="<?php echo base_url().'entry-data?token='.sha1(date('dmy')).'&key='.  md5(sha1(date('dmy'))) ?>"></div>
           </div>

           <br>
<a href="<?php echo base_url() ?>kandidat-add"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button></a>
</div>
<div class="box-body">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>KTP</th>
                    <th>Tlp</th>
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
<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    var save_method;
    var table;
    $(document).ready(function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('kandidat/list_kandidat/ajax_list') ?>",
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

    function edit_person(id_kandidat)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/list_kandidat/ajax_edit/') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="status_kandidat"]').val(data.status_kandidat);
                $('#modal_form').modal('show');
                $('.modal-title').text('Set Status');
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
            url = "<?php echo site_url('kandidat/list_kandidat/ajax_add') ?>";
        } else {
            url = "<?php echo site_url('kandidat/list_kandidat/ajax_update') ?>";
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

    function delete_person(id_kandidat)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/list_kandidat/ajax_delete') ?>/" + id_kandidat,
                type: "POST",
                dataType: "JSON",
                success: function (data)
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
                    <input type="hidden" value="" name="id_kandidat"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Kandidat</label>
                            <div class="col-md-9">
                                <select name="status_kandidat" id="status_kandidat" class="form-control">
                                    <option value="">--pilih--</option>
                                    <option value="1">Baru</option>
                                    <option value="2">Caller</option>
                                    <option value="6">Reject</option>
                                    <option value="7">Balcklist</option>
                                    <option value="8">Block</option>
                                <!--<?php $total = count($kandidat_status); for($i=0;$i<$total;$i++){?>
                                <option value="<?php echo $kandidat_status[$i]['id_status_kandidat']; ?>"><?php echo $kandidat_status[$i]['ket']; ?></option>
                                <?php } ?>-->
                                </select>
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
        </div>
    </div>
</div>