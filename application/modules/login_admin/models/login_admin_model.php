<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function get_login_data($nid,$pass) {
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->join('admin_registration','admin_login.admin_reg_id=admin_registration.admin_reg_id');
        $this->db->where('admin_login.admin_nid', $nid);
        $this->db->where('admin_login.password', $pass);
        $result = $this->db->get();
        return $result->result_array();
    }

    
}

?>