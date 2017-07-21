<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_view_kandidat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'weburi', 'header', 'file', 'contentdate', 'stringurl', 'textlimiter', 'security'));
        $this->load->model(array('mlog', 'mkandidat_list', 'mkandidat', 'mhome', 'madmin', 'mbuku_tahunan', 'mlowongan'));
        $this->load->library(array('form_validation', 'image_lib'));
    }
    
    function delete_view_organisasi() {
        $this->mkandidat->delete_view_organisasi($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_referensi() {
        $this->mkandidat->delete_view_referensi($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_keluarga() {
        $this->mkandidat->delete_view_keluarga($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_pendidikan() {
        $this->mkandidat->delete_view_pendidikan($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_pengalaman() {
        $this->mkandidat->delete_view_pengalaman($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_kemkomputer() {
        $this->mkandidat->delete_view_kemkomputer($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_kembahasa() {
        $this->mkandidat->delete_view_kembahasa($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
    function delete_view_kursus() {
        $this->mkandidat->delete_view_kursus($this->uri->segment(4));
        redirect('view/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
    }
}