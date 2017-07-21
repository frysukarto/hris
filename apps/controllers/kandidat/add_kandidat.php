<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_kandidat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'weburi', 'header', 'file', 'contentdate', 'stringurl', 'textlimiter', 'security', 'dropdown'));
        $this->load->library(array('form_validation', 'image_lib'));
        $this->load->model('modul/m_modul_posisi_setting', 'm_modul_posisi_setting');
        $this->load->model(array('mlog', 'mkandidat','mhome'));
        $this->is_logged_in();
    }

    function index() {

        $a = array();
        $a['html']['css'] = add_css('/bootstrap/css/bootstrap.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/bootstrap-datepicker3.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
        $a['html']['css'] .= add_css('/plugins/iCheck/all.css');
        $a['html']['css'] .= add_css('/plugins/select2/select2.min.css');
        $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
        $a['html']['css'] .= add_css('/dist/css/AdminLTE.min.css');
        $a['html']['css'] .= add_css('/plugins/iCheck/flat/blue.css');
        $a['html']['css'] .= add_css('/plugins/morris/morris.css');
        $a['html']['css'] .= add_css('/plugins/jvectormap/jquery-jvectormap-1.2.2.css');
        //$a['html']['css'] .= add_css('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');

        $a['html']['js'] = add_js('/bootstrap/js/jquery-2.1.4.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/jquery-ui.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/raphael-min.js');
        //$a['html']['js'] .= add_js('/plugins/morris/morris.min.js');
        $a['html']['js'] .= add_js('/plugins/sparkline/jquery.sparkline.min.js');
        $a['html']['js'] .= add_js('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
        $a['html']['js'] .= add_js('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
        $a['html']['js'] .= add_js('/plugins/knob/jquery.knob.js');
        $a['html']['js'] .= add_js('/bootstrap/js/moment.min.js');
        $a['html']['js'] .= add_js('/plugins/daterangepicker/daterangepicker.js');
        $a['html']['js'] .= add_js('/plugins/datepicker/bootstrap-datepicker.js');
        $a['html']['js'] .= add_js('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
        $a['html']['js'] .= add_js('/plugins/slimScroll/jquery.slimscroll.min.js');
        $a['html']['js'] .= add_js('/plugins/fastclick/fastclick.js');
        $a['html']['js'] .= add_js('/dist/js/app.min.js');
        //$a['html']['js'] .= add_js('/dist/js/pages/dashboard.js');
        $a['html']['js'] .= add_js('/dist/js/demo.js');

        $t['count_caller_data'] = count($this->mhome->get_count_caller());
        $t['count_entry_data'] = count($this->mhome->get_count_all_kandidat());
        $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu', $t, true);
        
        $a['template']['footer'] = $this->load->view('template/vfooter', NULL, true);

        $t['id'] = $this->mkandidat->auto_id();
        
        $a['template']['header'] = $this->load->view('template/vheader', NULL, true);

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');

        /* DATA PRIBADI */
        $nama_lengkap = addslashes($this->input->post('nama_lengkap'));
        $no_sim = addslashes($this->input->post('no_sim'));
        $no_hp = addslashes($this->input->post('no_hp'));
        $no_ktp = addslashes($this->input->post('no_ktp'));
        $no_tlp = addslashes($this->input->post('no_tlp'));
        $alamat = addslashes($this->input->post('alamat'));
        $agama = addslashes($this->input->post('agama'));
        $suku = addslashes($this->input->post('suku'));
        $hobby = addslashes($this->input->post('hobby'));
        $pendidikan_level = addslashes($this->input->post('pendidikan_level'));
        
        //date in mm/dd/yyyy format; or it can be in other formats as well
        

        $pengalaman_memimpin = addslashes($this->input->post('pengalaman_memimpin'));
        $kewarganegaraan = addslashes($this->input->post('kewarganegaraan'));
        $tempat_lahir = addslashes($this->input->post('tempat_lahir'));

        $ktp_expired_date = date('Y-m-d', strtotime(strtr($this->input->post("ktp_expired_date"), '/', '-')));
        $date2 = strtr($this->input->post("sim_expired_date"), '/', '-');
        $sim_expired_date = date('Y-m-d', strtotime($date2));

        $tgl_lahir = date('Y-m-d', strtotime(strtr($this->input->post("tgl_lahir"), '/', '-')));

        $age = date("Y")-date('Y', strtotime(strtr($this->input->post("tgl_lahir"), '/', '-')));
        
        $gender = addslashes($this->input->post('gender'));
        $tempat_tinggal = addslashes($this->input->post('tempat_tinggal'));
        $email = addslashes($this->input->post('email'));
        $gol_darah = addslashes($this->input->post('gol_darah'));
        $tinggi_badan = addslashes($this->input->post('tinggi_badan'));
        $berat_badan = addslashes($this->input->post('berat_badan'));
        /* DATA PRIBADI END */

        /* DARURAT CALL */
        $nama_lengkap_d = addslashes($this->input->post('nama_lengkap_d'));
        $no_telp_rumah_d = addslashes($this->input->post('no_telp_rumah_d'));
        $no_hp_d = addslashes($this->input->post('no_hp_d'));
        $hubungan_d = addslashes($this->input->post('hubungan_d'));
        $alamat_d = addslashes($this->input->post('alamat_d'));
        $id_kandidat = addslashes($this->input->post('id_kandidat'));
        /* DARURAT CALL END */

        /* Kegiatan Lainnya/organisasi */
        $nama_organisasi = $this->input->post('nama_organisasi');
        $jenis_organisasi = $this->input->post('jenis_organisasi');
        $tahun = $this->input->post("tahun");
        $jabatan = $this->input->post('jabatan');
        /* Kegiatan Lainnya End */

        /* Keterangan Lain */
        $penyakit = addslashes($this->input->post('penyakit'));
        $pidana = addslashes($this->input->post('pidana'));
        $gaji_diharapkan = addslashes($this->input->post('gaji_diharapkan'));
        $mulai_kerja = addslashes($this->input->post('mulai_kerja'));
        $orang_dalam = addslashes($this->input->post('orang_dalam'));
        $kelemahan = addslashes($this->input->post('kelemahan'));
        $kelebihan = addslashes($this->input->post('kelebihan'));
        $ket_penyakit = addslashes($this->input->post('ket_penyakit'));
        $ket_kriminal = addslashes($this->input->post('ket_kriminal'));
        $ket_orangdalam = addslashes($this->input->post('ket_orangdalam'));
        /* Keterangan Lainnya End */

        /* Keluarga */
        $nama_k = $this->input->post('nama_k');
        $gender_k = $this->input->post('gender_k');
        $usia_k = $this->input->post('usia_k');
        $pendidikan_k = $this->input->post('pendidikan_k');
        $pekerjaan_k = $this->input->post('pekerjaan_k');
        $jenis_keluarga = $this->input->post('jenis_keluarga');
        $id_kand = $this->input->post('id_kandidat_k');
        /* Keluarga End */

        /* Pengalaman Kerja */
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $jabatan_terkahir = $this->input->post('jabatan_terkahir');
        $gaji = $this->input->post('gaji');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $tahun_keluar = $this->input->post('tahun_keluar');

        $tugas_tanggung_jawab = $this->input->post('tugas_tanggung_jawab');
        $alasan_keluar = $this->input->post('alasan_keluar');
        /* Pengalaman End */

        /* Refferensi Kerja */
        $nama_lengkap_ref = $this->input->post('nama_lengkap_ref');
        $perusahaan_ref = $this->input->post('perusahaan_ref');
        $hubungan_ref = $this->input->post('hubungan_ref');
        $telp_ref = $this->input->post('telp_ref');
        $alamat_ref = $this->input->post('alamat_ref');
        $informasi_dari = $this->input->post('informasi_dari');
        /* Pengalaman End */

        /* Pendidikan */
        $nama_sekolah = $this->input->post('nama_sekolah');
        $tempat_sekolah = $this->input->post('tempat_sekolah');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_lulus = $this->input->post('tanggal_lulus');
        $tingkat_sekolah = $this->input->post('tingkat_sekolah');
        /* Pendidikan End */

        /* Kursus */
        $jenis_kursus = $this->input->post('jenis_kursus');
        $tahun_kursus = $this->input->post('tahun_kursus');
        $lama_kursus = $this->input->post('lama_kursus');
        $penyelenggara = $this->input->post('penyelenggara');
        /* Kursus End */

        /* Kemampuan Bahasa */
        $bahasa = $this->input->post('bahasa');
        $membaca = $this->input->post('membaca');
        $menulis = $this->input->post('menulis');
        $berbicara = $this->input->post('berbicara');
        $mendengar = $this->input->post('mendengar');
        /* Kemampuan bahasa End */

        /* Kemampuan Komputer */
        $level_skill = $this->input->post('level_skill');
        $jenis_program = $this->input->post('jenis_program');
        /* Kemampuan Komputer End */

        /* posisi penempatan */
        $posisi = $this->input->post('nama_posisi');
        $prov = $this->input->post('provinsi_id');
        $kota = $this->input->post('kota_id');
        /* posisi penempatan */

        if ($this->form_validation->run() === TRUE) {
            /* PAS FOTO START */
            $config['upload_path'] = $this->config->item('upload_temp');
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $pas_foto_file = "";
            $ktp_scan_file = "";
            $cv_file = "";
            $lamaranfile = "";
            $ijazah_file = "";

            if ($this->upload->pas_foto_file()) {
                $foto = $this->upload->data();
                $pas_foto_file = $this->createPasFoto($foto);
            }

            if ($this->upload->ktp_scan_file()) {
                $ktp = $this->upload->data();
                $ktp_scan_file = $this->createKtpScan($ktp);
            }

            if ($this->upload->cv_file()) {
                $cv = $this->upload->data();
                $cv_file = $this->createCvfile($cv);
            }
            if ($this->upload->lamaran_file()) {
                $lamaran = $this->upload->data();
                $lamaranfile = $this->createLamaran($lamaran);
            }
            if ($this->upload->ijazah_file()) {
                $ijazah = $this->upload->data();
                $ijazah_file = $this->createIjazah($ijazah);
            }

            /* PAS FOTO END */
            
            $this->mkandidat->input_darurat_call($nama_lengkap_d, $no_telp_rumah_d, $no_hp_d, $hubungan_d, $alamat_d, $id_kandidat);
            $this->mkandidat->input_organisasi($nama_organisasi, $jenis_organisasi, $tahun, $jabatan);
            $this->mkandidat->input_referensikerja($nama_lengkap_ref, $perusahaan_ref, $hubungan_ref, $telp_ref, $alamat_ref, $informasi_dari);
            $this->mkandidat->input_keluarga($nama_k, $gender_k, $usia_k, $pendidikan_k, $pekerjaan_k, $jenis_keluarga);
            $this->mkandidat->input_pengelamankerja($nama_perusahaan, $alamat_perusahaan, $jabatan_terkahir, $gaji, $tahun_masuk, $tahun_keluar, $tugas_tanggung_jawab, $alasan_keluar);
            $this->mkandidat->input_keterangan_lainnya($penyakit, $pidana, $gaji_diharapkan, $mulai_kerja, $orang_dalam, $kelemahan, $kelebihan, $id_kandidat, $ket_penyakit, $ket_kriminal, $ket_orangdalam);
            $this->mkandidat->input_pendidikan_formal($nama_sekolah, $tempat_sekolah, $tanggal_masuk, $tanggal_lulus, $tingkat_sekolah);
            $this->mkandidat->input_kursus($jenis_kursus, $tahun_kursus, $lama_kursus, $penyelenggara, $id_kand);
            $this->mkandidat->input_bahasa_asing($bahasa, $membaca, $menulis, $berbicara, $mendengar, $id_kand);
            $this->mkandidat->input_kemampuan_komputer($level_skill, $jenis_program, $id_kand);
            $this->mkandidat->input_posisi_penempatan($posisi, $prov, $kota);
            $this->mkandidat->input_kandidat($nama_lengkap, $no_sim, $no_hp, $no_ktp, $no_tlp, $alamat, $agama, $suku, $kewarganegaraan, $tempat_lahir, $gender, $tempat_tinggal, $email, $gol_darah, $tinggi_badan, $berat_badan, $hobby, $pengalaman_memimpin, $tgl_lahir, $ktp_expired_date, $sim_expired_date, $pas_foto_file, $ktp_scan_file, $cv_file, $pendidikan_level, $lamaranfile, $ijazah_file,$age);

            $this->mkandidat->delete_empty_pendidikan();
            $this->mkandidat->delete_empty_pengalaman_kerja();
            $this->mkandidat->delete_empty_keluarga();
            $this->mkandidat->delete_empty_kemampuan_bahasa();
            $this->mkandidat->delete_empty_kemampuan_komputer();
            $this->mkandidat->delete_empty_kursus();
            $this->mkandidat->delete_empty_organisasi();
            $this->mkandidat->delete_empty_referensi();
            //$this->mlog->log_insertdata();
            $this->mlog->kandidat_log_insert();
            $files = glob('upload/kadidat/temp_file/*');
            foreach ($files as $file) {
                if (is_file($file))
                    unlink($file);
            }
            redirect('kandidat');
        }

        $prov_id = $this->uri->segment(2, 0);

        if ($prov_id != "") {
            $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
            $t['dropdowncity'] = $this->mkandidat->cms_list_kokab($prov_id);
            $t['dropdowncityAll'] = $this->mkandidat->cms_list_all_kokab();
            $t['posisi'] = $this->m_modul_posisi_setting->get_posisi();
            $t['list'] = $this->mkandidat->get_kandidat_list();
            $t['sorching'] = $this->mkandidat->get_sorching();
            $a['sorching'] = $this->mkandidat->get_sorching();
            $a['kandidat']['datatable'] = $this->load->view('kandidat/vadd_kandidat', $t, true);
            $this->load->view('pages/vkandidat', $a, FALSE);
        } else {
            $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
            $t['dropdowncity'] = $this->mkandidat->cms_list_all_kokab();
            $t['posisi'] = $this->m_modul_posisi_setting->get_posisi();
            $t['sorching'] = $this->mkandidat->get_sorching();
            $a['sorching'] = $this->mkandidat->get_sorching();
            $a['kandidat']['datatable'] = $this->load->view('kandidat/vadd_kandidat', $t, true);
            $a['list'] = $this->mkandidat->get_kandidat_list();
            $this->load->view('pages/vkandidat', $a, FALSE);
        }
    }
    
    function ajax_call() {
        $provinsi_id = $this->input->post('provinsi_id');
        $data['sc_get'] = $this->mkandidat->cms_list_kokab($provinsi_id);
        $sc = json_encode($data['sc_get']);
        echo $sc;
    }

    function createCvfile($data) {

        $w = $data['image_width'];
        $h = $data['image_height'];
        $optw = $w;
        $opth = $h;
        $time = md5(date("Y-m-d h:i:s"));
        $img = 'cv_' . randomString(16) . $time . $data['file_ext'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->config->item('upload_temp') . '/' . $data['file_name'];
        $config['new_image'] = $this->config->item('upload_cv') . '/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $optw;
        $config['height'] = $opth;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();

        return $img;
    }

    function createKtpScan($data) {

        $w = $data['image_width'];
        $h = $data['image_height'];

        $optw = $w;
        $opth = $h;
        $time = md5(date("Y-m-d h:i:s"));
        $img = 'ktp_scan_' . randomString(16) . $time . $data['file_ext'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->config->item('upload_temp') . '/' . $data['file_name'];
        $config['new_image'] = $this->config->item('upload_ktp') . '/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $optw;
        $config['height'] = $opth;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return $img;
    }

    function createPasFoto($data) {
        $w = $data['image_width'];
        $h = $data['image_height'];
        $optw = $w;
        $opth = $h;
        $time = md5(date("Y-m-d h:i:s"));
        $img = 'pas_foto_' . randomString(16) . $time . $data['file_ext'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->config->item('upload_temp') . '/' . $data['file_name'];
        $config['new_image'] = $this->config->item('upload_foto') . '/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $optw;
        $config['height'] = $opth;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return $img;
    }

    function createLamaran($data) {

        $w = $data['image_width'];
        $h = $data['image_height'];
        $optw = $w;
        $opth = $h;
        $time = md5(date("Y-m-d h:i:s"));
        $img = 'lamaran_' . randomString(16) . $time . $data['file_ext'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->config->item('upload_temp') . '/' . $data['file_name'];
        $config['new_image'] = $this->config->item('upload_lamaran') . '/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $optw;
        $config['height'] = $opth;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return $img;
    }

    function createIjazah($data) {
        $w = $data['image_width'];
        $h = $data['image_height'];

        $optw = $w;
        $opth = $h;
        $time = md5(date("Y-m-d h:i:s"));
        $img = 'ijazah_' . randomString(16) . $time . $data['file_ext'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->config->item('upload_temp') . '/' . $data['file_name'];
        $config['new_image'] = $this->config->item('upload_ijazah') . '/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $optw;
        $config['height'] = $opth;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return $img;
    }

    function handle_pasfoto() {
        $config['upload_path'] = $this->config->item('upload_temp');
        $config['allowed_types'] = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp';
        $this->load->library('upload', $config);
        $upload_data = $this->upload->data();
        if (isset($_FILES['pas_foto_file']) && !empty($_FILES['pas_foto_file']['name'])) {
            if ($this->upload->pas_foto_file()) {
                $upload_data = $this->upload->data();
                $_POST['pas_foto_file'] = $upload_data['file_name'];
                return true;
            } 
            else {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        } else {
            $this->form_validation->set_message('handle_upload', "Bagian Photo di butuhkan.");
            return false;
        }
    }

    function check_email_exists() {
        $username = $this->input->post('email');
        $exists = $this->mkandidat->check_email_availablity($username);
        $count = count($exists);
        if ($this->input->post('email') == '') {
            echo "<span class='status-not-available'>Isi Kolom Email!</span>";
        } else {
            if ($count > 0) {
                echo "<span class='status-not-available'> Email Sudah Terdaftar</span>";
            } else {
                echo "<span class='status-available'> Email Available</span>";
            }
        }
    }

    function check_ktp_exists() {
        $ktp = $this->input->post('no_ktp');
        $exists = $this->mkandidat->check_ktp_availablity($ktp);
        $count = count($exists);
        if ($this->input->post('no_ktp') == '') {
            echo "<span class='status-not-available'> Isi Kolom No KTP ! </span>";
        } else if (strlen($this->input->post('no_ktp')) != "16") {
            echo "<span class='status-not-available'>Harus 16 Digit</span>";
        } else {
            if ($count > 0) {
                echo "<span class='status-not-available'> KTP sudah terdaftar</span>";
            } else {
                echo "<span class='status-available'> KTP Available</span>";
            }
        }
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
        }
    }
}