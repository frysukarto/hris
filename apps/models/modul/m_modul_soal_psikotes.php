<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_modul_soal_psikotes extends CI_Model {

    var $table = 'td_modul_soal_psikotes';
    var $column_order = array('soal_psikotes','pilihan_A','pilihan_B','pilihan_C','pilihan_D','jawaban',null);
    var $column_search = array('soal_psikotes','pilihan_A','pilihan_B','pilihan_C','pilihan_D','jawaban');
    var $order = array('id_modul_soal_psikotes' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function get_soal_psikotes_list() {
        $sql = "SELECT * FROM td_modul_soal_psikotes WHERE id_modul_psikotes_setting = ".$this->uri->segment(2);
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_jawab_soal_psikotes_list() {
        $sql = "SELECT * FROM td_modul_soal_psikotes WHERE id_modul_psikotes_setting = ".$this->uri->segment(2)." ORDER BY RAND() LIMIT 11";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    private function _get_datatables_query() {
       $id = $this->uri->segment(2);
       $this->db->where("id_modul_psikotes_setting = '$id'");
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $id = strip_tags($this->uri->segment(2));
        $this->db->where("id_modul_psikotes_setting = '$id'");
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where('id_modul_soal_psikotes', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id) {
        $this->db->where('td_modul_ist_psikotes', $id);
        $this->db->delete($this->table);
    }
    
    function insert_jawaban_psikotes($id_kandidat,$jenis_psikotes,$jawaban_benar,$jawaban_salah,$nilai) {
        $sql = "INSERT INTO td_modul_psikotes_result(id_kandidat,jenis_psikotes,jawaban_benar,jawaban_salah,nilai)VALUES('$id_kandidat','$jenis_psikotes','$jawaban_benar','$jawaban_salah','$nilai')";
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    
     function input_organisasi($no_urut, $opsi1, $opsi2) {

        $data =$this->input->post('no_urut');
        $count = count($data);
        
        for($i = 0; $i < $count; $i++){
                $da[]= array(
                    'no_urut'=>$no_urut[$i],
                    'opsi1'=>$opsi1[$i],
                    'opsi2'=>$opsi2[$i]);
        }
        $this->db->insert_batch('td_organisasi',  $da);      
    }
    
    function auto_id_kandidat() 
    {
    $sql = 'SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = "pasopati" AND TABLE_NAME = "td_modul_psikotes_setting" ';
    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
    }
    
    function insert_firts_ist_psikotes($urutan,$deret1,$deret2,$deret3,$deret4,$deret5,$deret6,$deret7,$jawaban){
    $id = $this->auto_id_kandidat();
    $juma = count($id);
    for ($s = 0; $s < $juma; $s++) {
         $x = $id[$s]['AUTO_INCREMENT'];
    }
    for($i=0; $i<20; $i++){
        $da[]= array(
            'urutan'=>$urutan[$i],
            'deret1'=>$deret1[$i],
            'deret2'=>$deret2[$i],
            'deret3'=>$deret3[$i],
            'deret4'=>$deret4[$i],
            'deret5'=>$deret5[$i],
            'deret6'=>$deret6[$i],
            'deret7'=>$deret7[$i],
            'jawaban'=>$jawaban[$i],
            'id_jenis_psikotes'=>$x
            );
        }
        
        $this->db->insert_batch('td_modul_ist_psikotes',$da);  
    }
    
    function insert_ist_psikotes($urutan,$deret1,$deret2,$deret3,$deret4,$deret5,$deret6,$deret7,$jawaban){
    for($i=0; $i<20; $i++){
        $da[]= array(
            'urutan'=>$urutan[$i],
            'deret1'=>$deret1[$i],
            'deret2'=>$deret2[$i],
            'deret3'=>$deret3[$i],
            'deret4'=>$deret4[$i],
            'deret5'=>$deret5[$i],
            'deret6'=>$deret6[$i],
            'deret7'=>$deret7[$i],
            'jawaban'=>$jawaban[$i],
            'id_jenis_psikotes'=>$this->uri->segment(2)
            );
        }
        
        $this->db->insert_batch('td_modul_ist_psikotes',$da);  
    }
    function delete_duplicat_data_psikotes() {
        $sql = "DELETE FROM td_modul_ist_psikotes WHERE id_jenis_psikotes =".$this->uri->segment(2);
        $this->db->query($sql);
        return TRUE;
    }
    
    function insert_jawaban_hasil_psikotes($urutan,$id_kan,$deret1,$deret2,$deret3,$deret4,$deret5,$deret6,$deret7,$jawaban){
//    $id = $this->auto_id_kandidat();
//    $juma = count($id);
//    for ($s = 0; $s < $juma; $s++) {
//         $x = $id[$s]['AUTO_INCREMENT'];
//    }
    for($i=0; $i<20; $i++){
        $da[]= array(
            'urutan'=>$urutan[$i],
            'id_kandidat'=>$id_kan[$i],
            'deret1'=>$deret1[$i],
            'deret2'=>$deret2[$i],
            'deret3'=>$deret3[$i],
            'deret4'=>$deret4[$i],
            'deret5'=>$deret5[$i],
            'deret6'=>$deret6[$i],
            'deret7'=>$deret7[$i],
            'jawaban'=>$jawaban[$i]
            );
        }
        var_dump($da);
        exit();
        $this->db->insert_batch('td_modul_jawaban_hasil_ist',$da);  
    }
    
    function get_data_psikotes_ist() {
        $sql = "SELECT * FROM td_modul_ist_psikotes WHERE id_jenis_psikotes =".$this->uri->segment(2)." ORDER BY urutan ASC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_pendidikan_by_kandidat_id($id) {
        $sql = "SELECT pendidikan_level FROM td_kandidat WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_data_psikotes_papi() {
        $sql = "SELECT * FROM td_modul_papi_psikotes ORDER BY no_urut ASC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function input_papi_kostic($no_urut,$opsi1, $opsi2) {

        $data =$this->input->post('opsi1');
        $count = count($data);
//        $id = $this->auto_id_kandidat();
//        $juma = count($id);
//        for ($s = 0; $s < $juma; $s++) {
//             $x = $id[$s]['AUTO_INCREMENT'];
//        }
//        
        for($i = 0; $i < $count; $i++){
                $da[]= array(
                    'no_urut'=>$no_urut[$i],
                    'opsi1'=>$opsi1[$i],
                    'opsi2'=>$opsi2[$i]);
        }
       
        $this->db->insert_batch('td_modul_papi_psikotes',  $da);      
    }  
}