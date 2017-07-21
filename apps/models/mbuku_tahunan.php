<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mbuku_tahunan extends CI_Model {

    var $table = 'td_buku_tahunan';
    var $column_order = array('nama_lengkap_b', 'no_telpon','alamat_bt','pendidikan_terakhir','gender',  null);
    var $column_search = array('nama_lengkap_b', 'no_telpon','alamat_bt','pendidikan_terakhir','gender');
    var $order = array('id_buku_tahunan' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function auto_id() {
        $sql = "SELECT id_kand FROM td_buku_tahunan WHERE id_kand=(SELECT max(id_kand) FROM td_buku_tahunan)";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    private function _get_datatables_query() {
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
        $this->db->where('id_buku_tahunan', $id);
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
        $this->db->where('id_buku_tahunan', $id);
        $this->db->delete($this->table);
    }
    
    function count_new_entry() {
        $sql = "SELECT * FROM td_buku_tahunan";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
}