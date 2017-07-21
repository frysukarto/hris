<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Interviewer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'weburi', 'header', 'file', 'contentdate', 'stringurl', 'textlimiter', 'security', 'dropdown'));
        $this->load->model(array('mlog', 'mkandidat_list', 'mhome', 'madmin', 'mcaller', 'minterviewer', 'mkandidat'));
        $this->load->library('form_validation');
        $this->load->model('modul/m_modul_posisi_setting', 'm_modul_posisi_setting');
        $this->load->model('modul/m_modul_client_setting', 'm_modul_client_setting');
         $this->is_logged_in();
    }

    public function index() {
        $a = array();
        $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
        $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
        $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
        $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
        $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css');
        $a['html']['css'] .= add_css('/bootstrap/css/bootstrap-datepicker3.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/jquery.datetimepicker.css');

        $a['html']['js'] = add_js('/plugins/jQuery/jQuery-2.2.0.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/jquery-ui.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap.min.js');
        $a['html']['js'] .= add_js('/plugins/datatables/jquery.dataTables.min.js');
        $a['html']['js'] .= add_js('/plugins/datatables/dataTables.bootstrap.min.js');
        $a['html']['js'] .= add_js('/plugins/slimScroll/jquery.slimscroll.min.js');
        $a['html']['js'] .= add_js('/plugins/fastclick/fastclick.js');
        $a['html']['js'] .= add_js('/dist/js/app.min.js');
        $a['html']['js'] .= add_js('/dist/js/demo.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-confirm-delete.js');
        $a['html']['js'] .= add_js('/bootstrap/js/test.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-datepicker.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/jquery.datetimepicker.full.min.js');
        //$id = $this->input->post('id_kandidat');
//
//          $t['jadwal'] = $this->minterviewer->get_jadwal_interview_by_id($id);
        $t['interviewer'] = $this->madmin->get_admin_by_group();
        $t['kandidat_status'] = $this->mcaller->td_kandidat_status();
        $t['caller_status'] = $this->mcaller->td_caller_status();

        $a['kandidat']['datatable'] = $this->load->view('kandidat/vinterviewer', $t, true);
        $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu', $a, true);
        $a['template']['footer'] = $this->load->view('template/vfooter', NULL, true);
        $a['template']['header'] = $this->load->view('template/vheader', NULL, true);



        $prov_id = $this->uri->segment(2, 0);

        if ($prov_id != "") {
            $t['dropdownprov'] = $this->m_modul_client_setting->cms_list_prov();
            $t['dropdowncity'] = $this->m_modul_client_setting->cms_list_kokab($prov_id);
            $t['posisi'] = $this->m_modul_posisi_setting->get_posisi();
            $t['client'] = $this->m_modul_client_setting->get_client();
            $a['list'] = $this->mkandidat->get_kandidat_list();
            $a['kandidat']['datatable'] = $this->load->view('kandidat/vinterviewer', $t, true);
            $this->load->view('pages/vinterviewer', $a, FALSE);
        } else {
            $t['dropdownprov'] = $this->m_modul_client_setting->cms_list_prov();
            $t['posisi'] = $this->m_modul_posisi_setting->get_posisi();
            $t['client'] = $this->m_modul_client_setting->get_client();
            $a['kandidat']['datatable'] = $this->load->view('kandidat/vinterviewer', $t, true);
            $a['list'] = $this->mkandidat->get_kandidat_list();
            $this->load->view('pages/vinterviewer', $a, FALSE);
        }
    }

    function ajax_call() {
        $provinsi_id = $this->input->post('id_cabang');
        $data['sc_get'] = $this->mkandidat->cms_list_kokab($provinsi_id);
        $sc = json_encode($data['sc_get']);
        echo $sc;
    }

    function lihat_jadwal() {
        $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
        $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
        $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
        $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
        $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css');
        $a['html']['css'] .= add_css('/bootstrap/css/bootstrap-datepicker3.min.css');
        $a['html']['css'] .= add_css('/bootstrap/css/jquery.datetimepicker.css');

        $a['html']['js'] = add_js('/plugins/jQuery/jQuery-2.2.0.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/jquery-ui.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap.min.js');
        $a['html']['js'] .= add_js('/plugins/datatables/jquery.dataTables.min.js');
        $a['html']['js'] .= add_js('/plugins/datatables/dataTables.bootstrap.min.js');
        $a['html']['js'] .= add_js('/plugins/slimScroll/jquery.slimscroll.min.js');
        $a['html']['js'] .= add_js('/plugins/fastclick/fastclick.js');
        $a['html']['js'] .= add_js('/dist/js/app.min.js');
        $a['html']['js'] .= add_js('/dist/js/demo.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-confirm-delete.js');
        $a['html']['js'] .= add_js('/bootstrap/js/test.js');
        $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-datepicker.min.js');
        $a['html']['js'] .= add_js('/bootstrap/js/jquery.datetimepicker.full.min.js');

        $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu', $a, true);
        $a['template']['footer'] = $this->load->view('template/vfooter', NULL, true);
        $a['template']['header'] = $this->load->view('template/vheader', NULL, true);

        $id = $this->uri->segment(2);
        $t['jadwal'] = $this->minterviewer->get_jadwal_interview_by_id($id);
        $a['admin']['datatable'] = $this->load->view('kandidat/vjadwal', $t, true);
        $this->load->view('pages/vpsikotes', $a, FALSE);
    }

    public function ajax_list() {
        $list = $this->minterviewer->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $admin) {
            if ($admin->status_kandidat == 1) {
                $span = '<span class="label label-baru">Baru</span>';
            } else if ($admin->status_kandidat == 2) {
                $span = '<span class="label label-caller">Caller</span>';
            } else if ($admin->status_kandidat == 3) {
                $span = '<span class="label label-interview1">Interview HRD</span>';
            } else if ($admin->status_kandidat == 4) {
                $span = '<span class="label label-interview2">Interview Client</span>';
            } else if ($admin->status_kandidat == 5) {
                $span = '<span class="label label-psikotes">Psikotes</span>';
            } else if ($admin->status_kandidat == 6) {
                $span = '<span class="label label-reject">Reject</span>';
            } else if ($admin->status_kandidat == 7) {
                $span = '<span class="label label-block">Blacklist</span>';
            } else if ($admin->status_kandidat == 8) {
                $span = '<span class="label label-blacklist">Block</span>';
            } else {
                $span = '<span class="label label-warning"></span>';
            }
            if ($admin->edit_caller_status == 1) {
                $onclick = '';
            } else {
                if ($admin->status_kandidat == 3) {
                    $onclick = ' <a data-toggle="tooltip" href="javascript:void(0)" title="buat jadwal baru" onclick="set_itv_1(' . "'" . $admin->id_kandidat . "'" . ')" ><i class="fa fa-phone-square"></i></a>';
                } else if ($admin->status_kandidat == 4) {
                    $onclick = ' <a data-toggle="tooltip" href="javascript:void(0)" title="buat jadwal baru" onclick="set_itv(' . "'" . $admin->id_kandidat . "'" . ')" ><i class="fa fa-phone-square"></i></a>';
                }
            }
            $no++;
            $row = array();
            $row[] = $admin->nama_lengkap;
            $row[] = $admin->no_ktp;
            $row[] = $admin->no_tlp;
            $row[] = $admin->email;
            $row[] = $span;
            $row[] = '<a data-toggle="tooltip" href="' . base_url() . 'view-jadwal/' . $admin->id_kandidat . '/' . slug($admin->nama_lengkap) . '" title="Lihat Jadwal dan Input Hasil"><i class="glyphicon glyphicon-list-alt"></i></a>
                              <a data-toggle="tooltip" href="' . base_url() . 'view/' . $admin->id_kandidat . '/' . slug($admin->nama_lengkap) . '" title="Lihat Kandidat"><i class="glyphicon glyphicon-search"></i></a>
                            ' . $onclick . '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->minterviewer->count_all(),
            "recordsFiltered" => $this->minterviewer->count_filtered(),
            "data" => $data,);
        echo json_encode($output);
    }

    public function ajax_edit($id) {
        $data = $this->minterviewer->get_by_id($id);
        $data->id_kandidat = $data->id_kandidat;
        echo json_encode($data);
    }

    public function jadwal_view($id) {
        $data = $this->minterviewer->get_jadwal_by_id($id);
        $data->id_kandidat = $data->id_kandidat;
        echo json_encode($data);
    }

    public function ajax_set_jadwal($id) {
        $data = $this->minterviewer->get_by_id($id);
        $data->id_kandidat = $data->id_kandidat;
        echo json_encode($data);
    }

    public function ajax_update() {
        $this->_validate_interview();
        $data = array('status_kandidat' => $this->input->post('status_kandidat'),);
        $this->minterviewer->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
        echo json_encode(array("status" => TRUE));
    }

//        public function set_update_jadwal()
//	{
//		$this->_validate_interview();
//		$data = array(
//                    'tanggal_interview' => $this->input->post('tanggal_interview'),
//                    'keterangan' => $this->input->post('keterangan'),
//                    'tempat_interview' => $this->input->post('tempat_interview'),
//                    );
//		$this->minterviewer->update_jadwal(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
//		echo json_encode(array("status" => TRUE));
//	}

    public function ajax_delete($id) {
        $this->minterviewer->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

//	private function _validate_interview()
//	{
//		$data = array();
//		$data['error_string'] = array();
//		$data['inputerror'] = array();
//		$data['status'] = TRUE;
//
//                   
//                if($this->input->post('keterangan') == '')
//                {
//                        $data['inputerror'][] = 'keterangan';
//                        $data['error_string'][] = 'Keterangan is required';
//                        $data['status'] = FALSE;
//                }
//                    
//
//		if($data['status'] === FALSE)
//		{
//			echo json_encode($data);
//			exit();
//		}
//	}
    //EDIT//
    public function ajax_add_jadwal_intervew() {
        $this->_validate_interview_hrd();
        if ($this->input->post('status_call') == 2) {
//            if ($this->input->post('status_kandidat') == 4) {
                $data = array(
                    'id_kandidat' => $this->input->post('id_kandidat'),
                    'tanggal_interview' => date('Y-m-d H:i', strtotime($this->input->post('tanggal_interview'))),
                    'tempat_interview' => $this->input->post('tempat_interview'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'tahap' => 'interview hrd',
                    'id_admin' => $this->session->userdata('id_admin'),
                    'status_call' => $this->input->post('status_call'),
                    'interviewer' => $this->session->userdata('fullname')
                );
                $history = array(
                'id_kandidat' => $this->input->post('id_kand'),
                'call_number' => $this->input->post('no_telpon'),
                'id_admin' => $this->session->userdata('id_admin'),
                'keterangan' => 'telpon dijawab'
                );
                $status_kandidat = array(
                'status_kandidat' => $this->input->post('status_kandidat'),
                'status_call' => $this->input->post('status_call'),
                'edit_caller_status' => '0'
            );
            $this->mcaller->save_history_call($history);
            $this->minterviewer->save_jadwal($data);
            $this->mcaller->update_status_kandidat(array('id_kandidat' => $this->input->post('id_kandidat')), $status_kandidat);
//            }
//            if ($this->input->post('status_kandidat') == '10') {
//                $hrd = array(
//                    'nama_lengkap' => $this->input->post('nama_lengkap'),
//                    'no_ktp' => $this->input->post('no_ktp'),
//                    'no_hp' => $this->input->post('no_hp'),
//                    'no_tlp' => $this->input->post('no_tlp'),
//                    'no_sim' => $this->input->post('no_sim'),
//                    'ktp_expired_date' => date('Y-m-d H:i', strtotime($this->input->post('ktp_expired_date'))),
//                    'sim_expired_date' => date('Y-m-d H:i', strtotime($this->input->post('sim_expired_date'))),
//                    'alamat' => $this->input->post('alamat'),
//                    'tempat_tinggal' => $this->input->post('tempat_tinggal'),
//                    'suku' => $this->input->post('suku'),
//                    'berat_badan' => $this->input->post('berat_badan'),
//                    'tinggi_badan' => $this->input->post('tinggi_badan'),
//                    'tempat_lahir' => $this->input->post('tempat_lahir'),
//                    'tgl_lahir' => date('Y-m-d H:i', strtotime($this->input->post('tgl_lahir'))),
//                    'pendidikan_level' => $this->input->post('pendidikan_level'),
//                    'gender' => $this->input->post('gender'),
//                    'kewarganegaraan' => $this->input->post('kewarganegaraan'),
//                    'agama' => $this->input->post('agama'),
//                    'gol_darah' => $this->input->post('gol_darah'),
//                    'gender' => $this->input->post('gender'),
//                    'hobby' => $this->input->post('hobby'),
//                    'pengalaman_memimpin' => $this->input->post('pengalaman_memimpin'),
//                    'pas_foto_file' => $this->input->post('pas_foto_file'),
//                    'cv_file' => $this->input->post('cv_file'),
//                    'ktp_scan_file' => $this->input->post('ktp_scan_file'));
//                    $this->minterviewer->onboard($hrd);
//            }

            
            
        }
        echo json_encode(array("status" => TRUE));
    }

    //EDIT
    private function _validate_interview_hrd() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('status_call') == '') {
            $data['inputerror'][] = 'status_call';
            $data['error_string'][] = 'status call Organisasi is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_add_jadwal_intervew_user() {
        $this->_validate_jadwal();
        $data = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'tanggal_interview' => date('Y-m-d H:i', strtotime($this->input->post('tanggal_interview'))),
            'keterangan' => $this->input->post('keterangan'),
            'tempat_interview' => $this->input->post('tempat_interview'),
            'no_hp' => $this->input->post('no_hp'),
            'no_tlp' => $this->input->post('no_tlp'),
            'status_call' => $this->input->post('status_call'),
            'status_kandidat' => $this->input->post('status_kandidat'),
            'interviewer' => $this->input->post('fullname')
        );

        if ($this->input->post('status_kandidat') == '10') {
            $hrd = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_ktp' => $this->input->post('no_ktp'),
                'no_hp' => $this->input->post('no_hp'),
                'no_tlp' => $this->input->post('no_tlp'),
                'no_sim' => $this->input->post('no_sim'),
                'ktp_expired_date' => date('Y-m-d H:i', strtotime($this->input->post('ktp_expired_date'))),
                'sim_expired_date' => date('Y-m-d H:i', strtotime($this->input->post('sim_expired_date'))),
                'alamat' => $this->input->post('alamat'),
                'tempat_tinggal' => $this->input->post('tempat_tinggal'),
                'suku' => $this->input->post('suku'),
                'berat_badan' => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => date('Y-m-d H:i', strtotime($this->input->post('tgl_lahir'))),
                'pendidikan_level' => $this->input->post('pendidikan_level'),
                'gender' => $this->input->post('gender'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                'agama' => $this->input->post('agama'),
                'gol_darah' => $this->input->post('gol_darah'),
                'gender' => $this->input->post('gender'),
                'hobby' => $this->input->post('hobby'),
                'pengalaman_memimpin' => $this->input->post('pengalaman_memimpin'),
                'pas_foto_file' => $this->input->post('pas_foto_file'),
                'cv_file' => $this->input->post('cv_file'),
                'ktp_scan_file' => $this->input->post('ktp_scan_file'));

            $this->minterviewer->onboard($hrd);
        }

        $data1 = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'status_kandidat' => $this->input->post('status_kandidat'),
            'status_call' => $this->input->post('status_call'),
            'edit_caller_status' => '0');

        $this->minterviewer->save_jadwal($data);
        $this->mcaller->update_status_kandidat(array('id_kandidat' => $this->input->post('id_kandidat')), $data1);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_jadwal_2() {

        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if ($this->input->post('status_kandidat') == '') {
            $data['inputerror'][] = 'status_kandidat';
            $data['error_string'][] = 'status kandidat is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_edit_result($id) {
        $data = $this->minterviewer->get_jadwalby_id($id);
        $data->id_jadwal_interview = $data->id_jadwal_interview;
        echo json_encode($data);
    }

    public function ajax_update_result() {
        $this->_validate_jadwal_result();
        $data = array(
            'id_jadwal_interview' => $this->input->post('id_jadwal_interview'),
            'hasil_interview' => $this->input->post('hasil_interview'));
        $this->minterviewer->update_jadwal(array('id_jadwal_interview' => $this->input->post('id_jadwal_interview')), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_jadwal_result() {

        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('hasil_interview') == '') {
            $data['inputerror'][] = 'hasil_interview';
            $data['error_string'][] = 'Hasil Interview is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
    }}

}
