<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
            $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
            $this->load->model(array('mlog','mkandidat','mhome','madmin','mbuku_tahunan'));
            $this->load->model('modul/m_modul_client_setting','m_modul_client_setting');
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
                
                $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
                $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
                $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
                //$this->load->view('pages/vmodul',$a,FALSE);
                
                
                $prov_id = $this->uri->segment(2, 0);
                $t['list'] = $this->m_modul_client_setting->get_client_list();
                if ($prov_id != "") {
                    $t['dropdownprov'] = $this->m_modul_client_setting->cms_list_prov();
                    $t['dropdowncity'] = $this->m_modul_client_setting->cms_list_kokab($prov_id);
                    $t['bidang_usaha'] = $this->m_modul_client_setting->get_bidang_usaha();
                    $a['admin']['datatable']= $this->load->view('modul/client',$t,true);
                    $this->load->view('pages/vmodul',$a,FALSE);
                } 
                
                else 
                {
                    $t['dropdownprov'] = $this->m_modul_client_setting->cms_list_prov();
                    $t['bidang_usaha'] = $this->m_modul_client_setting->get_bidang_usaha();
                    $a['admin']['datatable']= $this->load->view('modul/client',$t,true);
                    $this->load->view('pages/vmodul',$a,FALSE);
                }
                
	}
	
        public function ajax_call() {
            $id_cabang = $this->input->post('id_cabang');
            $data['sc_get'] = $this->m_modul_client_setting->cms_list_kokab($id_cabang);
            $sc = json_encode($data['sc_get']);
            echo $sc;
        }
        
        public function ajax_list()
	{
		$list = $this->m_modul_client_setting->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin){
			$no++;
			$row = array();
			$row[] = $admin->nama_perusahaan;
                        $row[] = $admin->nama_bidang_usaha;
                        $row[] = $admin->id_area;
			$row[] = $admin->id_cabang;
                        $row[] = $admin->tlp_perusahaan;
			$row[] = $admin->alamat_perusahaan;
                        $row[] = $admin->pic.'/<br>'.$admin->email;
			$row[] = '
                                <a data-toggle="tooltip" class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_modul_client_setting."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a data-toggle="tooltip" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_modul_client_setting."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			$data[] = $row;}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_modul_client_setting->count_all(),
                "recordsFiltered" => $this->m_modul_client_setting->count_filtered(),
                "data" => $data,);
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
            $data = $this->m_modul_client_setting->get_by_id($id);
            $data->id_modul_client_setting =  $data->id_modul_client_setting;
            echo json_encode($data);
	}
	public function ajax_add()
	{
            $this->_validate();
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'tlp_perusahaan' => $this->input->post('tlp_perusahaan'),
                'nama_bidang_usaha' =>$this->input->post('nama_bidang_usaha'),
                'email' => $this->input->post('email'),
                'id_area' => $this->input->post('id_area'),
                'id_cabang' => $this->input->post('id_cabang'),
                'pic' => $this->input->post('pic')
            );
            $this->m_modul_client_setting->save($data);
            echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
            $this->_validate();
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'tlp_perusahaan' => $this->input->post('tlp_perusahaan'),
                'nama_bidang_usaha' =>$this->input->post('nama_bidang_usaha'),
                'email' => $this->input->post('email'),
                'id_area' => $this->input->post('id_area'),
                'id_cabang' => $this->input->post('id_cabang'),
                'pic' => $this->input->post('pic'),);
            $this->m_modul_client_setting->update(array('id_modul_client_setting' => $this->input->post('id_modul_client_setting')), $data);
            echo json_encode(array("status" => TRUE));
	}
        
	public function ajax_delete($id)
	{
            $this->m_modul_client_setting->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
	}
        
	private function _validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('nama_perusahaan') == '')
            {
                    $data['inputerror'][] = 'nama_perusahaan';
                    $data['error_string'][] = 'Nama Perusahaan is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('tlp_perusahaan') == '')
            {
                    $data['inputerror'][] = 'tlp_perusahaan';
                    $data['error_string'][] = 'Tlp Perusahaan is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('alamat_perusahaan') == '')
            {
                    $data['inputerror'][] = 'alamat_perusahaan';
                    $data['error_string'][] = 'Alamat is required';
                    $data['status'] = FALSE;
            }
            
            if($this->input->post('nama_bidang_usaha') == '')
            {
                    $data['inputerror'][] = 'nama_bidang_usaha';
                    $data['error_string'][] = 'Bidang Usaha is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('email') == '')
            {
                    $data['inputerror'][] = 'email';
                    $data['error_string'][] = 'Email is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('id_cabang') == '')
            {
                    $data['inputerror'][] = 'id_cabang';
                    $data['error_string'][] = 'Cabang is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('id_area') == '')
            {
                    $data['inputerror'][] = 'id_area';
                    $data['error_string'][] = 'Area is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('pic') == '')
            {
                    $data['inputerror'][] = 'pic';
                    $data['error_string'][] = 'PIC is required';
                    $data['status'] = FALSE;
            }
            
            if($data['status'] === FALSE)
            {
                    echo json_encode($data);
                    exit();
            }
	}
}