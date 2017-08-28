<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uco_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_send_sms($id, $data)
    {
        $this->db->where('mobile_api_id', $id);
        $this->db->update('mobile_api', $data);
    }

    public function getAllRecords($tableName)
    {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function get_dco_info($div, $dist, $upz)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->where('admin_designation_id', 6);
        $this->db->where('div_id', $div);
        $this->db->where('dist_id', $dist);
        //$this->db->where('upz_id',$upz);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_feedback($div, $dist, $upz)
    {
        $this->db->select('count(id) as t');
        $this->db->from('feedback');
        $this->db->join('somitee_info', 'somitee_info.somitee_id=feedback.somitee_id', 'left');
        $this->db->where('somitee_info.somitee_div_id', $div);
        $this->db->where('somitee_info.somitee_dist_id', $dist);
        $this->db->where('somitee_info.somitee_upz_id', $upz);
        $this->db->where('feedback.type', 1);
        $this->db->where('feedback.is_seen', 0);
        $this->db->order_by('feedback.created_at', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getFeedbackSomitee($div, $dist)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->where('somitee_div_id', $div);
        $this->db->where('somitee_dist_id', $dist);
        $this->db->where('somitee_status', 2);
        $this->db->where_not_in('uco_id', 0);
        $this->db->where('dco_id', 0);
        $this->db->order_by('dco_inquiry_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getFeedbackSomiteeDetails($div, $dist, $upz)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->join('somitee_info', 'somitee_info.somitee_id=feedback.somitee_id', 'left');
        $this->db->where('somitee_info.somitee_div_id', $div);
        $this->db->where('somitee_info.somitee_dist_id', $dist);
        $this->db->where('somitee_info.somitee_upz_id', $upz);
        //$this->db->where('feedback.type',2);
        //$this->db->where('feedback.is_seen',0);
        $this->db->order_by('feedback.created_at', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_leader_info($s_id)
    {
        $sql = 'select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id=' . $s_id . ')';
        $result = $this->db->query($sql);
        return $result->result_array();

    }

    public function get_admin_info($reg_id)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->join('division', 'division.div_id = admin_registration.div_id', 'left');
        $this->db->join('district', 'district.dist_id = admin_registration.dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id = admin_registration.upz_id', 'left');
        $this->db->where('admin_reg_id', $reg_id);
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
    public function get_all_somitee_list2($somitee_id)
    {
        $this->db->select('somitee_info.*, somitee_type.*,  sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name,somitee_category.somitee_cat_name, somitee_sub_category.somitee_sub_cat_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id','left');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id','left');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id','left');
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

    public function get_somitee($div_id, $dist_id, $upz_id, $type)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');

        if ($type == 'all') {
            $whr='( somitee_div_id ='.$div_id.' and somitee_dist_id ='.$dist_id.' and somitee_upz_id ='.$upz_id.' and ( is_re_register=1 or (division_id<>0 and uco_inquiry_date<>\'0000-00-00\') ))';
            $this->db->where($whr);
            //$this->db->where_not_in('division_id', 0);
            //$this->db->where_not_in('uco_inquiry_date', '0000-00-00');
            //$this->db->order_by('somitee_reg_date', 'desc');
        }elseif ($type == 'new') {
            $this->db->where('somitee_div_id', $div_id);
            $this->db->where('somitee_dist_id', $dist_id);
            $this->db->where('somitee_upz_id', $upz_id);
            $this->db->where_not_in('division_id', 0);
            $this->db->where('uco_id', 0);
            $this->db->where('somitee_status', 2);
        }elseif ($type == 'selected') {
            $whr='( somitee_div_id ='.$div_id.' and somitee_dist_id ='.$dist_id.' and somitee_upz_id ='.$upz_id.' and ( is_re_register=1 or (division_id <>0 and uco_id<>0) ))';
            $this->db->where($whr);
            //$this->db->where_not_in('division_id',0);
            //$this->db->where_not_in('uco_id', 0);
        }

        $this->db->order_by('somitee_info.uco_inquiry_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();


    }


    public function get_somitee_info_1($div_id, $dist_id, $upz_id, $track_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');


        $this->db->where('somitee_track_id', $track_id);
        $this->db->where('somitee_div_id', $div_id);
        $this->db->where('somitee_dist_id', $dist_id);
        $this->db->where('somitee_upz_id', $upz_id);
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
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id', 'left');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id', 'left');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id', 'left');
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

    public function insert($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
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

    public function update_feedback($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('feedback', $data);
    }

    public function getUco($id)
    {
        $this->db->select('*');
        $this->db->from('uco');
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