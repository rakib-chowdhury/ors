<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appeal_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_leader_info($s_id)
    {
        $sql = 'select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id=' . $s_id . ')';
        $result = $this->db->query($sql);
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
    public function get_new_somitee_info()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->where('somitee_status', 3);
        $this->db->where_not_in('appeal_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }
public function get_somitee_num($type){
 $this->db->select('count(somitee_info.somitee_id) as t');
        $this->db->from('somitee_info');
        $this->db->join('appeal', 'somitee_info.appeal_id=appeal.appeal_id','left');
        $this->db->where_not_in('somitee_info.appeal_id', 0);
        if ($type == 'all') {
            $this->db->order_by('somitee_info.appeal_apply_date', 'desc');
        }
        if ($type == 'new') {
            $this->db->where('somitee_info.somitee_status', 3);
        }
        if ($type == 'selected') {
            $this->db->where('appeal.appeal_verify',1);
        }
        if ($type == 'reject') {
            $this->db->where('somitee_info.somitee_status', 6);
        }

        $result = $this->db->get();
        return $result->result_array();

}

/*public function get_somitee_num($type)
    {
        $this->db->select('count(somitee_id) as t');
        $this->db->from('somitee_info');             
        
        if ($type == 'all') {    
            $this->db->where_not_in('appeal_id', 0);             
        }
        if ($type == 'new') {            
            $this->db->where_not_in('appeal_id', 0);
            $this->db->where('somitee_status', 3);            
        }
        if ($type == 'reject') {                    
            $this->db->where_not_in('appeal_id', 0);   
            $this->db->where('somitee_status', 6);            
        }
        if ($type == 'selected') {                  
            $where1='(appeal_id !)';
            $this->db->where_not_in('appeal_id', 0);     
            $this->db->where('somitee_status', 4);            
            $this->db->or_where('somitee_status', 1);
            $this->db->or_where('somitee_status', 5);
        }
       
        $result = $this->db->get();
        return $result->result_array();

    }*/

    public function get_admin_info($reg_id)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->where('admin_reg_id', $reg_id);
        $result = $this->db->get();
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


    public function get_all_somitee_list($somitee_id)
    {
        $this->db->select('somitee_info.*, somitee_type.*,  sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');

        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id');
        $this->db->join('division skd', 'somitee_info.somitee_kormo_div_id=skd.div_id');
        $this->db->join('district skds', 'somitee_info.somitee_kormo_dist_id=skds.dist_id');
        $this->db->join('upazilla skp', 'somitee_info.somitee_kormo_upz_id=skp.upz_id');
        $this->db->where('somitee_info.somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_category($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_category');
        $this->db->where('somitee_cat_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_sub_category($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_sub_category');
        $this->db->where('somitee_sub_cat_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_member($id)
    {

        $this->db->select('*');
        $this->db->from('somitee_member_registration_new');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function update_somitee_status($id, $data)
    {
        $this->db->where('somitee_id', $id);
        $this->db->update('somitee_info', $data);
    }

    public function update_where($tableName,$columnName,$col_val, $data)
    {
        $this->db->where($columnName, $col_val);
        $this->db->update($tableName, $data);
    }

    public function get_sodosso_area($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');

        $this->db->join('division', 'somitee_info.sodosso_division=division.div_id');
        $this->db->join('district', 'somitee_info.sodosso_district=district.dist_id');
        $this->db->join('upazilla', 'somitee_info.sodosso_upz=upazilla.upz_id');

        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_somitee($type)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('appeal', 'somitee_info.appeal_id=appeal.appeal_id','left');
        $this->db->where_not_in('somitee_info.appeal_id', 0);
        if ($type == 'all') {
            $this->db->order_by('somitee_info.appeal_apply_date', 'desc');
        }
        if ($type == 'new') {
            $this->db->where('somitee_info.somitee_status', 3);
        }
        if ($type == 'selected') {
            $this->db->where('appeal.appeal_verify',1);
        }
        if ($type == 'reject') {
            $this->db->where('somitee_info.somitee_status', 6);
        }

        $result = $this->db->get();
        return $result->result_array();

    }


    public function get_somitee_info_1($track_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');


        $this->db->where('somitee_track_id', $track_id);
        
        $this->db->where_not_in('division_id', 0);

        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_uco_somitee_list_tab1()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->where('somitee_status', 2);
        $this->db->where_not_in('somitee_track_id', '');
        $this->db->where('uco_id', 0);
        $this->db->where('dco_id', 0);
        $this->db->where('appeal_id', 0);
        $this->db->order_by('uco_inquiry_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function password_change($data, $uname)
    {
        $this->db->where('admin_reg_id', $uname);
        $this->db->update('admin_login', $data);
    }

    public function get_uco_somitee_list_tab2()
    {
        $this->db->select('uco.*, somitee_info.*, somitee_type.*, uco.uco_inquiry_date as verified_date, somitee_info.uco_inquiry_date as inquiry_date');
        $this->db->from('uco');
        $this->db->join('somitee_info', 'uco.somitee_id=somitee_info.somitee_id');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->where('somitee_info.somitee_status', 2);
        $this->db->where_not_in('somitee_info.uco_id', 0);
        $this->db->order_by('uco.uco_inquiry_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_member_info($somitee_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_member_registration');
        $this->db->where('somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_somitee_des($somitee_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_member_registration');
        $this->db->join('designation', 'somitee_member_registration.somitee_member_designation_id=designation.designation_id');
        $this->db->where('somitee_member_registration.somitee_id', $somitee_id);
        $this->db->where('somitee_member_registration.somitee_member_designation_id <> 0');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_document($somitee_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_uploaded_file');
        $this->db->where('somitee_id', $somitee_id);
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

    public function get_somitee_info($somitee_id)
    {
        $this->db->select('somitee_info.*, somitee_type.*, somitee_category.*,somitee_sub_category.*, sd.*, sds.*,sp.*, skd.bn_div_name as k_div_name, skds.bn_dist_name as k_dist_name, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id');
        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id');
        $this->db->join('division skd', 'somitee_info.somitee_div_id=skd.div_id');
        $this->db->join('district skds', 'somitee_info.somitee_dist_id=skds.dist_id');
        $this->db->join('upazilla skp', 'somitee_info.somitee_upz_id=skp.upz_id');
        $this->db->where('somitee_info.somitee_id', $somitee_id);

        $resut = $this->db->get();
        return $resut->result_array();
    }

    public function insert_ret($tablename, $tablevalue)
    {
        $this->db->insert($tablename, $tablevalue);
        return $this->db->insert_id();
    }

    public function update_somitee_info_uco_id($id, $data)
    {
        $this->db->where('somitee_id', $id);
        $this->db->update('somitee_info', $data);
    }

    public function getUco($id)
    {
        $this->db->select('*');
        $this->db->from('uco');
        $this->db->where('somitee_id', $id);
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

    public function getUcoDetails($id)
    {
        $this->db->select('*');
        $this->db->from('uco');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
}

?>