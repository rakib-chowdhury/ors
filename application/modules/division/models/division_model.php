<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_division_somitee_list()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type','somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->where('somitee_status', 0);
        $this->db->where('division_id', 0);
        $this->db->where('uco_id', 0);
        $this->db->where('dco_id', 0);
        $this->db->where('appeal_id', 0);
        $this->db->where('complain_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_division_somitee_detail($somitee_id)
    {
        $this->db->select('somitee_info.*, somitee_type.*, somitee_category.*, sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->where('somitee_id', $somitee_id);
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id');
        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id');
        $this->db->join('division skd', 'somitee_info.somitee_kormo_div_id=skd.div_id');
        $this->db->join('district skds', 'somitee_info.somitee_kormo_dist_id=skds.dist_id');
        $this->db->join('upazilla skp', 'somitee_info.somitee_kormo_upz_id=skp.upz_id');
        $this->db->where('somitee_info.somitee_status = 0');
        // $this->db->where('somitee_info.somitee_id = ' . $somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert_ret($tablename, $tabledata) {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }
public function getAllRecords($tableName) {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

public function get_user_info($somitee_id){
      $sql="select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id=".$somitee_id.")";
      $result=$this->db->query($sql);
return $result->result_array();
}

 public function update_send_sms($id,$data) {
        $this->db->where('mobile_api_id',$id);   
        $this->db->update('mobile_api',$data);
    }


public function insert($tableName, $tableData) {
        $this->db->insert($tableName, $tableData);
    }

    public function update_somitee_info($somitee_id, $data)
    {
        $this->db->where('somitee_id', $somitee_id);
        $this->db->update('somitee_info', $data);
    }
}

?>