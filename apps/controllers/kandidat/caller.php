<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
                $this->load->model(array('mkandidat','mlog','mkandidat_list','mhome','madmin','mcaller'));
                $this->load->library('form_validation');
                $this->is_logged_in();
	}
	public function index()
	{
                $a = array();
                $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
                $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
                $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
                $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
                $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
                $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css'); 
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
                
                //$a['html']['js'] .= add_js('/bootstrap/js/jquery.js');
                $a['html']['js'] .= add_js('/bootstrap/js/jquery.datetimepicker.full.min.js');
                //$a['html']['js'] .= add_js('/bootstrap/js/test.js');
                $t['interviewer'] = $this->madmin->get_admin_by_group();
                $t['kandidat_status'] = $this->mcaller->td_kandidat_status();
                $t['caller_status'] = $this->mcaller->td_caller_status();
                
                //$a['kandidat']['datatable']= $this->load->view('kandidat/vcaller',$t,true);
                $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
                $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
                $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
                
//                if ($prov_id != "") {
//                    $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
//                    $t['dropdowncity'] = $this->mkandidat->cms_list_kokab($prov_id);
//                    $t['dropdowncityAll'] = $this->mkandidat->cms_list_all_kokab();
//                    $t['list'] = $this->mkandidat->get_caller();
//                    $a['kandidat']['datatable']= $this->load->view('kandidat/vcaller',$t,true);
//                    $this->load->view('pages/vcaller',$a,FALSE);
//                } else {
//                    $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
//                    $t['dropdowncity'] = $this->mkandidat->cms_list_all_kokab();
//                    $t['list'] = $this->mkandidat->get_caller();
//                    $a['kandidat']['datatable']= $this->load->view('kandidat/vcaller',$t,true);
//                    $this->load->view('pages/vcaller',$a,FALSE);
//                }
                $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
                $t['list'] = $this->mcaller->get_caller();
                $a['kandidat']['datatable']= $this->load->view('kandidat/vcaller',$t,true);
                $this->load->view('pages/vcaller',$a,FALSE);
	}
        
        function caller_history()
        {
            $a = array();
            $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
            $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
            $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
            $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
            $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css'); 
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
            
            
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            
            $t['history'] = $this->mcaller->get_caller_history_byid();
            $a['kandidat']['datatable']= $this->load->view('kandidat/vcaller_history',$t,true);
            
            $this->load->view('pages/vcaller',$a,FALSE);  
        }

        public function filter()
	{
            $a = array();
            $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
            $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
            $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
            $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
            $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css'); 
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

            //$a['html']['js'] .= add_js('/bootstrap/js/jquery.js');
            $a['html']['js'] .= add_js('/bootstrap/js/jquery.datetimepicker.full.min.js');
            //$a['html']['js'] .= add_js('/bootstrap/js/test.js');
            $t['interviewer'] = $this->madmin->get_admin_by_group();
            $t['kandidat_status'] = $this->mcaller->td_kandidat_status();
            $t['caller_status'] = $this->mcaller->td_caller_status();

            //$a['kandidat']['datatable']= $this->load->view('kandidat/vcaller',$t,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
            $t['list'] = $this->mcaller->get_caller_filter();
            $a['kandidat']['datatable']= $this->load->view('kandidat/vcaller',$t,true);
            $this->load->view('pages/vcaller',$a,FALSE);                
	}
        
        public function ajax_list()
	{
		$list = $this->mcaller->get_datatables();
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
		if($admin->edit_caller_status == 1)
                { 
                    $onclick = '';
                }
                else 
                {
                   $onclick = '<a href="javascript:void(0)" title="Set Jadwal"  onclick="call_person('."'".$admin->id_kandidat."'".')" ><i class="fa fa-phone-square"></i></a>';
                }
                    $no++;
                    $row = array();
                    $row[] = $admin->nama_lengkap;
                    $row[] = $admin->no_ktp;
                    $row[] = $admin->no_tlp;
                    $row[] = $admin->email;
                    $row[] = $span;
                    $row[] = ' <a href="'.base_url().'view/'.$admin->id_kandidat.'/'.slug($admin->nama_lengkap).'" title="Edit"><i class="glyphicon glyphicon-search"></i></a>
                             '.$onclick.'';
                    $data[] = $row;
		}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->mcaller->count_all(),
                "recordsFiltered" => $this->mcaller->count_filtered(),
                "data" => $data,
				);
		echo json_encode($output);
	}
        
	public function ajax_edit($id)
	{
		$data = $this->mcaller->get_by_id($id);
		$data->id_kandidat =  $data->id_kandidat;
		echo json_encode($data);
	}
       
        
	public function ajax_edit_call_history($id)
	{
		$data = $this->mcaller->get_call_history_by_id($id);
		$data->id_kand =  $data->id_kand;
		echo json_encode($data);
	}
        
        
        public function ajax_set_jadwal($id)
	{
		$data = $this->mcaller->get_by_id($id);
		$data->id_buku_tahunan =  $data->id_buku_tahunan;
                //$this->mcaller->disable_edit($id);
		echo json_encode($data);
	}
	
	public function ajax_update()
	{
		$this->_validate();
		$data = array('status_kandidat' => $this->input->post('status_kandidat'),);
		$this->mcaller->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
		echo json_encode(array("status" => TRUE));
	}
        
        public function set_update_jadwal()
	{
		$this->_validate();
		$data = array(
                    'tanggal_interview' => date('Y-m-d H:i', strtotime(strtr($this->input->post('tanggal_interview')))),
                    'keterangan' => $this->input->post('keterangan'),
                    'tempat_interview' => $this->input->post('tempat_interview'),
                    'nama_interviewer' => $this->input->post('fullname'),
                    'status_call' => $this->input->post('status_call'),
                    'status_kandidat' => $this->input->post('status_kandidat')
                    );
		$this->mcaller->update_jadwal(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
		echo json_encode(array("status" => TRUE));
	}
        
        public function ajax_add_jadwal_intervew()
	{
            $this->_validate_jadwal();
            if($this->input->post('caller_status') == 2)
            {
             $kandidat = array(
                    'id_kand' => $this->input->post('id_kand'),
                    'nama_lengkap' => $this->input->post('nama_lengkap_b'),
                    'no_tlp' => $this->input->post('no_telpon'),
                    'alamat' => $this->input->post('alamat_bt'),
                    'pendidikan_level' => $this->input->post('pendidikan_terakhir'),
                    'gender' => $this->input->post('gender'),
                    'agama' => $this->input->post('agama'),
                    'age' => $this->input->post('umur'),
                    'status_kandidat' => $this->input->post('status_kandidat'),
            );
              $id = $this->mcaller->auto_id_kandidat();
            $juma = count($id);
            for($s = 0; $s < $juma; $s++) {
                 $x = $id[$s]['AUTO_INCREMENT'];
            }
                $data = array(
                'id_kandidat' => $x,
                'tanggal_interview' => date('Y-m-d H:i', strtotime($this->input->post('tanggal_interview'))),
                'tempat_interview' => $this->input->post('tempat_interview'),
                'id_admin' => $this->session->userdata('id_admin'),
                'interviewer' => $this->input->post('interviewer'),
                'no_tlp' => $this->input->post('no_telpon'),
                'tahap' => 'caller',
                'status_kandidat' => $this->input->post('status_kandidat')
            );
            
            $darurat = array('id_kandidat' => $x);
            $history = array(
                'id_kandidat' => $this->input->post('id_kand'),
                'call_number' => $this->input->post('no_telpon'),
                'id_admin' => $this->session->userdata('id_admin'),
                'keterangan' => 'telpon dijawab'
                );
            
            $this->mcaller->save_to_kandidat($kandidat);
            $this->mcaller->save_posisi_penempatan($darurat);
            $this->mcaller->save_keterangan($darurat);
            $this->mcaller->save_darurat_call($darurat);
            $this->mcaller->save_jadwal($data);
            $this->mcaller->save_history_call($history);
            }
            else if($this->input->post('caller_status') == 4)
            {
                $history = array(
                'id_kand' => $this->input->post('id_kand'),
                'call_number' => $this->input->post('no_telpon'),
                'id_admin' => $this->session->userdata('id_admin'),
                'keterangan' => 'telpon tidak dijawab'
                );
                $this->mcaller->save_history_call($history);
                $no_ans = array(
                    'caller_status' => $this->input->post('caller_status'),
                );
                
                $this->mcaller->update(array('id_buku_tahunan' => $this->input->post('id_buku_tahunan')), $no_ans);
            }
            else if($this->input->post('caller_status') == 5)
            {
                $history = array(
                'id_kand' => $this->input->post('id_kand'),
                'call_number' => $this->input->post('no_telpon'),
                'id_admin' => $this->session->userdata('id_admin'),
                'keterangan' => 'Reject : tidak minat'
                );
                $this->mcaller->save_history_call($history);
                $reject = array(
                    'caller_status' => $this->input->post('caller_status'),
                );
                
                $this->mcaller->update(array('id_buku_tahunan' => $this->input->post('id_buku_tahunan')), $reject);
            }
            else if($this->input->post('caller_status') == 6)
            {
                $history = array(
                'id_kand' => $this->input->post('id_kand'),
                'call_number' => $this->input->post('no_telpon'),
                'id_admin' => $this->session->userdata('id_admin'),
                'keterangan' => 'Reject : Sudah Bekerja'
                );
                $this->mcaller->save_history_call($history);
                $reject = array(
                    'caller_status' => $this->input->post('caller_status'),
                );
                
                $this->mcaller->update(array('id_buku_tahunan' => $this->input->post('id_buku_tahunan')), $reject);
            }
            else if($this->input->post('caller_status') == 7)
            {
                $history = array(
                'id_kand' => $this->input->post('id_kand'),
                'call_number' => $this->input->post('no_telpon'),
                'id_admin' => $this->session->userdata('id_admin'),
                'keterangan' => 'Reject : Lainnya'
                );
                $this->mcaller->save_history_call($history);
                $reject = array(
                    'caller_status' => $this->input->post('caller_status'),
                );
                $this->mcaller->update(array('id_buku_tahunan' => $this->input->post('id_buku_tahunan')), $reject);
            }
            else
            {
                $kandidat = array(
                    'caller_status' => $this->input->post('caller_status'),
                );
                $this->mcaller->update(array('id_kand' => $this->input->post('id_kand')), $data);
            }
            echo json_encode(array("status" => TRUE));
	}
        
        private function _validate_jadwal()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('caller_status') == '')
                {
                    $data['inputerror'][] = 'caller_status';
                    $data['error_string'][] = 'status call Organisasi is required';
                    $data['status'] = FALSE;
                }
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
        }
        
	public function ajax_delete($id)
	{
		$this->mcaller->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
        
	private function _validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;		
            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }
	}
        
        function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
        }
    }
}