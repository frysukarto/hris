<style>
    
    #content {
        float: right;
        width: 55%;
    }
    #sidebar {
        width: 45%;
    }
    #cleared {
        clear: both;
    }
</style>
<?php if (count($jadwal) > 0) { ?>
    <div class="box" >
        <h1 align="center">
            <b>Jadwal interview</b>
        </h1>
        <?php
        if ($jadwal[0]['status_kandidat'] == 1) {
            $span = '<span>Baru</span>';
        } else if ($jadwal[0]['status_kandidat'] == 2) {
            $span = '<span >Caller</span>';
        } else if ($jadwal[0]['status_kandidat'] == 3) {
            $span = '<span >Interview 1</span>';
        } else if ($jadwal[0]['status_kandidat'] == 4) {
            $span = '<span >Interview 2</span>';
        } else if ($jadwal[0]['status_kandidat'] == 5) {
            $span = '<span >Psikotes</span>';
        } else if ($jadwal[0]['status_kandidat'] == 6) {
            $span = '<span >Reject</span>';
        } else if ($jadwal[0]['status_kandidat'] == 7) {
            $span = '<span>Blacklist</span>';
        } else if ($jadwal[0]['status_kandidat'] == 8) {
            $span = '<span>Block</span>';
        } else { $span = '<span class="label label-warning"></span>';}
        ?>
    </div>
    <div class="callout callout-success">
        <div id="wrapper">
            <div id="content"><label>ON SCHEDULE</label> <br>
                <?php echo $span ?>
                Tanggal Interview : <?php echo indonesian_dates($jadwal[0]['tanggal_interview']) ?><br>
                Tempat : <?php echo $jadwal[0]['tempat_interview'] ?> <br>
<!--                Keterangan : <?php echo $jadwal[0]['keterangan'] ?> <br>-->
                Nama Interviewer : <?php echo $jadwal[0]['interviewer'] ?><br></div>
            <div id="sidebar">            
                <label>Hasil Interview</label> <?php echo '<a href="javascript:void(0)" class="btn btn-box-tool" title="Edit" onclick="edit_jadwal_interview(' . "'" . $jadwal[0]['id_jadwal_interview'] . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>'; ?><br><?php echo $jadwal[0]['hasil_interview'] ?> </div>
            <div id="cleared"></div>
        </div>
    </div>

    <?php $jum = count($jadwal);
    for ($i = 1; $i < $jum; $i++) {
        ?>
        <div class="box">
            <div class="callout callout-warning">
                <label>RESCHEDULE</label><br>
                Tanggal Interview : <?php echo indonesian_dates($jadwal[$i]['tanggal_interview']) ?><br>
                Tempat : <?php echo $jadwal[$i]['tempat_interview'] ?><br>
<!--                Keterangan : <?php echo $jadwal[$i]['keterangan'] ?><br>-->
                Nama Interviewer : <?php echo $jadwal[$i]['interviewer'] ?><br>
            </div>
        </div>
    <?php }
} else {
    ?>
    <div class="box"><h1 align="center"><b>Tidak ada jadwal interview</b></h1></div>
<?php } ?>

<script src="<?php echo base_url('assets/bootstrap/js/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>

<script type="text/javascript">
    var save_method;
    var modal_add_result_interview;

    function edit_jadwal_interview(id_jadwal_interview)
    {
        save_method = 'update';
        $('#form_itv_result')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/interviewer/ajax_edit_result') ?>/" + id_jadwal_interview,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_jadwal_interview"]').val(data.id_jadwal_interview);
                $('#modal_add_result_interview').modal('show');
                $('.modal-title').text('input interview result');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function save_interview_result()
    {
        $('#btnSaveHinterview').text('saving...');
        $('#btnSaveHinterview').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/interviewer/ajax_update_result') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_itv_result').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_result_interview').modal('hide');
                    location.reload();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveHinterview').text('save');
                $('#btnSaveHinterview').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSaveHinterview').text('save');
                $('#btnSaveHinterview').attr('disabled', false);
            }
        });
    }
</script>
<div class="modal fade" id="modal_add_result_interview" role="dialog">
    <div  class="modal-dialog">
        <div  class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <form  id="form_itv_result" class="form-horizontal">
                <div class="modal-body" id="form_itv_result">
                    <div class="form-body">
                        <input type="hidden" value="" name="id_jadwal_interview"/>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hasil Interview</label>
                            <div class="col-md-9">
                                <textarea class="textarea" name="hasil_interview" id="hasil_interview" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" type="submit" id="btnSaveHinterview" onclick="save_interview_result()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
