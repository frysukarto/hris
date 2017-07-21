<?php ob_start(); ?>
<?php $allowtag = "<b><i><br><em><strong><ol><p><ul><div><li><iframe><img><td><thead><tbody><th><tr><table><a>";
$address[0] = strip_tags($kandidat[0]['alamat'], $allowtag);?>
<?php echo $html['css']; ?>
<div align="center" style="font-size: 25;"><u><strong>Curriculum Vitae</strong></u><br></div>
<div align="center"><img align="center" src="<?php echo base_url() ?>upload/kadidat/pas_foto/<?php echo $kandidat[0]['pas_foto_file'] ?>" alt="<?php echo strip_tags($list[0]['nama_lengkap']) ?>" height="100" width="100"></div><br>
<div class="box box-info" style="background-color: #999966;">
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
        <strong> KTP  </strong>        : <?php echo $kandidat[0]['no_ktp'] ?> <span class="label label-success">Aktif sampai :<?php echo indonesian_date($kandidat[0]['ktp_expired_date']) ?> </span><br>
        <strong> SIM  </strong>        : <?php echo $kandidat[0]['no_sim'] ?> <span class="label label-success">Aktif sampai :<?php echo indonesian_date($kandidat[0]['sim_expired_date']) ?> </span><br>
        <strong> Alamat Lengkap </strong>    : <?php echo $kandidat[0]['alamat'] ?><br>
        <strong> Agama </strong>      : <?php echo $kandidat[0]['agama'] ?><br>
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
</div>

<div class="box box-success" style="background-color: #996633;">
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
            ?>
             <div id="parent" >   <div id="wide" class="box-body">
                <strong>Nama Perusahaan</strong> : <?php echo $pengalaman[$a]['nama_perusahaan'] ?><br>
                <strong>Alamat Perusahaan</strong> : <?php echo $pengalaman[$a]['alamat_perusahaan'] ?><br>
                <strong>Jabatan terakhir</strong> : <?php echo $pengalaman[$a]['jabatan_terkahir'] ?><br>
                <strong>Gaji Terakhir</strong> : <?php echo $pengalaman[$a]['gaji'] ?><br>
                <strong>Tahun Masuk</strong> : <?php echo indonesian_date($pengalaman[$a]['tahun_masuk']) ?><br>
                <strong>Tahun Keluar</strong> : <?php echo indonesian_date($pengalaman[$a]['tahun_keluar']) ?><br>
                <strong>Tugas Dan Tanggung Jawab</strong> : <?php echo $pengalaman[$a]['tugas_tanggung_jawab'] ?><br>
                <strong>Alasan Keluar</strong> : <?php echo $pengalaman[$a]['alasan_keluar'] ?><br>
            </div>
                <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-pengalaman/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $pengalaman[$a]['id_pengalaman_kerja'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
      </div>
                <?php } } ?>
</div>
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
           <div id="parent" > <div id="wide" class="box-body">
                <strong>Nama Sekolah</strong> : <?php echo $pendidikan[$a]['nama_sekolah'] ?><br>
                <strong>Tempat Sekolah</strong> : <?php echo $pendidikan[$a]['tempat_sekolah'] ?><br>
                <strong>Tanggal Masuk</strong> : <?php echo indonesian_date($pendidikan[$a]['tanggal_masuk']) ?><br>
                <strong>Tanggal Lulus</strong> : <?php echo indonesian_date($pendidikan[$a]['tanggal_lulus']) ?><br>
            </div>
                <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-pendidikan/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $pendidikan[$a]['id_pendidikan_formal'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
      </div> <?php
        }
    }
    ?>
</div>

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
    </div>
    <div class="box box-warning">
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
            <strong>Pernah Mengidap Penyakit</strong> : <?php echo $ketla[0]['penyakit'] ?><br>
            <strong>Pernah Dipidana</strong> : <?php echo $ketla[0]['pidana'] ?><br>
            <strong>Gaji Yang Diharapkan</strong> : <?php echo $ketla[0]['gaji_diharapkan'] ?><br>
            <strong>Mulai Kerja</strong> : <?php echo $ketla[0]['mulai_kerja'] ?><br>
            <strong>Apakah ada keluarga/ Saudara Anda yang bekerja di PT. Valdo ?</strong> : <?php echo $ketla[0]['orang_dalam'] ?><br>
            <strong>Kelemahan</strong> : <?php echo $ketla[0]['kelemahan'] ?><br>
            <strong>Kelebihan</strong> : <?php echo $ketla[0]['kelebihan'] ?><br>
        </div>
    </div>
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
        <?php $total_org = count($organisasi); for ($a = 0; $a < $total_org; $a++) { if ($organisasi[$a]['nama_organisasi'] != "") {?>
        <div id="parent" > <div id="wide" class="box-body">
                    <strong>Nama Organisasi</strong> : <?php echo $organisasi[$a]['nama_organisasi'] ?><br>
                    <strong>Jenis Organisasi</strong> : <?php echo $organisasi[$a]['jenis_organisasi'] ?><br>
                    <strong>Tahun Organisasi</strong> : <?php echo indonesian_date($organisasi[$a]['tahun']) ?><br>
                    <strong>Jabatan</strong> : <?php echo $organisasi[$a]['jabatan'] ?><br>
                </div>
            <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-organisasi/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $organisasi[$a]['id_organisasi'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
          </div> <?php 
            }
        }
        ?>
    </div>
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
                     <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-referensi/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $referensi[$a]['id_referensi'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
          </div> 
                    <?php
            }
        }
        ?>
    </div>
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
                     <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-keluarga/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $keluarga[$a]['id_keluarga'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
          </div>
                    <?php
            }
        }
        ?>
    </div>
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
                      <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-kemkomputer/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $kemampuan_k[$a]['id_kemampuan_komputer'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
          </div> 
                    <?php
            }
        }
        ?>
    </div>
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
                <div id="parent" >   <div id="wide" class="box-body">
                    <strong>Bahasa</strong> : <?php echo $kemampuan_b[$a]['bahasa'] ?><br>
                    <strong>Membaca</strong> : <?php echo $kemampuan_b[$a]['membaca'] ?><br>
                    <strong>Menulis</strong> : <?php echo $kemampuan_b[$a]['menulis'] ?><br>
                    <strong>Berbicara</strong> : <?php echo $kemampuan_b[$a]['berbicara'] ?><br>
                </div>
                      <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-kembahasa/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $kemampuan_b[$a]['id_kemampuan_bahasa'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
          </div> 
                    <?php
            }
        }
        ?>
    </div>
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
                    
                     <div id="narrow" style="margin-top: 20px; "> <a href="<?php echo base_url() ?>delete-kursus/<?php echo $kandidat[0]['id_kandidat'] ?>/<?php echo slug($kandidat[0]['nama_lengkap']) ?>/<?php echo $kursus[$a]['id_kursus'] ?>"> <i class="glyphicon glyphicon-trash"></i></a></div>
          </div> 
                    <?php
            }
        }
        ?>
    </div>
