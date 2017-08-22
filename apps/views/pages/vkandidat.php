<!DOCTYPE html>
<html>
    <head

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Valdo | Home </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" rel="shortcut icon" type="image/x-icon" />
        <?php echo $html['css']; ?>
        <style>
            .status-available{color:#2FC332;}
            .status-not-available{color:#D60202;}
        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini ">
        <div class="wrapper fixed" >
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
                </section><?php echo $template['footer'] ?>
            </div> 
        </div>
        <?php echo $html['js']; ?>

        <script type="text/javascript">
            var a = 1;
            var r = 1;
            var i = 1;
            var t = 1;
            $(".docs-date").datepicker();
            function addOrg() {
                if (a <= 100) {
                    a++;
                    var div = document.createElement('div');
                    div.innerHTML = '<h3 class="box-title">ORGANISASI</h3>\n\
                                           <input type="text" name="nama_organisasi[]" class="form-control" placeholder="Nama Organisasi ..."><br>\n\
                                           <input type="text" name="jenis_organisasi[]" class="form-control" placeholder="Jenis Organisasi ..."><br>\n\
                                           <input type="text" name="jabatan[]" class="form-control" placeholder="Jabatan ..."><br>\n\
                                           <input class="form-control docs-date" name="tahun[]" placeholder="Tahun Organisasi"><br>\n\
                                           <input type="button" onClick="addOrg()" value="+" />\n\
                                           <input type="button" value="-" onclick="removeOrg(this)">';
                    document.getElementById('org').appendChild(div);
                    $(".docs-date").datepicker();
                }
            }
            function addKidss() {
                if (r <= 100) {
                    r++;
                    var div = document.createElement('div');
                    div.innerHTML = '<h3 class="box-title">REFERENSI KERJA</h3>\n\
                                    <input type="text" name="nama_lengkap_ref[]" class="form-control" placeholder="Nama Lengkap ..."><br>\n\
                                    <input type="text" name="perusahaan_ref[]" class="form-control" placeholder="Perusahaan ..."><br>\n\
                                    <input type="text" name="hubungan_ref[]" class="form-control" placeholder="Hubungan ..."><br>\n\
                                    <input type="text" name="telp_ref[]" onkeypress="return isNumberKey(event)" class="form-control" placeholder="No Telp ..."><br>\n\
                                    \n\<textarea class="form-control" name="alamat_ref[]" rows="5" placeholder="Alamat Perusahaan ..."></textarea><br>\n\
                                    <select class="form-control select2" name="informasi_dari[]" style="width: 100%;"> \n\
                                            <option selected="selected" value="">--Pilih--</option>\n\
                                             <?php $c = count($sorching); for($s=0;$s<$c;$s++) { ?><option value="<?php echo $sorching[$s]['sorching'] ?>"><?php echo $sorching[$s]['sorching'] ?></option>\n\
\n\                                                     \n\
\n\                                                      <?php } ?>\n\
                                         </select><br>\n\
                                    <input type="button" onClick="addKidss()" value="+" />\n\
                                    <input type="button" value="-" onclick="removeKiids(this)">';
                    document.getElementById('kidds').appendChild(div);
                }
            }
            function addKid() {
                if (i <= 100) {
                    i++;
                    var div = document.createElement('div');
                    div.innerHTML =
                            '\
                                                 <h3 class="box-title">KELUARGA</h3>\n\
                                                    <select class="form-control select2" name="jenis_keluarga[]" style="width: 100%;"> \n\
                                                    <option selected="selected" value="ayah">Ayah</option>\n\
                                                    <option value="ibu">Ibu</option><option value="suami">Suami</option>\n\
                                                    <option value="istri">Istri</option><option value="anak">Anak</option>\n\
                                                    <option value="saudara">saudara</option>\n\
                                                 </select>\n\
                                                <br>\n\
                                                <select class="form-control select2" name="pendidikan_k[]" style="width: 100%;"> \n\
                                                   <option selected="selected" value="sd">SD</option>\n\
                                                   <option value="smp">SMP</option>\n\
                                                   <option value="sma">SMA</option>\n\
                                                   <option value="S1">S1</option>\n\
                                                   <option value="S2">S2</option>\n\
                                                   <option value="S3">S3</option>\n\
                                                   <option value="lainnya">lainnya</option>\n\
                                                 </select><br>\n\
                                                <input type="text" class="form-control" placeholder="nama ..." name="nama_k[]" ><br>\n\n\
                                                 \n\
                                                 <select class="form-control select2" name="gender_k[]" style="width: 100%;"> \n\
                                                 <option selected="selected" value="pria">Male</option>\n\
                                                 <option value="female">Female</option>\n\
                                                  </select><br>\n\
                                                 <input type="text" class="form-control" placeholder="30 TAHUN"   name="usia_k[]" ><br>\n\n\
                                                 <input type="text" class="form-control" placeholder="Pekerjaan ..."   name="pekerjaan_k[]" >\n\
                                            \n\ <br><input type = "button" id = "add_kid()" onClick = "addKid()" value = "+" /> \n\
                                                 <input type = "button" value = "-" onclick = "removeKid(this)" > ';
                    document.getElementById('kids').appendChild(div);
                }
            }
            function addKids() {
                if (t <= 100) {
                    t++;
                    var div = document.createElement('div');

                    div.innerHTML = '<h3 class="box-title">PENGALAMAN KERJA</h3>\n\
                                            <input type="text" name="nama_perusahaan[]" class="form-control" placeholder="Nama Perusahaan ..."><br>\n\
                                            <input type="text" name="jabatan_terkahir[]" class="form-control" placeholder="Jabatan ..."><br>\n\
                                            <input type="text" name="gaji[]" onkeypress="return isNumberKey(event)" class="form-control" placeholder="gaji ..."><br>\n\
                                           \n\
                                         <div class="row">\n\
                        <div class="col-xs-4">\n\
                            <input name="tahun_masuk[]"  type="text" class="form-control docs-date" placeholder="Tahun Masuk">\n\
                        </div>\n\
                        <div class="col-xs-4 answer"> \n\
                            <input name="tahun_keluar[]"  type="text" class="form-control docs-date " placeholder="Tahun Keluar">\n\
                        </div><input class="coupon_question"  type="checkbox" name="coupon_question" value="1" onchange="valueChanged()"/> Sekarang</div><br>\n\
                                            <textarea class="form-control" name="alamat_perusahaan[]" rows="5" placeholder="Alamat Perusahaan ..."></textarea><br>\n\
                                            <textarea class="form-control" name="tugas_tanggung_jawab[]" rows="5" placeholder="Tugas Tanggung Jawab ..."></textarea><br>\n\
                                            <textarea class="form-control" name="alasan_keluar[]" rows="5" placeholder="Alasan Keluar ..."></textarea><br>\n\
                                            <input type="button" onClick="addKids()" value="+" />\n\
                                            <input type="button" value="-" onclick="removeKids(this)">';
                    document.getElementById('kidd').appendChild(div);
                    $(".docs-date").datepicker();
                }
            }
            function removeOrg(div) {
                document.getElementById('org').removeChild(div.parentNode);
                a--;
            }
            function removeKiids(div) {
                document.getElementById('kidds').removeChild(div.parentNode);
                r--;
            }
            function removeKid(div) {
                document.getElementById('kids').removeChild(div.parentNode);
                i--;
            }
            function removeKids(div) {
                document.getElementById('kidd').removeChild(div.parentNode);
                t--;
            }
        </script>
        <script>
            function checkEmailAvailability() {
                jQuery.ajax({
                    url: "<?php echo site_url('kandidat/add_kandidat/check_email_exists') ?>",
                    data: 'email=' + $("#email").val(),
                    type: "POST",
                    success: function (data) {
                        $("#user-availability-status").html(data);
                    },
                    error: function () {}
                });
            }
            function checkKtpAvailability() {
                jQuery.ajax({
                    url: "<?php echo site_url('kandidat/add_kandidat/check_ktp_exists') ?>",
                    data: 'no_ktp=' + $("#no_ktp").val(),
                    type: "POST",
                    success: function (data) {
                        $("#user-ktp-status").html(data);
                    },
                    error: function () {}
                });
            }
        </script>
        <script>
            $(function () {
                $(".select2").select2();
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'});
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'});
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'});
                $(".my-colorpicker1").colorpicker();
                $(".my-colorpicker2").colorpicker();
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script type="application/javascript">
            function isNumberKey(evt)
            {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
            }
        </script>
        <style>
            body {
                font-family: arial;
            }
            .hide {
                display: none;
            }
            p {
                font-weight: bold;
            }
        </style>
        <script>
            function show1() {
                document.getElementById('div1').style.display = 'none';
            }
            function show2() {
                document.getElementById('div1').style.display = 'block';
            }
            function show3() {
                document.getElementById('div2').style.display = 'none';
            }
            function show4() {
                document.getElementById('div2').style.display = 'block';
            }
            function show5() {
                document.getElementById('div3').style.display = 'none';
            }
            function show6() {
                document.getElementById('div3').style.display = 'block';
            }
        </script>
        <script type="text/javascript">
            var z = 1;
            function valueChanged()
            {
                if (z <= 100)
                {
                    z++;
                    if ($('.coupon_question').is(":checked"))
                        $(".answer").show();
                    else
                        $(".answer").show();
                }
            }

        </script>

        <script>
                $('#sc_get_prov').change(function () {
                    var form_data = { 
                        provinsi_id : $('#sc_get_prov').val()
                    };
                    $.ajax({
                        url: "<?php echo site_url('kandidat/add_kandidat/ajax_call') ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: form_data,
                        success: function (msg) {
                            var sc="";
                            $.each(msg, function (key, val) {
                                sc+= '<option value="' +val.kota_id+ '">' +val.kokab_nama+ '</option>';
                            });
                            $("#sc_show_kota option").remove();
                            $("#sc_show_kota").append(sc);
                        }
                    });
                });
           
        </script>
    </body>
</html>
