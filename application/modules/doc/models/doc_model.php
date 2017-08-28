<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doc_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

public function check_uco($div,$dist,$upz){
    $this->db->select('*');
    $this->db->from('admin_registration');
    $this->db->where('admin_designation_id',7);
    $this->db->where('div_id',$div);
    $this->db->where('dist_id',$dist);
    $this->db->where('upz_id',$upz);
    $result = $this->db->get();
    return $result->result_array();
}
public function check_dco($div,$dist){
    $this->db->select('*');
    $this->db->from('admin_registration');
    $this->db->where('admin_designation_id',6);
    $this->db->where('div_id',$div);
    $this->db->where('dist_id',$dist);
    //$this->db->where('upz_id',$upz);
    $result = $this->db->get();
    return $result->result_array();
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

    public function get_leader_info($s_id){
        $sql='select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id='.$s_id.')';
        $result=$this->db->query($sql);
        return $result->result_array();

    }

public function get_admin_info($id){
    $sql='select * from admin_registration where admin_reg_id='.$id;
    $result=$this->db->query($sql);
    return $result->result_array();

}


//    public function get_report(){
//
//        $sql='SELECT count(somitee_info.somitee_id)as somitee , sum(somitee_info.member_number_female) as f, sum(somitee_info.member_number_male)as m, sum(somitee_info.member_number_female + somitee_info.member_number_male) as s , division.bn_div_name, division.div_id  FROM `somitee_info`, division where somitee_info.somitee_div_id=division.div_id and somitee_info.somitee_status<>0 group by division.div_id';
//
//        $result=$this->db->query($sql);
//        return $result->result_array();
//
//    }

    public function get_report($div_id,$st,$en){

        $sql='SELECT count(somitee_info.somitee_id)as somitee , sum(somitee_info.member_number_female) as f, sum(somitee_info.member_number_male)as m, sum(somitee_info.member_number_female + somitee_info.member_number_male) as s , district.bn_dist_name as dist_name, somitee_info.somitee_div_id as div_id , somitee_info.somitee_dist_id as dist_id  FROM `somitee_info`, district where somitee_info.somitee_dist_id=district.dist_id and somitee_info.somitee_div_id='.$div_id.' and somitee_info.somitee_status<>0 and somitee_info.updated_at between "'.$st.'" and "'.$en.'" group by somitee_info.somitee_dist_id';

        $result=$this->db->query($sql);
        return $result->result_array();

    }


public function getSomoteeName($id){
        $this->db->select('*');
        $this->db->from('somitee_info');        
        $this->db->where('somitee_id',$id);
        $result = $this->db->get();
        return $result->result_array();
    }


 public function getUcoInfo($upz){
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->join('admin_login','admin_registration.admin_reg_id=admin_login.admin_reg_id');
        $this->db->where('admin_login.is_block',0);
        $this->db->where('admin_login.admin_type',7);
        $this->db->where('admin_registration.upz_id',$upz);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_report2($status){

        $sql='SELECT count(somitee_info.somitee_id)as somitee , sum(somitee_info.member_number_female) as f, sum(somitee_info.member_number_male)as m, sum(somitee_info.sell_share_num * somitee_info.somitee_per_share_price) as b, sum(somitee_info.member_number_female + somitee_info.member_number_male) as s , division.bn_div_name FROM `somitee_info`, division where somitee_info.somitee_div_id=division.div_id '.$status;

        $result=$this->db->query($sql);
        return $result->result_array();

    }

    public function get_report3($status){

        $sql='SELECT count(somitee_info.somitee_id)as somitee , sum(somitee_info.member_number_female) as f, sum(somitee_info.member_number_male)as m, sum(somitee_info.sell_share_num * somitee_info.somitee_per_share_price) as b, sum(somitee_info.member_number_female + somitee_info.member_number_male) as s , district.bn_dist_name, district.dist_id  FROM `somitee_info`, district where somitee_info.somitee_dist_id=district.dist_id '.$status;

        $result=$this->db->query($sql);
        return $result->result_array();

    }


    public function check_nid($nid) {
        $sql = "select * from admin_registration left join admin_login on admin_registration.admin_reg_id=admin_login.admin_reg_id  where admin_registration.admin_nid= '" . $nid . "'  or admin_login.admin_nid='".$nid."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }




    public function password_change($data,$uname)
    {
        $this->db->where('admin_reg_id',$uname);
        $this->db->update('admin_login',$data);
    }


    public function getEmpInfo($type){
        $this->db->select('*,admin_login.is_block as admin_block');
        $this->db->from('admin_registration');
        $this->db->join('admin_login','admin_registration.admin_reg_id=admin_login.admin_reg_id');
        $this->db->where('admin_login.admin_type',$type);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_opinion(){

        $this->db->select('*');
        $this->db->from('opinion');
        $this->db->order_by('created_date','DESC');
        $result=$this->db->get();
        return $result->result_array();

    }

 public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }


    public function get_member($id){

        $this->db->select('*');
        $this->db->from('somitee_member_registration_new');
        $this->db->where('somitee_id',$id);
        $result=$this->db->get();
        return $result->result_array();

    }

    public function update_upz_status($upz_id, $data){

        $this->db->where('upz_id',$upz_id);
        $this->db->update('upazilla',$data);

    }

    public function update_login_status($admin_id, $data){
       //echo $admin_id; print_r($data);

        $this->db->where('admin_login_id',$admin_id);
        $this->db->update('admin_login',$data);

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
            if($type=='reject'){//echo 'r';
                $where1='( (somitee_status=3 || somitee_status=5 )and appeal_id=0 )';
                $this->db->where($where1);
                $where2='( appeal_id!=0 and (somitee_status=5 || somitee_status=6))';
                $this->db->or_where($where2);
            }elseif($type=='new'){//echo 'n';
                $this->db->where('somitee_status',0);
                $this->db->where('is_block',0);
            }elseif($type=='appeal'){//echo 'a';
                $this->db->where_not_in('appeal_id',0);
                $this->db->where('somitee_status',3);
                $this->db->or_where('somitee_status',4);
            }elseif($type=='selected'){// echo 's';
                $this->db->where('somitee_status',1);
            }elseif($type='complain'){//echo 'c';
                $this->db->where_not_in('complain_id',0);
            }
        }

        $this->db->group_by('somitee_div_id');
        $result=$this->db->get();
        return $result->result_array();

    }



 public function get_somitee_counts($type){
        $this->db->select('somitee_div_id, count(somitee_id) as t_num');
        $this->db->from('somitee_info');
        if($type!='all'){
            if($type=='reject'){//echo 'r';
                $where1='( (somitee_status=3 || somitee_status=5 )and appeal_id=0 )';
                $this->db->where($where1);
                $where2='( appeal_id!=0 and (somitee_status=5 || somitee_status=6))';
                $this->db->or_where($where2);
            }elseif($type=='new'){//echo 'n';
                $this->db->where('somitee_status',0);
                $this->db->where('is_block',0);
            }elseif($type=='appeal'){//echo 'a';
                $this->db->where_not_in('appeal_id',0);
                $this->db->where('somitee_status',3);
                $this->db->or_where('somitee_status',4);
            }elseif($type=='selected'){// echo 's';
                $this->db->where('somitee_status',1);
            }elseif($type='complain'){//echo 'c';
                $this->db->where_not_in('complain_id',0);
            }
        }

        //$this->db->group_by('somitee_div_id');
        $result=$this->db->get();
        return $result->result_array();

    }





    public function get_appeal_info($appeal_id)
    {
        $this->db->select('*');
        $this->db->from('appeal');
        $this->db->where('appeal_id', $appeal_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_complain_info($s_id)
    {
        $this->db->select('*');
        $this->db->from('complain');
        $this->db->where('somitee_id', $s_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_complain($complain_id)
    {
        $this->db->select('*');
        $this->db->from('complain');
        $this->db->where('complain_id', $complain_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_lists($div_id,$type){
        $this->db->select('*');
        $this->db->from('somitee_info');
        // $this->db->where('somitee_div_id',$div_id);

        if($type!='all'){
            if($type=='reject'){ //echo 'r';
                $where1='(somitee_div_id='.$div_id.' and ( somitee_status=3 || somitee_status=5) and appeal_id=0 )';
                $this->db->where($where1);
                $where2='(somitee_div_id='.$div_id.' and appeal_id!=0 and (somitee_status=5 || somitee_status=6))';
                $this->db->or_where($where2);
            }elseif($type=='new'){ //echo 'n';
                $this->db->where('somitee_div_id',$div_id);
                $this->db->where('somitee_status',0);
                $this->db->where('is_block',0);
            }elseif($type=='appeal'){ //echo 'a';
                $this->db->where('somitee_div_id',$div_id);
                $this->db->where_not_in('appeal_id',0);
                $where= '(somitee_status=3 or somitee_status=4 )';
                $this->db->where($where);
            }elseif($type==1){//echo 's';
                $this->db->where('somitee_div_id',$div_id);
                $this->db->where('somitee_status',1);
            }elseif($type='complain'){ //echo 'c';
                $this->db->where('somitee_div_id',$div_id);
                $this->db->where_not_in('complain_id',0);
            }else{
                $this->db->where('somitee_div_id',$div_id);
                $this->db->where('somitee_status',$type);
            }
        }
        if($type =='all')
            $this->db->where('somitee_div_id',$div_id);

        $this->db->order_by('somitee_reg_date','desc');
        $result=$this->db->get();
        return $result->result_array();


    }

   public function get_all_admin_info($id,$tbl){
        $this->db->select('*');
        $this->db->from(''.$tbl.'');
        $this->db->join('admin_registration',''.$tbl.'.admin_reg_id = admin_registration.admin_reg_id','left');
        $this->db->join('division', 'admin_registration.div_id=division.div_id','left');
        $this->db->join('district', 'admin_registration.dist_id=district.dist_id','left');
        $this->db->join('upazilla', 'admin_registration.upz_id=upazilla.upz_id','left');
        $this->db->where($tbl.'.'.$tbl.'_id', $id);
        $result = $this->db->get();
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

    public function getDivision($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_divisional_admin');
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
        $this->db->where('is_block',0);
        $this->db->order_by('somitee_info.somitee_id','desc');
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

 public function get_sms_detail2()
    {
        $this->db->select('count(sms_service_id) as tt, sms_type');
        $this->db->from('sms_service');
        $this->db->group_by('sms_type');
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

    public function getAdmin($admin) {
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->where('admin_reg_id', $admin);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_upz2($upz) {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('upz_id', $upz);
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
    public function get_emp_info22($div_id,$dist_id,$upz_id){
         $this->db->select('*, admin_login.is_block as admin_block');
         $this->db->from('admin_registration');
         $this->db->join('admin_login','admin_login.admin_reg_id = admin_registration.admin_reg_id','left');
         $this->db->join('designation','designation.designation_id = admin_registration.admin_designation_id','left');
         $this->db->join('division','division.div_id = admin_registration.div_id','left');
         $this->db->join('district','district.dist_id = admin_registration.dist_id','left');
         $this->db->join('upazilla','upazilla.upz_id = admin_registration.upz_id','left');
         $this->db->where('admin_registration.div_id',$div_id);
         $this->db->where('admin_registration.dist_id',$dist_id);
         $this->db->where('admin_registration.upz_id',$upz_id);

         $result = $this->db->get();
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



}

?>