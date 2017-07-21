<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Psikotes extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
            $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
            $this->load->model('modul/m_modul_psikotes_setting','m_modul_psikotes_setting');
            $this->load->model('modul/m_modul_soal_psikotes','m_modul_soal_psikotes');
            $this->load->library(array('form_validation','image_lib'));
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

            $a['admin']['datatable']= $this->load->view('modul/psikotes',NULL,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            $this->load->view('pages/vmodul',$a,FALSE);
	}

	public function ajax_list()
	{
		$list = $this->m_modul_psikotes_setting->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
                    $no++;
                    if($admin->jenis_psikotes == "papi")
                    {
                        $link = '<a data-toggle="tooltip"  target="_blank" href="'.base_url().'mod-psikotes-papi-online/'.$admin->id_modul_psikotes_setting.'?psikotes='.$admin->jenis_psikotes.'" title="Lihat Tampilan" )"><i class="glyphicon glyphicon-th-list"></i></a>';
                    }
                    else if($admin->jenis_psikotes == "ist")
                    {
                        $link = '<a data-toggle="tooltip"  target="_blank" href="'.base_url().'mod-psikotes-ist-online/'.$admin->id_modul_psikotes_setting.'?psikotes='.$admin->jenis_psikotes.'" title="Lihat Tampilan" )"><i class="glyphicon glyphicon-th-list"></i></a>';
                    }
                    else
                    {
                        $link = '<a data-toggle="tooltip"  target="_blank" href="'.base_url().'mod-psikotes-ist-online/'.$admin->id_modul_psikotes_setting.'?psikotes='.$admin->jenis_psikotes.'" title="Lihat Tampilan" )"><i class="glyphicon glyphicon-th-list"></i></a>';
                    }  
                    $row = array();
                    $row[] = $admin->nama_psikotes;
                    $row[] = $admin->jenis_psikotes;
                    $row[] = '<a data-toggle="tooltip"  href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_modul_psikotes_setting."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a data-toggle="tooltip"  href="'.base_url().'mod-soal-psikotes/'.$admin->id_modul_psikotes_setting.'?psikotes='.$admin->jenis_psikotes.'" title="Insert"><i class="glyphicon glyphicon-edit"></i></a>
                              <a data-toggle="tooltip"  href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_modul_psikotes_setting."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
                    $data[] = $row;
            }
            $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_modul_psikotes_setting->count_all(),
            "recordsFiltered" => $this->m_modul_psikotes_setting->count_filtered(),
            "data" => $data);
            echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->m_modul_psikotes_setting->get_by_id($id);
		$data->id_modul_psikotes_setting =  $data->id_modul_psikotes_setting;
		echo json_encode($data);
	}
	
	public function ajax_add()
	{
		$this->_validate();
		$data = array(
                    'nama_psikotes' => $this->input->post('nama_psikotes'),
                    'date_create'=> date("Y-m-d H:m:s"),
                    'jenis_psikotes' => $this->input->post('jenis_psikotes'));
		$this->m_modul_psikotes_setting->save($data);
                
		echo json_encode(array("status" => TRUE));
                $this->add_ist_psikotes();
	}
	public function ajax_update()
	{
            $this->_validate();
            $data = array(
            'nama_psikotes' => $this->input->post('nama_psikotes'),
            'jenis_psikotes' => $this->input->post('jenis_psikotes'),);
            $this->m_modul_psikotes_setting->update(array('id_modul_psikotes_setting'=>$this->input->post('id_modul_psikotes_setting')), $data);
            echo json_encode(array("status" => TRUE));
	}
        
	public function ajax_delete($id)
	{
            $this->m_modul_psikotes_setting->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
	}
	
        private function _validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;
            if($this->input->post('nama_psikotes') == '')
            {
                    $data['inputerror'][] = 'nama_psikotes';
                    $data['error_string'][] = 'Nama Psikotes is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('jenis_psikotes') == '')
            {
                    $data['error_string'][] = 'Jenis Psikotes is required';
                    $data['inputerror'][] = 'jenis_psikotes';
                    $data['status'] = FALSE;
            }

            if($data['status'] === FALSE)
            {
                    echo json_encode($data);
                    exit();
            }
	}
        
        function modul_soal_psikotes()
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
            
        if($_GET['psikotes']=='ist')
         {  
            $urutan=$this->input->post('urutan');
            $deret1=$this->input->post('deret1');
            $deret2=$this->input->post('deret2');
            $deret3=$this->input->post('deret3');
            $deret4=$this->input->post('deret4');
            $deret5=$this->input->post('deret5');
            $deret6=$this->input->post('deret6');
            $deret7=$this->input->post('deret7');
            $jawaban=$this->input->post('jawaban');
            $this->form_validation->set_rules('persetujuan', 'persetujuan Harus diisi', 'trim|required');
            if ($this->form_validation->run() === TRUE) 
            {
                $this->m_modul_soal_psikotes->delete_duplicat_data_psikotes();
                $this->m_modul_soal_psikotes->insert_ist_psikotes($urutan,$deret1,$deret2,$deret3,$deret4,$deret5,$deret6,$deret7,$jawaban);
            }

            $t['ist']=$this->m_modul_soal_psikotes->get_data_psikotes_ist();
            $a['admin']['datatable']= $this->load->view('modul/modul_psikotes_ist',$t,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
         }
         
         else if($_GET['psikotes']=='papi') {
            $t['ist']=$this->m_modul_soal_psikotes->get_data_psikotes_ist();
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            $this->form_validation->set_rules('opsi1[]', 'opsi1 Harus diisi', 'trim|required');
            $opsi1= $this->input->post('opsi1');
            $opsi2= $this->input->post('opsi2');
            $no_urut = $this->input->post('no_urut');
            
            if ($this->form_validation->run() === TRUE)
            {
               $this->m_modul_soal_psikotes->input_papi_kostic($no_urut,$opsi1,$opsi2);
            }
            $a['admin']['datatable']= $this->load->view('modul/modul_psikotes_papi',$t,true);
         }
         
         else if ($_GET['psikotes']=='cfit') {
            $t['ist']=$this->m_modul_soal_psikotes->get_data_psikotes_ist();
            $a['admin']['datatable']= $this->load->view('modul/modul_psikotes_cfit',$t,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            
            if ($this->form_validation->run() === TRUE) {
                $config['upload_path'] = $this->config->item('upload_temp');
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                //                $soal ="";
                //                $jawaban ="";
                //                $pilihan1 ="";
                //                $pilihan2 ="";
                //                $pilihan3 ="";
                //                $pilihan4 ="";
                //                $pilihan5 ="";
                
            }
            
         }
         else if ($_GET['psikotes']=='disk') {
            $t['ist']=$this->m_modul_soal_psikotes->get_data_psikotes_ist();
            $a['admin']['datatable']= $this->load->view('modul/modul_psikotes_disk',$t,true);
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
         }
         else {redirect('mod-psikotes');}
         $this->load->view('pages/vmodul',$a,FALSE);
       }
        
        function add_ist_psikotes()
        {
           $urutan=$this->input->post('urutan');
           $deret1=$this->input->post('deret1');
           $deret2=$this->input->post('deret2');
           $deret3=$this->input->post('deret3');
           $deret4=$this->input->post('deret4');
           $deret5=$this->input->post('deret5');
           $deret6=$this->input->post('deret6');
           $deret7=$this->input->post('deret7');
           $jawaban=$this->input->post('jawaban');
            
           $this->form_validation->set_rules('persetujuan', 'persetujuan Harus diisi', 'trim|required');
            
           $this->m_modul_soal_psikotes->delete_duplicat_data_psikotes();
           $this->m_modul_soal_psikotes->insert_firts_ist_psikotes($urutan,$deret1,$deret2,$deret3,$deret4,$deret5,$deret6,$deret7,$jawaban);
           //redirect(base_url().'mod-soal-psikotes/'.$this->uri->segment(2).'?psikotes=ist'); 
        }


        public function soal_ajax_list()
	{
		$list = $this->m_modul_soal_psikotes->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
                    $no++;
                    $row = array();
                    $row[] = $admin->soal_psikotes;
                    $row[] = $admin->pilihan_A;
                    $row[] = $admin->pilihan_B;
                    $row[] = $admin->pilihan_C;
                    $row[] = $admin->pilihan_D;
                    $row[] = $admin->jawaban;
                    $row[] = '<a href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_modul_soal_psikotes."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_modul_soal_psikotes."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
                    $data[] = $row;
		}
		$output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_modul_soal_psikotes->count_all(),
                "recordsFiltered" => $this->m_modul_soal_psikotes->count_filtered(),
                "data" => $data);
		echo json_encode($output);
	}
        public function soal_ajax_edit($id)
	{
		$data = $this->m_modul_soal_psikotes->get_by_id($id);
		$data->id_modul_soal_psikotes =  $data->id_modul_soal_psikotes;
		echo json_encode($data);
	}
	
	public function soal_ajax_add()
	{
            $this->_soal_validate();
            $data = array(
                'id_modul_psikotes_setting' => $this->input->post('id_modul_psikotes_setting'),
                'soal_psikotes' => $this->input->post('soal_psikotes'),
                'pilihan_A'=> $this->input->post('pilihan_A'),
                'pilihan_B'=> $this->input->post('pilihan_B'),
                'pilihan_C'=> $this->input->post('pilihan_C'),
                'pilihan_D'=> $this->input->post('pilihan_D'),
                'jawaban' => $this->input->post('jawaban'));
            $this->m_modul_soal_psikotes->save($data);
            echo json_encode(array("status" => TRUE));
	}
	public function soal_ajax_update()
	{
		$this->_soal_validate();
		$data = array(
                    'id_modul_soal_psikotes' => $this->input->post('id_modul_soal_psikotes'),
                    'soal_psikotes' => $this->input->post('soal_psikotes'),
                    'pilihan_A'=> $this->input->post('pilihan_A'),
                    'pilihan_B'=> $this->input->post('pilihan_B'),
                    'pilihan_C'=> $this->input->post('pilihan_C'),
                    'pilihan_D'=> $this->input->post('pilihan_D'),
                    'jawaban' => $this->input->post('jawaban'));
                //$this->m_modul_soal_psikotes->update(array('id_modul_psikotes_setting' => $this->input->post('id_modul_psikotes_setting')), $data);
		$this->m_modul_soal_psikotes->update(array('id_modul_soal_psikotes' => $this->input->post('id_modul_soal_psikotes')), $data);
		echo json_encode(array("status" => TRUE));
	}
        
	public function soal_ajax_delete($id)
	{
		$this->m_modul_soal_psikotes->delete_by_id($id);
                $this->m_modul_psikotes_setting->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
        
	private function _soal_validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('soal_psikotes') == '')
            {
                    $data['inputerror'][] = 'soal_psikotes';
                    $data['error_string'][] = 'Soal Psikotes is required';
                    $data['status'] = FALSE;
            }
            if($this->input->post('pilihan_A') == '')
            {
                    $data['error_string'][] = 'Pilihan A is required';
                    $data['inputerror'][] = 'pilihan_A';
                    $data['status'] = FALSE;
            }
            if($this->input->post('pilihan_B') == '')
            {
                    $data['error_string'][] = 'Pilihan B is required';
                    $data['inputerror'][] = 'pilihan_B';
                    $data['status'] = FALSE;
            }
            if($this->input->post('pilihan_C') == '')
            {
                    $data['error_string'][] = 'Pilihan C is required';
                    $data['inputerror'][] = 'pilihan_C';
                    $data['status'] = FALSE;
            }
            if($this->input->post('pilihan_D') == '')
            {
                    $data['error_string'][] = 'Pilihan D is required';
                    $data['inputerror'][] = 'pilihan_D';
                    $data['status'] = FALSE;
            }
            if($this->input->post('jawaban') == '')
            {
                    $data['error_string'][] = 'jawaban is required';
                    $data['inputerror'][] = 'jawaban';
                    $data['status'] = FALSE;
            }

            if($data['status'] === FALSE)
            {
                    echo json_encode($data);
                    exit();
            }
	}
        
        function modul_jawab_soal_papi_psikotes()
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
            $a['html']['js'] .= add_js('/plugins/morris/morris.min.js');
            $a['html']['js'] .= add_js('/dist/js/app.min.js');
            $a['html']['js'] .= add_js('/dist/js/demo.js');
            $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-confirm-delete.js');
            $a['html']['js'] .= add_js('/bootstrap/js/test.js');
            $a['html']['js'] .= add_js('/bootstrap/js/bootstrap-datepicker.min.js');
            
            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            
            $t['papi']=$this->m_modul_soal_psikotes->get_data_psikotes_papi();
            $a['admin']['datatable']= $this->load->view('modul/jawab_soal_papi_psikotes',$t,true);
            
            $no_urut =$this->input->post('no_urut');
            $opsi1 =$this->input->post('opsi1');
            $opsi2 =$this->input->post('opsi2');
            
            $this->form_validation->set_rules('no_urut[]', 'Jawaban Harus diisi', 'trim|required|xss_clean');
            if ($this->form_validation->run() === TRUE && $this->input->post('jawaban1') !="") 
            {
                $this->m_modul_soal_psikotes->insert_jawaban_psikotes_papi($no_urut,$opsi1,$opsi2);
            }
            $this->load->view('pages/vpsikotes_public',$a,FALSE);
        }
        
        function modul_jawab_soal_ist_psikotes()
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
            
            //$p['pend']=$this->m_modul_soal_psikotes->get_pendidikan_by_kandidat_id($_GET['id']);
            $t['ist']=$this->m_modul_soal_psikotes->get_data_psikotes_ist();
            $a['admin']['datatable']= $this->load->view('modul/jawab_soal_ist_psikotes',$t,true);
            
            
            
            $this->form_validation->set_rules('jawaban1', 'Jawaban Harus diisi', 'trim|required|xss_clean');
            
            if ($this->form_validation->run() === TRUE && $this->input->post('jawaban1') !="") {
                $id_kandidat="1";
                $jenis_psikotes="ist";
                
                if($t['ist'][0]['jawaban']==$this->input->post('jawaban1')){$nilai1=1;}else{$nilai1=0;}
                if($t['ist'][1]['jawaban']==$this->input->post('jawaban2')){$nilai2=1;}else{$nilai2=0;}
                if($t['ist'][2]['jawaban']==$this->input->post('jawaban3')){$nilai3=1;}else{$nilai3=0;}
                if($t['ist'][3]['jawaban']==$this->input->post('jawaban4')){$nilai4=1;}else{$nilai4=0;}    
                if($t['ist'][4]['jawaban']==$this->input->post('jawaban5')){$nilai5=1;}else{$nilai5=0;}
                if($t['ist'][5]['jawaban']==$this->input->post('jawaban6')){$nilai6=1;}else{$nilai6=0;}
                if($t['ist'][6]['jawaban']==$this->input->post('jawaban7')){$nilai7=1;}else{$nilai7=0;}
                if($t['ist'][7]['jawaban']==$this->input->post('jawaban8')){$nilai8=1;}else{$nilai8=0;}
                if($t['ist'][8]['jawaban']==$this->input->post('jawaban9')){$nilai9=1;}else{$nilai9=0;}
                if($t['ist'][9]['jawaban']==$this->input->post('jawaban10')){$nilai10=1;}else{$nilai10=0;}
                if($t['ist'][10]['jawaban']==$this->input->post('jawaban11')){$nilai11=1;}else{$nilai11=0;}
                if($t['ist'][11]['jawaban']==$this->input->post('jawaban12')){$nilai12=1;}else{$nilai12=0;}
                if($t['ist'][12]['jawaban']==$this->input->post('jawaban13')){$nilai13=1;}else{$nilai13=0;}
                if($t['ist'][13]['jawaban']==$this->input->post('jawaban14')){$nilai14=1;}else{$nilai14=0;}    
                if($t['ist'][14]['jawaban']==$this->input->post('jawaban15')){$nilai15=1;}else{$nilai15=0;}
                if($t['ist'][15]['jawaban']==$this->input->post('jawaban16')){$nilai16=1;}else{$nilai16=0;}
                if($t['ist'][16]['jawaban']==$this->input->post('jawaban17')){$nilai17=1;}else{$nilai17=0;}
                if($t['ist'][17]['jawaban']==$this->input->post('jawaban18')){$nilai18=1;}else{$nilai18=0;}
                if($t['ist'][18]['jawaban']==$this->input->post('jawaban19')){$nilai19=1;}else{$nilai19=0;}
                if($t['ist'][19]['jawaban']==$this->input->post('jawaban20')){$nilai20=1;}else{$nilai20=0;}
                
                $nilai = $nilai1+$nilai2+$nilai3+$nilai4+$nilai5+$nilai6+$nilai7+$nilai8+$nilai9+$nilai10+$nilai11+$nilai12+$nilai13+$nilai14+$nilai15+$nilai16+$nilai17+$nilai18+$nilai19+$nilai20;
                $jawaban_benar = $nilai;
                $jawaban_salah = 20 - $jawaban_benar;
                
//                    if($nilai==1){$poin=81;}
//                    else if($nilai==2){$poin=84;}
//                    else if($nilai==3){$poin=86;}
//                    else if($nilai==4){$poin=88;}
//                    else if($nilai==5){$poin=91;}
//                    else if($nilai==6){$poin=93;}
//                    else if($nilai==7){$poin=95;}
//                    else if($nilai==8){$poin=96;}
//                    else if($nilai==9){$poin=100;}
//                    else if($nilai==10){$poin=102;}
//                    else if($nilai==11){$poin=105;}
//                    else if($nilai==12){$poin=107;}
//                    else if($nilai==13){$poin=109;}
//                    else if($nilai==14){$poin=112;}
//                    else if($nilai==15){$poin=114;}
//                    else if($nilai==16){$poin=116;}
//                    else if($nilai==17){$poin=119;}
//                    else if($nilai==18){$poin=121;}
//                    else if($nilai==19){$poin=123;}
//                    else if($nilai==20){$poin=126;}
//                    else{$poin=0;}
                
                if($nilai==1){$poin=64;}
                else if($nilai==2){$poin=68;}
                else if($nilai==3){$poin=72;}
                else if($nilai==4){$poin=76;}
                else if($nilai==5){$poin=80;}
                else if($nilai==6){$poin=84;}
                else if($nilai==7){$poin=88;}
                else if($nilai==8){$poin=92;}
                else if($nilai==9){$poin=96;}
                else if($nilai==10){$poin=100;}
                else if($nilai==11){$poin=104;}
                else if($nilai==12){$poin=108;}
                else if($nilai==13){$poin=112;}
                else if($nilai==14){$poin=116;}
                else if($nilai==15){$poin=120;}
                else if($nilai==16){$poin=124;}
                else if($nilai==17){$poin=128;}
                else if($nilai==18){$poin=133;}
                else if($nilai==19){$poin=136;}
                else if($nilai==20){$poin=140;}
                else{$poin=0;}
                
                $this->m_modul_soal_psikotes->insert_jawaban_psikotes($id_kandidat,$jenis_psikotes,$jawaban_benar,$jawaban_salah,$poin);
                redirect('terimakasih');
                }
            
            $this->load->view('pages/vpsikotes_public',$a,FALSE);
        }
        
        function modul_jawab_soal_ist_psikotes_sma()
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
            
            $p['pend']=$this->m_modul_soal_psikotes->get_pendidikan_by_kandidat_id($_GET['id']);
            $t['ist']=$this->m_modul_soal_psikotes->get_data_psikotes_ist();
            $a['admin']['datatable']= $this->load->view('modul/jawab_soal_ist_psikotes_sma',$t,true);
            
            
            
            $this->form_validation->set_rules('jawaban1', 'Jawaban Harus diisi', 'trim|required|xss_clean');
            
            if ($this->form_validation->run() === TRUE && $this->input->post('jawaban1') !="") {
                $id_kandidat="1";
                $jenis_psikotes="ist";
                
                if($t['ist'][0]['jawaban']==$this->input->post('jawaban1')){$nilai1=1;}else{$nilai1=0;}
                if($t['ist'][1]['jawaban']==$this->input->post('jawaban2')){$nilai2=1;}else{$nilai2=0;}
                if($t['ist'][2]['jawaban']==$this->input->post('jawaban3')){$nilai3=1;}else{$nilai3=0;}
                if($t['ist'][3]['jawaban']==$this->input->post('jawaban4')){$nilai4=1;}else{$nilai4=0;}    
                if($t['ist'][4]['jawaban']==$this->input->post('jawaban5')){$nilai5=1;}else{$nilai5=0;}
                if($t['ist'][5]['jawaban']==$this->input->post('jawaban6')){$nilai6=1;}else{$nilai6=0;}
                if($t['ist'][6]['jawaban']==$this->input->post('jawaban7')){$nilai7=1;}else{$nilai7=0;}
                if($t['ist'][7]['jawaban']==$this->input->post('jawaban8')){$nilai8=1;}else{$nilai8=0;}
                if($t['ist'][8]['jawaban']==$this->input->post('jawaban9')){$nilai9=1;}else{$nilai9=0;}
                if($t['ist'][9]['jawaban']==$this->input->post('jawaban10')){$nilai10=1;}else{$nilai10=0;}
                if($t['ist'][10]['jawaban']==$this->input->post('jawaban11')){$nilai11=1;}else{$nilai11=0;}
                if($t['ist'][11]['jawaban']==$this->input->post('jawaban12')){$nilai12=1;}else{$nilai12=0;}
                if($t['ist'][12]['jawaban']==$this->input->post('jawaban13')){$nilai13=1;}else{$nilai13=0;}
                if($t['ist'][13]['jawaban']==$this->input->post('jawaban14')){$nilai14=1;}else{$nilai14=0;}    
                if($t['ist'][14]['jawaban']==$this->input->post('jawaban15')){$nilai15=1;}else{$nilai15=0;}
                if($t['ist'][15]['jawaban']==$this->input->post('jawaban16')){$nilai16=1;}else{$nilai16=0;}
                if($t['ist'][16]['jawaban']==$this->input->post('jawaban17')){$nilai17=1;}else{$nilai17=0;}
                if($t['ist'][17]['jawaban']==$this->input->post('jawaban18')){$nilai18=1;}else{$nilai18=0;}
                if($t['ist'][18]['jawaban']==$this->input->post('jawaban19')){$nilai19=1;}else{$nilai19=0;}
                if($t['ist'][19]['jawaban']==$this->input->post('jawaban20')){$nilai20=1;}else{$nilai20=0;}
                
                $nilai = $nilai1+$nilai2+$nilai3+$nilai4+$nilai5+$nilai6+$nilai7+$nilai8+$nilai9+$nilai10+$nilai11+$nilai12+$nilai13+$nilai14+$nilai15+$nilai16+$nilai17+$nilai18+$nilai19+$nilai20;
                $jawaban_benar = $nilai;
                $jawaban_salah = 20 - $jawaban_benar;
                
                    if($nilai==1){$poin=81;}
                    else if($nilai==2){$poin=84;}
                    else if($nilai==3){$poin=86;}
                    else if($nilai==4){$poin=88;}
                    else if($nilai==5){$poin=91;}
                    else if($nilai==6){$poin=93;}
                    else if($nilai==7){$poin=95;}
                    else if($nilai==8){$poin=96;}
                    else if($nilai==9){$poin=100;}
                    else if($nilai==10){$poin=102;}
                    else if($nilai==11){$poin=105;}
                    else if($nilai==12){$poin=107;}
                    else if($nilai==13){$poin=109;}
                    else if($nilai==14){$poin=112;}
                    else if($nilai==15){$poin=114;}
                    else if($nilai==16){$poin=116;}
                    else if($nilai==17){$poin=119;}
                    else if($nilai==18){$poin=121;}
                    else if($nilai==19){$poin=123;}
                    else if($nilai==20){$poin=126;}
                    else{$poin=0;}
                
                $this->m_modul_soal_psikotes->insert_jawaban_psikotes($id_kandidat,$jenis_psikotes,$jawaban_benar,$jawaban_salah,$poin);
                //$a['terimakasih'] = "Anda Sudah Menyelesaikan Psikotes";
                redirect('terimakasih');
                }
            
            $this->load->view('pages/vpsikotes_public',$a,FALSE);
        }
        
        function thankyoupage()
        {
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

            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            $this->load->view('pages/thankyou_page', $a, FALSE);
        }
        
        function instruksi_ist()
        {
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

            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',NULL,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            
            $t['psikotes']=$this->m_modul_psikotes_setting->get_psikotes_list_ist();
            if($this->uri->segment(3) == "sma")
            {$a['startpsikotes'] = base_url().'mod-psikotes-ist-online-sma/'.$t['psikotes'][0]['id_modul_psikotes_setting'].'?psikotes=ist&id='.$this->uri->segment(2).'&pen='.$this->uri->segment(3).'&token='.md5('ist').'&secret_key='.sha1($this->uri->segment(2));}
            else{$a['startpsikotes'] = base_url().'mod-psikotes-ist-online/'.$t['psikotes'][0]['id_modul_psikotes_setting'].'?psikotes=ist&id='.$this->uri->segment(2).'&pen='.$this->uri->segment(3).'&token='.md5('ist').'&secret_key='.sha1($this->uri->segment(2));}
            

            $a['title'] = "IST PSIKOTES";
            $a['download_pdf'] = base_url().'assets/downloads/Pelatihan_Alat_Tes.pdf';
            $a['download_ppt'] = base_url().'assets/downloads/Pelatihan_Alat_Tes.pptx';
            $this->load->view('modul/instruksi_psikotes', $a, FALSE);
        }
        
        function typingtest()
        {
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

            $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',NULL,true);
            $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
            $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
            $this->load->view('modul/typingtes', $a, FALSE);
        }
        
        
}