<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou_page_kandidat_public extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
        $this->load->library(array('form_validation','image_lib'));
        $this->load->model(array('mlog','mkandidat'));
        //$this->is_logged_in();
    }
    function index()
    {
        $a = array();
        $token = $_GET['token'];
        $key = $_GET['key'];
        $secret_key = $_GET['secret_key'];
        
        
        $a['token'] = sha1(date('dmy'));
        $a['key'] = md5($a['token']);
        $t['secret_key']= sha1($a['key']);
        
        
        if($token == $a['token'] && $key == $a['key'] && $secret_key == $t['secret_key'])
        {
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
        $this->load->view('kandidat/thankyou_page_public', $a, FALSE);
        }
        else {redirect('http://www.valdoinc.com');}
    }
}