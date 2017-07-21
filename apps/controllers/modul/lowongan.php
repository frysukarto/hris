<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
                $this->load->model(array('mlog','mkandidat_list','mhome','madmin','mbuku_tahunan','mlowongan'));
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
                
                $a['admin']['datatable']= $this->load->view('modul/lowongan',NULL,true);
                $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
                $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
                $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
                $this->load->view('pages/vlowongan',$a,FALSE);
	}

	public function ajax_list()
	{
		$list = $this->mlowongan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
			$no++;
			$row = array();
			$row[] = $admin->judul;
                        $row[] = $admin->deskripsi_pekerjaan;
			$row[] = $admin->lokasi;
                        $row[] = $admin->informasi_perusahaan;
			$row[] = $admin->mengapa_bergabung_dengan_kami;
			$row[] = '<a data-toggle="tooltip" class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_lowongan_kerja."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a data-toggle="tooltip" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_lowongan_kerja."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			$data[] = $row;
		}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->mlowongan->count_all(),
                "recordsFiltered" => $this->mlowongan->count_filtered(),
                "data" => $data,
				);
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->mlowongan->get_by_id($id);
		$data->id_lowongan_kerja =  $data->id_lowongan_kerja;
		echo json_encode($data);
	}
	
	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'judul' => $this->input->post('judul'),
				'deskripsi_pekerjaan' => $this->input->post('deskripsi_pekerjaan'),
                                'lokasi' => $this->input->post('lokasi'),
				'informasi_perusahaan' => $this->input->post('informasi_perusahaan'),
                                'mengapa_bergabung_dengan_kami' => $this->input->post('mengapa_bergabung_dengan_kami'),
			);
		$insert = $this->mlowongan->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
		$this->_validate();
		$data = array(
                    'judul' => $this->input->post('judul'),
                    'deskripsi_pekerjaan' => $this->input->post('deskripsi_pekerjaan'),
                    'lokasi' => $this->input->post('lokasi'),
                    'informasi_perusahaan' => $this->input->post('informasi_perusahaan'),
                    'mengapa_bergabung_dengan_kami' => $this->input->post('mengapa_bergabung_dengan_kami'),);
		$this->mlowongan->update(array('id_lowongan_kerja' => $this->input->post('id_lowongan_kerja')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_delete($id)
	{
		$this->mlowongan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'Full name is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('deskripsi_pekerjaan') == '')
		{
			$data['error_string'][] = 'deskripsi_pekerjaan is required';
			$data['inputerror'][] = 'deskripsi_pekerjaan';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('informasi_perusahaan') == '')
		{
			$data['error_string'][] = 'informasi_perusahaan is required';
			$data['inputerror'][] = 'informasi_perusahaan';
			$data['status'] = FALSE;
		}
                if($this->input->post('lokasi') == '')
		{
			$data['error_string'][] = 'lokasi is required';
			$data['inputerror'][] = 'lokasi';
			$data['status'] = FALSE;
		}
                if($this->input->post('mengapa_bergabung_dengan_kami') == '')
		{
			$data['error_string'][] = 'mengapa bergabung dengan kami is required';
			$data['inputerror'][] = 'mengapa_bergabung_dengan_kami';
			$data['status'] = FALSE;
		}
                
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
