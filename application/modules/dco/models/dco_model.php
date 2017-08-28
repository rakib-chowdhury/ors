<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dco_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAdmin()
    {
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->join('admin_registration', 'admin_login.admin_reg_id=admin_registration.admin_reg_id');
        $this->db->where('admin_login.admin_type', 1);
        $this->db->or_where('admin_login.admin_type', 2);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_admin_info($id, $tbl)
    {
        $this->db->select('*');
        $this->db->from('' . $tbl . '');
        $this->db->join('admin_registration', '' . $tbl . '.admin_reg_id = admin_registration.admin_reg_id', 'left');
        $this->db->join('division', 'admin_registration.div_id=division.div_id', 'left');
        $this->db->join('district', 'admin_registration.dist_id=district.dist_id', 'left');
        $this->db->join('upazilla', 'admin_registration.upz_id=upazilla.upz_id', 'left');
        $this->db->where($tbl . '.' . $tbl . '_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_feedback($div, $dist)
    {
        $this->db->select('count(id) as t');
        $this->db->from('feedback');
        $this->db->join('somitee_info', 'somitee_info.somitee_id=feedback.somitee_id', 'left');
        $this->db->where('somitee_info.somitee_div_id', $div);
        $this->db->where('somitee_info.somitee_dist_id', $dist);
        $this->db->where('feedback.type', 2);
        $this->db->where('feedback.is_seen', 0);
        $this->db->order_by('feedback.created_at', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function seenSomitee($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('feedback', $data);
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

    public function getFeedbackSomiteeDetails($div, $dist)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->join('somitee_info', 'somitee_info.somitee_id=feedback.somitee_id', 'left');
        $this->db->where('somitee_info.somitee_div_id', $div);
        $this->db->where('somitee_info.somitee_dist_id', $dist);
        //$this->db->where('feedback.type',2);
        //$this->db->where('feedback.is_seen',0);
        $this->db->order_by('feedback.created_at', 'desc');
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

//    public function get_somitee_num($div_id, $dist_id, $type)
//    {
//        $this->db->select('count(somitee_id) as t');
//        $this->db->from('somitee_info');
//        $this->db->where('somitee_div_id', $div_id);
//        $this->db->where('somitee_dist_id', $dist_id);
//        $this->db->where_not_in('division_id', 0);
//        $this->db->where_not_in('uco_id', 0);
//        if ($type == 'all') {
//            $this->db->where_not_in('dco_inquiry_date', '0000-00-00');
//            $this->db->order_by('somitee_reg_date', 'desc');
//            $this->db->where_not_in('somitee_status',5);
//        }
//        if ($type == 'new') {
//            $this->db->where('dco_id', 0);
//            $this->db->where('somitee_status', 2);
//        }
//        if ($type == 'selected') {
//            $this->db->where_not_in('dco_id', 0);
//            $this->db->where('somitee_status', 1);
//        }
//        if ($type == 'reject') {
////            $where1 = '( (somitee_status=3 || somitee_status=5 )and appeal_id=0 )';
//            $where1 = '( (somitee_status=3) )';
//            $this->db->where($where1);
//            $where2 = '( appeal_id!=0 and (somitee_status=6))';
//            $this->db->or_where($where2);
//        }
//        if ($type == 'appeal') {
//            $this->db->where_not_in('appeal_id', 0);
//            //$this->db->where('somitee_status', 3);
//            //$this->db->or_where('somitee_status', 4);
//            $this->db->where('somitee_status', 4);
//        }
//        $result = $this->db->get();
//        return $result->result_array();
//
//    }

    public function get_somitee_num($div_id, $dist_id, $type)
    {
        $this->db->select('count(somitee_id) as t');
        $this->db->from('somitee_info');
        if ($type == 'all') {
            $whr = 'somitee_div_id = ' . $div_id;
            $whr .= ' and somitee_dist_id = ' . $dist_id;
            $whr .= ' and (is_re_register = 1 or ';
            $whr .= '( is_re_register = 0 and uco_id <> 0 and division_id <> 0 and dco_inquiry_date <> "0000-00-00" and  somitee_status <> 5) ) ';
            $this->db->where($whr);
        }
        if ($type == 'new') {
            $whr = 'somitee_div_id = ' . $div_id;
            $whr .= ' AND somitee_dist_id =' . $dist_id;
            $whr .= ' and  is_re_register=0 and dco_id=0 and uco_id<>0 and division_id<>0 and  somitee_status=2';
            $this->db->where($whr);
        }
        if ($type == 'selected') {
            $whr = 'somitee_div_id =' . $div_id;
            $whr .= ' AND somitee_dist_id=' . $dist_id;
            $whr .= ' and (is_re_register=1 or ';
            $whr .= '( is_re_register=0 and dco_id<>0 and uco_id<>0 and division_id<>0 and somitee_status=1) )';
            $this->db->where($whr);
        }
        if ($type == 'reject') {
            $this->db->where('somitee_div_id', $div_id);
            $this->db->where('somitee_dist_id', $dist_id);
            $this->db->where_not_in('division_id', 0);
            $this->db->where_not_in('uco_id', 0);
            $where1 = '( (somitee_status=3) )';
            $this->db->where($where1);
            $where2 = '( appeal_id!=0 and (somitee_status=6))';
            $this->db->or_where($where2);
        }
        if ($type == 'appeal') {
            $this->db->where('somitee_div_id', $div_id);
            $this->db->where('somitee_dist_id', $dist_id);
            $this->db->where_not_in('division_id', 0);
            $this->db->where_not_in('uco_id', 0);
            $this->db->where_not_in('appeal_id', 0);
            $this->db->where('somitee_status', 4);
        }
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

    public function update_somitee_info($s_id, $data)
    {
        $this->db->where('somitee_id', $s_id);
        $this->db->update('somitee_info', $data);
    }

    public function update_somitee_member($m_id, $data)
    {
        $this->db->where('somitee_member_id', $m_id);
        $this->db->update('somitee_member_registration_new', $data);
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('somitee_category');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_sub_category()
    {
        $this->db->select('*');
        $this->db->from('somitee_sub_category');
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_somitee($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function password_change($data, $uname)
    {
        $this->db->where('admin_reg_id', $uname);
        $this->db->update('admin_login', $data);
    }

    public function update_certificate_model($data, $certificate_sequel)
    {
        $this->db->where('certificate_sequel', $certificate_sequel);
        $this->db->update('somitee_certificate', $data);
    }

    public function get_leader_info($s_id)
    {
        $sql = 'select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id=' . $s_id . ')';
        $result = $this->db->query($sql);
        return $result->result_array();

    }

    public function get_admin_reg_id($somitee_id)
    {
        $this->db->select('admin_reg_id');
        $this->db->from('dco');
        $this->db->where('somitee_id', $somitee_id);

        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_sign($reg_id)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->where('admin_reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_sign($admin_id, $data)
    {
        $this->db->where('admin_reg_id', $admin_id);
        $this->db->update('admin_registration', $data);
    }
//    public function update_sign2($admin_id, $data, $column)
//    {
//        $this->db->where('admin_reg_id', $admin_id);
//        $this->db->update('sign', $data);
//    }



    public function getDco($id)
    {
        $this->db->select('*');
        $this->db->from('dco');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_admin_profile($reg_id)
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


    public function getUco($id)
    {
        $this->db->select('*');
        $this->db->from('uco');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
    }

    public function get_somitee_infos($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_user_info($somitee_id)
    {
        $sql = "select * from user_registration where user_reg_id=(select user_reg_id from somitee_info where somitee_id=" . $somitee_id . ")";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_last_certificate()
    {
        $this->db->select('*');
        $this->db->from('somitee_certificate');
        $this->db->order_by('created_at', 'desc');
        //$this->db->limit(0,1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_dco_somitee_list()
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->where('somitee_status', 2);
        $this->db->where_not_in('uco_id', 0);
        $this->db->where('dco_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_member_info($somitee_id)
    {
        //$this->db->select('somitee_member_registration.*');
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_member_registration_new', 'somitee_info.somitee_id=somitee_member_registration_new.somitee_id');
        $this->db->where('somitee_info.somitee_track_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_somitee_member_info($somitee_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('somitee_member_registration_new', 'somitee_info.somitee_id=somitee_member_registration_new.somitee_id');
        $this->db->where('somitee_info.somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_kormo_info($tr_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_info');
        $this->db->join('division', 'somitee_info.somitee_kormo_div_id=division.div_id');
        $this->db->join('district', 'somitee_info.somitee_kormo_dist_id=district.dist_id');
        $this->db->join('upazilla', 'somitee_info.somitee_kormo_upz_id=upazilla.upz_id');
        $this->db->where('somitee_track_id', $tr_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function check_tracking_number($tr_id, $dist_id)
    {
        $this->db->select('somitee_info.*, somitee_type.*, sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');

        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id');
        $this->db->join('division skd', 'somitee_info.somitee_kormo_div_id=skd.div_id');
        $this->db->join('district skds', 'somitee_info.somitee_kormo_dist_id=skds.dist_id');
        $this->db->join('upazilla skp', 'somitee_info.somitee_kormo_upz_id=skp.upz_id');
        $this->db->where('somitee_track_id', $tr_id);
        $this->db->where('somitee_info.somitee_dist_id', $dist_id);
        $this->db->where_not_in('somitee_info.uco_id', 0);
        //$this->db->where('somitee_info.dco_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_detail($somitee_id)
    {
        $this->db->select('somitee_info.*, somitee_type.*, somitee_category.*, somitee_sub_category.*, sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id');
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

    public function get_admin_dist_id($admin_reg_id)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->where('admin_reg_id', $admin_reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
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

    public function getWhere($customCondition, $tableName)
    {
        $this->db->where($customCondition);
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function customSelect($selectFields, $customCondition, $tableName)
    {
        $this->db->select($selectFields);
        $this->db->where($customCondition);
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function get_somitee_list()
    {
        $sql = "select * from somitee_info , somitee_type where somitee_info.somitee_type_id=somitee_type.somitee_type_id and somitee_info.somitee_status=2 and somitee_info.uco_inquiry_verify=1";
        $result = $this->db->query($sql);
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

    public function get_member($id)
    {

        $this->db->select('*');
        $this->db->from('somitee_member_registration_new');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_somitee_info()
    {
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

    public function get_all_somitee_info($dist_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');
        $whr = '( somitee_dist_id=' . $dist_id . '  and ( uco_id<>0 or is_re_register=1) )';
        //$this->db->where('somitee_info.somitee_dist_id', $dist_id);
        //$this->db->where_not_in('uco_id', 0);
        $this->db->where($whr);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_new_somitee_info($dist_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');

        $this->db->where('somitee_info.somitee_dist_id', $dist_id);
        $this->db->where('somitee_status', 2);
        $this->db->where_not_in('uco_id', 0);
        $this->db->where('dco_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    /*public function get_appeal_somitee_info($dist_id)
   {

       $this->db->select('*');
       $this->db->from('somitee_info');

       $this->db->where('somitee_info.somitee_dist_id', $dist_id);
       $this->db->where_not_in('appeal_id', 0);
       $this->db->where('somitee_status', 3);
       $this->db->or_where('somitee_status', 4);
       //$this->db->where('somitee_status', 4);
       //$this->db->where_not_in('appeal_id', 0);
       $result = $this->db->get();
       return $result->result_array();
   }*/

    public function get_appeal_somitee_info($dist_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');

        $this->db->where('somitee_info.somitee_dist_id', $dist_id);
        $this->db->where('somitee_status', 4);
        $this->db->where_not_in('appeal_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_success_somitee_info($dist_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');
        $whr = '( somitee_dist_id=' . $dist_id . '  and ( (uco_id<>0 and dco_id<>0 and somitee_status=1) or is_re_register=1) )';
        $this->db->where($whr);
        //$this->db->where('somitee_dist_id', $dist_id);
        //$this->db->where('somitee_status', 1);
        //$this->db->where_not_in('uco_id', 0);
        //$this->db->where_not_in('dco_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_reject_somitee_info($dist_id)
    {

        $this->db->select('*');
        $this->db->from('somitee_info');

        $this->db->where('somitee_dist_id', $dist_id);
        $where = "(somitee_status=3 || somitee_status=5 || somitee_status=6) ";
//            $this->db->where('somitee_status', 3);
        //          $this->db->or_where('somitee_status',5);
        //        $this->db->or_where('somitee_status',6);
        $this->db->where($where);
        $this->db->where_not_in('uco_id', 0);
        $this->db->where_not_in('dco_id', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_detail($somitee_id)
    {

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
        $this->db->where('somitee_info.somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_detail2($somitee_id)
    {

        $this->db->select('somitee_info.*, somitee_type.*, sd.*, sds.*, sp.*, skd.div_id as k_div_id, skd.bn_div_name as k_div_name, skds.dist_id as k_dist_id ,skds.bn_dist_name as k_dist_name, skp.upz_id as k_upz_id, skp.bn_upz_name as k_upz_name,somitee_category.somitee_cat_name, somitee_sub_category.somitee_sub_cat_name , ssd.div_id as ssd_div_id, ssd.bn_div_name as ssd_div_name, ssds.dist_id as ssds_dist_id ,ssds.bn_dist_name as ssds_dist_name, ssu.upz_id as ssu_upz_id, ssu.bn_upz_name as ssu_upz_name');
        $this->db->from('somitee_info');
        $this->db->join('somitee_type', 'somitee_info.somitee_type_id=somitee_type.somitee_type_id', 'left');
        $this->db->join('somitee_category', 'somitee_info.somitee_cat_id=somitee_category.somitee_cat_id', 'left');
        $this->db->join('somitee_sub_category', 'somitee_info.somitee_sub_cat_id=somitee_sub_category.somitee_sub_cat_id', 'left');

        $this->db->join('division sd', 'somitee_info.somitee_div_id=sd.div_id', 'left');
        $this->db->join('district sds', 'somitee_info.somitee_dist_id=sds.dist_id', 'left');
        $this->db->join('upazilla sp', 'somitee_info.somitee_upz_id=sp.upz_id', 'left');

        $this->db->join('division ssd', 'somitee_info.sodosso_division=ssd.div_id', 'left');
        $this->db->join('district ssds', 'somitee_info.sodosso_district=ssds.dist_id', 'left');
        $this->db->join('upazilla ssu', 'somitee_info.sodosso_upz=ssu.upz_id', 'left');

        $this->db->join('division skd', 'somitee_info.somitee_kormo_div_id=skd.div_id', 'left');
        $this->db->join('district skds', 'somitee_info.somitee_kormo_dist_id=skds.dist_id', 'left');
        $this->db->join('upazilla skp', 'somitee_info.somitee_kormo_upz_id=skp.upz_id', 'left');

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

    public function update_somitee_status($id, $data)
    {
        $this->db->where('somitee_id', $id);
        $this->db->update('somitee_info', $data);
    }


    public function get_all_somitee_member_info_detail($somitee_id)
    {
        //$this->db->select('somitee_member_registration.*');
        $this->db->select('*');
        $this->db->from('somitee_member_registration_new');
        $this->db->where('somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_all_certificate_info($somitee_id)
    {
        $this->db->select('somitee_certificate.*,somitee_info.*,district.*,upazilla.*');
        $this->db->from('somitee_certificate');
        $this->db->join('somitee_info', 'somitee_info.somitee_id = somitee_certificate.somitee_id');
        $this->db->join('district', 'district.dist_id = somitee_info.somitee_dist_id');
        $this->db->join('upazilla', 'upazilla.upz_id = somitee_info.somitee_upz_id');
        $this->db->where('somitee_certificate.somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function somitte_kormo_info($somitee_id)
    {
        $this->db->select('somitee_certificate.*,somitee_info.*,district.*,upazilla.*');

        $this->db->from('somitee_certificate');
        $this->db->join('somitee_info', 'somitee_info.somitee_id = somitee_certificate.somitee_id');
        $this->db->join('district', 'district.dist_id = somitee_info.somitee_kormo_dist_id');
        $this->db->join('upazilla', 'upazilla.upz_id = somitee_info.somitee_kormo_upz_id');

        $this->db->where('somitee_certificate.somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function somitte_sodosho_info($somitee_id)
    {
        $this->db->select('somitee_certificate.*,somitee_info.*,district.*,upazilla.*');

        $this->db->from('somitee_certificate');
        $this->db->join('somitee_info', 'somitee_info.somitee_id = somitee_certificate.somitee_id');
        $this->db->join('district', 'district.dist_id = somitee_info.sodosso_district');
        $this->db->join('upazilla', 'upazilla.upz_id = somitee_info.sodosso_upz');

        $this->db->where('somitee_certificate.somitee_id', $somitee_id);
        $result = $this->db->get();
        return $result->result_array();

    }


    public function get_all_dco_info($admin_reg_id)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->where('admin_reg_id', $admin_reg_id);

        $result = $this->db->get();
        return $result->result_array();

    }


}

?>