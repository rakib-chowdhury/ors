<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Javascript_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($id, $pass) {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->join('user_registration','user_login.user_reg_id=user_registration.user_reg_id');
        $this->db->where('user_login.user_phone', $id);
        $this->db->where('user_login.user_password', $pass);
        $result = $this->db->get();
        return $result->result_array();
    }

}

?>