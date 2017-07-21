<div class="box">
    <div class="box-header">
        <h3 class="box-title">INTERVIEWER</h3>
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
<script type="text/javascript">
    var save_method;
    var table;
    var modal_add_jadwal_itv;
    var modal_add_jadwal_intervew_user;
    var modal_call_dialog;

    $(document).ready(function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('kandidat/interviewer/ajax_list') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [-1],
                    "orderable": false
                }
            ]
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


    function set_itv_1(id_kandidat)
    {
        save_method = 'update';
        $('#call_form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url: "<?php echo site_url('kandidat/interviewer/ajax_set_jadwal/') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="id_kand"]').val(data.id_kand);
                $('[name="nama_lengkap"]').val(data.nama_lengkap);
                $('[name="no_ktp"]').val(data.no_tlp);
                $('[name="no_tlp"]').val(data.no_tlp);
                $('[name="no_hp"]').val(data.no_hp);
                $('[name="no_sim"]').val(data.no_sim);
                $('[name="ktp_expired_date"]').val(data.ktp_expired_date);
                $('[name="sim_expired_date"]').val(data.sim_expired_date);
                $('[name="alamat"]').val(data.alamat);
                $('[name="tempat_tinggal"]').val(data.temapt_tinggal);
                $('[name="suku"]').val(data.suku);
                $('[name="berat_badan"]').val(data.tinggi_badan);
                $('[name="tinggi_badan"]').val(data.tinggi_badan);
                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                $('[name="tempat_tinggal"]').val(data.tempat_tinggal);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="pendidikan_level"]').val(data.pendidikan_level);
                $('[name="gender"]').val(data.gender);
                $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
                $('[name="agama"]').val(data.agama);
                $('[name="gol_darah"]').val(data.gol_darah);
                $('[name="email"]').val(data.email);
                $('[name="hobby"]').val(data.hobby);
                $('[name="pengalaman_memimpin"]').val(data.pengalaman_memimpin);
                $('[name="pas_foto_file"]').val(data.pas_foto_file);
                $('[name="cv_file"]').val(data.cv_file);
                $('[name="ktp_scan_file"]').val(data.ktp_scan_file);
                $('[name="ijazah_file"]').val(data.ijazah_file);
                $('[name="lamaran_file"]').val(data.lamaran_file);
                $('#modal_add_jadwal_itv').modal('show');
                $('.modal-title').text('BUAT JADWAL BARU');
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
        $('#btnSavejw').text('saving...');
        $('#btnSavejw').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/interviewer/ajax_add_jadwal_intervew') ?>";
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
                alert('Error adding / update data');
                $('#btnSavejw').text('save');
                $('#btnSavejw').attr('disabled', false);
            }
        });
    }
    function set_itv(id_kandidat)
    {
        save_method = 'update';
        $('#call_form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/interviewer/ajax_set_jadwal/') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="nama_lengkap"]').val(data.nama_lengkap);
                $('[name="no_ktp"]').val(data.no_tlp);
                $('[name="no_tlp"]').val(data.no_ktp);
                $('[name="no_hp"]').val(data.no_hp);
                $('[name="no_sim"]').val(data.no_sim);
                $('[name="ktp_expired_date"]').val(data.ktp_expired_date);
                $('[name="sim_expired_date"]').val(data.sim_expired_date);
                $('[name="alamat"]').val(data.alamat);
                $('[name="tempat_tinggal"]').val(data.temapt_tinggal);
                $('[name="suku"]').val(data.suku);
                $('[name="berat_badan"]').val(data.berat_badan);
                $('[name="tinggi_badan"]').val(data.tinggi_badan);
                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="pendidikan_level"]').val(data.pendidikan_level);
                $('[name="gender"]').val(data.gender);
                $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
                $('[name="agama"]').val(data.agama);
                $('[name="gol_darah"]').val(data.gol_darah);
                $('[name="email"]').val(data.email);
                $('[name="hobby"]').val(data.hobby);
                $('[name="pengalaman_memimpin"]').val(data.pengalaman_memimpin);
                $('[name="pas_foto_file"]').val(data.pas_foto_file);
                $('[name="cv_file"]').val(data.cv_file);
                $('[name="ktp_scan_file"]').val(data.ktp_scan_file);
                $('[name="ijazah_file"]').val(data.ijazah_file);
                $('[name="lamaran_file"]').val(data.lamaran_file);

                $('#modal_add_jadwal_intervew_user').modal('show');
                $('.modal-title').text('buat jadwal baru');
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
    
    function call_dialog()
    {
        save_method = 'add';
        $('#call_dialog')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_call_dialog').modal('show');
        $('.modal-title-call').text('Call person');
    }
    function save_jadwal_itv()
    {
        $('#btnSavejw2').text('saving...');
        $('#btnSavejw2').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/interviewer/ajax_add_jadwal_intervew_user') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#itv_user').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_jadwal_intervew_user').modal('hide');
                    location.reload();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavejw2').text('save');
                $('#btnSavejw2').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSavejw2').text('save');
                $('#btnSavejw2').attr('disabled', false);
            }
        });
    }
</script>
<div class="modal fade" id="modal_add_jadwal_itv" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Call Form</h3>
            </div>
            <div class="modal-body call_form">
                <form action="#" id="call_form" class="form-horizontal">
                    <input type="hidden" value="" name="id_kandidat"/>
                    <input type="hidden" value="" name="id_kand"/>
                    <input type="hidden" value="" name="nama_lengkap"/>
                    <input type="hidden" value="" name="no_ktp"/>
                    <input type="hidden" value="" name="no_tlp"/>
                    <input type="hidden" value="" name="no_hp"/>
                    <input type="hidden" value="" name="no_sim"/>
                    <input type="hidden" value="" name="ktp_expired_date"/>
                    <input type="hidden" value="" name="sim_expired_date"/>
                    <input type="hidden" value="" name="alamat"/>
                    <input type="hidden" value="" name="tempat_tinggal"/>
                    <input type="hidden" value="" name="suku"/>
                    <input type="hidden" value="" name="berat_badan"/>
                    <input type="hidden" value="" name="tinggi_badan"/>
                    <input type="hidden" value="" name="tempat_lahir"/>
                    <input type="hidden" value="" name="tgl_lahir"/>
                    <input type="hidden" value="" name="pendidikan_level"/>
                    <input type="hidden" value="" name="gender"/>
                    <input type="hidden" value="" name="kewarganegaraan"/>
                    <input type="hidden" value="" name="agama"/>
                    <input type="hidden" value="" name="gol_darah"/>
                    <input type="hidden" value="" name="email"/>
                    <input type="hidden" value="" name="hobby"/>
                    <input type="hidden" value="" name="pengalaman_memimpin"/>
                    <input type="hidden" value="" name="pas_foto_file"/>
                    <input type="hidden" value="" name="cv_file"/>
                    <input type="hidden" value="" name="ktp_scan_file"/>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Telepon Rumah</label>
                            <div class="col-md-4">
                                <input type="no_tlp" required id="no_tlp" name="no_tlp" value="${no_tlp.value}" class="form-control" placeholder="no tlp ...">
                                <span class="help-block"></span>
                            </div>
                            <a target="_blank" onclick="call_dialog()" ><i class="fa fa-phone"></i></a>
                            
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Status Call</label>
                            <div class="col-md-9">
                                <select id="ddlPassport" name="status_call" class="form-control">
                                     <option selected="selected" value="">--Pilih--</option>
                                    <option value="2">Answer</option>
                                    <option value="4">No Answer</option>
                                    <option value="5">Reject : Tidak Minat</option>
                                    <option value="6">Reject : Sudah Bekerja</option>
                                    <option value="7">Reject : Others</option>
                                </select>
                            </div>
                        </div>
                        <div id="iterv" style="display: none">
                            <div class="form-group">
                                <label class="control-label col-md-3">Interviewer</label>
                                <div class="col-md-9">
                                    <select name="fullname" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                        <?php
                                        $total = count($interviewer);
                                        for ($i = 0; $i < $total; $i++) {
                                            ?>
                                            <option value="<?php echo $interviewer[$i]['fullname']; ?>"><?php echo $interviewer[$i]['fullname']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div id="tahap" style="display: none">
                             <div class="form-group">
                            <label class="control-label col-md-3">Tahap Interview</label>
                            <div class="col-md-9">
                                <select id="itv1" name="status_kandidat" class="form-control">
                                    <option value="" selected="">Pilih</option>
                                    <option value="4">Interview client</option>
                                    <option value="5">Psikotes</option>
                                    <option value="9">Pipeline</option>
                                    <option value="10">Onboard</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        
                        <div id="dvPassport" style="display: none">
                            <div  class="form-group">
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

                        <div style="display: none" id="pipeline">
                            <div class="form-group">
                                <label class="control-label col-md-3">Posisi Yang Dipilih</label>
                                <div class="col-md-9">
                                    <select name="nama_posisi" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                        <?php $total = count($posisi);
                                        for ($i = 0; $i < $total; $i++) { ?>
                                            <option value="<?php echo $posisi[$i]['nama_posisi']; ?>"><?php echo $posisi[$i]['nama_posisi']; ?> (<?php echo $posisi[$i]['level']; ?>)</option>
                                <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Client</label>
                                <div class="col-md-9">
                                    <select name="nama_perusahaan" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                        <?php $total = count($client);
                                        for ($i = 0; $i < $total; $i++) { ?>
                                            <option value="<?php echo $client[$i]['nama_perusahaan']; ?>"><?php echo $client[$i]['nama_perusahaan']; ?></option>
                                <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div style="display: none" id="onboard">
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

                            <div  class="form-group">
                                <label class="control-label col-md-3">Tanggal Join</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="04/29/2017 15:42" name="tanggal_join" id="datetimepicker4"/>
                                </div>
                            </div>

                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $("#ddlPassport").change(function () {
                                    if ($(this).val() == "3")
                                    {
                                        $("#dvPassport").show();
                                    } 
                                    else if ($(this).val() == "2")
                                    {
                                        $("#tahap").show();
                                    } 
                                    else if ($(this).val() == "4")
                                    {
                                        $("#tahap").hide();
                                        $("#onboard").hide();
                                        $("#dvPassport").hide();
                                        $("#pipeline").hide();
                                    } 
                                    else if ($(this).val() == "5")
                                    {
                                        $("#tahap").hide();
                                        $("#onboard").hide();
                                        $("#dvPassport").hide();
                                        $("#pipeline").hide();
                                    } 
                                    else if ($(this).val() == "6")
                                    {
                                        $("#tahap").hide();
                                        $("#onboard").hide();
                                        $("#dvPassport").hide();
                                        $("#pipeline").hide();
                                    } 
                                    else if ($(this).val() == "7")
                                    {
                                        $("#tahap").hide();
                                        $("#onboard").hide();
                                        $("#dvPassport").hide();
                                        $("#pipeline").hide();
                                    } 
                                    else 
                                    {
                                        $("#dvPassport").hide();
                                        $("#tahap").hide();
                                        $("#onboard").hide();
                                        $("#dvPassport").hide();
                                        $("#pipeline").hide();
                                    }
                                });
                            });
                        </script>
                        <script type="text/javascript">
                            $(function () {
                                $("#itv1").change(function () {
                                    if ($(this).val() == "9")
                                    {
                                        $("#pipeline").show();
                                        $("#dvPassport").hide();
                                         $("#onboard").hide();
                                    } 
                                    else if ($(this).val() == "4")
                                    {
                                        $("#dvPassport").show();
                                        $("#pipeline").show();
                                    }
                                    else if ($(this).val() == "5")
                                    {
                                        $("#dvPassport").hide();
                                         $("#onboard").hide();
                                        $("#pipeline").hide();
                                    } 
                                    else if ($(this).val() == "10")
                                    {
                                        $("#onboard").show();
                                        $("#pipeline").show();
                                        $("#tahap").show();
                                        $("#dvPassport").hide();
                                        $("#iterv").hide();
                                        

                                    } else
                                    {
                                        $("#pipeline").hide();
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

<div class="modal fade" id="modal_add_jadwal_intervew_user" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Call Form</h3>
            </div>
            <div class="modal-body itv_user">
                <form action="#" id="itv_user" class="form-horizontal">
                    <input type="hidden" value="" name="id_kandidat"/>
                    <input type="hidden" value="" name="nama_lengkap"/>
                    <input type="hidden" value="" name="no_ktp"/>
                    <input type="hidden" value="" name="no_tlp"/>
                    <input type="hidden" value="" name="no_hp"/>
                    <input type="hidden" value="" name="no_sim"/>
                    <input type="hidden" value="" name="ktp_expired_date"/>
                    <input type="hidden" value="" name="sim_expired_date"/>
                    <input type="hidden" value="" name="alamat"/>
                    <input type="hidden" value="" name="tempat_tinggal"/>
                    <input type="hidden" value="" name="suku"/>
                    <input type="hidden" value="" name="berat_badan"/>
                    <input type="hidden" value="" name="tinggi_badan"/>
                    <input type="hidden" value="" name="tempat_lahir"/>
                    <input type="hidden" value="" name="tgl_lahir"/>
                    <input type="hidden" value="" name="pendidikan_level"/>
                    <input type="hidden" value="" name="gender"/>
                    <input type="hidden" value="" name="kewarganegaraan"/>
                    <input type="hidden" value="" name="agama"/>
                    <input type="hidden" value="" name="gol_darah"/>
                    <input type="hidden" value="" name="email"/>
                    <input type="hidden" value="" name="hobby"/>
                    <input type="hidden" value="" name="pengalaman_memimpin"/>
                    <input type="hidden" value="" name="pas_foto_file"/>
                    <input type="hidden" value="" name="cv_file"/>
                    <input type="hidden" value="" name="ktp_scan_file"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Telepon Rumah</label>
                            <div class="col-md-4">
                                <input type="no_tlp" required id="no_tlp" name="no_tlp" value="${no_tlp.value}" class="form-control" placeholder="no tlp ...">
                                <span class="help-block"></span>
                            </div>
                            <a target="_blank" onclick="call_dialog()" ><i class="fa fa-phone"></i></a>
                            <!--<a target="_blank" onclick="this.href = 'https://172.25.150.50/cc-test/dial_number.php?dari=1111&SIP=1234&to=' + document.getElementById('no_tlp').value + '&recid=abc&line_number=1234'"><i class="fa fa-phone"></i></a>-->
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Call</label>
                            <div class="col-md-9">
                                <select id="ddlPassport2" name="status_call" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <?php
                                    $total = count($caller_status);
                                    for ($i = 0; $i < $total; $i++) {
                                        ?>
                                        <option value="<?php echo $caller_status[$i]['id_status_call']; ?>"><?php echo $caller_status[$i]['ket']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="iterv">
                            <div class="form-group">
                                <label class="control-label col-md-3">Interviewer</label>
                                <div class="col-md-9">
                                    <select name="fullname" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                        <?php
                                        $total = count($interviewer);
                                        for ($i = 0; $i < $total; $i++) {
                                            ?>
                                            <option value="<?php echo $interviewer[$i]['fullname']; ?>"><?php echo $interviewer[$i]['fullname']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Kandidat</label>
                            <div class="col-md-9">
                                <select id="itv2" name="status_kandidat" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="6">Reject</option>
                                    <option value="9">Pipeline</option>
                                    <option value="10">Onboard</option>
                                </select>
                            </div>
                        </div>

                        <div id="dvPassport2">
                            <div  class="form-group">
                                <label class="control-label col-md-3">Tanggal Interview</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="04/29/2017 15:42" name="tanggal_interview" id="datetimepicker6"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tempat Interview</label>
                                <div class="col-md-9">
                                    <textarea type="text" required  name="tempat_interview"  class="form-control" placeholder="Tempat ..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <textarea type="text" name="keterangan" placeholder="keterangan" class="form-control"></textarea>
                            </div>
                        </div>

                        <div style="display: none" id="pipeline2">
                            <div class="form-group">
                                <label class="control-label col-md-3">Posisi Yang Dipilih</label>

                                <div class="col-md-9">
                                    <select name="nama_posisi" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                        <?php $total = count($posisi); for ($i = 0; $i < $total; $i++) { ?>
                                            <option value="<?php echo $posisi[$i]['nama_posisi']; ?>"><?php echo $posisi[$i]['nama_posisi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Client</label>
                                <div class="col-md-9">
                                    <select name="nama_perusahaan" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                    <?php $total = count($client); for ($i = 0; $i < $total; $i++) { ?>
                                            <option value="<?php echo $client[$i]['nama_perusahaan']; ?>"><?php echo $client[$i]['nama_perusahaan']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div style="display: none" id="onboard2">
                            <div class="form-group">
                                <label class="control-label col-md-3">Provinsi</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="provinsi_id" id="sc_get_provinsi">
                                        <option value="" >--Pilih Provinsi--</option>
                                        <?php
                                        foreach ($dropdownprov as $a) {
                                            echo '<option value="' . $a["provinsi_id"] . '">' . $a["provinsi_nama"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Pilih Kota/Kabupaten</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="kota_id" id="show_kota" >
                                        <option value="">Pilih Kota / Kabupaten</option>
                                    </select>
                                </div>
                            </div>

                            <div  class="form-group">
                                <label class="control-label col-md-3">Tanggal Join</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="04/29/2017 15:42" name="tanggal_join" id="datetimepicker8"/>
                                </div>
                            </div>

                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $("#ddlPassport2").change(function () {
                                    if ($(this).val() == "3")
                                    {
                                        $("#dvPassport2").show();
                                    } else if ($(this).val() == "2")
                                    {
                                        $("#dvPassport2").show();
                                    } else {
                                        $("#dvPassport2").hide();
                                    }
                                });
                            });
                        </script>
                        <script type="text/javascript">
                            $(function () {
                                $("#itv2").change(function () {
                                    if ($(this).val() == "9")
                                    {
                                        $("#pipeline2").show();
                                    } else if ($(this).val() == "10")
                                    {
                                        $("#onboard2").show();
                                        $("#dvPassport2").hide();
                                        $("#iterv2").hide();
                                        $("#pipeline2").show();
                                    } else
                                    {
                                        $("#pipeline").hide();
                                    }
                                });
                            });
                        </script>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavejw2" onclick="save_jadwal_itv()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_call_dialog" role="dialog">
    <div class="modal-dialog-caller">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title-call">Call Form</h3>
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