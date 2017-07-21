<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
            $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
            $this->load->model(array('mlog','mkandidat','mhome','madmin'));
            $this->load->library('form_validation');
	}
	public function index()
	{
            $a = array();
            $a['html']['css'] = add_css('/bootstrap/css/bootstrap.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
            $a['html']['css'] .= add_css('/dist/css/AdminLTE.min.css');
            $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
            $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css');
            $a['html']['css'] .= add_css('/bootstrap/css/bootstrap-datepicker3.min.css');

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
            
            $a['count_entry_data'] = count($this->mhome->get_count_all_kandidat());
            
            $t['group'] = $this->mhome->get_group();
            $a['admin']['datatable']= $this->load->view('admin/admin_view',$t,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);

            $this->load->view('pages/vadmin_list_a',$a,FALSE);
	}
        
	public function ajax_list()
	{
		$list = $this->madmin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
			$no++;
			$row = array();
			$row[] = $admin->fullname;
			$row[] = $admin->username;
			$row[] = $admin->email;
                        $row[] = date('d-m-Y', strtotime(strtr($admin->tgl_lahir, '/', '-')));
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_admin."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                                  <a class="btn btn-sm btn-primary" href="'.  base_url().'admin-log/'.$admin->id_admin.'" title="View"><i class="glyphicon glyphicon-search"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_admin."'".')"><i class="glyphicon glyphicon-trash"></i></a>
                                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Reset" onclick="reset_admin('."'".$admin->id_admin."'".')"><i class="glyphicon glyphicon-retweet"></i></a>';
			$data[] = $row;
		}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->madmin->count_all(),
                "recordsFiltered" => $this->madmin->count_filtered(),
                "data" => $data,
				);
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
		$data = $this->madmin->get_by_id($id);
		$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
	public function ajax_add()
	{
            $this->_validate();
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'SIP' => $this->input->post('SIP'),
                'status' => 'active',
                'tgl_lahir' =>  date('Y-m-d', strtotime(strtr($this->input->post("tgl_lahir"), '/', '-'))),
                'id_admin_group' => $this->input->post('id_admin_group'),
                );
            $this->madmin->save($data);
            echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
            $this->_validate();
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'SIP' => $this->input->post('SIP'),
                'tgl_lahir' => date('Y-m-d', strtotime(strtr($this->input->post("tgl_lahir"), '/', '-'))),
                'id_admin_group' => $this->input->post('id_admin_group'),
                'password' => md5($this->input->post('password')),
            );
            $this->madmin->update(array('id_admin' => $this->input->post('id_admin')), $data);
            echo json_encode(array("status" => TRUE));
	}
	
        public function ajax_delete($id)
	{
            $this->madmin->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
	}
        
        public function ajax_reset_admin($id)
	{
            $data = array(
                'attempts' => '0',
                'password' => md5('welcome'),
            );
            $this->madmin->reset_admin(array('id_admin' => $id), $data);
            echo json_encode(array("status" => TRUE));
	}
        
	private function _validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('fullname') == '')
            {
                    $data['inputerror'][] = 'fullname';
                    $data['error_string'][] = 'Full name is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('email') == '')
            {
                    $data['inputerror'][] = 'email';
                    $data['error_string'][] = 'Email is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('SIP') == '')
            {
                    $data['inputerror'][] = 'SIP';
                    $data['error_string'][] = 'SIP is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('username') == '')
            {
                    $data['inputerror'][] = 'username';
                    $data['error_string'][] = 'Username is required';
                    $data['status'] = FALSE;
            }
            
            if($this->input->post('tgl_lahir') == '')
            {
                    $data['inputerror'][] = 'tgl_lahir';
                    $data['error_string'][] = 'Date of Birth is required';
                    $data['status'] = FALSE;
            }
            
            if($this->input->post('id_admin_group') == '')
            {
                    $data['inputerror'][] = 'id_admin_group';
                    $data['error_string'][] = 'Please select Group';
                    $data['status'] = FALSE;
            }

            if($this->input->post('password') == '')
            {
                    $data['inputerror'][] = 'password';
                    $data['error_string'][] = 'Password is required';
                    $data['status'] = FALSE;
            }
         
            if($data['status'] === FALSE)
            {
                    echo json_encode($data);
                    exit();
            }
	}
        
        function view_admin_detail()
        {
            $a = array();
            $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
            $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
            $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
            $a['html']['css'] .= add_css('/dist/css/AdminLTE.css');
            $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
            $a['html']['css'] .= add_css('/plugins/iCheck/flat/blue.css');
            $a['html']['css'] .= add_css('/plugins/morris/morris.css');
            $a['html']['css'] .= add_css('/plugins/jvectormap/jquery-jvectormap-1.2.2.css');
            $a['html']['css'] .= add_css('/plugins/datepicker/datepicker3.css');
            $a['html']['css'] .= add_css('/plugins/daterangepicker/daterangepicker-bs3.css');
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

            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            $id = $this->uri->segment(2);
            $t['log'] = $this->mlog->get_log_by_id($id);
            $t['profile']=$this->mhome->get_profile_admin($id);
            $a['admin']['datatable']= $this->load->view('admin/log_detail',$t,true);
            $this->load->view('pages/vadmin',$a,FALSE);}
}