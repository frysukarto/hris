<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Valdo | Home </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php echo $html['css']; ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $template['header']; ?>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <?php echo $template['sidebarmenu']; ?>
                </section>
            </aside>
            <div class="content-wrapper ">
                <section class="content-header">
                    <h1>Kandidat<small>Control panel</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Kandidat Management</li>
                    </ol>
                </section>
                <section class="content"><div class="row">
                        <?php echo $kandidat['datatable'] ?>
                    </div>
                </section>
            </div><?php echo $template['footer'] ?>
        </div> 
        <?php echo $html['js']; ?>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>
        <script>
            $.datetimepicker.setLocale('en');

            $('#datetimepicker_format').datetimepicker({value: '04/15/2015 05:03', format: $("#datetimepicker_format_value").val()});
            console.log($('#datetimepicker_format').datetimepicker('getValue'));

            $("#datetimepicker_format_change").on("click", function (e) {
                $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
            });
            $("#datetimepicker_format_locale").on("change", function (e) {
                $.datetimepicker.setLocale($(e.currentTarget).val());
            });

            $('#datetimepicker').datetimepicker({
                dayOfWeekStart: 1,
                lang: 'en',
                disabledDates: ['1986/01/08', '1986/01/09', '1986/01/10'],
                startDate: '1986/01/05'
            });
            $('#datetimepicker').datetimepicker({value: '2015/04/15 05:03', step: 10});

            $('.some_class').datetimepicker();

            $('#default_datetimepicker').datetimepicker({
                formatTime: 'H:i',
                formatDate: 'd.m.Y',
                //defaultDate:'8.12.1986', // it's my birthday
                defaultDate: '+03.01.1970', // it's my birthday
                defaultTime: '10:00',
                timepickerScrollbar: false
            });

            $('#datetimepicker10').datetimepicker({
                step: 5,
                inline: true
            });
            $('#datetimepicker_mask').datetimepicker({
                mask: '9999/19/39 29:59'
            });

            $('#datetimepicker1').datetimepicker({
                datepicker: false,
                format: 'H:i',
                step: 5
            });
            $('#datetimepicker2').datetimepicker({
                yearOffset: 222,
                lang: 'ch',
                timepicker: false,
                format: 'd/m/Y',
                formatDate: 'd/m/Y',
                minDate: '-1970/01/02', // yesterday is minimum date
                maxDate: '+1970/01/02' // and tommorow is maximum date calendar
            });
            $('#datetimepicker3').datetimepicker({
                inline: true
            });
            
            $('#datetimepicker4').datetimepicker();
            $('#open').click(function () {
                $('#datetimepicker4').datetimepicker('show');
            });
            
            $('#close').click(function () {
                $('#datetimepicker4').datetimepicker('hide');
            });
            
            $('#reset').click(function () {
                $('#datetimepicker4').datetimepicker('reset');
            });
            
            $('#datetimepicker5').datetimepicker({
                datepicker: false,
                allowTimes: ['12:00', '13:00', '15:00', '17:00', '17:05', '17:20', '19:00', '20:00'],
                step: 5
            });
            
            $('#datetimepicker6').datetimepicker();
            $('#destroy').click(function () {
                if ($('#datetimepicker6').data('xdsoft_datetimepicker')) {
                    $('#datetimepicker6').datetimepicker('destroy');
                    this.value = 'create';
                } else {
                    $('#datetimepicker6').datetimepicker();
                    this.value = 'destroy';
                }
            });
            
            var logic = function (currentDateTime) {
                if (currentDateTime && currentDateTime.getDay() == 6) {
                    this.setOptions({
                        minTime: '11:00'
                    });
                } else
                    this.setOptions({
                        minTime: '8:00'
                    });
            };
            
            $('#datetimepicker7').datetimepicker({
                onChangeDateTime: logic,
                onShow: logic,
                format: 'd-m-Y H:i'
                        //	formatDate:'d/m/Y'
            });
            
            $('#datetimepicker8').datetimepicker({
                onGenerate: function (ct) {
                    $(this).find('.xdsoft_date')
                            .toggleClass('xdsoft_disabled');
                },
                minDate: '-1970/01/2',
                maxDate: '+1970/01/2',
                timepicker: false
            });
            
            $('#datetimepicker9').datetimepicker({
                onGenerate: function (ct) {
                    $(this).find('.xdsoft_date.xdsoft_weekend')
                            .addClass('xdsoft_disabled');
                },
                weekends: ['01.01.2014', '02.01.2014', '03.01.2014', '04.01.2014', '05.01.2014', '06.01.2014'],
                timepicker: false
            });
            
            var dateToDisable = new Date();
            dateToDisable.setDate(dateToDisable.getDate() + 2);
            $('#datetimepicker11').datetimepicker({
                beforeShowDay: function (date) {
                    if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                        return [false, ""]
                    }

                    return [true, ""];
                }
            });
            
            $('#datetimepicker12').datetimepicker({
                beforeShowDay: function (date) {
                    if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                        return [true, "custom-date-style"];
                    }
                    return [true, ""];
                }
            });
            
            $('#datetimepicker_dark').datetimepicker({theme: 'dark'})
        </script>
        <script>
            $('#sc_get_cabang').change(function () {
                var form_data = { 
                    id_cabang : $('#sc_get_cabang').val()
                };
                $.ajax({
                    url: "<?php echo site_url('modul/client/ajax_call') ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    success: function (msg) {
                        var sc="";
                        $.each(msg, function (key, val) {
                            sc+= '<option value="' +val.id_area+ '">' +val.nama_area+ '</option>';
                        });
                        $("#sc_show_area option").remove();
                        $("#sc_show_area").append(sc);
                    }
                });
            });

            $('#sc_get_provinsi').change(function () {
                var form_data = {
                    provinsi_id: $('#sc_get_provinsi').val()
                };
                $.ajax({
                    url: "<?php echo site_url('kandidat/interviewer/ajax_call') ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    success: function (msg) {
                        var sc = "";
                        $.each(msg, function (key, val) {
                            sc += '<option value="' + val.kota_id + '">' + val.kokab_nama + '</option>';
                        });
                        $("#show_kota option").remove();
                        $("#show_kota").append(sc);
                    }
                });
            });
        </script>
    </body>
</html>