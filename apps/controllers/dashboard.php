<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
        $this->load->model(array('mlog','mkandidat','mkandidat_list','mhome','madmin','mbuku_tahunan','mlowongan'));
        $this->load->library('form_validation');
        $this->is_logged_in();
    }

    function index()
    {
       $this->is_logged_in();
       $a = array();
       
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
       
       //$id_group=$this->uri->segment(2);
       $t['group'] = $this->mhome->get_list_menu($this->session->userdata('id_admin_group'));
       $t['baru'] = count($this->mhome->get_count_new_kandidat());
       $t['blokir'] = count($this->mhome->get_count_blokir_kandidat());
       $t['aktif'] = count($this->mhome->get_count_aktif_kandidat());
       $t['caller'] = count($this->mhome->get_count_caller_kandidat());
       
       $a['home']['user'] = $this->load->view('home/vdashboard_user',$t,true);
       $a['template']['sidebarmenu'] = $this->load->view('template/vsidebarmenu',$t,true);
       $a['template']['footer'] = $this->load->view('template/vfooter',NULL,true);
       $a['template']['header'] = $this->load->view('template/vheader',NULL,true);
       
       $t['log'] = $this->mlog->get_log();
       $a['admin']['log'] = $this->load->view('home/vadmin_activity',$t,true);
       $this->load->view('home/vdashboard', $a, FALSE);
    }
    
    function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('');
        }
    }
    
}