<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
        $this->load->model(array('mlog','mkandidat','mhome'));
        $this->load->library('form_validation');
    }
    
    function index(){
        $a =array();
        
        $a['html']['css'] = add_css('/bootstrap/css/bootstrap.min.css');
       $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
       $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
       $a['html']['css'] .= add_css('/dist/css/AdminLTE.min.css');
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
        
       $a['admin']['datatable']= $this->load->view('admin/ganti_password',NULL,true);
        $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$a,true);
        $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
        $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
        $this->form_validation->set_rules('password', 'Group', 'trim|required');
        $password = md5($this->input->post('password'));
        $id = $this->session->userdata('id_admin');
        if ($this->form_validation->run() === TRUE) {
            $this->mhome->ganti_password($password,$id);
            redirect();
        }
        $this->load->view('pages/vadmin',$a,FALSE);
    }
    function check_oldpassword()
    {
        $oldpass = addslashes(md5($this->input->post('oldpassword')));
        $oldpasssess =$this->session->userdata('password');
        
        
        if($this->input->post('oldpassword')==''){echo "<span class='status-not-available'> Isi Kolom Password Lama! </span>";}
        else
        {
            if($oldpass == $oldpasssess){echo "<span class='status-available'>OK</span>";}
            else {echo "<span class='status-not-available'>Password Lama Salah</span>";}
        }
    }
}