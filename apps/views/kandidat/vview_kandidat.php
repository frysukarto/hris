<!--START MODAL DATA PRIBADI-->
<div class="modal fade" id="modal_form_data_pribadi" role="dialog">
    <div  class="modal-dialog">
        <div  class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <form action="#" id="form" class="form-horizontal">
                <div class="modal-body form" id="form">
                    <div class="form-body">
                        <input type="hidden" value="" name="id_kandidat"/>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telpon</label>
                            <div class="col-md-9">
                                <input name="no_tlp" id="no_tlp" onkeypress="return isNumberKey(event)" placeholder="No Telepon" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No HP</label>
                            <div class="col-md-9">
                                <input name="no_hp" onkeypress="return isNumberKey(event)" placeholder="No HP" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5">
                                <input name="email" placeholder="Email" required onBlur="checkEmailAvailability()" id="email" class="form-control" type="text">
                            </div><p id="user-availability-status"></p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No KTP</label>
                            <div class="col-md-5">
                                <span id="msg"></span>
                                <input name="no_ktp" onBlur="checkKtpAvailability()" id="no_ktp" onkeypress="return isNumberKey(event)" minlength="16" maxlength="16" placeholder="No Ktp" class="form-control" type="text">
                                <br>
                                <input type="text" class="form-control docs-date" minlength="10" name="ktp_expired_date" value="<?php echo date('d/m/Y', strtotime(strtr($kandidat[0]['ktp_expired_date'], '/', '-'))) ?>"  placeholder="Ktp Expired Date">
                            </div><p id="user-ktp-status"></p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No SIM</label>
                            <div class="col-md-5">
                                <span id="msg"></span>
                                <input name="no_sim" onkeypress="return isNumberKey(event)" placeholder="No SIM" class="form-control" type="text">
                                <span id="user-ktp-status"></span>
                                <span class="help-block"></span>
                                <input type="text" class="form-control docs-date" minlength="10" id="ktp_expired_date" name="sim_expired_date" value="<?php echo date('d/m/Y', strtotime(strtr($kandidat[0]['sim_expired_date'], '/', '-'))) ?>" placeholder="SIM Expired Date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-9">
                                <select name="agama" id="agama" class="form-control">
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat" placeholder="Alamat" style="height:100px" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kewarganegaraan</label>
                            <div class="col-md-9">
                                <input name="kewarganegaraan" placeholder="Kewarganegaraan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Tinggal</label>
                            <div class="col-md-9">
                                <select name="tempat_tinggal" class="form-control">
                                    <option value="rumah">Rumah</option>
                                    <option value="Kos">Kos</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Ikut">Ikut Saudara</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-9">
                                <select name="pendidikan_level" id="pendidikan_level" class="form-control">
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
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Suku</label>
                            <div class="col-md-9">
                                <input name="suku" placeholder="Suku" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hobby</label>
                            <div class="col-md-9">
                                <input name="hobby" placeholder="hobby" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pengalaman Memimpin</label>
                            <div class="col-md-9">
                                <textarea name="pengalaman_memimpin" placeholder="pengalaman_memimpin" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Golongan Darah</label>
                            <div class="col-md-9">
                                <select name="gol_darah" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tinggi Dan Berat </label>
                            <div class="row">
                                <div class="col-xs-3">
                                    <input name="tinggi_badan" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Tinggi">
                                </div>
                                <div class="col-xs-3">
                                    <input name="berat_badan" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Berat">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input type="text"   name="tempat_lahir"  class="form-control" placeholder="Tempat Lahir ...">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control docs-date" id="tgl_lahir" value="<?php echo date('d/m/Y', strtotime(strtr($kandidat[0]['tgl_lahir'], '/', '-'))) ?>"  name="tgl_lahir" placeholder="Pick a date">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control">
                                    <option  value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL EDIT DATA PRIBADI-->
<!--START MODAL DARURAT CALL-->
<div class="modal fade" id="modal_edit_darurat_call" role="dialog">
    <div  class="modal-dialog">
        <div  class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <form  id="form_darurat_call" class="form-horizontal">
                <div class="modal-body form_darurat_call" id="form_darurat_call">
                    <div class="form-body">
                        <input type="hidden" value="" name="id_kandidat"/>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama_lengkap_d" id="nama_lengkap_d" placeholder="Nama Lengkap" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">No Telp Rumah</label>
                            <div class="col-md-9">
                                <input name="no_telp_rumah_d" id="no_telp_rumah_d" placeholder="No Tlp Rumah" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">No Hp</label>
                            <div class="col-md-9">
                                <input name="no_hp_d" id="no_hp_d" placeholder="No HP" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">hubungan</label>
                            <div class="col-md-9">
                                <input name="hubungan_d" id="hubungan_d" placeholder="Hubungan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat_d" id="alamat_d" placeholder="Alamat" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" type="submit" id="btnSaveDarurat" onclick="save_darurat_call()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END DARURAT CALL-->
<!--START EDIT KETERANGAN LAIN-->
<div class="modal fade" id="modal_edit_keterangan_lain" role="dialog">
    <div  class="modal-dialog">
        <div  class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <form  id="form_keterangan_lain" class="form-horizontal">
                <div class="modal-body form_keterangan_lain" id="form_keterangan_lain">
                    <div class="form-body">
                        <input type="hidden" value="" name="id_kandidat"/>

                        <div class="form-group">
                            <label class="control-label col-md-3">Pernahkan Menderita Penyakit?</label>
                            <div class="col-md-9">
                                <div class="radio" >
                                    <label><input type="radio" name="penyakit" <?php
                                        if ($ketla[0]['penyakit'] == "Ya") {
                                            echo "checked";
                                        }
                                        ?> id="penyakit" onclick="show2();" value="Ya" >Ya</label>
                                    <label><input type="radio"  name="penyakit" <?php
                                        if ($ketla[0]['penyakit'] == "Tidak") {
                                            echo "checked";
                                        }
                                        ?> id="penyakit" onclick="show1();" value="Tidak">Tidak</label>
                                    <div id="div1" style="display: none">
                                        <textarea type="text" name="ket_penyakit" id="ket_penyakit" class="form-control" placeholder="Sebutkan Penyakit Yang pernah diderita" ></textarea>
                                    </div>
                                </div></div></div>


                        <div class="form-group"> <label class="control-label col-md-3">Pernahkan di Pidana?</label>
                            <div class="col-md-9">
                                <div class="radio" >
                                    <label><input type="radio" class="minimal" onclick="show4();" <?php
                                        if ($ketla[0]['pidana'] == "Ya") {
                                            echo "checked";
                                        }
                                        ?> name="pidana" id="pidana" value="Ya" >Ya</label>
                                    <label><input type="radio" class="minimal" onclick="show3();" <?php
                                        if ($ketla[0]['pidana'] == "Tidak") {
                                            echo "checked";
                                        }
                                        ?>  name="pidana" id="pidana" value="Tidak">Tidak</label>
                                    <div id="div2" style="display: none">
                                        <textarea type="text" name="ket_kriminal" id="ket_kriminal" class="form-control" placeholder="Sebutkan tindak kriminal yang ada lakukan" ></textarea>
                                    </div>
                                </div> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Apakah ada keluarga/ Saudara Anda yang bekerja di PT. Valdo Sumber Daya Mandiri?</label>
                            <div class="col-md-9"> <div class="radio" >
                                    <label><input type="radio" class="minimal" name="orang_dalam" <?php
                                        if ($ketla[0]['orang_dalam'] == "Ya") {
                                            echo "checked";
                                        }
                                        ?> id="orang_dalam" onclick="show6();" value="Ya" >Ya</label>
                                    <label><input type="radio" class="minimal" name="orang_dalam" <?php
                                        if ($ketla[0]['orang_dalam'] == "Tidak") {
                                            echo "checked";
                                        }
                                        ?> id="orang_dalam" onclick="show5();" value="Tidak">Tidak</label>
                                    <div id="div3" style="display: none">
                                        <textarea type="text" class="form-control" id="ket_orangdalam" name="ket_orangdalam" placeholder="Sebutkan siap keluarga atau kerabat anda" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Gaji Yang Diharapkan</label>
                            <div class="col-md-9">
                                <input name="gaji_diharapkan" id="gaji_diharapkan" placeholder="Gaji" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Mulai Kerja</label>
                            <div class="col-md-9">
                                <input name="mulai_kerja" id="mulai_kerja" placeholder="Mulai Kerja" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Kelemahan</label>
                            <div class="col-md-9">
                                <textarea name="kelemahan" id="kelemahan" placeholder="Kelemahan" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Kelebihan</label>
                            <div class="col-md-9">
                                <textarea name="kelebihan" id="kelebihan" placeholder="kelebihan" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" type="submit" id="btnSaveKeterangan" onclick="save_keterangan_lain()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END KETERANGAN LAIN-->

<!--START ORGANISASI-->
<div class="modal fade" id="modal_add_organisasi" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_organisasi">
                <form action="#" class="form-horizontal" id="form_organisasi">

                    <div class="form-body">  <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Organisasi</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_organisasi"  class="form-control" placeholder="Nama Organisasi ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Organisasi</label>
                            <div class="col-md-9">
                                <input type="text" name="jenis_organisasi" class="form-control" placeholder="Jenis Organisasi ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Organisasi</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control docs-date"  name="tahun"  placeholder="Pick a date">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSaveOrganisasi" onclick="save_organisasi()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END ORGANISASI-->

<!--START REFERENSI-->
<div class="modal fade" id="modal_add_referensi" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_referensi">
                <form action="#" class="form-horizontal" id="form_referensi">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Referensi</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_lengkap_ref"  class="form-control" placeholder="Nama Referensi ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Perusahaan</label>
                            <div class="col-md-9">
                                <input type="text" name="perusahaan_ref" class="form-control" placeholder="Nama Perusahaan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hubungan</label>
                            <div class="col-md-9">
                                <input type="text" name="hubungan_ref" class="form-control" placeholder="Hubungan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Telp</label>
                            <div class="col-md-9">
                                <input type="text" name="telp_ref" class="form-control" placeholder="Telp ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat_ref" class="form-control" placeholder="Alamat ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Informasi dari</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="informasi_dari" style="width: 100%;"> 
                                    <option selected="" value="">--Silahkan Pilih--</option>
                                    <?php
                                    $c = count($sorching);
                                    for ($s = 0; $s < $c; $s++) {
                                        ?>
                                        <option value="<?php echo $sorching[$s]['sorching'] ?>"><?php echo $sorching[$s]['sorching'] ?></option>
<?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSaveReferensi" onclick="save_referensi()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END REFERENSI-->

<!--START KELUARGA-->
<div class="modal fade" id="modal_add_keluarga" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_keluarga">
                <form action="#" class="form-horizontal" id="form_keluarga">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />
                        <div class="form-group"><label class="control-label col-md-3">Keluarga</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="jenis_keluarga">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="ayah">Ayah</option>
                                    <option value="ibu">Ibu</option>
                                    <option value="suami">Suami</option>
                                    <option value="istri">Istri</option>
                                    <option value="anak">Anak</option>
                                    <option value="saudara">Saudara</option>
                                </select></div></div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_k"  class="form-control" placeholder="Nama ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan</label>
                            <div class="col-md-9">
                                <input type="text" name="pekerjaan_k" class="form-control" placeholder="Pekerjaan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Usia</label>
                            <div class="col-md-9">
                                <input type="text" name="usia_k" class="form-control" placeholder="Usia ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="pendidikan_k" style="width: 100%;">
                                    <option selected="selected" value="">--Pilih--</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender_k" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="wanita">Wanita</option>
                                    <option value="pria">Pria</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSaveKeluarga" onclick="save_keluarga()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END KELUARGA-->
<!--START PENGALAMAN KERJA-->
<div class="modal fade" id="modal_add_pengalaman" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_pengalaman">
                <form action="#" class="form-horizontal" id="form_pengalaman">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Perusahaan</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_perusahaan"  class="form-control" placeholder="Nama Perusahaan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat Perusahaan</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat_perusahaan" class="form-control" placeholder="Alamat ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <input type="text" name="jabatan_terkahir" class="form-control" placeholder="Jabatan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gaji</label>
                            <div class="col-md-9">
                                <input type="text" name="gaji" class="form-control" placeholder="Gaji ...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Masuk</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control docs-date"  name="tahun_masuk"  placeholder="Pick a date">
                            </div>
                        </div>


                        <script type="text/javascript">
                            function valueChanged()
                            {
                                if ($('.coupon_question').is(":checked"))
                                    $(".answer").hide();
                                else
                                    $(".answer").show();
                            }
                        </script>

                        <div id="answer" class="form-group " >
                            <label class="control-label col-md-3">Tahun Keluar</label>
                            <div class="col-md-6" id="parent">
                                <div id="wide" class="answer"> <input type="text" class="form-control docs-date" name="tahun_keluar"  placeholder="Pick a date"></div>&nbsp;&nbsp;
                                <div id="narrows"><input class="coupon_question"  type="checkbox" name="coupon_question" value="1" onchange="valueChanged()" />Sekarang</div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <textarea type="text" name="tugas_tanggung_jawab" class="form-control" placeholder="Tugas dan Tanggungjawab ..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Alasan Keluar</label>
                            <div class="col-md-9">
                                <textarea type="text" name="alasan_keluar" class="form-control" placeholder="Alasan Keluar ..."></textarea>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSavePengalaman" onclick="save_pengalaman()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END PENGALAMAN KERJA-->




<!--START KEMAMPUAN KOMPUTER-->
<div class="modal fade" id="modal_add_kemampuan_komputer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_kemampuan_komputer">
                <form action="#" class="form-horizontal" id="form_kemampuan_komputer">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <input type="text" name="jenis_program" class="form-control" placeholder="Program ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Level Skill</label>
                            <div class="col-md-9">
                                <select name="level_skill" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="dasar">Dasar</option>
                                    <option value="menengah">Menengah</option>
                                    <option value="ahli">Ahli</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSaveKemKomputer" onclick="save_kemampuan_komputer()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END KEMAMPUAN KOMPUTER-->

<!--START PENDIDIKAN-->
<div class="modal fade" id="modal_add_pendidikan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_pendidikan">
                <form action="#" class="form-horizontal" id="form_pendidikan">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Sekolah</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat Sekolah</label>
                            <div class="col-md-9">
                                <input type="text" name="tempat_sekolah" class="form-control" placeholder="Alamat ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Masuk</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control docs-date"  name="tanggal_masuk"  placeholder="Pick a date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Lulus</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control docs-date"  name="tanggal_lulus"  placeholder="Pick a date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tingkat Pendidikan</label>
                            <div class="col-md-9">
                                <select name="tingkat_sekolah" class="form-control">
                                    <option value="">--Pilih--</option>
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
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSavePendidikan" onclick="save_pendidikan()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END PENDIDIKAN-->

<!--START KURSUS-->
<div class="modal fade" id="modal_add_kursus" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_kursus">
                <form action="#" class="form-horizontal" id="form_kursus">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kursus</label>
                            <div class="col-md-9">
                                <input type="text" name="jenis_kursus" class="form-control" placeholder="Jenis Kursus ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lama Kursus</label>
                            <div class="col-md-9">
                                <input type="text" name="lama_kursus" class="form-control" placeholder="Lama ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Kursus</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control docs-date"  name="tahun_kursus"  placeholder="Pick a date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Penyelenggara</label>
                            <div class="col-md-9">
                                <input type="text" name="penyelenggara" class="form-control" placeholder="Penyelenggara ...">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSaveKursus" onclick="save_kursus()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END KURSUS-->

<!--START KEMAMPUAN BAHASA-->
<div class="modal fade" id="modal_add_kemampuan_bahasa" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form_kemampuan_bahasa">
                <form action="#" class="form-horizontal" id="form_kemampuan_bahasa">

                    <div class="form-body">
                        <input type="hidden" name="id_kandidat" value="<?php echo $this->uri->segment(2); ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3">Bahasa</label>
                            <div class="col-md-9">
                                <input type="text" name="bahasa" class="form-control" placeholder="Jenis Kursus ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Membaca</label>
                            <div class="col-md-9">
                                <select name="membaca" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="sangat">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Menulis</label>
                            <div class="col-md-9">
                                <select name="menulis" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="sangat">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Berbicara</label>
                            <div class="col-md-9">
                                <select name="berbicara" class="form-control">
                                    <option selected="selected" value="">--Pilih--</option>
                                    <option value="sangat">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" type="submit" id="btnSaveKemBahasa" onclick="save_kemampuan_bahasa()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--END KEMAMPUAN BAHASA-->

<!--POSISI DAN PENEMPATAN-->
<div class="modal fade" id="modal_edit_posisi_penempatan" role="dialog">
    <div  class="modal-dialog">
        <div  class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <form  id="form_posisi_penempatan" class="form-horizontal">
                <div class="modal-body form_posisi_penempatan" id="form_posisi_penempatan">
                    <div class="form-body">
                        <input type="hidden" value="" name="id_kandidat"/>

                        <div class="form-group">
                            <label class="control-label col-md-3">Posisi Yang Dipilih</label>
                            <div class="box-body">
                                <div class="col-md-9">
                                    <select name="posisi" class="form-control">
                                        <option selected="selected" value="">--Pilih--</option>
                                        <?php
                                        $total = count($posisi);
                                        for ($i = 0; $i < $total; $i++) {
                                            ?>
                                            <option value="<?php echo $posisi[$i]['nama_posisi']; ?>"><?php echo $posisi[$i]['nama_posisi']; ?> (<?php echo $posisi[$i]['level']; ?>)</option>
<?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div> <div class="form-group">
                            <label class="control-label col-md-3">Cabang</label>
                            <div class="box-body">
                                <div class="col-md-9">
                                    <select  class="form-control" name="id_cabang" id="sc_get_cabang">
                                        <option value="" >Pilih Cabang</option>
                                        <?php
                                        foreach ($dropdownprov as $a) {
                                            echo '<option value="' . $a["id_cabang"] . '">' . $a["nama_cabang"] . '</option>';
                                        }
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
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" type="submit" id="btnSavePosPen" onclick="save_posisi_penempatan()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--POSISI DAN PENEMPATAN END-->
      
<script type="text/javascript">
    var save_method;
    var modal_form_data_pribadi;
    var modal_edit_darurat_call;
    var modal_edit_keterangan_lain;
    var modal_add_organisasi;
    var modal_add_referensi;
    var modal_add_keluarga;
    var modal_add_pengalaman;
    var modal_add_kemampuan_komputer;
    var modal_add_pendidikan;
    var modal_add_kursus;
    var modal_add_kemampuan_bahasa;
    var modal_edit_posisi_penempatan;
    var keterangan_lain;

    $(document).ready(function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('kandidat/list_caller/ajax_list') ?>",
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

    function add_kemampuan_bahasa()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_kemampuan_bahasa').modal('show');
        $('.modal-title').text('Tambah Kemampuan Bahasa');
        $(".docs-date").datepicker();
    }

    function save_kemampuan_bahasa()
    {
        $('#btnSaveKemBahasa').text('saving...');
        $('#btnSaveKemBahasa').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_kemampuan_bahasa') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_kemampuan_bahasa').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_kemampuan_bahasa').modal('hide');
                    $("#bahasa").load(" #bahasa");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveKemBahasa').text('save');
                $('#btnSaveKemBahasa').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSaveKemBahasa').text('save');
                $('#btnSaveKemBahasa').attr('disabled', false);
            }
        });
    }

    function add_kursus()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_kursus').modal('show');
        $('.modal-title').text('Tambah Kursus');
        $(".docs-date").datepicker();
    }

    function save_kursus()
    {
        $('#btnSaveKursus').text('saving...');
        $('#btnSaveKursus').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_kursus') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_kursus').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_kursus').modal('hide');
                    $("#kursus").load(" #kursus");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveKursus').text('save');
                $('#btnSaveKursus').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSaveKursus').text('save');
                $('#btnSaveKursus').attr('disabled', false);
            }
        });
    }

    function add_pendidikan()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_pendidikan').modal('show');
        $('.modal-title').text('Tambah Pendidikan');
        $(".docs-date").datepicker();
    }

    function save_pendidikan()
    {
        $('#btnSavePendidikan').text('saving...');
        $('#btnSavePendidikan').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_pendidikan') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_pendidikan').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_pendidikan').modal('hide');
                    $("#pendidikan").load(" #pendidikan");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavePendidikan').text('save');
                $('#btnSavePendidikan').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSavePendidikan').text('save');
                $('#btnSavePendidikan').attr('disabled', false);
            }
        });
    }

    function add_kemampuan_komputer()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_kemampuan_komputer').modal('show');
        $('.modal-title').text('Tambah Kemampuan Komputer');
        $(".docs-date").datepicker();
    }

    function save_kemampuan_komputer()
    {
        $('#btnSaveKemKomputer').text('saving...');
        $('#btnSaveKemKomputer').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_kemampuan_komputer') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_kemampuan_komputer').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_kemampuan_komputer').modal('hide');
                    $("#komputer").load(" #komputer");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveKemKomputer').text('save');
                $('#btnSaveKemKomputer').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSavePengalaman').text('save');
                $('#btnSavePengalaman').attr('disabled', false);
            }
        });
    }

    function add_pengalaman()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_pengalaman').modal('show');
        $('.modal-title').text('Add Pengalaman');
        $(".docs-date").datepicker();
    }

    function save_pengalaman()
    {
        $('#btnSavePengalaman').text('saving...');
        $('#btnSavePengalaman').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_pengalaman') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_pengalaman').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_pengalaman').modal('hide');
                    $("#pengalaman").load(" #pengalaman");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavePengalaman').text('save');
                $('#btnSavePengalaman').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSavePengalaman').text('save');
                $('#btnSavePengalaman').attr('disabled', false);
            }
        });
    }

    function add_keluarga()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_keluarga').modal('show');
        $('.modal-title').text('Tambah Keluarga');
        $(".docs-date").datepicker();
    }

    function save_keluarga()
    {
        $('#btnSaveKeluarga').text('saving...');
        $('#btnSaveKeluarga').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_keluarga') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_keluarga').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_keluarga').modal('hide');
                    $("#keluarga").load(" #keluarga");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveKeluarga').text('save');
                $('#btnSaveKeluarga').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSaveKeluarga').text('save');
                $('#btnSaveKeluarga').attr('disabled', false);
            }
        });
    }

    function add_referensi()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_referensi').modal('show');
        $('.modal-title').text('Tambah referensi');
        $(".docs-date").datepicker();
    }

    function save_referensi()
    {
        $('#btnSaveReferensi').text('saving...');
        $('#btnSaveReferensi').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_referensi') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_referensi').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_referensi').modal('hide');
                    $("#referensi").load(" #referensi");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveReferensi').text('save');
                $('#btnSaveReferensi').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSaveReferensi').text('save');
                $('#btnSaveReferensi').attr('disabled', false);
            }
        });
    }


    function add_organisasi()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_add_organisasi').modal('show');
        $('.modal-title').text('Tambah Organisasi');
        $(".docs-date").datepicker();
    }

    function save_organisasi()
    {
        $('#btnSaveOrganisasi').text('saving...');
        $('#btnSaveOrganisasi').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_add_organisasi') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_organisasi').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_add_organisasi').modal('hide');
                    $("#organisasi").load(" #organisasi");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveOrganisasi').text('save');
                $('#btnSaveOrganisasi').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Adding Data');
                $('#btnSaveOrganisasi').text('save');
                $('#btnSaveOrganisasi').attr('disabled', false);
            }
        });
    }

    function save()
    {
        $('#btnSave').text('saving...');
        $('#btnSave').attr('disabled', true);
        var url;

        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_update_data_pribadi') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_form_data_pribadi').modal('hide');
                    $("#datapribadi").load(" #datapribadi");
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
    function save_darurat_call()
    {
        $('#btnSaveDarurat').text('saving...');
        $('#btnSaveDarurat').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_update_darurat') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_darurat_call').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_edit_darurat_call').modal('hide');
                    $("#darurat").load(" #darurat");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveDarurat').text('save');
                $('#btnSaveDarurat').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSaveDarurat').text('save');
                $('#btnSaveDarurat').attr('disabled', false);
            }
        });
    }
    function save_keterangan_lain()
    {
        $('#btnSaveKeterangan').text('saving...');
        $('#btnSaveKeterangan').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_update_keterangan_lain') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_keterangan_lain').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_edit_keterangan_lain').modal('hide');
                    $("#keterangan_lain").load(" #keterangan_lain");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSaveKeterangan').text('save');
                $('#btnSaveKeterangan').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding/update data');
                $('#btnSaveKeterangan').text('save');
                $('#btnSaveKeterangan').attr('disabled', false);
            }
        });
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
                $('[name="nama_lengkap"]').val(data.nama_lengkap);
                $('[name="no_tlp"]').val(data.no_tlp);
                $('[name="no_hp"]').val(data.no_hp);
                $('[name="email"]').val(data.email);
                $('[name="no_ktp"]').val(data.no_ktp);
                $('[name="no_sim"]').val(data.no_sim);
                //$('[name="ktp_expired_date"]').val(data.ktp_expired_date);
                //$('[name="sim_expired_date"]').val(data.sim_expired_date);
                $('[name="alamat"]').val(data.alamat);
                $('[name="no_sim"]').val(data.no_sim);
                $('[name="agama"]').val(data.agama);
                $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
                $('[name="pendidikan_level"]').val(data.pendidikan_level);
                $('[name="suku"]').val(data.suku);
                $('[name="gol_darah"]').val(data.gol_darah);
                $('[name="tinggi_badan"]').val(data.tinggi_badan);
                $('[name="berat_badan"]').val(data.berat_badan);
                $('[name="tempat_tinggal"]').val(data.tempat_tinggal);
                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                $('[name="hobby"]').val(data.hobby);
                $('[name="pengalaman_memimpin"]').val(data.pengalaman_memimpin);
                $('[name="pengalaman_memimpin"]').val(data.pengalaman_memimpin);
                $('[name="gender"]').val(data.gender);
                $('#modal_form_data_pribadi').modal('show');
                $('.modal-title').text('Edit Data Pribadi');
                $(".docs-date").datepicker();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function edit_darurat_call(id_kandidat)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/view_all_kandidat/ajax_edit_darurat/') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="nama_lengkap_d"]').val(data.nama_lengkap_d);
                $('[name="no_telp_rumah_d"]').val(data.no_telp_rumah_d);
                $('[name="no_hp_d"]').val(data.no_hp_d);
                $('[name="hubungan_d"]').val(data.hubungan_d);
                $('[name="alamat_d"]').val(data.alamat_d);
                $('#modal_edit_darurat_call').modal('show');
                $('.modal-title').text('Edit Kontak Darurat');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function edit_keterangan_lain(id_kandidat)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/view_all_kandidat/ajax_edit_keterangan_lain/') ?>" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $("input:radio[name=penyakit]:selected").val(data.penyakit);
                $("input:radio[name=pidana]:selected").val(data.pidana);
                $("input:radio[name=orang_dalam]:selected").val(data.orang_dalam);

                $('[name="ket_penyakit"]').val(data.ket_penyakit);
                $('[name="ket_kriminal"]').val(data.ket_kriminal);
                $('[name="ket_orangdalam"]').val(data.ket_orangdalam);

                $('[name="gaji_diharapkan"]').val(data.gaji_diharapkan);
                $('[name="mulai_kerja"]').val(data.mulai_kerja);
                $('[name="kelemahan"]').val(data.kelemahan);
                $('[name="kelebihan"]').val(data.kelebihan);
                $('#modal_edit_keterangan_lain').modal('show');
                $('.modal-title').text('Edit Keterangan Lain');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }


    function save_posisi_penempatan()
    {
        $('#btnSavePosPen').text('saving...');
        $('#btnSavePosPen').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_update_posisi_penempatan') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_posisi_penempatan').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $('#modal_edit_posisi_penempatan').modal('hide');
                    $("#posisipenempatan").load(" #posisipenempatan");
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavePosPen').text('save');
                $('#btnSavePosPen').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding/update data');
                $('#btnSavePosPen').text('save');
                $('#btnSavePosPen').attr('disabled', false);
            }
        });
    }
    function edit_posisi_penempatan(id_kandidat)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('kandidat/view_all_kandidat/ajax_edit_posisi_penempatan/') ?>/" + id_kandidat,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="posisi"]').val(data.posisi);
                $('[name="provinsi_id"]').val(data.provinsi_id);
                $('[name="kota_id"]').val(data.kota_id);
                $('#modal_edit_posisi_penempatan').modal('show');
                $('.modal-title').text('Edit Posisi Penempatan');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function delete_kursus(id_kursus)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_kursus') ?>/" + id_kursus,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#kursus").load(" #kursus");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_organisasi(id_organisasi)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_organisasi') ?>/" + id_organisasi,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#organisasi").load(" #organisasi");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_referensi(id_referensi)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_referensi') ?>/" + id_referensi,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#referensi").load(" #referensi");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_keluarga(id_keluarga)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_keluarga') ?>/" + id_keluarga,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#keluarga").load(" #keluarga");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_pendidikan(id_pendidikan_formal)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_pendidikan') ?>/" + id_pendidikan_formal,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#pendidikan").load(" #pendidikan");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_pengalaman(id_pengalaman_kerja)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_pengalaman') ?>/" + id_pengalaman_kerja,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#pengalaman").load(" #pengalaman");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_komputer(id_kemampuan_komputer)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_kemkomputer') ?>/" + id_kemampuan_komputer,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#komputer").load(" #komputer");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
    function delete_bahasa(id_kemampuan_bahasa)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/delete_view_kembahasa') ?>/" + id_kemampuan_bahasa,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#bahasa").load(" #bahasa");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

    function update_pas_foto()
    {
        $('#btnSavePassfoto').text('saving...');
        $('#btnSavePassfoto').attr('disabled', true);
        var url;
        url = "<?php echo site_url('kandidat/view_all_kandidat/ajax_update_pass_foto') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#pass').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    $("#pass_foto").load(" #pass_foto");
                } 
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSavePassfoto').text('save');
                $('#btnSavePassfoto').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding/update data');
                $('#btnSavePassfoto').text('save');
                $('#btnSavePassfoto').attr('disabled', false);
            }
        });
    }
    
    function delete_pas_foto()
    {
        if (confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/ajax_delete_pass_foto/'.$this->uri->segment(2).'') ?>",
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#pass_foto").load(" #pass_foto");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
    function delete_cv()
    {
        if (confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url: "<?php echo site_url('kandidat/view_all_kandidat/ajax_delete_cv/'.$this->uri->segment(2).'') ?>",
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    $("#cv").load(" #cv");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (e) {
                $('#upload').on('click', function () {
                    var file_data = $('#pas_foto_file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('pas_foto_file', file_data);
                    $.ajax({
                        url: '<?php echo base_url()?>/kandidat/view_all_kandidat/upload_file/<?php echo $this->uri->segment(2) ?>', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            //$('#msg').html(response); 
                            $("#pass_foto").load(" #pass_foto");
                        },
                        error: function (response) {
                            $('#msg').html(response);
                        }
                    });
                });
            });
            $(document).ready(function (e) {
                $('#upload_cv').on('click', function () {
                    var file_data = $('#cv_file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('cv_file', file_data);
                    $.ajax({
                        url: '<?php echo base_url()?>/kandidat/view_all_kandidat/upload_file_cv/<?php echo $this->uri->segment(2) ?>', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            //$('#msg').html(response); 
                            $("#cv").load(" #cv");
                        },
                        error: function (response) {
                            $('#msg').html(response);
                        }
                    });
                });
            });
        </script>
<div class="box-footer">
    <a download href="<?php echo base_url() ?>report/report_kandidat/create_pdf_as_cv_by_id/<?php echo $kandidat[0]['id_kandidat'] ?>">Print <img width="20" src="<?php echo base_url() ?>/assets/images/pdf.png"></a>
</div><br>
<section class="col-lg-6 connectedSortable">
    <div id="datapribadi">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">DATA PRIBADI</h3>
                <div class="box-tools pull-right">
                    <?php echo '<a href="javascript:void(0)" class="btn btn-box-tool" title="Edit" onclick="edit_person(' . "'" . $kandidat[0]['id_kandidat'] . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>'; ?>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <strong> Nama Lengkap</strong> : <?php echo $kandidat[0]['nama_lengkap'] ?><br>
                <strong> No Telepon </strong>  : <?php echo $kandidat[0]['no_tlp'] ?><br>
                <strong> No HP  </strong>      : <?php echo $kandidat[0]['no_hp'] ?><br>
                <strong> Email </strong>       : <?php echo $kandidat[0]['email'] ?><br>
                <strong> KTP  </strong>        : <?php echo $kandidat[0]['no_ktp'] ?> <span class="label label-success">Aktif sampai : <?php echo indonesian_date($kandidat[0]['ktp_expired_date']) ?> </span><br>
                <strong> SIM  </strong>        : <?php echo $kandidat[0]['no_sim'] ?> <span class="label label-success">Aktif sampai : <?php echo indonesian_date($kandidat[0]['sim_expired_date']) ?> </span><br>
                <strong> Alamat Lengkap </strong>    : <?php echo $kandidat[0]['alamat'] ?><br>
                <strong> Agama </strong>      : <?php echo $kandidat[0]['agama'] ?><br>
                <strong> Hobby </strong>  : <?php echo $kandidat[0]['hobby'] ?><br>
                <strong> Pengalaman Memimpin  </strong>      : <?php echo $kandidat[0]['pengalaman_memimpin'] ?><br>
                <strong> Kewarganegaraan  </strong>     : <?php echo $kandidat[0]['kewarganegaraan'] ?><br>
                <strong> Pendidikan  </strong>     : <?php echo $kandidat[0]['pendidikan_level'] ?><br>
                <strong> Suku     </strong>  : <?php echo $kandidat[0]['suku'] ?><br>
                <strong> Golongan Darah </strong>      : <?php echo $kandidat[0]['gol_darah'] ?><br>
                <strong> Tinggi/Berat   </strong>    : <?php echo $kandidat[0]['tinggi_badan'] ?> Cm/<?php echo $kandidat[0]['berat_badan'] ?> Kg<br>
                <strong> Tempat Tinggal  </strong>     : <?php echo $kandidat[0]['tempat_tinggal'] ?><br>
                <strong> Tempat Lahir   </strong>    : <?php echo $kandidat[0]['tempat_lahir'] ?><br>
                <strong> Tanggal Lahir  </strong>     :  <span class="label label-success"><?php echo indonesian_date($kandidat[0]['tgl_lahir']) ?></span><br>
                <strong> Jenis Kelamin  </strong>     : <?php echo $kandidat[0]['gender'] ?><br>
            </div>
        </div></div>

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Attachment</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body" >

            <div id="pass_foto">
                <?php if ($kandidat[0]['pas_foto_file'] != "") { ?>
                <strong>PAS FOTO</strong> :  <img src="<?php echo base_url() ?>upload/kadidat/pas_foto/<?php echo $kandidat[0]['pas_foto_file'] ?>" alt="<?php echo strip_tags($kandidat[0]['nama_lengkap']) ?>" height="100" width="100">
                <a target="_blank" download="<?php echo base_url() ?>upload/kadidat/pas_foto/<?php echo $kandidat[0]['pas_foto_file'] ?>" href="<?php echo base_url() ?>upload/kadidat/pas_foto/<?php echo $kandidat[0]['pas_foto_file'] ?>">Lihat/Download FOTO</a>
               <a href="javascript:void(0)"  onclick="delete_pas_foto('<?php echo $kandidat[0]['id_kandidat'] ?>')"> <i class="fa fa-times"></i></a><br> <?php } else { ?>
                <label>Pas Foto : (.jpg/.png/.jpeg) 
               <input type="file" required="" id="pas_foto_file" name="pas_foto_file" />
               
               
                </label> <button id="upload">Upload</button>
                <?php } ?>
            </div>
            <hr>
            <div id="cv">                
                <?php if ($kandidat[0]['cv_file'] != "") { ?>
                <strong>CV</strong> :  <a target="_blank" download="<?php echo base_url() ?>upload/kadidat/cv/<?php echo $kandidat[0]['cv_file'] ?>" href="<?php echo base_url() ?>upload/kadidat/cv/<?php echo $kandidat[0]['cv_file'] ?>">Lihat/Download CV</a> 
               
                <a href="javascript:void(0)"  onclick="delete_cv('<?php echo $kandidat[0]['id_kandidat'] ?>')"> <i class="fa fa-times"></i></a><br>
               
                <br><br><?php } else { ?>
                <label>CV File : (.jpg/.png/.jpeg) 
                    <input type="file" id="cv_file" name="cv_file"></label>
                <button id="upload_cv">Upload</button>
                <?php } ?>
            </div>
                    <br><hr>
                    
             
        
  
        <form  action="<?php echo base_url(); ?>view/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>" method="post" enctype="multipart/form-data">
        <?php if ($kandidat[0]['ktp_scan_file'] != "") { ?><strong>KTP SCAN</strong> :  <img src="<?php echo base_url() ?>upload/kadidat/ktp/<?php echo $kandidat[0]['ktp_scan_file'] ?>" alt="<?php echo strip_tags($kandidat[0]['nama_lengkap']) ?>" height="100" width="100"><a target="_blank" download="<?php echo base_url() ?>upload/kadidat/ktp/<?php echo $kandidat[0]['ktp_scan_file'] ?>" href="<?php echo base_url() ?>upload/kadidat/ktp/<?php echo $kandidat[0]['ktp_scan_file'] ?>">Lihat/Download KTP</a>
                    <a href="<?php echo base_url() ?>delete-ktp/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>"> <button type="button" class="btn btn-box-tool" ><i class="fa fa-times"></i></button><br><br>
                    </a><?php } else { ?>
                    <label>Ktp Scan : (.jpg/.png/.jpeg) <input hidden name="nama_lengkap" value="<?php echo slug($kandidat[0]['nama_lengkap']) ?>"><input type="file" name="ktp_scan_file"></label><input value="submit" name="submit" type="submit"><?php } ?>
            </form>
            <!--<hr>-->
<!--            <form  action="<?php echo base_url(); ?>view/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>" method="post" enctype="multipart/form-data">
<?php if ($kandidat[0]['cv_file'] != "") { ?><strong>CV</strong>       :  <a target="_blank" download="<?php echo base_url() ?>upload/kadidat/cv/<?php echo $kandidat[0]['cv_file'] ?>" href="<?php echo base_url() ?>upload/kadidat/cv/<?php echo $kandidat[0]['cv_file'] ?>">Lihat/Download CV</a> <a href="<?php echo base_url() ?>delete-cv/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>"> <button type="button" class="btn btn-box-tool" ><i class="fa fa-times"></i></button>
                    </a><br><br><?php } else { ?>
                    <label>CV File : (.jpg/.png/.jpeg) <input hidden name="nama_lengkap" value="<?php echo slug($kandidat[0]['nama_lengkap']) ?>"><input type="file" name="cv_file"></label><input value="submit" name="submit" type="submit"><?php } ?>
            </form>-->

            <hr>
            <form  action="<?php echo base_url(); ?>view/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>" method="post" enctype="multipart/form-data">
<?php if ($kandidat[0]['ijazah_file'] != "") { ?><strong>Ijazah</strong>       :  <a target="_blank" download="<?php echo base_url() ?>upload/kadidat/ijazah/<?php echo $kandidat[0]['ijazah_file'] ?>" href="<?php echo base_url() ?>upload/kadidat/ijazah/<?php echo $kandidat[0]['ijazah_file'] ?>">Lihat/Download Ijazah</a><a href="<?php echo base_url() ?>delete-ijazah/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>"> <button type="button" class="btn btn-box-tool" ><i class="fa fa-times"></i></button>
                    </a><br><br><?php } else { ?>
                    <label>Ijazah: (.jpg/.png/.jpeg) <input hidden name="nama_lengkap" value="<?php echo slug($kandidat[0]['nama_lengkap']) ?>"><input type="file" name="ijazah_file"></label><input value="submit" name="submit" type="submit"><?php } ?>
            </form>

            <hr>
            <form  action="<?php echo base_url(); ?>view/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>" method="post" enctype="multipart/form-data">
<?php if ($kandidat[0]['lamaran_file'] != "") { ?><strong>Lamaran</strong>:<a target="_blank" download="<?php echo base_url() ?>upload/kadidat/lamaran/<?php echo $kandidat[0]['lamaran_file'] ?>" href="<?php echo base_url() ?>upload/kadidat/lamaran/<?php echo $kandidat[0]['lamaran_file'] ?>">Lihat/Download Lamaran</a>
                    <a href="<?php echo base_url() ?>delete-lamaran/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>"> <button type="button" class="btn btn-box-tool" ><i class="fa fa-times"></i></button>
                    </a><br><br><?php } else { ?>
                    <label>Lamaran : (.jpg/.png/.jpeg) <input hidden name="nama_lengkap" value="<?php echo slug($kandidat[0]['nama_lengkap']) ?>"><input type="file" name="lamaran_file"></label><input value="submit" name="submit" type="submit"><?php } ?>
            </form>
        </div>
    </div>

    <div id="pengalaman">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">PENGALAMAN KERJA</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_pengalaman()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <?php
            $total_org = count($pengalaman);
            for ($a = 0; $a < $total_org; $a++) {
                if ($pengalaman[$a]['nama_perusahaan'] != "") {
                    if ($pengalaman[$a]['tahun_keluar'] == "Sekarang") {
                        $sampai = $pengalaman[$a]['tahun_keluar'];
                    } 
                    else {
                        $sampai = indonesian_date($pengalaman[$a]['tahun_keluar']);
                    }
                    ?>
                    <div id="parent" > <div id="wide" class="box-body">
                            <strong>Nama Perusahaan</strong> : <?php echo $pengalaman[$a]['nama_perusahaan'] ?><br>
                            <strong>Alamat Perusahaan</strong> : <?php echo $pengalaman[$a]['alamat_perusahaan'] ?><br>
                            <strong>Jabatan terakhir</strong> : <?php echo $pengalaman[$a]['jabatan_terkahir'] ?><br>
                            <strong>Gaji Terakhir</strong> : <?php echo $pengalaman[$a]['gaji'] ?><br>
                            <strong>Tahun Masuk</strong> : <?php echo indonesian_date($pengalaman[$a]['tahun_masuk']) ?><br>
                            <strong>Sampai Tahun</strong> : <?php echo $sampai ?><br>
                            <strong>Tugas Dan Tanggung Jawab</strong> : <?php echo $pengalaman[$a]['tugas_tanggung_jawab'] ?><br>
                            <strong>Alasan Keluar</strong> : <?php echo $pengalaman[$a]['alasan_keluar'] ?><br>
                        </div>
                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_pengalaman('<?php echo $pengalaman[$a]['id_pengalaman_kerja'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>
                    </div> <hr>
                    <?php
                }
            }
            ?>
        </div></div>
    <div id="pendidikan">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">PENDIDIKAN</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_pendidikan()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_org = count($pendidikan);
            for ($a = 0; $a < $total_org; $a++) {
                if ($pendidikan[$a]['nama_sekolah'] != "") {
                    ?>
                    <div id="parent" >   <div id="wide" class="box-body">
                            <strong>Tingkak Sekolah</strong> : <?php echo $pendidikan[$a]['tingkat_sekolah'] ?><br>
                            <strong>Nama Sekolah</strong> : <?php echo $pendidikan[$a]['nama_sekolah'] ?><br>
                            <strong>Tempat Sekolah</strong> : <?php echo $pendidikan[$a]['tempat_sekolah'] ?><br>
                            <strong>Tanggal Masuk</strong> : <?php echo indonesian_date($pendidikan[$a]['tanggal_masuk']) ?><br>
                            <strong>Tanggal Lulus</strong> : <?php echo indonesian_date($pendidikan[$a]['tanggal_lulus']) ?><br>
                        </div>
                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_pendidikan('<?php echo $pendidikan[$a]['id_pendidikan_formal'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>

                    </div> <hr><?php
                }
            }
            ?><br></div></div>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Interview History</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <?php
        $to = count($jadwal);
        for ($a = 0; $a < $to; $a++) {
            ?>
            <?php
            if ($jadwal[$a]['status_kandidat'] == 1) {
                $span = '<span>Baru</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 2) {
                $span = '<span >Caller</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 3) {
                $span = '<span >Interview 1</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 4) {
                $span = '<span >Interview 2</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 5) {
                $span = '<span >Psikotes</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 6) {
                $span = '<span >Reject</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 7) {
                $span = '<span>Blacklist</span>';
            } else if ($jadwal[$a]['status_kandidat'] == 8) {
                $span = '<span>Block</span>';
            } else {
                $span = '<span class="label label-warning"></span>';
            }
            ?>
            <div id="parent" >
                <div id="wide" class="box-body">
                    Tanggal Interview : <?php echo indonesian_dates($jadwal[$a]['tanggal_interview']) ?><br>
                    Tempat : <?php echo $jadwal[$a]['tempat_interview'] ?> <br>
                    Keterangan : <?php echo $jadwal[$a]['keterangan'] ?> <br>
                    Nama Interviewer : <?php echo $jadwal[$a]['interviewer'] ?><br>
                </div></div> <hr>
        <?php }
        ?>

    </div>
</section>
<section class="col-lg-6 connectedSortable">
    <div id="darurat">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">KONTAK DARURAT ?</h3>
                <div class="box-tools pull-right">
<?php echo '<a href="javascript:void(0)" class="btn btn-box-tool" title="Edit" onclick="edit_darurat_call(' . "'" . $kandidat[0]['id_kandidat'] . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>'; ?>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <strong>Nama Lengkap</strong> : <?php echo $darurat[0]['nama_lengkap_d'] ?><br>
                <strong>No Telepon</strong> : <?php echo $darurat[0]['no_telp_rumah_d'] ?><br>
                <strong>No hp</strong> : <?php echo $darurat[0]['no_hp_d'] ?><br>
                <strong>Hubungan</strong> : <?php echo $darurat[0]['hubungan_d'] ?><br>
                <strong>Alamat</strong> : <?php echo $darurat[0]['alamat_d'] ?><br>
            </div>
        </div></div>

    <div  id="keterangan_lain" class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">KETERANGAN LAIN</h3>
            <div class="box-tools pull-right">
<?php echo '<a href="javascript:void(0)" class="btn btn-box-tool" title="Edit" onclick="edit_keterangan_lain(' . "'" . $kandidat[0]['id_kandidat'] . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>'; ?>

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <strong>Pernah Mengidap Penyakit</strong> : <?php echo $ketla[0]['penyakit'] ?>
            <?php if ($ketla[0]['ket_penyakit'] != "" && $ketla[0]['penyakit'] == "Ya") { ?>
                <br><strong></strong> <?php echo $ketla[0]['ket_penyakit'] ?>
            <?php } ?><br>
            <strong>Pernah Dipidana</strong> : <?php echo $ketla[0]['pidana'] ?>
            <?php if ($ketla[0]['ket_kriminal'] != "" && $ketla[0]['pidana'] == "Ya") { ?>
                <br><strong></strong><?php echo $ketla[0]['ket_kriminal'] ?>
<?php } ?><br>
            <strong>Gaji Yang Diharapkan</strong> : <?php echo $ketla[0]['gaji_diharapkan'] ?><br>
            <strong>Mulai Kerja</strong> : <?php echo $ketla[0]['mulai_kerja'] ?><br>
            <strong>Apakah ada keluarga/ Saudara Anda yang bekerja di PT. Valdo ?</strong> : <?php echo $ketla[0]['orang_dalam'] ?>
            <?php if ($ketla[0]['ket_orangdalam'] != "" && $ketla[0]['orang_dalam'] == "Ya") { ?>
                <br><strong></strong> <?php echo $ketla[0]['ket_orangdalam'] ?><br>
<?php } ?>
            <strong>Kelemahan</strong> : <?php echo $ketla[0]['kelemahan'] ?><br>
            <strong>Kelebihan</strong> : <?php echo $ketla[0]['kelebihan'] ?><br>
        </div>
    </div>
    <div id="organisasi">
        <div  class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">PENGALAMAN ORGANISASI</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_organisasi()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_org = count($organisasi);
            for ($a = 0; $a < $total_org; $a++) {
                if ($organisasi[$a]['nama_organisasi'] != "") {
                    ?>
                    <div id="parent" > <div id="wide" class="box-body">
                            <strong>Nama Organisasi</strong> : <?php echo $organisasi[$a]['nama_organisasi'] ?><br>
                            <strong>Jenis Organisasi</strong> : <?php echo $organisasi[$a]['jenis_organisasi'] ?><br>
                            <strong>Tahun Organisasi</strong> : <?php echo indonesian_date($organisasi[$a]['tahun']) ?><br>
                            <strong>Jabatan</strong> : <?php echo $organisasi[$a]['jabatan'] ?><br>
                        </div>
                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_organisasi('<?php echo $organisasi[$a]['id_organisasi'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>
                    </div> <hr><?php
                }
            }
            ?>
        </div></div>
    <div id="referensi">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">REFERENSI</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_referensi()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_org = count($referensi);
            for ($a = 0; $a < $total_org; $a++) {
                if ($referensi[$a]['nama_lengkap_ref'] != "") {
                    ?>
                    <div id="parent" >   <div id="wide" class="box-body">
                            <strong>Nama Referensi</strong> : <?php echo $referensi[$a]['nama_lengkap_ref'] ?><br>
                            <strong>Perusahaan </strong> : <?php echo $referensi[$a]['perusahaan_ref'] ?><br>
                            <strong>Hubungan</strong> : <?php echo $referensi[$a]['hubungan_ref'] ?><br>
                            <strong>Telepon Referensi</strong> : <?php echo $referensi[$a]['telp_ref'] ?><br>
                            <strong>Alamat Referensi</strong> : <?php echo $referensi[$a]['alamat_ref'] ?><br>
                            <strong>Informasi Dari</strong> : <?php echo $referensi[$a]['informasi_dari'] ?><br>
                        </div>
                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_referensi('<?php echo $referensi[$a]['id_referensi'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>
                    </div> <hr>
                    <?php
                }
            }
            ?>
        </div></div>
    <div id="keluarga">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">KELUARGA</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_keluarga()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_org = count($keluarga);
            for ($a = 0; $a < $total_org; $a++) {
                if ($keluarga[$a]['nama_k'] != "") {
                    ?>
                    <div id="parent" >   <div id="wide" class="box-body">
                            <strong>Posisi</strong> : <?php echo $keluarga[$a]['jenis_keluarga'] ?><br>
                            <strong>Nama</strong> : <?php echo $keluarga[$a]['nama_k'] ?><br>
                            <strong>Gender</strong> : <?php echo $keluarga[$a]['gender_k'] ?><br>
                            <strong>Usia</strong> : <?php echo $keluarga[$a]['usia_k'] ?><br>
                            <strong>Pendidikan</strong> : <?php echo $keluarga[$a]['pendidikan_k'] ?><br>
                            <strong>Pekerjaan</strong> : <?php echo $keluarga[$a]['pekerjaan_k'] ?><br>
                        </div>
                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_keluarga('<?php echo $keluarga[$a]['id_keluarga'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>
                    </div> <hr>
                    <?php
                }
            }
            ?>
        </div></div>
    <div id="komputer">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">KEMAMPUAN KOMPUTER</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_kemampuan_komputer()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_org = count($kemampuan_k);
            for ($a = 0; $a < $total_org; $a++) {
                if ($kemampuan_k[$a]['jenis_program'] != "") {
                    ?>
                    <div id="parent" >   <div id="wide" class="box-body">
                            <strong>Jenis Program</strong> : <?php echo $kemampuan_k[$a]['jenis_program'] ?><br>
                            <strong>Level Skill</strong> : <?php echo $kemampuan_k[$a]['level_skill'] ?><br>
                        </div>
                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_komputer('<?php echo $kemampuan_k[$a]['id_kemampuan_komputer'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>
                    </div> <hr>
                    <?php
                }
            }
            ?>
        </div></div>
    <div id="bahasa">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">KEMAMPUAN BAHASA</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_kemampuan_bahasa()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_org = count($kemampuan_b);
            for ($a = 0; $a < $total_org; $a++) {
                if ($kemampuan_b[$a]['bahasa'] != "") {
                    ?>
                    <div id="parent" >   
                        <div id="wide" class="box-body">
                            <strong>Bahasa</strong> : <?php echo $kemampuan_b[$a]['bahasa'] ?><br>
                            <strong>Membaca</strong> : <?php echo $kemampuan_b[$a]['membaca'] ?><br>
                            <strong>Menulis</strong> : <?php echo $kemampuan_b[$a]['menulis'] ?><br>
                            <strong>Berbicara</strong> : <?php echo $kemampuan_b[$a]['berbicara'] ?><br>
                        </div>        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_bahasa('<?php echo $kemampuan_b[$a]['id_kemampuan_bahasa'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>

                    </div>
                    <hr>
                    <?php
                }
            }
            ?></div></div>

    <div id="kursus">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">KURSUS</h3>
                <div class="box-tools pull-right">
                    <button type="button" onclick="add_kursus()" class="btn btn-box-tool"><i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php
            $total_kur = count($kursus);
            for ($a = 0; $a < $total_kur; $a++) {
                if ($kursus[$a]['jenis_kursus'] != "") {
                    ?>
                    <div id="parent" >   <div id="wide" class="box-body">
                            <strong>Jenis Kursus</strong> : <?php echo $kursus[$a]['jenis_kursus'] ?><br>
                            <strong>Tahun Kursus</strong> : <?php echo indonesian_date($kursus[$a]['tahun_kursus']) ?><br>
                            <strong>Lama Kursus</strong> : <?php echo $kursus[$a]['lama_kursus'] ?><br>
                            <strong>Penyelenggara</strong> : <?php echo $kursus[$a]['penyelenggara'] ?><br>
                        </div>

                        <div id="narrow" style="margin-top: 20px; "> <a href="javascript:void(0)"  onclick="delete_kursus('<?php echo $kursus[$a]['id_kursus'] ?>')"> <i class="glyphicon glyphicon-trash"></i></a></div>
                    </div> <hr>
                    <?php
                }
            }
            ?></div>
    </div>

    <div id="posisipenempatan">
        <div id="posisipenempatan" class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">POSISI DAN PENEMPATAN</h3>
                <div class="box-tools pull-right">
<?php echo '<a href="javascript:void(0)" class="btn btn-box-tool" title="Edit" onclick="edit_posisi_penempatan(' . "'" . $kandidat[0]['id_kandidat'] . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>'; ?>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php $to = count($pos_penempatan);
            for ($a = 0; $a < $to; $a++) {
                ?>
                <div id="parent" >
                    <div id="wide" class="box-body">
                        <strong>Posisi Penempatan</strong> : <?php echo $pos_penempatan[$a]['posisi'] ?> <br>
                        <strong>Cabang</strong> : <?php echo $pos_penempatan[$a]['nama_cabang'] ?><br>
                        <strong>Area</strong> : <?php echo $pos_penempatan[$a]['nama_area'] ?><br>
                    </div>
                </div> <hr>
<?php } ?>
        </div></div>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Hasil PSIKOTES</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
<?php $to = count($psikotes);
for ($a = 0; $a < $to; $a++) {
    ?>
            <div id="parent" >
                <div id="wide" class="box-body">
                    <strong>Jenis Psikotes</strong> : IST<br>
                    <strong>Jawaban Benar</strong> : <?php echo $psikotes[$a]['jawaban_benar'] ?><br>
                    <strong>Jawaban Salah</strong> : <?php echo $psikotes[$a]['jawaban_salah'] ?><br>
                    <strong>Nilai</strong> : <?php echo $psikotes[$a]['nilai'] ?><br>
                    <strong>Waktu Pengerjaan</strong> : <?php echo indonesian_dates($psikotes[$a]['datetime']) ?><br>
                </div></div> <hr>
<?php } ?></div>
</section>
