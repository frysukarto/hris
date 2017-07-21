<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
            $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
            $this->load->model(array('mlog','mkandidat','mhome','madmin','mbuku_tahunan'));
            $this->load->model('modul/marea','marea');
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
                
                $t['cabang'] = $this->marea->get_cabang();
                $t['list'] = $this->marea->get_area();
                $a['admin']['datatable']= $this->load->view('modul/area',$t,true);
     
                $this->load->view('pages/vmodul',$a,FALSE);
	}
	
        public function ajax_list()
	{
		$list = $this->marea->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin){
			$no++;
			$row = array();
			$row[] = $admin->nama_area;
                        $row[] = $admin->nama_cabang;
			$row[] = '<a data-toggle="tooltip" class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_area."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a data-toggle="tooltip" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_area."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			$data[] = $row;}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->marea->count_all(),
                "recordsFiltered" => $this->marea->count_filtered(),
                "data" => $data,);
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
            $data = $this->marea->get_by_id($id);
            $data->id_area =  $data->id_area;
            echo json_encode($data);
	}
	public function ajax_add()
	{
            $this->_validate();
            $data = array(
                'id_cabang' => $this->input->post('id_cabang'),
                'nama_area' => $this->input->post('nama_area')
            );
            $this->marea->save($data);
            echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
            $this->_validate();
            $data = array(
                'id_cabang' => $this->input->post('id_cabang'),
                'nama_area' => $this->input->post('nama_area'));
            $this->marea->update(array('id_area' => $this->input->post('id_area')), $data);
            echo json_encode(array("status" => TRUE));
	}
        
	public function ajax_delete($id)
	{
            $this->marea->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
	}
        
	private function _validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('id_cabang') == '')
            {
                    $data['inputerror'][] = 'id_cabang';
                    $data['error_string'][] = 'Nama Cabang is required';
                    $data['status'] = FALSE;
            }
             if($this->input->post('nama_area') == '')
            {
                    $data['inputerror'][] = 'nama_area';
                    $data['error_string'][] = 'Nama Area is required';
                    $data['status'] = FALSE;
            }
          
            if($data['status'] === FALSE)
            {
                    echo json_encode($data);
                    exit();
            }
            
	}
}