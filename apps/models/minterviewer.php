<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Minterviewer extends CI_Model {

    var $table = 'td_kandidat';
    var $column_order = array('nama_lengkap', 'no_ktp', 'no_tlp', 'email', null);
    var $column_search = array('nama_lengkap', 'no_ktp', 'no_tlp', 'email');
    var $order = array('id_kandidat' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->where("status_kandidat = 3")->or_where("status_kandidat = 4");
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
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where("status_kandidat = 3")->or_where("status_kandidat = 4");
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
        $this->db->where('id_kandidat', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_jadwal_by_id($id) {
        $this->db->from('td_jadwal_interview');
        $this->db->where('id_kandidat', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_by_id($id) {
        $this->db->where('id_kandidat', $id);
        $this->db->delete($this->table);
    }

    function get_notlp($id) {
        $sql = "SELECT no_tlp, no_hp FROM td_kandidat WHERE id_kandidat =" . $id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function save_jadwal($data) {
        $this->db->insert('td_jadwal_interview', $data);
        return $this->db->insert_id();
    }

    public function update_jadwal($where, $data) {
        $this->db->update('td_jadwal_interview', $data, $where);
        return $this->db->affected_rows();
    }

    function get_jadwal_interview_by_id($id) {
        $sql = "SELECT * FROM td_jadwal_interview 
                WHERE id_kandidat = $id ORDER BY created DESC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    function onboard($data)
    {
        $this->db->insert('td_karyawan', $data);
        return $this->db->insert_id(); 
    }
    
    public function get_jadwalby_id($id) {
        $this->db->from('td_jadwal_interview');
        $this->db->where('id_jadwal_interview', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    
    
//    function onboard($id)
//    {
//        $sql = "INSERT INTO td_karyawan(nama_lengkap, no_ktp, no_tlp, no_sim, no_hp, ktp_expired_date, sim_expired_date, alamat, tempat_tinggal, suku, berat_badan, tinggi_badan, tempat_lahir, tgl_lahir, pendidikan_level, gender, kewarganegaraan, agama, gol_darah, email, last_update_time, create_time, password, hobby, pengalaman_memimpin, pas_foto_file, cv_file, ktp_scan_file, ijazah_file, lamaran_file) SELECT
//                                         nama_lengkap, no_ktp, no_tlp, no_sim, no_hp, ktp_expired_date, sim_expired_date, alamat, tempat_tinggal, suku, berat_badan, tinggi_badan, tempat_lahir, tgl_lahir, pendidikan_level, gender, kewarganegaraan, agama, gol_darah, email, last_update_time, create_time, password, hobby, pengalaman_memimpin, pas_foto_file, cv_file, ktp_scan_file, ijazah_file, lamaran_file FROM td_kandidat WHERE id_kandidat =".$id;
//        $query = $this->db->query($sql);
//        $data = array();
//        if ($query !== FALSE && $query->num_rows() > 0) {
//            $data = $query->result_array();
//        }
//        return $data;
//    }
}