<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add +</button>
    </div>
<!--    <div class="box-body">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Nama Bidang Usaha</th>
                    <th>Cabang</th>
                    <th>area</th>
                    <th>Telpon</th>
                    <th>Alamat</th>
                    <th>pic/email</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>-->

<div class="box-body">
        <div class="box">
<!--            <div class="box-header">
                <h3 class="box-title">Caller</h3>
            </div>-->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                      <th>Nama Perusahaan</th>
                    <th>Nama Bidang Usaha</th>
                    <th>Cabang</th>
                    <th>area</th>
                    <th>Telpon</th>
                    <th>Alamat</th>
                    <th>pic/email</th>
                    <th style="width:125px;">Action</th>
                     </tr>
                    </thead>
                    <tbody><?php $jum = count($list);
                        for ($i = 0; $i < $jum; $i++) { ?>
                          <tr>
                                <td><?php echo $list[$i]['nama_perusahaan'] ?></td>
                                <td><?php echo $list[$i]['nama_bidang_usaha'] ?></td>
                                <td><?php echo $list[$i]['nama_cabang'] ?></td>
                                <td><?php echo $list[$i]['nama_area'] ?></td>
                                <td><?php echo $list[$i]['tlp_perusahaan'] ?></td>
                                <td><?php echo $list[$i]['alamat_perusahaan'] ?></td>
                                <td><?php echo $list[$i]['pic'] ?>/<br><?php echo $list[$i]['email'] ?></td>
                                <td>
                                    <!--<a data-toggle="tooltip" class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(<?php echo $list[$i]['id_modul_client_setting'] ?>)"><i class="glyphicon glyphicon-pencil"></i></a>-->
				  <a data-toggle="tooltip" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(<?php echo $list[$i]['id_modul_client_setting'] ?>)"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr> <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
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
                    "url": "<?php echo site_url('modul/client/ajax_list') ?>",
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
            $('.modal-title').text('Tambah Client');
        }
        function edit_person(id_modul_client_setting)
        {
            save_method = 'update';
            $('#form')[0].reset();
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();
            $.ajax({
                url: "<?php echo site_url('modul/client/ajax_edit') ?>/" + id_modul_client_setting,
                type: "GET",
                dataType: "JSON",
                success: function (data)
                {
                    $('[name="id_modul_client_setting"]').val(data.id_modul_client_setting);
                    $('[name="nama_perusahaan"]').val(data.nama_perusahaan);
                    $('[name="nama_bidang_usaha"]').val(data.nama_bidang_usaha);
                    $('[name="tlp_perusahaan"]').val(data.tlp_perusahaan);
                    $('[name="nama_area"]').val(data.nama_area);
                    $('[name="nama_cabang"]').val(data.nama_cabang);
                    $('[name="alamat_perusahaan"]').val(data.alamat_perusahaan);
                    $('[name="pic"]').val(data.pic);
                    $('[name="email"]').val(data.email);
                    $('#modal_form').modal('show');
                    $('.modal-title').text('Edit Client');

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function reload_table()
        {
            location.reload();
            table.ajax.reload(null, false);
        }
        function save()
        {
            $('#btnSave').text('saving...');
            $('#btnSave').attr('disabled', true);
            var url;
            if (save_method == 'add') {
                url = "<?php echo site_url('modul/client/ajax_add') ?>";
            } else {
                url = "<?php echo site_url('modul/client/ajax_update') ?>";
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
        function delete_person(id_modul_client_setting)
        {
            if (confirm('Are you sure delete this data?'))
            {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('modul/client/ajax_delete') ?>/" + id_modul_client_setting,
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

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_modul_client_setting"/> 
                    <div class="form-body">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Perusahaan</label>
                            <div class="col-md-9">
                                <input name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Bidang Usaha</label>
                            <div class="col-md-9">
                                <select class="form-control" name="nama_bidang_usaha">
                                    <option value="" selected="">Pilih Usaha</option>
                                <?php $jum = count($bidang_usaha);
                                    for ($x = 0; $x < $jum; $x++) { ?>
                                        <option value="<?php echo $bidang_usaha[$x]['nama_bidang_usaha'] ?>">
                                        <?php echo $bidang_usaha[$x]['nama_bidang_usaha'] ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-md-3">Cabang</label>
                            <div class="box-body">
                                <div class="col-md-9">
                                    <select  class="form-control" name="id_cabang" id="sc_get_cabang">
                                        <option value="" >Pilih Cabang</option>
                                        <?php
                                        foreach ($dropdownprov as $a) {
                                            echo '<option value="' . $a["id_cabang"] . '">' . $a["nama_cabang"] . '</option>';}
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <label class="control-label col-md-3">Area</label>
                            <div class="box-body">
                                <div class="col-md-9">
                                    <select class="form-control" name="id_area" id="sc_show_area" >
                                        <option value="">Pilih Area</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telpon</label>
                            <div class="col-md-9">
                                <input name="tlp_perusahaan" onkeypress="return isNumberKey(event)" placeholder="No Telpon" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">PIC client</label>
                            <div class="col-md-9">
                                <input name="pic" placeholder="pic" class="form-control" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat_perusahaan" placeholder="Alamat" class="form-control" type="text"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="Email" type="email" class="form-control" type="text">
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