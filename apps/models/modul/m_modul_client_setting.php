<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_modul_client_setting extends CI_Model {

    var $table = 'td_modul_client_setting';
    var $column_order = array('nama_perusahaan', 'alamat_perusahaan','tlp_perusahaan','nama_bidang_usaha','email','area','cabang','pic',  null);
    var $column_search = array('nama_perusahaan', 'alamat_perusahaan','tlp_perusahaan','nama_bidang_usaha','email','area','cabang','pic');
    var $order = array('id_modul_client_setting' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
        $this->db->where('id_modul_client_setting', $id);
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
        $this->db->where('id_modul_client_setting', $id);
        $this->db->delete($this->table);
    }
    
    function get_client() {
        $sql = "SELECT * FROM td_modul_client_setting"; 
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_client_list() {
        $sql = "SELECT a.*,b.*,c.* FROM td_modul_client_setting AS a
                INNER JOIN master_cabang AS b ON a.id_cabang = b.id_cabang
                INNER JOIN master_area AS c ON a.id_area = c.id_area"; 
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    
    function get_bidang_usaha() {
        $sql = "SELECT * FROM td_modul_bidang_usaha"; 
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function cms_list_prov()
    {
        $sql = "SELECT nama_cabang, id_cabang FROM master_cabang ORDER BY id_cabang ASC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function cms_list_kokab($prov_id) {
        $sql   = "SELECT * FROM master_area WHERE id_cabang ='".$prov_id."'";
        $query = $this->db->query($sql);
        $data  = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
}
