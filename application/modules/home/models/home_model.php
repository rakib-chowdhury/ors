<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBarChartVal($cnd_year){///new
         $sql= "select count(somitee_id) as total from somitee_info where somitee_reg_date like '".$cnd_year."%' and somitee_status=0 and is_block=0";
         $result=$this->db->query($sql);
        return $result->result_array();
   }
   public function getBarChartVal1($cnd_year){///selected
         $sql= "select count(somitee_id) as total from somitee_info where updated_at like '".$cnd_year."%' and somitee_status=1 and is_block=0";
         $result=$this->db->query($sql);
        return $result->result_array();
   }
   public function getBarChartVal2($cnd_year){//rejected
         $sql= "select count(somitee_id) as total from somitee_info where updated_at like '".$cnd_year."%' and (somitee_status=3 || somitee_status=5 )and is_block=0";
         $result=$this->db->query($sql);
        return $result->result_array();
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

    public function getAllRecords($tableName) {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function get_somitee_member_info($somitee_id_info){
        //$this->db->select('somitee_member_registration_new.*');
        $this->db->select('*');
        $this->db->from('somitee_member_registration_new');
        $this->db->where('somitee_id',$somitee_id_info->somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    // public function get_somitee_des($somitee_id){
    //     $this->db->select('*');
    //     $this->db->from('somitee_member_registration');
    //     $this->db->join('designation','somitee_member_registration.somitee_member_designation_id=designation.designation_id');
    //     $this->db->where('somitee_member_registration.somitee_id',$somitee_id);
    //     $this->db->where('somitee_member_registration.somitee_member_designation_id <> 0');
    //     $result = $this->db->get();
    //     return $result->result_array();
    // }

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

  public function check_tracking_number($tr_id)
   {
        $this->db->select('somitee_info.*, somitee_type.*, somitee_category.*, somitee_sub_category.*,user_registration.*, sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id','LEFT');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id','LEFT');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id','LEFT');
        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id','LEFT');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id','LEFT');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id','LEFT');
        $this->db->join('division skd', 'somitee_info.somitee_kormo_div_id=skd.div_id','LEFT');
        $this->db->join('district skds', 'somitee_info.somitee_kormo_dist_id=skds.dist_id','LEFT');
        $this->db->join('upazilla skp', 'somitee_info.somitee_kormo_upz_id=skp.upz_id','LEFT');
        $this->db->join('user_registration', 'user_registration.user_reg_id=somitee_info.user_reg_id','LEFT');
        $this->db->where('somitee_info.somitee_track_id', $tr_id);
        $result = $this->db->get();
        return $result->result_array();

    }

 public function get_somitee_kormo_info($tr_id){
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('division', 'somitee_info.somitee_kormo_div_id=division.div_id');
        $this->db->join('district', 'somitee_info.somitee_kormo_dist_id=district.dist_id');
        $this->db->join('upazilla', 'somitee_info.somitee_kormo_upz_id=upazilla.upz_id');
        $this->db->where('somitee_track_id', $tr_id);
        $result = $this->db->get();
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
        $sql = "select * from user_registration where user_email= '".$email."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function check_nid($nid) {
        $sql = "select * from user_registration where user_nid= '".$nid."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function check_phone($phone) {
        $sql = "select * from user_registration where user_phone= '".$phone."'";
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

   public function save_opinion_info($data) {
        $this->db->insert('opinion',$data);
    }

}

?>