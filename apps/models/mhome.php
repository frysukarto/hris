<?php
class Mhome extends CI_Model {

    function input_admin($fullname, $email, $username, $password) {
        $sql = "INSERT INTO td_admin(fullname,email,username,password,status)VALUES('$fullname','$email','$username','$password','1')";
        $this->db->query($sql);
        return TRUE;
    }

    function input_menu($menu) {
        $sql = "INSERT INTO td_admin_menu(menu,id_admin)VALUES('$menu','" . $this->session->userdata['id_admin'] . "')";
        $this->db->query($sql);
        return TRUE;
    }

    function input_group_menu($id_menu,$id_group) {
        $sql = "INSERT INTO td_admin_group_menu(id_admin_menu,id_admin_group)VALUES('$id_menu','$id_group')";
        $this->db->query($sql);
        return TRUE;
    }

    function input_group($group) {
        $sql = "INSERT INTO td_admin_group(nama_group,id_admin)VALUES('$group','" . $this->session->userdata['id_admin'] . "')";
        $this->db->query($sql);
        return TRUE;
    }

    function get_menu() {
        $sql = "SELECT id_admin_menu,id_admin, menu FROM td_admin_menu ORDER BY id_admin_menu DESC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function get_menu_onset_menu() {
        $id = $this->uri->segment(2);
        $sql = "SELECT * FROM td_admin_menu WHERE NOT EXISTS (SELECT * FROM td_admin_group_menu WHERE td_admin_group_menu.id_admin_group =" . $id . " AND td_admin_menu.id_admin_menu = td_admin_group_menu.id_admin_menu) ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function get_list_menu($id) {
        $sql = "SELECT a.id_admin_group_menu, a.id_admin_group , a.id_admin_menu, b.id_admin_group , b.nama_group, c.id_admin_menu, c.menu FROM td_admin_group_menu AS a INNER JOIN td_admin_group AS b on a.id_admin_group = b.id_admin_group INNER JOIN td_admin_menu AS c on a.id_admin_menu =c.id_admin_menu WHERE a.id_admin_group =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function get_group_by_id($id) {
        $sql = "SELECT id_admin_group, nama_group, id_admin FROM td_admin_group WHERE id_admin_group =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function get_group() {
        $sql = "SELECT id_admin_group, nama_group FROM td_admin_group ORDER BY id_admin_group DESC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function get_admin() {
        $sql = "SELECT id_admin, fullname, username, email, no_tlp, password FROM td_admin WHERE id_admin != 1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function get_admin_by_id($id) {
        $sql = "SELECT id_admin, fullname, username, email, no_tlp, password FROM td_admin WHERE id_admin =$id";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function edit_admin($fullname, $email, $username, $password, $id) {
        $sql = "UPDATE td_admin SET fullname='$fullname',email='$email',username='$username',password='$password' WHERE id_admin = $id";
        $this->db->query($sql);
        return TRUE;
    }

      function user($username, $password) {
        $sql = 'SELECT id_admin,id_admin_group, fullname, username, email, no_tlp, password FROM td_admin where username="' . $username . '" AND password="' . $password . '"';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function validate($username, $password) {
        $hasil = $this->user($username, $password);
        $total = count($hasil);
        for ($i = 0; $i < $total; $i++) {
            if ($total > 0) {
                $data = array(
                    'fullname' => $hasil[$i]['fullname'],
                    'password' => $hasil[$i]['password'],
                    'id_admin' => $hasil[$i]['id_admin'],
                    'sip' => $hasil[$i]['sip'],
                    'id_admin_group' => $hasil[$i]['id_admin_group'],
                    'username' => $hasil[$i]['username'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($data);
                return true;
            }
        }
    }

    function get_profile_admin($id)
    {
        $sql = "SELECT * FROM td_admin WHERE id_admin=".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function delete_user($admin_id) {
        $sql = "DELETE FROM td_admin WHERE id_admin = " . $admin_id;
        $this->db->query($sql);
        return TRUE;
    }

    function delete_menu_set($admin_id) {
        $sql = "DELETE FROM td_admin_group_menu WHERE id_admin_group_menu = " . $admin_id;
        $this->db->query($sql);
        return TRUE;
    }

    function get_count_new_kandidat()
    {
        $sql = "SELECT * FROM td_kandidat WHERE status_kandidat='1' ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    function get_count_blokir_kandidat()
    {
        $sql = "SELECT * FROM td_kandidat WHERE status_kandidat='6' ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    function get_count_aktif_kandidat()
    {
        $sql = "SELECT * FROM td_kandidat WHERE status_kandidat='1' ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_count_caller_kandidat()
    {
        $sql = "SELECT * FROM td_kandidat WHERE status_kandidat='2' ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function ganti_password($password,$id)
    {
        $sql = "UPDATE td_admin SET password='$password' WHERE id_admin = $id";
        $this->db->query($sql);
        return TRUE;
    }

    function login_attempts_wrong($username)
    {
        $sql = "UPDATE td_admin SET attempts = attempts + 1 WHERE username = '$username' AND id_admin != 1";
        $this->db->query($sql);
        return TRUE;
    }
    
    function login_attempts_true($username)
    {
        $sql = "UPDATE td_admin SET attempts = 0 WHERE username = '$username'";
        $this->db->query($sql);
        return TRUE;
    }

    function login_attempts_check($username)
    {
        $sql = "SELECT * FROM td_admin WHERE username = '$username' ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_count_all_kandidat()
    {
        $sql = "SELECT * FROM td_kandidat ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {$data = $query->result_array();}
        return $data;
    }
    
    function get_count_caller()
    {
        $sql = "SELECT * FROM td_kandidat WHERE status_kandidat='2' ";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {$data = $query->result_array();}
        return $data;
    }   
}