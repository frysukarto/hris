<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_tahunan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
                $this->load->model(array('mlog','mkandidat','mhome','madmin','mbuku_tahunan'));
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
                $t['dropdownprov'] = $this->mkandidat->cms_list_prov();
                $a['admin']['datatable']= $this->load->view('modul/vbuku_tahunan',$t,true);
                $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
                $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
                $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
                
                $this->load->view('pages/vbuku_tahunan',$a,FALSE);
	}
	public function ajax_list()
	{
            $list = $this->mbuku_tahunan->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $admin) {
                    $no++;
                    $row = array();
                    $row[] = $admin->nama_lengkap_b;
                    $row[] = $admin->no_telpon;
                    $row[] = $admin->alamat_bt;
                    $row[] = $admin->pendidikan_terakhir;
                    $row[] = $admin->gender;
                    $row[] = '<a data-toggle="tooltip" class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$admin->id_buku_tahunan."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a data-toggle="tooltip" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$admin->id_buku_tahunan."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
                    $data[] = $row;
            }
            $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mbuku_tahunan->count_all(),
            "recordsFiltered" => $this->mbuku_tahunan->count_filtered(),
            "data" => $data,);
            echo json_encode($output);
	}
	public function ajax_edit($id)
	{
            $data = $this->mbuku_tahunan->get_by_id($id);
            $data->id_buku_tahunan =  $data->id_buku_tahunan;
            echo json_encode($data);
	}
	public function ajax_add()
	{
            $this->_validate();
            
            
            if(count($this->mbuku_tahunan->count_new_entry()) == '0' )
            {
                $dat ='0000000001';
            }
            else
            {
                $x = count($this->mbuku_tahunan->count_new_entry())+1;
                $dat = sprintf('%010d', $x);
            }

            $date= date("dmy");
            $id_kand = "VLD".$dat.$date;
            
            $data = array(
                'nama_lengkap_b' => $this->input->post('nama_lengkap_b'),
                'no_telpon' => $this->input->post('no_telpon'),
                'agama' => $this->input->post('agama'),
                'id_kand' => $id_kand,
                'umur' => $this->input->post('umur'),
                'provinsi' => $this->input->post('provinsi'),
                'alamat_bt' => $this->input->post('alamat_bt'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'gender' => $this->input->post('gender'),
            );
            $insert = $this->mbuku_tahunan->save($data);
            echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
            $this->_validate();
            $data = array(
                'nama_lengkap_b' => $this->input->post('nama_lengkap_b'),
                'no_telpon' => $this->input->post('no_telpon'),
                'gender' => $this->input->post('gender'),
                'agama' => $this->input->post('agama'),
                'umur' => $this->input->post('umur'),
                'provinsi' => $this->input->post('provinsi'),
                'alamat_bt' => $this->input->post('alamat_bt'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),

                );
            $this->mbuku_tahunan->update(array('id_buku_tahunan' => $this->input->post('id_buku_tahunan')), $data);
            echo json_encode(array("status" => TRUE));
	}
	public function ajax_delete($id)
	{
            $this->mbuku_tahunan->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
	}
	private function _validate()
	{
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            
            if($this->input->post('umur') == '')
            {
                    $data['inputerror'][] = 'umur';
                    $data['error_string'][] = 'Umur is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('agama') == '')
            {
                    $data['inputerror'][] = 'agama';
                    $data['error_string'][] = 'Agama is required';
                    $data['status'] = FALSE;
            }
            if($this->input->post('alamat_bt') == '')
            {
                    $data['inputerror'][] = 'alamat_bt';
                    $data['error_string'][] = 'Alamat is required';
                    $data['status'] = FALSE;
            }
            
            if($this->input->post('nama_lengkap_b') == '')
            {
                    $data['inputerror'][] = 'nama_lengkap_b';
                    $data['error_string'][] = 'Nama Lengkap is required';
                    $data['status'] = FALSE;
            }
            if($this->input->post('provinsi') == '')
            {
                    $data['inputerror'][] = 'provinsi';
                    $data['error_string'][] = 'Provinsi is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('no_telpon') == '')
            {
                    $data['inputerror'][] = 'no_telpon';
                    $data['error_string'][] = 'no telpon is required';
                    $data['status'] = FALSE;
            }
            if($this->input->post('alamat_bt') == '')
            {
                    $data['inputerror'][] = 'alamat_bt';
                    $data['error_string'][] = 'Alamat is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('pendidikan_terakhir') == '')
            {
                    $data['inputerror'][] = 'pendidikan_terakhir';
                    $data['error_string'][] = 'Asal Sekolah is required';
                    $data['status'] = FALSE;
            }

            if($this->input->post('gender') == '')
            {
                    $data['inputerror'][] = 'gender';
                    $data['error_string'][] = 'Gender is required';
                    $data['status'] = FALSE;
            }

            if($data['status'] === FALSE)
            {
                    echo json_encode($data);
                    exit();
            }
	}

}
