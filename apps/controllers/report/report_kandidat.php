<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_kandidat extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->helper(array('url','weburi','header','file','contentdate','stringurl','textlimiter','security'));
        $this->load->model(array('mlog','mkandidat_list','mkandidat','mhome','madmin','mbuku_tahunan','mlowongan'));
        $this->load->library('form_validation');
        $this->load->library('m_pdf');
        
    }
    
     function create_report() {
       // if ($this->session->userdata('policy_no') != "") {
        if($_GET['print']== 'pdf'){
        $x = $_GET['range'];
        $tang = explode("-",preg_replace('/\s/', '', $x));
        
        $date1 = date('Y-m-d', strtotime($tang[0]));
        $date2 = date('Y-m-d', strtotime($tang[1]));
        
        $t['list'] = $this->mkandidat->export_kandidat_list_by_date($date1,$date2);
//        var_dump($t['list']);
//        var_dump($x);
//        exit();
//        var_dump($tang);
//        var_dump($date1,$date2);
//        exit();
        $html = $this->load->view('report/print_kandidat_list', $t, true);
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
            $t['list']=$this->mkandidat->export_kandidat_list_by_date($date1,$date2);
            $this->load->view('report/print_kandidat_list_excel',$t, FALSE);
        }
        
    }
    
    function create_pdf_as_cv_by_id() {
        
        $t['html']['css'] = add_css('/bootstrap/css/bootstrap.min.css');
        $t['html']['css'] .= add_css('/bootstrap/css/font-awesome.min.css');
        $t['html']['css'] .= add_css('/bootstrap/css/ionicons.min.css');
        $t['html']['css'] .= add_css('/dist/css/AdminLTE.min.css');
        $t['html']['css'] .= add_css('/dist/css/skins/_all-skins.min.css');
        $t['html']['css'] .= add_css('/plugins/iCheck/flat/blue.css');
        $t['html']['css'] .= add_css('/plugins/morris/morris.css');
        $t['html']['css'] .= add_css('/plugins/jvectormap/jquery-jvectormap-1.2.2.css');
        $t['html']['css'] .= add_css('/plugins/datepicker/datepicker3.css');
        $t['html']['css'] .= add_css('/plugins/daterangepicker/daterangepicker-bs3.css');
        $t['html']['css'] .= add_css('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');


        $id = $this->uri->segment(4);
        $t['kandidat'] = $this->mkandidat->get_kandidat_list_byid($id);
        $t['ketla'] = $this->mkandidat->get_keterangan_lain_byid($id);
        $t['darurat'] = $this->mkandidat->get_darurat_byid($id);
        $t['organisasi'] = $this->mkandidat->get_organisasi_byid($id);
        $t['pengalaman'] = $this->mkandidat->get_pengalaman_kerja_byid($id);
        $t['referensi'] = $this->mkandidat->get_referensi_byid($id);
        $t['keluarga'] = $this->mkandidat->get_keluarga_byid($id);
        $t['kemampuan_k'] = $this->mkandidat->get_kemampuan_komputer_byid($id);
        $t['kemampuan_b'] = $this->mkandidat->get_kemampuan_bahasa_byid($id);
        $t['kursus'] = $this->mkandidat->get_kursus_byid($id);
        $t['pendidikan'] = $this->mkandidat->get_pendidikan_formal_byid($id);
        $html = $this->load->view('report/create_pdf_as_cv_by_id', $t, true);
        $pdfFilePath = str_replace(' ', '_', $t['kandidat'][0]['nama_lengkap']) . '_' . $t['kandidat'][0]['id_kandidat'] . ".pdf";
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
    }

}
