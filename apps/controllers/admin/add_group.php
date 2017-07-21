<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_group extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
        $this->load->model(array('mlog','mkandidat','mhome'));
        $this->load->library('form_validation');
    }

    function index(){
        $this->form_validation->set_rules('nama_group', 'Group', 'trim|required');
        $group = addslashes($this->input->post('nama_group'));
        if ($this->form_validation->run() === TRUE) {
          $this->mhome->input_group($group);
        }
        redirect("group-menu");
    }
}
