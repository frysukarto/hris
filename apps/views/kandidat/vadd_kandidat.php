<form  action="<?php echo base_url(); ?>kandidat-add" method="post" enctype="multipart/form-data">
    <!-- left column -->
    <section class="col-md-6 connectedSortable">
        <?php
        if (validation_errors()) {
            echo validation_errors('<p class="alert alert-danger" align="center">', '</p>');
        }
        ?>
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">DATA PRIBADI</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>  
            <div class="box-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" required name="nama_lengkap" class="form-control" placeholder="Nama Lengkap ...">
                </div>

                <div class="form-group">
                    <label>Telepon Rumah</label>
                    <input type="text" onkeypress="return isNumberKey(event)"  name="no_tlp" class="form-control" placeholder="Telepon Rumah ...">
                </div>
                <div class="form-group">
                    <label>HP</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="no_hp" class="form-control" placeholder="HP ...">
                </div>
                <style>
                    #parent {
                        display: flex;
                    }
                    #narrow {
                        width: 300px;
                    }
                    #narrows {
                        width: 250px;
                    }
                    #wide {
                        flex: 1;
                    }
                    #wides {
                        width: 150px;
                    }
                </style>
                <label>Email</label>
                <div class="form-group" id="parent">
                    <div class="col-xs-5" id="narrow">
                        <input type="email" name="email" required onBlur="checkEmailAvailability()" id="email" class="form-control" placeholder="Email ..."/>
                    </div>
                    <p id="user-availability-status"></p>
                </div><label>KTP</label>
                <div class="form-group" id="parent">
                    <div class="col-xs-3" id="narrows">
                        <span id="msg"></span>
                        <input type="text" name="no_ktp" minlength="16" maxlength="16" required onBlur="checkKtpAvailability()" id="no_ktp" onkeypress="return isNumberKey(event)" class="form-control" placeholder="No KTP">
                    </div>
                    <div class="col-xs-5" id="wides"> 
                        <input type="text" class="form-control docs-date" minlength="10" id="ktp_expired_date" name="ktp_expired_date" placeholder="Ktp Expired Date">
                    </div><p id="user-ktp-status"></p>
                </div>
                <div class="form-group">
                    <label>SIM</label><br>
                    <div class="col-xs-5">
                        <input name="no_sim" type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="No SIM">
                    </div>
                    <div class="col-xs-4"> 
                        <input type="text" class="form-control docs-date" id="sim_expired_date" name="sim_expired_date" placeholder="Sim Expired Date">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" rows="5" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control select2" name="agama" style="width: 100%;">
                        <option selected="selected" value="Budha">Budha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tingkat Pedidikan</label>
                    <select class="form-control select2" name="pendidikan_level" style="width: 100%;">
                        <option selected="selected" value="sd">SD</option>
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
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input type="text"  name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan ...">
                </div>
                <div class="form-group">
                    <label>Suku</label>
                    <input type="text"  name="suku" class="form-control" placeholder="Suku ...">
                </div>
                <div class="form-group">
                    <label>Golongan Darah</label>
                    <div class="radio">
                        <label><input type="radio" class="minimal-red" name="gol_darah" id="radio1" value="A" checked>A</label>
                        <label>
                            <input type="radio" class="minimal-red" name="gol_darah" id="radio2" value="B">B
                        </label>
                        <label>
                            <input type="radio" class="minimal-red" name="gol_darah" id="radio3" value="AB">
                            AB
                        </label>
                        <label>
                            <input type="radio" class="minimal-red" name="gol_darah" id="optionsRadios2" value="O">
                            O
                        </label>
                    </div>      
                </div>
                <div class="form-group">
                    <label>Tinggi Dan Berat </label>
                    <div class="row">
                        <div class="col-xs-3">
                            <input name="tinggi_badan" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Tinggi">
                        </div>
                        <div class="col-xs-3"> 
                            <input name="berat_badan" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Berat">
                        </div>
                    </div></div>
                <div class="form-group">
                    <label>Tempat Tinggal</label>
                    <select class="form-control select2" name="tempat_tinggal" style="width: 100%;">
                        <option selected="selected" value="rumah">Rumah</option>
                        <option value="Kos">Kos</option>
                        <option value="Kontrak">Kontrak</option>
                        <option value="Ikut">Ikut Saudara</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir ...">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="text" class="form-control docs-date" id="tgl_lahir" name="tgl_lahir" placeholder="Pick a date">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio" >
                        <label>
                            <input type="radio" class="flat-red" name="gender" id="radio1" value="pria" checked>
                            Pria
                        </label>
                        <label>
                            <input type="radio" class="flat-red" name="gender" id="radio2" value="wanita">
                            Wanita
                        </label>
                    </div>  </div><br>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">File Upload</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Pas Foto : (.jpg/.png/.jpeg)</label>
                    <input type="file" name="pas_foto_file">
                    <label>Ktp Scan : (.jpg/.png/.jpeg)</label>
                    <input type="file" name="ktp_scan_file">
                    <label>CV File :  (.pdf/.docx)</label>
                    <input type="file" name="cv_file">
                    <label>Lamaran :  (.pdf/.docx)</label>
                    <input type="file" name="lamaran_file">
                    <label>Ijazah :   (.pdf/.docx)</label>
                    <input type="file" name="ijazah_file">
                </div>
            </div>
        </div>
        <!-- Form Element sizes -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">KONTAK DARURAT?</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap_d" class="form-control" placeholder="Nama Lengkap ...">
                </div>
                <div class="form-group">
                    <label>Telepon Rumah</label>
                    <input type="text" name="no_telp_rumah_d" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Telpon Rumah ...">
                </div>
                <div class="form-group">
                    <label>HP</label>
                    <input type="text" name="no_hp_d" onkeypress="return isNumberKey(event)" class="form-control" placeholder="No HP ...">
                </div>
                <div class="form-group">
                    <label>Hubungan</label>
                    <input type="text" name="hubungan_d" class="form-control" placeholder="Hubungan ...">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat_d"  rows="5" placeholder="Alamat ..."></textarea>
                </div>
                <?php
                $jum = count($id);
                for ($i = 0; $i < $jum; $i++) {
                    echo '<input type="hidden" name="id_kandidat"  value="' . $id[$i]['AUTO_INCREMENT'] . '">';
                }
                ?>
            </div>
        </div>
        <!-- box -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">KEGIATAN LAINNYA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Hobby</label>
                    <input type="text"  name="hobby" class="form-control" placeholder="Hobby ...">
                </div>
                <div class="form-group">
                    <label>Pengalaman Memimpin</label>
                    <textarea class="form-control" name="pengalaman_memimpin" rows="5" placeholder="Enter ..."></textarea>
                </div>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">ORGANISASI</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" id="org">
                <div class="form-group">
                    <input type="text" name="nama_organisasi[]" class="form-control" placeholder="Nama Organisasi ...">
                </div>
                <div class="form-group">
                    <input type="text" name="jenis_organisasi[]" class="form-control" placeholder="Jenis Organisasi ...">
                </div>
                <div class="form-group">
                    <input type="text" name="jabatan[]" class="form-control" placeholder="Jabatan ...">
                </div>  

                <div class="form-group">
                    <input type="text" class="form-control docs-date" name="tahun[]" placeholder="Tahun Organisasi">
                    <!-- /.input group -->
                </div>
                <input type="button" onClick="addOrg()" value="+" />
            </div>
        </div>

        <div class="box box-warning" >
            <div class="box-header with-border">
                <h3 class="box-title">REFERENSI KERJA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" id="kidds">
                <input type="text" name="nama_lengkap_ref[]" class="form-control" placeholder="Nama Lengkap ..."><br>
                <input type="text" name="perusahaan_ref[]" class="form-control" placeholder="Perusahaan ..."><br>
                <input type="text" name="hubungan_ref[]" class="form-control" placeholder="Hubungan ..."><br>
                <input type="text" name="telp_ref[]" class="form-control" placeholder="No Telp ..."><br>
                <textarea class="form-control" name="alamat_ref[]" rows="5" placeholder="Alamat Perusahaan ..."></textarea><br>
                <select class="form-control select2" name="informasi_dari[]" style="width: 100%;"> 
                    <option selected="" value="">--Silahkan Pilih--</option>
                   <?php $c = count($sorching); for($s=0;$s<$c;$s++) { ?>
                    <option value="<?php echo $sorching[$s]['sorching'] ?>"><?php echo $sorching[$s]['sorching'] ?></option>
                   <?php } ?>
                </select>
                <br><br><input type="button" onClick="addKidss()" value="+"/></div>
        </div>
    </section>
    <section class="col-md-6 connectedSortable">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">KETERANGAN LAIN</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="radio" >
                        <strong>1.</strong> Apakah Ada Penyakit atau kelainan Fisik yang akan menganggu pekerjaan anda ? 
                        <br> 
                        <label><input type="radio" name="penyakit" onclick="show2();" value="Ya" >Ya</label>
                        <label><input type="radio" class="minimal" name="penyakit" onclick="show1();" value="Tidak">Tidak</label>
                        <div id="div1" style="display: none">
                            <textarea type="text" name="ket_penyakit" class="form-control" placeholder="Sebutkan penyakit yang anda derita" ></textarea>
                        </div>
                    </div> 

                    <div class="radio" >
                        <strong>2.</strong> Apakah anda pernah terlibat dalam tindak pidana/kriminal ? <br>
                        <label><input type="radio" class="minimal" onclick="show4();" name="pidana" id="radio1" value="Ya" >Ya</label>
                        <label><input type="radio" class="minimal" onclick="show3();" name="pidana" id="radio2" value="Tidak">Tidak</label>
                        <div id="div2" style="display: none">
                            <textarea type="text" name="ket_kriminal" class="form-control" placeholder="Sebutkan tindak kriminal yang ada lakukan" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>3.</strong> Berapa gaji yang ada inginkan? Rp.
                        <input type="text" name="gaji_diharapkan" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Gaji ex: 4000000">
                    </div>

                    <div class="form-group">
                        <strong>4.</strong>Kapan dapat mulai bekerja? 
                        <input type="text" name="mulai_kerja" class="form-control" placeholder="Mulai Kerja">
                    </div>
                    <div class="radio" >
                        <strong>5.</strong> Apakah ada keluarga/ Saudara Anda yang bekerja di PT. Valdo Sumber Daya Mandiri? 
                        <br>
                        <label><input type="radio" class="minimal" name="orang_dalam" id="radio1" onclick="show6();"value="Ya" >Ya</label>
                        <label><input type="radio" class="minimal" name="orang_dalam" id="radio2" onclick="show5();" value="Tidak">Tidak</label>
                        <div id="div3" style="display: none">
                            <textarea type="text" class="form-control" name="ket_orangdalam" placeholder="Sebutkan siap keluarga atau kerabat anda"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sebutkan Kelemahan saudara?</label>
                        <textarea class="form-control" name="kelemahan" rows="5" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Sebutkan Kelebihan Saudara?</label>
                        <textarea class="form-control" name="kelebihan" rows="5" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">PENDIDIKAN DAN KETERAMPILAN</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <style>table, th, td 
                {
                    border: 1px solid black;
                    padding: 2px 2px;
                }
            </style>
            <div class="box-body">
                <table>
                    <tr>
                        <th>Jenis Sekolah</th>
                        <th>Nama Sekolah</th>
                        <th>Tempat</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Lulus</th>
                    </tr>
                    <tr>
                        <td>SD</td>
                        <td><input type="text" name="nama_sekolah[]" class="form-control" placeholder="Nama Sekolah ..."></td>
                        <td><input type="text" name="tempat_sekolah[]" class="form-control" placeholder="Tempat ..."></td>
                        <td><input type="text" class="form-control docs-date" name="tanggal_masuk[]" placeholder="Masuk"></td>
                        <td><input type="text" class="form-control docs-date" name="tanggal_lulus[]" placeholder="Lulus"></td>
                    <input type="text" class="form-control" hidden="hidden" style="display: none" name="tingkat_sekolah[]" value="SD">
                    </tr>

                    <tr>
                        <td>SMP</td>
                        <td><input type="text" name="nama_sekolah[]" class="form-control" placeholder="Nama Sekolah ..."></td>
                        <td><input type="text" name="tempat_sekolah[]" class="form-control" placeholder="Tempat ..."></td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_masuk[]" placeholder="Masuk">
                        </td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_lulus[]" placeholder="Lulus">
                        </td> <input type="text" class="form-control" style="display: none" hidden name="tingkat_sekolah[]" value="SMP">
                    </tr>
                    
                    <tr>
                        <td>SMA</td>
                        <td><input type="text" name="nama_sekolah[]" class="form-control" placeholder="Nama Sekolah ..."></td>
                        <td><input type="text" name="tempat_sekolah[]" class="form-control" placeholder="Tempat ..."></td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_masuk[]" placeholder="Masuk">
                        </td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_lulus[]" placeholder="Lulus">
                        </td>
                    <input type="text" class="form-control" style="display: none" hidden name="tingkat_sekolah[]" value="SMA">
                    </tr>
                    <tr>
                        <td>Universitas/Akademi</td>
                        <td><input type="text" name="nama_sekolah[]" class="form-control" placeholder="Nama Sekolah ..."></td>
                        <td><input type="text" name="tempat_sekolah[]" class="form-control" placeholder="Tempat ..."></td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_masuk[]" placeholder="Masuk">
                        </td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_lulus[]" placeholder="Lulus">
                        </td>
                    <input type="text" class="form-control" hidden style="display: none" name="tingkat_sekolah[]" value="D3">
                    </tr>
                    <tr>
                        <td>Pasca Sarjana</td>
                        <td><input type="text" name="nama_sekolah[]" class="form-control" placeholder="Nama Sekolah ..."></td>
                        <td><input type="text" name="tempat_sekolah[]" class="form-control" placeholder="Tempat ..."></td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_masuk[]" placeholder="Masuk">
                        </td>
                        <td>
                            <input type="text" class="form-control docs-date" name="tanggal_lulus[]" placeholder="Lulus">
                        </td> 
                    <input type="text" class="form-control" hidden style="display: none" name="tingkat_sekolah[]" value="S2">
                    </tr>
                </table>                     
            </div>
            <!-- /.box-body -->
            <div class="box-header with-border">
                <h3 class="box-title">KURSUS</h3>

            </div>
            <div class="box-body">
                <table>
                    <tr>
                        <th>Jenis Kursus</th>
                        <th>Tahun</th>
                        <th>Lama Kursus</th>
                        <th>Penyelenggara</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="jenis_kursus[]" class="form-control" placeholder="Nama  ..."></td>
                        <td><input type="text" name="tahun_kursus[]" class="form-control docs-date"  placeholder="Tahun"></td>
                        <td><input type="text" name="lama_kursus[]" class="form-control" placeholder="lama ..."></td>
                        <td><input type="text" name="penyelenggara[]" class="form-control" placeholder="Penyelenggara ..."></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="jenis_kursus[]" class="form-control" placeholder="Nama  ..."></td>
                        <td><input type="text" name="tahun_kursus[]" class="form-control docs-date"  placeholder="Tahun"></td>
                        <td><input type="text" name="lama_kursus[]" class="form-control" placeholder="lama ..."></td>
                        <td><input type="text" name="penyelenggara[]" class="form-control" placeholder="Penyelenggara ..."></td>
                    </tr>
                </table><br>  
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">KEMAMPUAN BAHASA ASING</h3>
            </div>
            <div class="box-body">
                <table>
                    <tr>
                        <th>Bahasa</th>
                        <th>Membaca</th>
                        <th>Menulis</th>
                        <th>Berbicara</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="bahasa[]" class="form-control" placeholder="Bahasa  ..."></td>
                        <td>
                            <select class="form-control select2" name="membaca[]" style="width: 100%;"> 
                                <option value="sangat">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="menulis[]" style="width: 100%;"> 
                                <option value="sangat">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="berbicara[]" style="width: 100%;"> 
                                <option value="sangat">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="bahasa[]" class="form-control" placeholder="Bahasa  ..."></td>
                        <td>
                            <select class="form-control select2" name="membaca[]" style="width: 100%;"> 
                                <option value="sangat">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="menulis[]" style="width: 100%;"> 
                                <option value="sangat">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="berbicara[]" style="width: 100%;"> 
                                <option value="sangat">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>  
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">KEMAMPUAN KOMPUTER</h3>
            </div>
            <div class="box-body">
                <table style="width: 400px;">
                    <tr>
                        <th>Jenis Program</th>
                        <th>Level</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="jenis_program[]" class="form-control" placeholder="contoh : Excel, Word  ..."></td>
                        <td>  <select class="form-control select2" name="level_skill[]" style="width: 100%;"> 
                                <option value="dasar">Dasar</option>
                                <option value="menengah">Menengah</option>
                                <option value="ahli">Ahli</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="jenis_program[]" class="form-control" placeholder="contoh : Excel, Word ..."></td>
                        <td>  <select class="form-control select2" name="level_skill[]" style="width: 100%;"> 
                                <option value="dasar">Dasar</option>
                                <option value="menengah">Menengah</option>
                                <option value="ahli">Ahli</option>
                            </select></td>
                    </tr>
                </table><br>  
            </div>
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">KELUARGA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" id="kids">
                <select class="form-control select2" name="jenis_keluarga[]" style="width: 100%;"> 
                    <option selected="selected" value="ayah">Ayah</option>
                    <option value="ibu">Ibu</option>
                    <option value="suami">Suami</option>
                    <option value="istri">Istri</option>
                    <option value="anak">Anak</option>
                    <option value="saudara">saudara</option>
                </select><br>
                <select class="form-control select2" name="pendidikan_k[]" style="width: 100%;"> 
                    <option selected="selected" value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="Lainnya">lainnya</option>
                </select><br>
                <input type="text" class="form-control" placeholder="nama ..."  name="nama_k[]" ><br>
                <select class="form-control select2" name="gender_k[]" style="width: 100%;"> 
                    <option selected="selected" value="pria">Male</option>
                    <option value="female">Female</option>
                </select><br>
                <input type="text" class="form-control" placeholder="30 TAHUN"  name="usia_k[]" ><br>
                <input type="text" class="form-control" placeholder="Pekerjaan ..."  name="pekerjaan_k[]" >
                <br>
                <input type="button" onClick="addKid()" value="+" />
            </div>
        </div>

        <div class="box box-warning" >
            <div class="box-header with-border">
                <h3 class="box-title">PENGALAMAN KERJA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" id="kidd">
                <input type="text" name="nama_perusahaan[]" class="form-control" placeholder="Nama Perusahaan ..."><br>
                <input type="text" name="jabatan_terkahir[]" class="form-control" placeholder="Jabatan ..."><br>
                <input type="text" name="gaji[]" onkeypress="return isNumberKey(event)" class="form-control" placeholder="gaji ..."><br>
                <div class="row">
                    <div class="col-xs-4">
                        <input name="tahun_masuk[]"  type="text" class="form-control docs-date" placeholder="Tahun Masuk">
                    </div>
                    <div class="col-xs-4 answer"> 
                        <input name="tahun_keluar[]"  type="text" class="form-control docs-date " placeholder="Tahun Keluar">
                    </div><input class="coupon_question"  type="checkbox" name="coupon_question" value="1" onchange="valueChanged()"/> Sekarang
                </div><br>

                <textarea class="form-control" name="alamat_perusahaan[]" rows="5" placeholder="Alamat Perusahaan ..."></textarea><br>
                <textarea class="form-control" name="tugas_tanggung_jawab[]" rows="5" placeholder="Tugas Tanggung Jawab ..."></textarea><br>
                <textarea class="form-control" name="alasan_keluar[]" rows="5" placeholder="Alasan Keluar ..."></textarea>
                <br><input type="button"  onClick="addKids()" value="+" /></div>
        </div>


        <div class="box box-warning" >
            <div class="box-header with-border">
                <h3 class="box-title">POSISI DAN PENEMPATAN</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Posisi Yang Dipilih</label>
                <div class="box-body">
                    <div class="col-md-9">
                        <select name="nama_posisi" class="form-control">
                            <option selected="selected" value="">--Pilih--</option>
                        <?php $total = count($posisi);
                        for ($i = 0; $i < $total; $i++) {
                            ?>
                                <option value="<?php echo $posisi[$i]['nama_posisi']; ?>"><?php echo $posisi[$i]['nama_posisi']; ?> (<?php echo $posisi[$i]['level']; ?>)</option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </div><div class="control-group">
                <label class="control-label col-md-3">Provinsi</label>
                <div class="box-body">
                    <div class="col-md-9">
                        <select  class="form-control" required name="provinsi_id" id="sc_get_prov"> 
                        <option value="" >--Pilih Provinsi--</option>
                        <?php foreach ($dropdownprov as $a) {
                            echo '<option value="'.$a["provinsi_id"].'">'.$a["provinsi_nama"].'</option>';}
                        ?>
                    </select>
                </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label col-md-3">Pilih Kota/Kabupaten</label>
                <div class="box-body">
                    <div class="col-md-9">
                    <select class="form-control" required name="kota_id" id="sc_show_kota" > 
                       <option value="">Pilih Kota / Kabupaten</option>
                    </select>
                </div>
                </div>
            </div> 
        </div>
    </section>          
</div>
<div >
    <input type="checkbox" required>
    <label for="a-0">i'm not Bot </label>
</div>
<div class="box-footer">
    <input type="submit" id="submit" value="submit" class="btn btn-primary">
</div>
</form>
<br> 

