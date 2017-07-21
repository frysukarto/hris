<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper(array('header','url','security'));
        $this->load->model(array('mlog','mhome'));
        $this->load->library('form_validation');
        //$this->is_logged_in();
    }
    
    function index()
    {
       $a = array();
       $a['html']['css'] = add_css('/bootstrap/css/bootstrap.css');
       $a['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
       $a['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
       $a['html']['css'] .= add_css('/dist/css/AdminLTE.min.css');
       $a['html']['css'] .= add_css('/plugins/iCheck/square/blue.css');
       
       $a['html']['js'] = add_js('/plugins/jQuery/jQuery-2.2.0.min.js');
       $a['html']['js'] .= add_js('/bootstrap/js/bootstrap.min.js');
       $a['html']['js'] .= add_js('/plugins/iCheck/icheck.min.js');
       
       
       $this->form_validation->set_rules('login', 'Username', 'trim|required');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_ceklogin');
       if ($this->form_validation->run() == TRUE) 
       {
           redirect('dashboard');
       }
       $this->load->view('home/vlogin', $a, FALSE);
    }
    
    function ceklogin() {
        //$email = addslashes($this->input->post('login'));
        $username = addslashes($this->input->post('login'));
        $password = addslashes(md5($this->input->post('password')));
        $data = $this->mhome->validate($username, $password);
        $jum = count($data);
        $login_check = $this->mhome->login_attempts_check($username);
        if(count($login_check)>0){
        if($login_check[0]['attempts']>3)
        {$this->form_validation->set_message('ceklogin', 'Account Blocked');
        echo '<script>alert("This account has entered wrong password 3 times!\n Please contact Administrator")</script>';
        return false;
        }
         else {
        if ($jum == 0) 
        {
            $this->form_validation->set_message('ceklogin', 'Username and password do not match');
            $this->mhome->login_attempts_wrong($username);
            return false;
        } 
        else 
        {
            $this->mlog->log_login();
            $this->mhome->login_attempts_true($username);
            return true;
    }}
    }}

    function is_logged_in(){
        $user_id = $this->session->userdata('id_admin');
        if($user_id > 0){
            redirect('dashboard');
        }
    }
    
    function logout() {
        $this->session->sess_destroy();
        header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
        header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
        header ("Cache-Control: no-cache, must-revalidate");  
        header ("Pragma: no-cache");
        $this->mlog->log_logout();
        redirect('login');
    }
}
