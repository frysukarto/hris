<?php

class Mlog extends CI_Model {

    function log_editdata() {
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
        $json = json_decode($location, true);
        if($json['region_name'] != "")
        {$region =$json['region_name'];}
        else {$region ="Indonesia";}
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $platform= $this->agent->platform();
        $sql = "INSERT INTO td_admin_log(log,id_admin,ip_address,browser,platform,city,isp) VALUES ('Edit Kandidat','".$this->session->userdata['id_admin']."','" . $this->input->ip_address() . "','$agent','$platform.','$region','$hostname')";
        $this->db->query($sql);
        return TRUE;
    }
    
    
    function log_deletedata() {
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
        $json = json_decode($location, true);
        if($json['region_name'] != "")
        {$region =$json['region_name'];}
        else {$region ="Indonesia";}
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $platform= $this->agent->platform();
        $sql = "INSERT INTO td_admin_log(log,id_admin,ip_address,browser,platform,city,isp) VALUES ('Delete Kandidat','".$this->session->userdata['id_admin']."','" . $this->input->ip_address() . "','$agent','$platform.','$region','$hostname')";
        $this->db->query($sql);
        return TRUE;
    }
   

    function log_action() {
        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
        $json = json_decode($location, true);
        if($json['region_name'] != "")
        {$region =$json['region_name'];}
        else {$region ="Indonesia";}
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $platform= $this->agent->platform();
        $sql = "INSERT INTO td_admin_log(log,id_admin,ip_address,browser,platform,city,isp) VALUES('Update Data Kandidat ".$this->input->post('id_kandidat').",'" . $this->session->userdata['id_admin'] . "','" . $this->input->ip_address() . "','$agent','$platform.','$region','$hostname')";
        $this->db->query($sql);
        return TRUE;
    }
    
    function log_login() {
        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
        $json = json_decode($location, true);
        if($json['region_name'] != "")
        {$region =$json['region_name'];}
        else {$region ="Indonesia";}
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $platform= $this->agent->platform();
        $sql = "INSERT INTO td_admin_log(log,id_admin,ip_address,browser,platform,isp,city) VALUES ('Login','" . $this->session->userdata['id_admin'] . "','" . $this->input->ip_address() . "','$agent','$platform','$hostname','$region')";
        $this->db->query($sql);
        return TRUE;
    }
    
    function log_logout() {
        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
        $json = json_decode($location, true);
        if($json['region_name'] != "")
        {$region =$json['region_name'];}
        else {$region ="Indonesia";}
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $platform= $this->agent->platform();
        $sql = "INSERT INTO td_admin_log(log,id_admin,ip_address,browser,platform,isp,city) VALUES ('Logout','" . $this->session->userdata['id_admin'] . "','" . $this->input->ip_address() . "','$agent','$platform','$hostname','$region')";
        $this->db->query($sql);
        return TRUE;
    }

    function get_log() {
        $sql = "SELECT a.id_admin_log,a.browser, a.time, a.log, a.id_admin, b.fullname FROM td_admin_log as a
                INNER JOIN td_admin as b ON a.id_admin = b.id_admin ORDER BY a.time DESC LIMIT 10";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_log_by_id($id) {
        $sql = "SELECT a.id_admin_log,a.browser, a.time, a.log, a.city,a.isp, a.id_admin, b.fullname FROM td_admin_log as a
                INNER JOIN td_admin as b ON a.id_admin = b.id_admin WHERE b.id_admin =".$id." ORDER BY a.time DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    /*KANDIDAT LOG INSERT*/
    function auto_id_kandidat() 
    {
        $sql = 'SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = "pasopati" AND TABLE_NAME = "td_kandidat" ';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
     function kandidat_log_insert() {
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
        $json = json_decode($location, true);
        if($json['region_name'] != "")
        {$region =$json['region_name'];}
        else {$region ="Indonesia";}
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
            $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }
        $platform= $this->agent->platform();
        $sql = "INSERT INTO td_admin_log(log, id_admin, ip_address, browser, platform, city, isp) VALUES('INPUT DATA','".$this->session->userdata('id_admin')."','" . $this->input->ip_address() . "','$agent','$platform.','$region','$hostname')";

        $this->db->query($sql);
        return TRUE;
    }
    /*KANDIDAT LOG INSERT END*/
}