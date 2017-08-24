<div class="box">
    <div class="box-header ">
        <form action="<?php echo base_url() ?>filter?" method="GET">
            <div class="col-xs-3">
                <input type="hidden" value="<?php echo md5(date("Ymd")) ?>" name="secret">
                <div class="form-group"><select name="pendidikan" class="form-control" >
                        <option selected value="">--Pilih Pendidikan--</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA/SMK</option>
                        <option value="d1">D1</option>
                        <option value="d2">D2</option>
                        <option value="d3">D3</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                        <option value="lainnya">Lainnya</option>
                    </select></div>
                <div class="form-group">
                    <select name="agama" class="form-control" >
                        <option selected value="">--Pilih Agama--</option>
                        <option  value="Budha">Budha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <select name="gender" class="form-control" >
                        <option selected value="">--Pilih Gender--</option>
                        <option  value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <input type="hidden" value="<?php echo sha1(date("Ymd")) ?>" name="type">
                <div class="control-group">
                    <select  class="form-control" name="provinsi_id" id="sc_get_prov"> 
                        <option value="" >--Pilih Provinsi--</option>
                        <?php
                        foreach ($dropdownprov as $a) {
                            echo '<option value="' . $a["provinsi_id"] . '">' . $a["provinsi_nama"] . '</option>';
                        }
                        ?>
                    </select>
                </div><br></div>
            <div class="col-xs-3">
                <div class="form-group">  
                    <div class="row">
                        <div class="col-xs-5">
                            <input name="dari" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="dari">
                        </div>
                        <div class="col-xs-5"> 
                            <input name="sampai" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="sampai">
                        </div>
                    </div>
                </div>
                <div class="form-group">  
                    <input type="submit" class="btn btn-primary" value="Submit"></div>
            </div>
        </form>
        <!--<div class="control-group">
                <label class="control-label col-md-3">Kota</label>
                <div class="box-body">
                    <div class="col-md-9">
                    <select class="form-control" required name="kota_id" id="sc_show_kota" > 
                       <option value="">--Pilih Kota--</option>
                    </select>
                </div>
                </div>
        </div>-->
        <h3 class="box-title"></h3>
    </div>
    <div class="box-body">
        <div class="box">
            <!--            <div class="box-header">
                            <h3 class="box-title">Caller</h3>
                        </div>-->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                            <th>Gender</th>
                            <th>Last Call</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody ><?php
                        $jum = count($list);
                        for ($i = 0; $i < $jum; $i++) {
                            ?>
                            <?php
                            if ($list[$i]['caller_status'] == 4) {
                                $span = '<span data-toggle="tooltip" class="label label-block">No Ans</span>';
                            }
                            else if ($list[$i]['caller_status'] == 5) {
                                $span = '<span data-toggle="tooltip"  class="label label-block">Reject : Tidak Tertarik</span>';
                            }
                            else if ($list[$i]['caller_status'] == 6) {
                                $span = '<span data-toggle="tooltip"  class="label label-block">Reject : Sudah Bekerja</span>';
                            }
                            else if ($list[$i]['caller_status'] == 7) {
                                $span = '<span data-toggle="tooltip"  class="label label-block">Reject : Lainnya</span>';
                            }
                            else 
                            {
                                $span = '<span data-toggle="tooltip" title="New entry : 0 call" class="label label-info">New Entry</span>';
                            }
//                            else if ($list[$i]['edit_caller_status'] == 1) {
//                                $onclick = '';
//                            } else {
//                                $onclick = '<a data-toggle="tooltip" href="javascript:void(0)" title="Set Jadwal"  onclick="call_person(' . "'" . $list[$i]['id_kand'] . "'" . ')" ><i class="fa fa-phone-square"></i></a>';
//                            }
                            
                            ?>
                            <tr>
                                <td><?php echo $list[$i]['nama_lengkap_b'] ?></td>
                                <td><?php echo $list[$i]['no_telpon'] ?></td>
                                <td><?php echo $list[$i]['alamat_bt'] ?></td>
                                <td><?php echo $list[$i]['pendidikan_terakhir'] ?></td>
                                <td><?php echo $list[$i]['gender'] ?></td>
                               <td><?php echo $span ?></td>
                                <td>
                                    <!--<a data-toggle="tooltip" href="<?php echo base_url() ?>view/<?php echo $list[$i]['id_buku_tahunan'] ?>" title="view kandidat"><i class="glyphicon glyphicon-search"></i></a>-->
                                    <a data-toggle="tooltip" href="#" title="view kandidat" onclick="view_person('<?php echo $list[$i]['id_buku_tahunan'] ?>')"><i class="glyphicon glyphicon-search"></i></a>
                                    <a data-toggle="tooltip" href="#" title="call" onclick="call_person('<?php echo $list[$i]['id_buku_tahunan'] ?>')"><i class="glyphicon glyphicon-phone-alt"></i></a>
                                    <!--<a data-toggle="tooltip" href="#" title="view call history" onclick="view_call_history('<?php echo $list[$i]['id_kand'] ?>')"><i class="glyphicon glyphicon-th-list"></i></a>-->
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
<script src="<?php echo base_url('assets/bootstrap/js/jquery.js') ?>"></script>
<script type="text/javascript">
var save_method;
var table;
var modal_add_jadwal_itv;
var modal_view_person;
var modal_call_dialog;
var modal_view_call_history;

$(document).ready(function () {
    table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('kandidat/caller/ajax_list') ?>",
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

function call_person(id_kandidat)
{
    save_method = 'update';
    $('#call_form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url: "<?php echo site_url('kandidat/caller/ajax_set_jadwal/') ?>/" + id_kandidat,
        type: "GET",
        dataType: "JSON",
        success: function (data)
        {
            $('[name="id_buku_tahunan"]').val(data.id_buku_tahunan);
            $('[name="nama_lengkap_b"]').val(data.nama_lengkap_b);
            $('[name="no_telpon"]').val(data.no_telpon);
            $('[name="alamat_bt"]').val(data.alamat_bt);
            $('[name="pendidikan_terakhir"]').val(data.pendidikan_terakhir);
            $('[name="gender"]').val(data.gender);
            $('[name="agama"]').val(data.agama);
            $('[name="id_kand"]').val(data.id_kand);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="umur"]').val(data.umur);
            $('#modal_add_jadwal_itv').modal('show');
            $('.modal-title').text('Call person');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    $(".docs-date").datepicker();
}

function call_dialog()
{
    save_method = 'add';
    $('#call_dialog')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_call_dialog').modal('show');
    $('.modal-title').text('Call person');
}

function view_person(id_buku_tahunan)
{
    save_method = 'update';
    $('#view_call_person')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url: "<?php echo site_url('kandidat/caller/ajax_set_jadwal/') ?>" + id_buku_tahunan,
        type: "GET",
        dataType: "JSON",
        success: function (data)
        {
            $('[name="id_buku_tahunan"]').val(data.id_buku_tahunan);
            $('[name="nama_lengkap_b"]').val(data.nama_lengkap_b);
            $('[name="no_telpon"]').val(data.no_telpon);
            $('[name="alamat_bt"]').val(data.alamat_bt);
            $('[name="id_kand"]').val(data.id_kand);
            $('[name="pendidikan_terakhir"]').val(data.pendidikan_terakhir);
            $('[name="gender"]').val(data.gender);
            $('[name="agama"]').val(data.agama);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="umur"]').val(data.umur);
            $('#modal_view_person').modal('show');
            $('.modal-title').text('Kandidat Detail');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function view_call_history(id_kand)
{
    save_method = 'update';
    $('#view_call_history')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url: "<?php echo site_url('kandidat/caller/ajax_edit_call_history/') ?>" + id_kand,
        type: "GET",
        dataType: "JSON",
        success: function (data)
        {
            $('[name="id_call_history"]').val(data.id_call_history);
            $('[name="id_kand"]').val(data.id_kand);
            $('[name="call_number"]').val(data.call_number);
            $('[name="time"]').val(data.time);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="id_admin"]').val(data.id_admin);
            
            $('#modal_view_call_history').modal('show');
            $('.modal-title').text('Call History');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save_jadwal()
{
    $('#btnSavejw').text('saving...');
    $('#btnSavejw').attr('disabled', true);
    var url;
    url = "<?php echo site_url('kandidat/caller/ajax_add_jadwal_intervew') ?>";

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
                $("#example1").load(" #example1");
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
            alert('Error adding / update data');
            $('#btnSavejw').text('save');
            $('#btnSavejw').attr('disabled', false);
        }
    });
}

setInterval(function ()
{
    $.ajax({
        type: "post",
        url: "<?php echo base_url() ?>caller",
        datatype: "html",
        success: function (data)
        {
             $("#example1").load(" #example1");
             
        }
    });
}, 1000);
</script>

<div class="modal fade" id="modal_view_person" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Call Form</h3>
            </div>
            <div class="modal-body view_call_person">
                <form action="#" id="view_call_person" class="form-horizontal">
                    <input value="" type="hidden" name="id_buku_tahunan"/> 
                    <div class="form-body">
                         <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="nama_lengkap_b" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Telpon</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="no_telpon" placeholder="tlp" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea type="text" disabled name="alamat_bt" placeholder="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="pendidikan_terakhir" placeholder="pendidikan" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="gender" placeholder="gender" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="agama" placeholder="agama" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="provinsi" placeholder="Provinsi" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Umur</label>
                            <div class="col-md-9">
                                <input type="text" disabled name="umur" placeholder="umur" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_add_jadwal_itv" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Call Form</h3>
            </div>
            <div class="modal-body call_form">
                <form action="#" id="call_form" class="form-horizontal">
                    <input type="hidden" name="id_buku_tahunan"/> 
                    <input type="hidden" name="id_kand"/> 
                    <input type="hidden" name="no_telpon"/> 
                    <input type="hidden" name="alamat_bt"/> 
                    <input type="hidden" name="pendidikan_terakhir"/> 
                    <input type="hidden" name="gender"/> 
                    <input type="hidden" name="agama"/> 
                    <input type="hidden" name="provinsi"/> 
                    <input type="hidden" name="umur"/> 
                    
                    <div class="form-body">
                         <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_lengkap_b" placeholder="Name" class="form-control">
                            </div>
                    </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Telepon</label>
                            <div class="col-md-4">
                                <input type="no_telpon" required id="no_telpon" name="no_telpon" value="${no_telpon.value}" class="form-control" placeholder="no tlp ...">
                                <span class="help-block"></span>
                            </div>
                            <a target="_blank" onclick="call_dialog()" ><i class="fa fa-phone"></i></a>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Call</label>
                            <div class="col-md-9">
                                <select id="call_stat" name="caller_status" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="2">Answer</option>
                                    <option value="4">No Answer</option>
                                    <option value="5">Reject : Tidak Minat</option>
                                    <option value="6">Reject : Sudah Bekerja</option>
                                    <option value="7">Reject : Others</option>
                                </select>
                            </div>
                        </div>
                        
                        <div id="status_k" style="display: none">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahap interview</label>
                            <div class="col-md-9">
                                <select name="status_kandidat" id="interview" class="form-control">
                                 <option value="">--Pilih--</option>
                                    <option value="3">Interview HRD</option>
                                </select>
                            </div>
                        </div>  
                        <div id="tahap_k" style="display: none">
                            <div class="form-group">
                            <label class="control-label col-md-3">Interviewer</label>
                            <div class="col-md-9">
                                <select name="interviewer" class="form-control">
                                    <?php
                                    $total = count($interviewer);
                                    for ($i = 0; $i < $total; $i++) {
                                        ?>
                                        <option value="<?php echo $interviewer[$i]['fullname']; ?>"><?php echo $interviewer[$i]['fullname']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="04/29/2017 15:42" name="tanggal_interview" id="datetimepicker7"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tempat</label>
                                <div class="col-md-9">
                                    <textarea type="text" required  name="tempat_interview"  class="form-control" placeholder="Tempat ..."></textarea>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                        
                     <script type="text/javascript">
                            $(function () {
                                $("#call_stat").change(function () {
                                    if ($(this).val() == "2") {
                                        $("#status_k").show();
                                    }
                                    else 
                                    {
                                        $("#status_k").hide();
                                    }
                                });
                            });
                            $(function () {
                                $("#interview").change(function () {
                                    if ($(this).val() == "3") {
                                        $("#tahap_k").show();
                                    }
                                    else 
                                    {
                                        $("#tahap_k").hide();
                                    }
                                });
                            });
                        </script>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavejw" onclick="save_jadwal()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_call_dialog" role="dialog">
    <div class="modal-dialog-caller">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Call Form</h3>
            </div>
            <div class="modal-body call_dialog">
                <form action="#" id="call_dialog" class="form-horizontal">
                    <input value="" type="hidden" name="id_buku_tahunan"/> 
                    <div class="form-body">
                         <div class="form-group">
                             <div align="center"><img  src="<?php echo base_url()?>assets/images/call.gif" width="140px"></div>
                             <h1 align="center">On call</h1><hr>
                             <button style="margin-left: 100px;" type="button" data-dismiss="modal" aria-label="Close">End call</button>
                         </div>
                       </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_view_call_history" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Call Form</h3>
            </div>
            <div class="modal-body call_dialog">
                <form action="#" id="view_call_history" class="form-horizontal">
                    <input value="" type="" name="id_kand"/> 
                    <div class="form-body">
                    <div class="form-group">
                       <label class="control-label col-md-3">number</label>
                            <div class="col-md-9">
                                <input type="text" name="call_number"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">time</label>
                            <div class="col-md-9">
                                <input type="text" name="time" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>