<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Basic_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /////basic query start///
    public function getAllRecords($tableName)
    {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function getAllRecords_order_by($tableName, $order_by, $type)
    {
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->order_by($order_by, $type);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
    }

    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }

    public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }

    public function updateCond($cond, $tableName, $data)
    {
        $whr = '(' . $cond . ')';
        $this->db->where($whr);
        $this->db->update($tableName, $data);
    }

    public function delete_function($tableName, $columnName, $columnVal)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->delete($tableName);
    }

    public function delete_function_cond($tableName, $cond)
    {
        $where = '( ' . $cond . ' )';
        $this->db->where($where);
        $this->db->delete($tableName);
    }

    public function getWhere($selector, $condition, $tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getWhereOrder($selector, $condition, $tablename, $order_cond, $order_cond1)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by($order_cond, $order_cond1);
        $result = $this->db->get();
        return $result->result_array();
    }

    /////basic query ends/////

    function getAddedBy($id)
    {
     $this->db->select('*');
        $this->db->from('admin_registration');
        $this->db->join('division','admin_registration.div_id=division.div_id','left');
        $this->db->join('district','admin_registration.dist_id=district.dist_id','left');
        $this->db->join('upazilla','admin_registration.upz_id=upazilla.upz_id','left');
        $this->db->where('admin_reg_id',$id);
        $result = $this->db->get();
        return $result->result_array();
    }

}

?>