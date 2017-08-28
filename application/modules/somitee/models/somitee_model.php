<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Somitee_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
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

    public function chkSomitee($s_name, $dist){
        $this->db->select('count(somitee_id) as num');
        $this->db->from('somitee_info');
        $this->db->where('somitee_name', $s_name);
        $this->db->where('somitee_dist_id', $dist);
        $this->db->where_not_in('somitee_status', 5);
        $result = $this->db->get();
        return $result->result_array();
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

    public function check_blocked_upz($upz)
    {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('upz_id', $upz);

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


    public function getAllRecords($tableName)
    {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function update_send_sms($id, $data)
    {
        $this->db->where('mobile_api_id', $id);
        $this->db->update('mobile_api', $data);
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
        $this->db->update('site_visitor', $data);
    }

    public function get_somobay_counter()
    {
        $this->db->select('count(*) as total_somitee');
        $this->db->from('somitee_info');
        $result = $this->db->get();
        return $result->result_array();
    }
    public function check_login_modal($nid, $password)
    {
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->join('admin_registration','admin_login.admin_reg_id=admin_registration.admin_reg_id');
        $this->db->where('admin_login.admin_nid', $nid, 'admin_login.password', $password);
        $whr = '( admin_type = 2 or admin_type = 6 or admin_type = 7 )';
        $this->db->where($whr);
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

    public function getUco($id)
    {
        $this->db->select('*');
        $this->db->from('uco');
        $this->db->where('somitee_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function somitee_update_appeal($s_id, $data)
    {
        $this->db->where('somitee_id', $s_id);
        $this->db->update('somitee_info', $data);
    }

    public function somitee_update_complain($s_id, $data)
    {
        $this->db->where('somitee_id', $s_id);
        $this->db->update('somitee_info', $data);
    }

    public function somitee_update_is_block($s_id, $data)
    {
        $this->db->where('somitee_id', $s_id);
        $this->db->update('somitee_info', $data);
    }

    public function get_edit_somitee_info($somitee_id)
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
        $this->db->where('somitee_info.somitee_id = ' . $somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_sub_cat()
    {
        $this->db->select('*');
        $this->db->from('somitee_sub_category');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getComplain($id)
    {
        $this->db->select('*');
        $this->db->from('complain');
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

    public function update_complain($s_id, $data)
    {
        $this->db->where('somitee_id', $s_id);
        $this->db->update('complain', $data);
    }

    public function get_somitee_member_des_num($somitee_id)
    {
        $sql = "SELECT count(somitee_member_id) as mem_des_no FROM `somitee_member_registration` where somitee_id=" . $somitee_id . " and somitee_member_designation_id <> 0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function check_nid($nid, $sid)
    {
        $sql = "select * from somitee_member_registration where somitee_id=" . $sid . " and somitee_member_nid= '" . $nid . "'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function update_somitee_member($user_id, $data)
    {
        $this->db->where('user_reg_id', $user_id);
        $this->db->update('somitee_info', $data);

    }

    public function update_somitee_member_des($somitee_id, $member_id, $data)
    {
        $this->db->where('somitee_id', $somitee_id);
        $this->db->where('somitee_member_id', $member_id);
        $this->db->update('somitee_member_registration', $data);

    }

    public function update_somitee_track_id($somitee_id, $data)
    {
        $this->db->where('somitee_id', $somitee_id);
        $this->db->update('somitee_info', $data);

    }

    public function update_somitee_complain_id($somitee_id, $data)
    {
        $this->db->where('somitee_id', $somitee_id);
        $this->db->update('somitee_info', $data);
    }

    public function check_somitee_name($name)
    {
        $sql = "select * from somitee_info where somitee_name= '" . $name . "'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_sub_cat($id)
    {
        $this->db->select('*');
        $this->db->from('somitee_sub_category');
        $this->db->where('somitee_cat_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_division()
    {
        $this->db->select('*');
        $this->db->from('division');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_district()
    {
        $this->db->select('*');
        $this->db->from('district');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_upazilla()
    {
        $this->db->select('*');
        $this->db->from('upazilla');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_upazilla2()
    {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('is_block', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_somitee_type()
    {
        $this->db->select('*');
        $this->db->from('somitee_type');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_somitee_cat()
    {
        $this->db->select('*');
        $this->db->from('somitee_category');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_somitee_cat2()
    {
        $this->db->select('*');
        $this->db->from('somitee_category');
        $this->db->where('status', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_somitee_cat_re()
    {
        $this->db->select('*');
        $this->db->from('somitee_category');
        $this->db->where('status', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_somitee_cat_sub()
    {
        $this->db->select('*');
        $this->db->from('somitee_sub_category');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_dist($div_id)
    {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where('div_id', $div_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_upz($dist_id)
    {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('dist_id', $dist_id);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_upz2($dist_id)
    {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('dist_id', $dist_id);
        $this->db->where('is_block', 0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_upz_val($upz_id)
    {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->where('upz_id', $upz_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert($tableName, $tableData)
    {
        $this->db->insert($tableName, $tableData);
    }

    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }

    public function get_somitee_num($somitee_id)
    {
        $sql = 'select count(somitee_member_id) as mem_no from somitee_member_registration where somitee_id=' . $somitee_id;
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_somitee_infos($user_id)
    {
        $sql = 'select * from somitee_info where user_reg_id=' . $user_id;
        $result = $this->db->query($sql);
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

    public function check_id_is_inserted($user_reg_id, $check_id)
    {
        $this->db->select('*');
        $this->db->from('somitee_member_registration_tmp');
        $this->db->where('user_reg_id', $user_reg_id);
        $this->db->where('check_id', $check_id);
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


    public function get_somitee_info($user_id)
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
        $this->db->where('somitee_info.user_reg_id', $user_id);
        $this->db->where('somitee_info.is_block', 0);
        // $this->db->where('somitee_info.somitee_id = ' . $somitee_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_somitee_member_info($somitee_id)
    {
        //$this->db->select('somitee_member_registration.*');
        $this->db->select('*');
        $this->db->from('somitee_member_registration_new');
        $this->db->where('somitee_id', $somitee_id);
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

    public function get_member($somitee_id)
    {
        $d_ate = date('Y-m-d');
        $sql = 'SELECT * from somitee_member_registration where somitee_id=' . $somitee_id;
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    public function get_designation($type)
    {
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where('designation_type', $type);
        $result = $this->db->get();
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

    public function check_all_given_data($data)
    {
        $this->db->select('*');
        $this->db->from('somitee_info_tmp');
        $this->db->where('user_reg_id', $data);

        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_tmp_data($data)
    {
        $this->db->select('*');
        $this->db->from('somitee_info_tmp');
        $this->db->join('somitee_type', 'somitee_info_tmp.somitee_type_id=somitee_type.somitee_type_id');
        $this->db->where('somitee_info_tmp.user_reg_id', $data);
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_tmp_data_member($data)
    {
        $this->db->select('*');
        $this->db->from('somitee_member_registration_tmp');
        $this->db->where('user_reg_id', $data);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function check_dco($data)
    {
        $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->where('dist_id', $data);
        $result = $this->db->get();
        return $result->result_array();
    }

}

?>