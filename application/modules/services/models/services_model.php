<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function update_lastUpdate($data) {
        $this->db->where('id',1);
        $this->db->update('lastUpdate', $data);
    }


    public function get_member($id){

$this->db->select('*');
$this->db->from('somitee_member_registration_new');
$this->db->where('somitee_id',$id);
$result=$this->db->get();
return $result->result_array();

}

    public function get_sms_data($id)
{
  $this->db->select('*');
$this->db->from('sms_service');
$this->db->where('sms_service_id',$id);
$result=$this->db->get();
return $result->result_array();
}

    public function get_all_sms_info()
{
  $this->db->select('*');
$this->db->from('sms_service');
$this->db->order_by('sms_service_id', 'desc');
$result=$this->db->get();
return $result->result_array();
}

    public function get_sodosso_area($id){
$this->db->select('*');
$this->db->from('somitee_info');

$this->db->join('division', 'somitee_info.sodosso_division=division.div_id');
$this->db->join('district', 'somitee_info.sodosso_district=district.dist_id');
$this->db->join('upazilla', 'somitee_info.sodosso_upz=upazilla.upz_id');

$this->db->where('somitee_id',$id);
$result=$this->db->get();
return $result->result_array();

}

    public function get_user_info($somitee_id){
      $sql="select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id=".$somitee_id.")";
      $result=$this->db->query($sql);
return $result->result_array();
}
    public function get_somitee_count($type){
      $this->db->select('somitee_div_id, count(somitee_id) as t_num');
      $this->db->from('somitee_info');
      if($type!='all'){
          if($type=='reject'){
               $this->db->where('somitee_status',5);
               $this->db->or_where('somitee_status',3);
          }elseif($type=='new'){
                $this->db->where('somitee_status',0);

          }else{
               $this->db->where('somitee_status',$type);  
          }
      }      

      $this->db->group_by('somitee_div_id');
      $result=$this->db->get();
      return $result->result_array();

   }


    public function get_somitee_lists($div_id,$type){
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->where('somitee_div_id',$div_id);
        if($type !='all'){
           if($type=='reject'){
                 $this->db->where('somitee_status',5);
                 $this->db->or_where('somitee_status',3);
           }else{
                $this->db->where('somitee_status',$type);
           }        
        }        
        $this->db->order_by('somitee_reg_date','desc');
        $result=$this->db->get();
        return $result->result_array();
        

    }
    public function getDco($id)
    {
        $this->db->select('*');
        $this->db->from('dco');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getUco($id)
    {
        $this->db->select('*');
        $this->db->from('uco');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_somitee_list_tab1()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->where('somitee_status', 0);
        $this->db->where('uco_id',0);
        $this->db->where('dco_id',0);
        $this->db->where('appeal_id',0);
        $this->db->order_by('somitee_reg_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_list_tab2()
    {
        $this->db->select('somitee_info.*, dco.*, dco.dco_inquiry_date as verify_date, somitee_info.dco_inquiry_date as inquiry_date');
        $this->db->from('somitee_info');
        $this->db->join('dco', 'somitee_info.dco_id=dco.dco_id');
        $this->db->where('somitee_info.somitee_status', 1);
        $this->db->order_by('dco.dco_inquiry_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_list_tab3()
    {
        $this->db->select('somitee_info.*, dco.*, dco.dco_inquiry_date as verify_date, somitee_info.dco_inquiry_date as inquiry_date');
        $this->db->from('somitee_info');
        $this->db->join('dco', 'somitee_info.dco_id=dco.dco_id');
        $this->db->where('somitee_info.somitee_status', 5);
        $this->db->or_where('somitee_info.somitee_status', 3);
        $this->db->order_by('dco.dco_inquiry_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function get_somitee_list_tab4()
    {
        $this->db->select('somitee_info.*, appeal.*');
        $this->db->from('somitee_info');
        $this->db->join('appeal', 'somitee_info.appeal_id=appeal.appeal_id');
        $this->db->where('somitee_info.somitee_status', 4);
        $this->db->order_by('somitee_info.appeal_apply_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_list_tab5()
    {
        $this->db->select('somitee_info.*, complain.*');
        $this->db->from('somitee_info');
        $this->db->join('appeal', 'somitee_info.appeal_id=appeal.appeal_id');
        $this->db->where('somitee_info.somitee_status', 4);
        $this->db->order_by('somitee_info.appeal_apply_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
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
    
    public function get_all_division_somitee_list()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type','somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_category($id) {
        $this->db->select('*');
        $this->db->from('somitee_category');
        $this->db->where('somitee_cat_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_sub_category($id) {
        $this->db->select('*');
        $this->db->from('somitee_sub_category');
        $this->db->where('somitee_sub_cat_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_all_somitee_list($somitee_id){
        $this->db->select('somitee_info.*, somitee_type.*, sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        //$this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id');
        //$this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id');
        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id');
        $this->db->join('division skd', 'somitee_info.somitee_kormo_div_id=skd.div_id');
        $this->db->join('district skds', 'somitee_info.somitee_kormo_dist_id=skds.dist_id');
        $this->db->join('upazilla skp', 'somitee_info.somitee_kormo_upz_id=skp.upz_id');
        $this->db->where('somitee_info.somitee_id',$somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }


    public function get_sms_detail()
    {
        $this->db->select('*');
        $this->db->from('mobile_api');
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_specific_notice($notice_id)
    {
      $this->db->select('*');
    $this->db->from('notice');
    $this->db->where('notice_id', $notice_id);
    $result = $this->db->get();
    return $result->result_array();
    }

    public function get_all_division() {
        $this->db->select('*');
        $this->db->from('division');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_district() {
        $this->db->select('*');
        $this->db->from('district');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_upazilla() {
        $this->db->select('*');
        $this->db->from('upazilla');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_dist($div_id) {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where('div_id', $div_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_upz($dist_id) {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('dist_id', $dist_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_emp_info($div_id,$dist_id,$upz_id) {        
        //$sql = "select * FROM admin_registration left join admin_login on admin_registration.admin_reg_id=admin_login.admin_reg_id LEFT JOIN designation on  designation.designation_id=admin_registration.admin_designation_id where admin_registration.div_id =" . $div_id." and admin_registration.dist_id =" . $dist_id." and admin_registration.upz_id =" . $upz_id;
        $sql = "select * from admin_registration LEFT JOIN admin_login on admin_registration.admin_reg_id=admin_login.admin_reg_id 
                                 left join designation on admin_registration.admin_designation_id=designation.designation_id
                                 LEFT JOIN division on admin_registration.div_id=division.div_id
                                 LEFT JOIN district on admin_registration.dist_id=district.dist_id
                                 LEFT JOIN upazilla on admin_registration.upz_id=upazilla.upz_id
                                 where admin_registration.div_id =" . $div_id." and admin_registration.dist_id =" . $dist_id." and admin_registration.upz_id =" . $upz_id;
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function get_emp_info_all(){
        $sql= "SELECT * FROM admin_registration LEFT JOIN designation on admin_registration.admin_designation_id=designation.designation_id";
        $result = $this->db->query($sql);
        return $result->result_array();        
    }

    public function get_somitee_list_by_div($div_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type','somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->where('somitee_info.somitee_div_id',$div_id);
        $this->db->where('somitee_info.somitee_status', 0);
        $this->db->where('somitee_info.division_id', 0);
        $this->db->where('somitee_info.uco_id', 0);
        $this->db->where('somitee_info.dco_id', 0);
        $this->db->where('somitee_info.appeal_id', 0);
        $this->db->where('somitee_info.complain_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_somitee_list()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type','somitee_info.somitee_type_id=somitee_type.somitee_type_id');

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

    public function get_designation($type) {
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where('designation_type', $type);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert($tablename, $tabledata) {
        $this->db->insert($tablename, $tabledata);
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
//    public function get_somitee_list() {
//        $sql= "select * from somitee_info ";//where somitee_status <> 0";
//        $result = $this->db->query($sql);
//        return $result->result_array();
//    }

    public function update_sms_api($id,$data) {
        $this->db->where('mobile_api_id',$id);
        $this->db->update('mobile_api', $data);
    }

      public function update_resend_data($id,$data) {
        $this->db->where('sms_service_id',$id);
        $this->db->update('sms_service', $data);
    }

    public function update_designation($admin_reg_id,$data) {
        $this->db->where('admin_reg_id', $admin_reg_id);
        $this->db->update('admin_registration', $data);
    }
    
    public function update_login($admin_reg_id,$data) {
        $this->db->where('admin_reg_id', $admin_reg_id);
        $this->db->update('admin_login', $data);
    }

    public function update_somitee_status($id,$data) {
        $this->db->where('somitee_id',$id);
        $this->db->update('somitee_info', $data);
    }
    public function update_send_sms($id,$data) {
        $this->db->where('mobile_api_id',$id);   
        $this->db->update('mobile_api',$data);
    }
    
    public function delete_somitee_info($table_name, $condition, $id)
    {
        //$whr = '.$condition.';
        $this->db->where($condition, $id);
        $this->db->delete($table_name);
    }
    


}

?>