<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psikotes extends CI_Controller {
        function __construct()
	{
            parent::__construct();
            $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
            $this->load->model(array('mlog','mkandidat_list','mhome','madmin','mcaller','mpsikotes','mkandidat'));
            $this->load->library('form_validation');
             $this->load->model('modul/m_modul_psikotes_setting','m_modul_psikotes_setting');
             $this->load->model('modul/m_modul_posisi_setting','m_modul_posisi_setting');
	}
        function index()
	{
            $a = array();
            $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
            $a['html']['css'] = add_css('/bootstrap/css/bootstrapnew.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
            $a['html']['css'] .= add_css('/plugins/daterangepicker/daterangepicker-bs3.css');
            $a['html']['css'] .= add_css('/plugins/datepicker/datepicker3.css');
            $a['html']['css'] .= add_css('/plugins/colorpicker/bootstrap-colorpicker.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/bootstrap-datepicker3.min.css');
            $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css');
            $a['html']['css'] .= add_css('/plugins/select2/select2.min.css');
            $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
            $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');

            $a['html']['js'] = add_js('/plugins/jQuery/jQuery-2.2.0.min.js');
            $a['html']['js'] .= add_js('/bootstrap/js/jquery-ui.min.js');
            $a['html']['js'] .= add_js('/bootstrap/js/bootstrap.min.js');
            $a['html']['js'] .= add_js('/plugins/select2/select2.full.min.js');

            $a['html']['js'] .= add_js('/plugins/input-mask/jquery.inputmask.js');
            $a['html']['js'] .= add_js('/plugins/input-mask/jquery.inputmask.date.extensions.js');
            $a['html']['js'] .= add_js('/plugins/input-mask/jquery.inputmask.extensions.js');
            $a['html']['js'] .= add_js('/plugins/datatables/jquery.dataTables.min.js');
            $a['html']['js'] .= add_js('/bootstrap/js/moment.min.js');
            $a['html']['js'] .= add_js('/plugins/datatables/dataTables.bootstrap.min.js');
            $a['html']['js'] .= add_js('/plugins/slimScroll/jquery.slimscroll.min.js');
            $a['html']['js'] .= add_js('/plugins/fastclick/fastclick.js');
            $a['html']['js'] .= add_js('/dist/js/app.min.js');
            $a['html']['js'] .= add_js('/dist/js/demo.js');
            $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-confirm-delete.js');
            $a['html']['js'] .= add_js('/bootstrap/js/test.js');
            $a['html']['js'] .= add_js('/plugins/datepicker/bootstrap-datepicker.js');
            $a['html']['js'] .= add_js('/plugins/daterangepicker/daterangepicker.js');
            $a['html']['js'] .= add_js('/plugins/colorpicker/bootstrap-colorpicker.min.js');
            $a['html']['js'] .= add_js('/plugins/timepicker/bootstrap-timepicker.min.js');
            
            $id = $this->input->post('id_kandidat');
            $t['psikotes']=$this->m_modul_psikotes_setting->get_psikotes_list_ist();
            $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
            $a['admin']['datatable']= $this->load->view('kandidat/vpsikotes',$t,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            
            $this->load->view('pages/vpsikotes',$a,FALSE);
	}
        
        function ajax_list()
	{
            $list = $this->mpsikotes->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $admin) {
                if($admin->status_kandidat == 1)
                {
                    $span ='<span class="label label-baru">Baru</span>';
                }
                else if($admin->status_kandidat == 2)
                {
                    $span ='<span class="label label-caller">Caller</span>';
                }
                else if($admin->status_kandidat == 3)
                {
                    $span ='<span class="label label-interview1">Interview 1</span>';
                }
                else if($admin->status_kandidat == 4)
                {
                    $span ='<span class="label label-interview2">Interview 2</span>';
                }
                else if($admin->status_kandidat == 5)
                {
                    $span ='<span class="label label-psikotes">Psikotes</span>';
                }
                else if($admin->status_kandidat == 6)
                {
                    $span ='<span class="label label-reject">Reject</span>';
                }
                else if($admin->status_kandidat == 7)
                {
                    $span ='<span class="label label-block">Blacklist</span>';
                }
                else if($admin->status_kandidat == 8)
                {
                    $span ='<span class="label label-blacklist">Block</span>';
                }
                else 
                {
                    $span ='<span class="label label-warning"></span>';
                }
                    $no++;
                    $row = array();
                    $row[] = $admin->nama_lengkap;
                    $row[] = $admin->no_ktp;
                    $row[] = $admin->no_tlp;
                    $row[] = $admin->email;
                    $row[] = $span;
                    $row[] = '<a data-toggle="tooltip" href="#" title="Set Jadwal" onclick="call_person('."'".$admin->id_kandidat."'".')" ><i class="glyphicon glyphicon-th-list"></i></a> '
                            . '<a data-toggle="tooltip" href="#" title="Set Kandidat Status" onclick="edit_psikotes('."'".$admin->id_kandidat."'".')" ><i class="glyphicon glyphicon-pencil"></i></a>';
                    $data[] = $row;
            }
            
            $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mpsikotes->count_all(),
            "recordsFiltered" => $this->mpsikotes->count_filtered(),
            "data" => $data,);
            echo json_encode($output);
	}
        
        function ajax_edit($id)
	{
            $data = $this->mpsikotes->get_by_id($id);
            $data->id_kandidat =  $data->id_kandidat;
            echo json_encode($data);
	}
        
        function jadwal_view($id)
	{
            $data = $this->mpsikotes->get_jadwal_by_id($id);
            $data->id_kandidat =  $data->id_kandidat;
            echo json_encode($data);
	}
        
        function ajax_set_jadwal($id)
	{
            $data = $this->mpsikotes->get_by_id($id);
            $data->id_kandidat =  $data->id_kandidat;
            echo json_encode($data);
	}
	
	function ajax_update()
	{
            $this->_validate_interview();
            $data = array('status_kandidat' => $this->input->post('status_kandidat'),);
            $this->mpsikotes->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
            echo json_encode(array("status" => TRUE));
	}
        
        function set_update_jadwal()
	{
            $this->_validate_interview();
            $data = array(
            'tanggal_interview' => $this->input->post('tanggal_interview'),
            'keterangan' => $this->input->post('keterangan'),
            'tempat_interview' => $this->input->post('tempat_interview'),
            );
            $this->mpsikotes->update_jadwal(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
            echo json_encode(array("status" => TRUE));
	}
        
        //        function ajax_add_jadwal_intervew()
        //	{
        //            $this->_validate_interview();
        //            $data = array(
        //                    'id_kandidat' => $this->input->post('id_kandidat'),
        //                    'tanggal_interview' => $this->input->post('tanggal_interview'),
        //                    'keterangan' => $this->input->post('keterangan'),
        //                    'tempat_interview' => $this->input->post('tempat_interview'),
        //            );
        //            $insert = $this->mpsikotes->save_jadwal($data);
        //            echo json_encode(array("status" => TRUE));
        //	}
        
	function ajax_delete($id)
	{
		$this->mpsikotes->delete_by_id($id);
                
		echo json_encode(array("status" => TRUE));
	}
        
        public function ajax_add_jadwal_intervew()
	{
		$this->_validate_jadwal();
		$data = array(
                    'id_kandidat' => $this->input->post('id_kandidat'),
                    'id_modul_interviewer_setting' => $this->input->post('id_modul_interviewer_setting'),
                    'tanggal_interview' => date('Y-m-d H:i', strtotime($this->input->post('tanggal_interview'))),
                    'keterangan' => $this->input->post('keterangan'),
                    'tempat_interview' => $this->input->post('tempat_interview'),
                    'no_hp' => $this->input->post('no_hp'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'status_call' => $this->input->post('status_call'),
                    'status_kandidat' => $this->input->post('status_kandidat')
		);
                
                $data1 = array(
                    'id_kandidat' => $this->input->post('id_kandidat'),
                    'status_kandidat' => $this->input->post('status_kandidat'),
                    'status_call' => $this->input->post('status_call'),
                    'edit_caller_status' => '0'
		);
                
		$this->mcaller->save_jadwal($data);
                //$this->mcaller->update_status_kandidat(array('id_kandidat' => $this->input->post('id_kandidat')), $data1);
		echo json_encode(array("status" => TRUE));
	}
        private function _validate_psikotes()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

                if($this->input->post('email') == '')
                {
                    $data['inputerror'][] = 'email';
                    $data['error_string'][] = 'Email is required';
                    $data['status'] = FALSE;
                }

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	} 
        
        function ajax_kirim_email()
        {
            $this->_validate_psikotes();
            $config['protocol'] = "smtp";
            $config['smtp_host'] = 'mail.valdo-intl.com'; 
            $config['smtp_port'] = '587';
            $config['smtp_user'] = 'ferry.sukarto@valdo-intl.com';
            $config['smtp_pass'] = 'Pa$$word01';
            
            $config['mailtype'] = 'text';
            $config['validate'] = TRUE;
            $config['smtp_timeout'] = 5;
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;

            $this->load->library('email');

            $this->email->initialize($config);
            $this->email->from('ferry.sukarto@valdo-intl.com','Valdo Inc');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Psikotes Online');
            $this->email->message($this->input->post('ist').'<br>'.$this->input->post('papi').'<br>'.$this->input->post('cfit').'<br>'.$this->input->post('disk'));
            $this->email->set_mailtype("html");
            $this->email->set_crlf( "\r\n" );
            $this->email->send();
        }
        
}