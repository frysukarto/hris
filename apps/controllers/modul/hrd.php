<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
                $this->load->model(array('mlog','mkandidat_list','mhome','madmin','mkandidat','mcaller','mhrd'));
                $this->load->library(array('form_validation','m_pdf'));
	}
         function index()
	{
                $this->is_logged_in();
                $a = array();
                $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
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

                $t['kandidat_status'] = $this->mcaller->td_kandidat_status();
                $t['group'] = $this->mhome->get_group();
                $a['admin']['datatable']= $this->load->view('hrd/database',$t,true);
                $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
                $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
                $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
                $this->load->helper('url');
                $this->load->view('pages/vhrd',$a,FALSE);
	}
        
	public function ajax_list()
	{
                $list = $this->mhrd->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
                   
                
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $admin->nama_lengkap;
                $row[] = $admin->no_ktp;
                $row[] = $admin->no_tlp;
                $row[] = $admin->email;
                $row[] = '<a data-toggle="tooltip" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_kar."'".')"><i class="glyphicon glyphicon-cog"></i></a>
                          <a data-toggle="tooltip" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_kar."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
                $data[] = $row;
		}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->mhrd->count_all(),
                "recordsFiltered" => $this->mhrd->count_filtered(),
                "data" => $data,
				);
		echo json_encode($output);
		
	}
        
	public function ajax_edit($id)
	{
		$data = $this->mhrd->get_by_id($id);
		$data->id_kar =  $data->id_kar;
		echo json_encode($data);
	}
	public function ajax_add()
	{
		$this->_validate();
		$data = array(
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'no_ktp' => $this->input->post('no_ktp'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'email' => $this->input->post('email'),
                );
		$insert = $this->mhrd->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
		$this->_validate();
		$data = array('status_kandidat' => $this->input->post('status_kandidat'),);
		$this->mhrd->update(array('id_kandidat' => $this->input->post('id_kandidat')), $data);
                //$this->mlog->log_action();
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_delete($id)
	{
		$this->mkandidat_list->delete_by_id($id);
                $this->mlog->log_deletedata();
		echo json_encode(array("status" => TRUE));
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('status_kandidat') == '')
		{
			$data['inputerror'][] = 'status_kandidat';
			$data['error_string'][] = 'Status is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}   
       function create_pdf() {
       // if ($this->session->userdata('policy_no') != "") {
        if($_GET['print']== 'pdf'){
        $x = $_GET['range'];
        $tang = explode("-",preg_replace('/\s/', '', $x));
        
        $date1 = date('Y-m-d', strtotime($tang[0]));
        $date2 = date('Y-m-d', strtotime($tang[1]));
        
        $t['list'] = $this->mhrd->export_kandidat_list_by_date($date1,$date2);
//        var_dump($t['list']);
//        var_dump($x);
//        exit();
//        var_dump($tang);
//        var_dump($date1,$date2);
//        exit();
        $html = $this->load->view('print/print_kandidat_list', $t, true);
        //$pdfFilePath = str_replace(' ', '_', $t['list'][0]['nama_lengkap']) . '_' . $t['list'][0]['no_ktp'] . ".pdf";
        $pdfFilePath = "List_kandidat.pdf";
        $pdf = $this->m_pdf->load();
        $pdf->showImageErrors = true;
        $pdf->AddPage('P', // L - landscape, P - portrait
        '','','','',
        0, // margin_left
        0, // margin right
        0, // margin top
        0, // margin bottom
        0, // margin header
        0); // margin footer
        //
        //$pdf->SetProtection(array(),$t['list'][0]['policy_no']);
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");}
        else 
        {
            $x = $_GET['range'];
            $tang = explode("-",preg_replace('/\s/', '', $x));

            $date1 = date('Y-m-d', strtotime($tang[0]));
            $date2 = date('Y-m-d', strtotime($tang[1]));
            $t['list']=$this->mhrd->export_kandidat_list_by_date($date1,$date2);
            $this->load->view('print/print_kandidat_list_excel',$t, FALSE);
        }
    }
    
    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
        }
    }
    
}