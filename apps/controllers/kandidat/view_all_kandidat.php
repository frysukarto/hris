<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_all_kandidat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'weburi', 'header', 'file', 'contentdate', 'stringurl', 'textlimiter', 'security', 'dropdown'));
        $this->load->model(array('mlog', 'mkandidat_list', 'mkandidat', 'mhome', 'madmin', 'mbuku_tahunan', 'mlowongan', 'minterviewer'));
        $this->load->library(array('form_validation', 'image_lib'));
        $this->load->model('modul/m_modul_posisi_setting', 'm_modul_posisi_setting');
        $this->load->model('modul/m_modul_client_setting', 'm_modul_client_setting');
    }

    public function index() {
        $this->is_logged_in();
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
        $a['html']['css'] .= add_css('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');

        $a['html']['js'] = add_js('/plugins/jQuery/jQuery-2.2.0.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/jquery-ui.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/raphael-min.js');
        $a['html']['js'] .= add_js('/plugins/morris/morris.min.js');
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
        $a['html']['js'] .= add_js('/dist/js/pages/dashboard.js');
        $a['html']['js'] .= add_js('/dist/js/demo.js');

        $id = $this->uri->segment(2);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $t['ketla'] = $this->mkandidat->get_keterangan_lain_byid($id);
        $t['darurat'] = $this->mkandidat->get_darurat_byid($id);
        $t['organisasi'] = $this->mkandidat->get_organisasi_byid($id);
        $t['pengalaman'] = $this->mkandidat->get_pengalaman_kerja_byid($id);
        $t['referensi'] = $this->mkandidat->get_referensi_byid($id);
        $t['keluarga'] = $this->mkandidat->get_keluarga_byid($id);
        $t['kemampuan_k'] = $this->mkandidat->get_kemampuan_komputer_byid($id);
        $t['kemampuan_b'] = $this->mkandidat->get_kemampuan_bahasa_byid($id);
        $t['kursus'] = $this->mkandidat->get_kursus_byid($id);
        $t['pendidikan'] = $this->mkandidat->get_pendidikan_formal_byid($id);
        $t['pos_penempatan'] = $this->mkandidat->get_posisi_penempatan($id);
        $t['psikotes'] = $this->mkandidat->get_hasil_psikotes_byid($id);
        $t['jadwal'] = $this->minterviewer->get_jadwal_interview_by_id($id);

        $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu', $a, true);
        $a['template']['footer'] = $this->load->view('template/vfooter', NULL, true);
        $a['template']['header'] = $this->load->view('template/vheader', NULL, true);
        if ($t['kandidat'][0]['id_kandidat'] == "") {redirect(base_url() . "/dashboard");}
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        
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

            if ($pas_foto_file == "") {
                $pas_foto_file = $t['kandidat'][0]['pas_foto_file'];
            }
            if ($cv_file == "") {
                $cv_file = $t['kandidat'][0]['cv_file'];
            }
            if ($ktp_scan_file == "") {
                $ktp_scan_file = $t['kandidat'][0]['ktp_scan_file'];
            }
            if ($lamaranfile == "") {
                $lamaranfile = $t['kandidat'][0]['lamaran_file'];
            }
            if ($ijazah_file == "") {
                $ijazah_file = $t['kandidat'][0]['ijazah_file'];
            }

            $this->mkandidat->update_pass_foto_kandidat($pas_foto_file, $id);
            $this->mkandidat->update_cv_kandidat($cv_file, $id);
            $this->mkandidat->update_ktp_scan_kandidat($ktp_scan_file, $id);
            $this->mkandidat->update_lamaran_kandidat($lamaranfile, $id);
            $this->mkandidat->update_ijazah_kandidat($ijazah_file, $id);
            echo '<script language="javascript">';
            echo '$("#pass_foto").load(" #pass_foto")';
            echo '</script>';
            //redirect("view/" . $id . "/" . slug($t['kandidat'][0]['nama_lengkap']));
         //   echo json_encode(array("status" => TRUE));
//          $this->mkandidat->update_pass_foto_kandidat(array('id_kandidat' => $this->input->post('id_kandidat')), $pas_foto_file);
//          $this->mlog->log_editdata();
//          echo json_encode(array("status" => TRUE));
        }

        $prov_id = $this->uri->segment(2, 0);

        if ($prov_id != "") {
            $t['dropdownprov'] = $this->m_modul_client_setting->cms_list_prov();
            $t['dropdowncity'] = $this->m_modul_client_setting->cms_list_kokab($prov_id);
            $t['posisi'] = $this->m_modul_posisi_setting->get_posisi();
            $a['list'] = $this->mkandidat->get_kandidat_list();
            $t['sorching'] = $this->mkandidat->get_sorching();
            $a['kandidat']['datatable'] = $this->load->view('kandidat/vview_kandidat', $t, true);
            $this->load->view('pages/vkandidat_view', $a, FALSE);
        } else {
            $t['dropdownprov'] = $this->m_modul_client_setting->cms_list_prov();
            $t['dropdowncity'] = $this->m_modul_client_setting->cms_list_all_kokab();
            $t['posisi'] = $this->m_modul_posisi_setting->get_posisi();
            $t['sorching'] = $this->mkandidat->get_sorching();
            $a['kandidat']['datatable'] = $this->load->view('kandidat/vview_kandidat', $t, true);
            $a['list'] = $this->mkandidat->get_kandidat_list();
            $this->load->view('pages/vkandidat_view', $a, FALSE);
        }
    }

    function ajax_call() {
        $provinsi_id = $this->input->post('id_cabang');
        $data['sc_get'] = $this->m_modul_client_setting->cms_list_kokab($provinsi_id);
        $sc = json_encode($data['sc_get']);
        echo $sc;
    }

    public function ajax_edit_darurat($id) {
        $this->load->model('kandidat/mdarurat_call', 'darurat');
        $data = $this->darurat->get_by_id($id);
        $data->id_kandidat = $data->id_kandidat;
        echo json_encode($data);
    }

    function ajax_update_darurat() {

        $this->load->model('kandidat/mdarurat_call', 'darurat');
        $this->_validate();
        $data = array(
            'nama_lengkap_d' => $this->input->post('nama_lengkap_d'),
            'no_telp_rumah_d' => $this->input->post('no_telp_rumah_d'),
            'no_hp_d' => $this->input->post('no_hp_d'),
            'hubungan_d' => $this->input->post('hubungan_d'),
            'alamat_d' => $this->input->post('alamat_d'),
        );
        $this->darurat->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_keterangan_lain($id) {
        $this->load->model('kandidat/mketerangan_lain', 'keterangan');
        $data = $this->keterangan->get_by_id($id);
        $data->id_kandidat = $data->id_kandidat;
        echo json_encode($data);
    }

    public function ajax_update_keterangan_lain() {
        $this->load->model('kandidat/mketerangan_lain', 'keterangan');
        $this->_validate();
        $data = array(
            'penyakit' => $this->input->post('penyakit'),
            'pidana' => $this->input->post('pidana'),
            'gaji_diharapkan' => $this->input->post('gaji_diharapkan'),
            'mulai_kerja' => $this->input->post('mulai_kerja'),
            'orang_dalam' => $this->input->post('orang_dalam'),
            'kelemahan' => $this->input->post('kelemahan'),
            'kelebihan' => $this->input->post('kelebihan'),
            'ket_penyakit' => $this->input->post('ket_penyakit'),
            'ket_kriminal' => $this->input->post('ket_kriminal'),
            'ket_orangdalam' => $this->input->post('ket_orangdalam'),
        );
        $this->keterangan->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
        // $this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_data_pribadi() {
        $this->_validate();
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_tlp' => $this->input->post('no_tlp'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'no_ktp' => $this->input->post('no_ktp'),
            'no_sim' => $this->input->post('no_sim'),
            'ktp_expired_date' => date('Y-m-d', strtotime(strtr($this->input->post("ktp_expired_date"), '/', '-'))),
            'sim_expired_date' => date('Y-m-d', strtotime(strtr($this->input->post("sim_expired_date"), '/', '-'))),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'tempat_tinggal' => $this->input->post('tempat_tinggal'),
            'pendidikan_level' => $this->input->post('pendidikan_level'),
            'suku' => $this->input->post('suku'),
            'gol_darah' => $this->input->post('gol_darah'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'hobby' => $this->input->post('hobby'),
            'pengalaman_memimpin' => $this->input->post('pengalaman_memimpin'),
            'tgl_lahir' => date('Y-m-d', strtotime(strtr($this->input->post("tgl_lahir"), '/', '-'))),
            'age' => date("Y") - date('Y', strtotime(strtr($this->input->post("tgl_lahir"), '/', '-'))),
            'gender' => $this->input->post('gender'));

        $this->mkandidat_list->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_add_organisasi() {
        $this->load->model('kandidat/morganisasi', 'morganisasi');
        $this->_validate_organisasi();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'nama_organisasi' => $this->input->post('nama_organisasi'),
            'jenis_organisasi' => $this->input->post('jenis_organisasi'),
            'tahun' => date('Y-m-d', strtotime(strtr($this->input->post("tahun"), '/', '-'))),
            'jabatan' => $this->input->post('jabatan'));
        $this->morganisasi->save($data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_organisasi() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nama_organisasi') == '') {
            $data['inputerror'][] = 'nama_organisasi';
            $data['error_string'][] = 'Nama Organisasi is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('jabatan') == '') {
            $data['inputerror'][] = 'jabatan';
            $data['error_string'][] = 'Jabatan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('jenis_organisasi') == '') {
            $data['inputerror'][] = 'jenis_organisasi';
            $data['error_string'][] = 'Jenis Organisasi is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tahun') == '') {
            $data['inputerror'][] = 'tahun';
            $data['error_string'][] = 'Tahun is required';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //referensi
    public function ajax_add_referensi() {
        $this->load->model('kandidat/mreferensi', 'mreferensi');
        $this->_validate_referensi();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'nama_lengkap_ref' => $this->input->post('nama_lengkap_ref'),
            'perusahaan_ref' => $this->input->post('perusahaan_ref'),
            'hubungan_ref' => $this->input->post('hubungan_ref'),
            'alamat_ref' => $this->input->post('alamat_ref'),
            'informasi_dari' => $this->input->post('informasi_dari'),
            'telp_ref' => $this->input->post('telp_ref'));
        $this->mreferensi->save($data);
        ///$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_referensi() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nama_lengkap_ref') == '') {
            $data['inputerror'][] = 'nama_lengkap_ref';
            $data['error_string'][] = 'Nama Referensi is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('perusahaan_ref') == '') {
            $data['inputerror'][] = 'perusahaan_ref';
            $data['error_string'][] = 'Perusahaan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('hubungan_ref') == '') {
            $data['inputerror'][] = 'hubungan_ref';
            $data['error_string'][] = 'Hubungan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('alamat_ref') == '') {
            $data['inputerror'][] = 'alamat_ref';
            $data['error_string'][] = 'Alamat is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('informasi_dari') == '') {
            $data['inputerror'][] = 'informasi_dari';
            $data['error_string'][] = 'Informasi is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('telp_ref') == '') {
            $data['inputerror'][] = 'telp_ref';
            $data['error_string'][] = 'Telp is required';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end referensi
    //keluarga
    public function ajax_add_keluarga() {
        $this->load->model('kandidat/mkeluarga', 'mkeluarga');
        $this->_validate_keluarga();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'nama_k' => $this->input->post('nama_k'),
            'gender_k' => $this->input->post('gender_k'),
            'usia_k' => $this->input->post('usia_k'),
            'pendidikan_k' => $this->input->post('pendidikan_k'),
            'pekerjaan_k' => $this->input->post('pekerjaan_k'),
            'jenis_keluarga' => $this->input->post('jenis_keluarga'));
        $this->mkeluarga->save($data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_keluarga() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nama_k') == '') {
            $data['inputerror'][] = 'nama_k';
            $data['error_string'][] = 'Nama Referensi is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('gender_k') == '') {
            $data['inputerror'][] = 'gender_k';
            $data['error_string'][] = 'Gender is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('usia_k') == '') {
            $data['inputerror'][] = 'usia_k';
            $data['error_string'][] = 'Usia is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('pendidikan_k') == '') {
            $data['inputerror'][] = 'pendidikan_k';
            $data['error_string'][] = 'Pendidikan is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('pekerjaan_k') == '') {
            $data['inputerror'][] = 'pekerjaan_k';
            $data['error_string'][] = 'Pekerjaan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('jenis_keluarga') == '') {
            $data['inputerror'][] = 'jenis_keluarga';
            $data['error_string'][] = 'Family is required';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end keluarga
    //pengalaman
    public function ajax_add_pengalaman() {
        $this->load->model('kandidat/mpengalaman', 'mpengalaman');
        $this->_validate_pengalaman();
        if ($this->input->post("tahun_keluar") == "") {
            $sampai = "Sekarang";
        } else {
            $sampai = date('Y-m-d', strtotime(strtr($this->input->post("tahun_keluar"), '/', '-')));
        }
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
            'jabatan_terkahir' => $this->input->post('jabatan_terkahir'),
            'gaji' => $this->input->post('gaji'),
            'tahun_masuk' => date('Y-m-d', strtotime(strtr($this->input->post("tahun_masuk"), '/', '-'))),
            'alasan_keluar' => $this->input->post('alasan_keluar'),
            'tugas_tanggung_jawab' => $this->input->post('tugas_tanggung_jawab'),
            'tahun_keluar' => $sampai);
        $this->mpengalaman->save($data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_pengalaman() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nama_perusahaan') == '') {
            $data['inputerror'][] = 'nama_perusahaan';
            $data['error_string'][] = 'Nama Perusahaan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('alamat_perusahaan') == '') {
            $data['inputerror'][] = 'alamat_perusahaan';
            $data['error_string'][] = 'Alamat Perusahaan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('jabatan_terkahir') == '') {
            $data['inputerror'][] = 'jabatan_terkahir';
            $data['error_string'][] = 'Jabatan is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('gaji') == '') {
            $data['inputerror'][] = 'gaji';
            $data['error_string'][] = 'Gaji is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('tahun_masuk') == '') {
            $data['inputerror'][] = 'tahun_masuk';
            $data['error_string'][] = 'Tahun Masuk is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('tugas_tanggung_jawab') == '') {
            $data['inputerror'][] = 'tugas_tanggung_jawab';
            $data['error_string'][] = 'Tugas is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('alasan_keluar') == '') {
            $data['inputerror'][] = 'alasan_keluar';
            $data['error_string'][] = 'Alasan Keluar is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end pengalaman
    //kemampuan komputer
    public function ajax_add_kemampuan_komputer() {
        $this->load->model('kandidat/mkemampuan_komputer', 'mkemampuan_komputer');
        $this->_validate_kemampuan_komputer();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'level_skill' => $this->input->post('level_skill'),
            'jenis_program' => $this->input->post('jenis_program'));
        $this->mkemampuan_komputer->save($data);
        echo json_encode(array("status" => TRUE));
    }

    function _validate_kemampuan_komputer() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('level_skill') == '') {
            $data['inputerror'][] = 'level_skill';
            $data['error_string'][] = 'Level Skill is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('jenis_program') == '') {
            $data['inputerror'][] = 'jenis_program';
            $data['error_string'][] = 'Jenis Program is required';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end kemampuan komputer
    //kemampuan pendidikan
    public function ajax_add_pendidikan() {
        $this->load->model('kandidat/mpendidikan', 'mpendidikan');
        $this->_validate_pendidikan();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'tempat_sekolah' => $this->input->post('tempat_sekolah'),
            'tingkat_sekolah' => $this->input->post('tingkat_sekolah'),
            'tanggal_masuk' => date('Y-m-d', strtotime(strtr($this->input->post("tanggal_masuk"), '/', '-'))),
            'tanggal_lulus' => date('Y-m-d', strtotime(strtr($this->input->post("tanggal_lulus"), '/', '-'))));
        $this->mpendidikan->save($data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_pendidikan() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nama_sekolah') == '') {
            $data['inputerror'][] = 'nama_sekolah';
            $data['error_string'][] = 'Nama Sekolah is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tempat_sekolah') == '') {
            $data['inputerror'][] = 'tempat_sekolah';
            $data['error_string'][] = 'Tempat Sekolah is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tanggal_masuk') == '') {
            $data['inputerror'][] = 'tanggal_masuk';
            $data['error_string'][] = 'Tanggal Masuk is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tanggal_lulus') == '') {
            $data['inputerror'][] = 'tanggal_lulus';
            $data['error_string'][] = 'Tanggal Lulus is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tingkat_sekolah') == '') {
            $data['inputerror'][] = 'tingkat_sekolah';
            $data['error_string'][] = 'Tingkat is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end pendidikan
    //kemampuan pendidikan
    public function ajax_add_kursus() {
        $this->load->model('kandidat/mkursus', 'mkursus');
        $this->_validate_kursus();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'jenis_kursus' => $this->input->post('jenis_kursus'),
            'lama_kursus' => $this->input->post('lama_kursus'),
            'penyelenggara' => $this->input->post('penyelenggara'),
            'tahun_kursus' => date('Y-m-d', strtotime(strtr($this->input->post("tahun_kursus"), '/', '-'))));
        $this->mkursus->save($data);
        //$this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_kursus() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('jenis_kursus') == '') {
            $data['inputerror'][] = 'jenis_kursus';
            $data['error_string'][] = 'Jenis Kursus is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('lama_kursus') == '') {
            $data['inputerror'][] = 'lama_kursus';
            $data['error_string'][] = 'Lama kursus is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('penyelenggara') == '') {
            $data['inputerror'][] = 'penyelenggara';
            $data['error_string'][] = 'Penyelenggara is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tahun_kursus') == '') {
            $data['inputerror'][] = 'tahun_kursus';
            $data['error_string'][] = 'Tahun Kursus is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end kursus
    //kemampuan bahasa
    public function ajax_add_kemampuan_bahasa() {
        $this->load->model('kandidat/mkemampuan_bahasa', 'mkemampuan_bahasa');
        $this->_validate_kemampuan_bahasa();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'bahasa' => $this->input->post('bahasa'),
            'membaca' => $this->input->post('membaca'),
            'menulis' => $this->input->post('menulis'),
            'berbicara' => $this->input->post('berbicara'));
        $this->mkemampuan_bahasa->save($data);
        // $this->mlog->log_editdata();
        echo json_encode(array("status" => TRUE));
    }

    function _validate_kemampuan_bahasa() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('bahasa') == '') {
            $data['inputerror'][] = 'bahasa';
            $data['error_string'][] = 'Bahasa is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('membaca') == '') {
            $data['inputerror'][] = 'membaca';
            $data['error_string'][] = 'Membaca is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('menulis') == '') {
            $data['inputerror'][] = 'menulis';
            $data['error_string'][] = 'Menulis is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('berbicara') == '') {
            $data['inputerror'][] = 'berbicara';
            $data['error_string'][] = 'Berbicara is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    //end kemampuan bahasa

    public function ajax_edit_posisi_penempatan($id) {
        $this->load->model('kandidat/mposisi_penempatan', 'pospem');
        $data = $this->pospem->get_by_id($id);
        $data->id_kandidat = $data->id_kandidat;
        echo json_encode($data);
    }

    function ajax_update_posisi_penempatan() {

        $this->load->model('kandidat/mposisi_penempatan', 'pospem');
        $this->_validate();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'posisi' => $this->input->post('posisi'),
            'id_area' => $this->input->post('id_area'),
            'id_cabang' => $this->input->post('id_cabang'));
        $this->pospem->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
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
        $time = md5(date("Y-m-d h:i:s"));
        $img = 'pas_foto_'.randomString(16).$time.$data['file_ext'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->config->item('upload_temp') . '/' . $data['file_name'];
        $config['new_image'] = $this->config->item('upload_foto') . '/' . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $data['image_width'];
        $config['height'] = $data['image_height'];
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

    function delete_pass_foto() {
        $id = $this->uri->segment(2);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $this->mkandidat->delete_pass_foto_kandidat($this->uri->segment(2));
        $files = glob("upload/kadidat/pas_foto/" . $t['kandidat'][0]['pas_foto_file']);
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
        redirect("view/" . $id . "/" . slug($t['kandidat'][0]['nama_lengkap']));
    }

    function delete_cv() {
        $id = $this->uri->segment(2);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $this->mkandidat->delete_cv_kandidat($this->uri->segment(2));
        $files = glob("upload/kadidat/pas_foto/" . $t['kandidat'][0]['cv_file']);
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
        redirect("view/" . $id . "/" . slug($t['kandidat'][0]['nama_lengkap']));
    }

    function delete_ktp() {
        $id = $this->uri->segment(2);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $this->mkandidat->delete_ktp_scan_kandidat($this->uri->segment(2));
        $files = glob("upload/kadidat/pas_foto/" . $t['kandidat'][0]['ktp_scan_file']);
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
        redirect("view/" . $id . "/" . slug($t['kandidat'][0]['nama_lengkap']));
    }

    function delete_lamaran() {
        $id = $this->uri->segment(2);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $this->mkandidat->delete_lamaran_kandidat($this->uri->segment(2));
        $files = glob("upload/kadidat/pas_foto/" . $t['kandidat'][0]['lamaran_file']);
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
        redirect("view/" . $id . "/" . slug($t['kandidat'][0]['nama_lengkap']));
    }

    function delete_ijazah() {
        $id = $this->uri->segment(2);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $this->mkandidat->delete_ijazah_kandidat($this->uri->segment(2));
        $files = glob("upload/kadidat/pas_foto/" . $t['kandidat'][0]['ijazah_file']);
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
        redirect("view/" . $id . "/" . slug($t['kandidat'][0]['nama_lengkap']));
    }

    //   *DELETE VIEW KANDIDAT*/
    //    public function delete_view_organisasi($id)
    //    {
    //        $this->mkandidat->delete_view_organisasi($id);
    //        echo json_encode(array("status" => TRUE));
    //    }

    public function delete_view_kursus($id) {
        $this->mkandidat->delete_view_kursus($id);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_view_organisasi($id) {
        $this->mkandidat->delete_view_organisasi($id);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_view_referensi($id) {
        $this->mkandidat->delete_view_referensi($id);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_view_keluarga($id) {
        $this->mkandidat->delete_view_keluarga($id);
        echo json_encode(array("status" => TRUE));
    }

    function delete_view_pendidikan($id) {
        $this->mkandidat->delete_view_pendidikan($id);
        echo json_encode(array("status" => TRUE));
    }

    function delete_view_pengalaman($id) {
        $this->mkandidat->delete_view_pengalaman($id);
        echo json_encode(array("status" => TRUE));
    }

    function delete_view_kemkomputer($id) {
        $this->mkandidat->delete_view_kemkomputer($id);
        echo json_encode(array("status" => TRUE));
    }

    function delete_view_kembahasa($id) {
        $this->mkandidat->delete_view_kembahasa($id);
        echo json_encode(array("status" => TRUE));
    }

    /* DELETE VIEW KANDIDAT END */

    function ajax_update_pass_foto() {
       // $this->_validate_pass_foto();
        $config['upload_path'] = $this->config->item('upload_temp');
        $config['allowed_types'] = '*';
        //$pas_foto_file ="";
        $this->load->library('upload', $config);
        
        if($this->upload->pas_foto_file()) 
        {
          $foto = $this->upload->data();
          $pas_foto_file = $this->createPasFoto($foto);
        }
        $this->mkandidat->update_pass_foto_kandidat($pas_foto_file, $this->input->post('id_kandidat'));
//        $data = array('pas_foto_file' => $pas_foto_file);
//        $this->mkandidat->update_pass_foto_kandidat(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
       echo json_encode(array("status" => TRUE));
    }

    function _validate_pass_foto() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        
        if ($this->input->post('pas_foto_file') == '') {
            $data['inputerror'][] = 'pas_foto_file';
            $data['error_string'][] = 'Pass Foto is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    
    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
        }
    }

}
