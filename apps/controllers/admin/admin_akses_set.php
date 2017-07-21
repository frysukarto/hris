<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_akses_set extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
        $this->load->model(array('mlog','mkandidat','mhome'));
        $this->load->library('form_validation');
    }

    function index(){
       $this->is_logged_in();
       $a = array();
       $a['html']['css'] = add_css('/bootstrap/css/bootstrap.min.css');
       $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
       $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
       $a['html']['css'] .= add_css('/dist/css/AdminLTE.min.css');
       $a['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
       $a['html']['css'] .= add_css('/plugins/datatables/dataTables.bootstrap.css');
       //$a['html']['css'] .= add_css('/bootstrap/css/bootstrap-confirm-delete.css');

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



       $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
       $this->form_validation->set_rules('id_admin_menu', 'Pilih Menu', 'trim|required');

       $nama_group =$this->uri->segment(3);
       $id_group=$this->uri->segment(2);

       $t['menu'] = $this->mhome->get_list_menu($id_group);
       $t['group'] = $this->mhome->get_group_by_id($id_group);
       $t['menudrop'] = $this->mhome->get_menu_onset_menu();

      $t['menudisplay'] = $this->mhome->get_list_menu($this->session->userdata('id_admin_group'));

    
        //exit();

       $id_admin_menu = $this->input->post('id_admin_menu');
       if ($this->form_validation->run() === TRUE)
       {
          $this->mhome->input_group_menu($id_admin_menu,$id_group);
          redirect('group-menu-set/'.$id_group.'/'.$nama_group);
       }

       $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$t,true);
       $a['admin']['datatable'] = $this->load->view('admin/vmenu_group_set',$t,TRUE);
       $a['template']['header'] = $this->load->view('template/vheader',NULL,TRUE);
       $this->load->view('pages/vadmin_list', $a, FALSE);

    }

    function delete_menu_set() {
        $id = $this->uri->segment(4);
        $this->mhome->delete_menu_set($id);
        redirect('group-menu-set/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
        }
    }
}
