<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mcaller extends CI_Model {

    var $table = 'td_buku_tahunan';
    var $column_order = array('nama_lengkap_b', 'no_telpon', 'agama', null);
    var $column_search = array('nama_lengkap_b', 'no_telpon', 'agama');
    var $order = array('id_buku_tahunan' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->where("status_kandidat = 2");
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

    function get_caller()
    {
       $sql = "SELECT * FROM td_buku_tahunan";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
//     function get_caller_filter()
//    {
//        $gender =$_GET['gender'];
//        $pendidikan =$_GET['pendidikan'];
//        $usia =$_GET['gender'];
//        $agama =$_GET['agama'];
//        $wilayah =$_GET['provinsi_id'];
//        $dari =$_GET['dari'];
//        $sampai =$_GET['sampai'];
//        $genders = $gender=="" ? "" : "AND a.gender = '$gender'";
//        $pend = $pendidikan=="" ? "" : "AND a.pendidikan_level = '$pendidikan'";
//        if($dari=="" && $sampai==""){$usias="";}
//        else{$usias="AND age BETWEEN $dari AND $sampai";}
//        $agamas = $agama =="" ? "" : "AND a.agama = '$agama'";
//        $wilayahs = $wilayah=="" ? "" : "AND c.provinsi_id = '$wilayah'";
//        $sql = "SELECT a.*,b.*,c.* FROM td_kandidat as a 
//                INNER JOIN td_kandidat_posisi_penempatan as b on a.id_kandidat = b.id_kandidat    
//                INNER JOIN master_provinsi as c on b.provinsi_id = c.provinsi_id
//                WHERE status_kandidat = 2 ".$genders.$pend.$agamas.$wilayahs.$usias;
//        $query = $this->db->query($sql);
//        $data = array();
//        if ($query !== FALSE && $query->num_rows() > 0) {
//            $data = $query->result_array();
//        }
//        return $data;
//    }
    
    function get_caller_filter()
    {
        $gender =$_GET['gender'];
        $pendidikan =$_GET['pendidikan'];
        $usia =$_GET['gender'];
        $agama =$_GET['agama'];
        $wilayah =$_GET['provinsi_id'];
        $dari =$_GET['dari'];
        $sampai =$_GET['sampai'];
        $genders = $gender=="" ? "" : "AND gender = '$gender'";
        $pend = $pendidikan=="" ? "" : "AND pendidikan_terakhir = '$pendidikan'";
        if($dari=="" && $sampai==""){$usias="";}
        else{$usias="AND umur BETWEEN $dari AND $sampai";}
        $agamas = $agama =="" ? "" : "AND agama = '$agama'";
        $wilayahs = $wilayah=="" ? "" : "AND provinsi = '$wilayah'";
        $sql = "SELECT * FROM td_buku_tahunan WHERE umur < 100
                 ".$genders.$pend.$agamas.$wilayahs.$usias;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where('status_kandidat',2);
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
    
    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    
    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where('id_buku_tahunan', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_call_history_by_id($id) {
        $this->db->from($this->table);
        $this->db->where('id_kand', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_by_id($id) {
        $this->db->where('id_kandidat', $id);
        $this->db->delete($this->table);
    }
    
    function get_notlp($id) {
        $sql = "SELECT no_tlp, no_hp FROM td_kandidat WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    public function update_status_kandidat($where, $data) {
        $this->db->update('td_kandidat', $data, $where);
        return $this->db->affected_rows();
    }
    
    function save_jadwal($data) {
        $this->db->insert('td_jadwal_interview', $data);
        return $this->db->insert_id();
    }
    
    public function update_jadwal($where, $data) {
        $this->db->update('td_jadwal_interview', $data, $where);
        return $this->db->affected_rows();
    }
    
    function td_modul_interviewer_setting() {
        $sql = "SELECT * FROM td_modul_interviewer_setting ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function td_caller_status() {
        $sql = "SELECT * FROM td_status_call ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    function td_kandidat_status() {
        $sql = "SELECT * FROM td_status_kandidat ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_caller_history_byid() {
        $sql = "SELECT * FROM td_call_history WHERE id_kand =".$this->uri->segment(2);
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
     function disable_edit($id_kandidat) {
        $sql = "UPDATE td_kandidat SET edit_caller_status = 1 WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    
    
    public function save_to_kandidat($data) {
        $this->db->insert('td_kandidat', $data);
        return $this->db->insert_id();
    }
    public function save_keterangan($data) {
        $this->db->insert('td_keterangan_lain', $data);
        return $this->db->insert_id();
    }
    public function save_darurat_call($data) {
        $this->db->insert('td_darurat_call', $data);
        return $this->db->insert_id();
    }
    public function save_posisi_penempatan($data) {
        $this->db->insert('td_kandidat_posisi_penempatan', $data);
        return $this->db->insert_id();
    }
    public function save_history_call($data) {
        $this->db->insert('td_call_history', $data);
        return $this->db->insert_id();
    }
    function delete_kandidat() {
        
        $this->db->where('id_kand', $this->input->post('id_kand'));
        $this->db->delete('td_buku_tahunan');
    }
    
    function auto_id_kandidat() 
    {
        $sql = 'SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = "pasopati" AND TABLE_NAME = "td_kandidat" ';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    public function update_kandidat($where, $data) {
        $this->db->update('td_buku_tahunan', $data, $where);
        return $this->db->affected_rows();
    }
}