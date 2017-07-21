<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mkeluarga extends CI_Model {

    var $table = 'td_keluarga';
    var $column_order = array('id_kandidat', 'nama_k', 'gender_k', 'usia_k', 'pendidikan_k','pekerjaan_k','jenis_keluarga', null);
    var $column_search = array('nama_k', 'gender_k', 'usia_k', 'pendidikan_k','pekerjaan_k','jenis_keluarga');
    var $order = array('id_kandidat' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query(){
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
        $this->db->where('id_kandidat', $id);
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
        $this->db->where('id_kandidat', $id);
        $this->db->delete($this->table);
    }
    
    function delete_keluarga($id_kandidat) {
        $sql = "DELETE FROM td_kandidat WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
}