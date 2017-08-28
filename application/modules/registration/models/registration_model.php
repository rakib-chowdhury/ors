<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($tablename, $tabledata) {
        $this->db->insert($tablename, $tabledata);
    }

    public function insert_ret($tablename, $tabledata) {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }

public function get_page_counter()
    {
         $this->db->select('*');
        $this->db->from('site_visitor');
       $result = $this->db->get();  
        return $result->result_array();
    }
  public function update_page_counter($data)
   {
       $this->db->update('site_visitor',$data);
   }

   public function get_somobay_counter()
   {
      $this->db->select('count(*) as total_somitee');
        $this->db->from('somitee_info');
        $result = $this->db->get();
        return $result->result_array();
   }

    public function getAllRecords($tableName) {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function getWhere($customCondition, $tableName) {
        $this->db->where($customCondition);
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function customSelect($selectFields, $customCondition, $tableName) {
        $this->db->select($selectFields);
        $this->db->where($customCondition);
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function check_email($email) {
        $sql = "select * from user_registration where user_email= '" . $email . "'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function check_nid($nid) {
        $sql = "select * from user_registration where user_nid= '" . $nid . "'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function check_phone($phone) {
        $sql = "select * from user_login where user_phone= '" . $phone . "'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_somitee_info() {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id');
        $this->db->join('division', 'somitee_info.somitee_div_id=division.div_id');
        $this->db->join('district', 'somitee_info.somitee_dist_id=district.dist_id');
        $this->db->join('upazilla', 'somitee_info.somitee_upz_id=upazilla.upz_id');
        $this->db->where('somitee_info.somitee_status = 2');
        $this->db->where('somitee_info.uco_inquiry_verify = 1');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_send_sms($id,$data) {
        $this->db->where('mobile_api_id',$id);   
        $this->db->update('mobile_api',$data);
    }

}

?>