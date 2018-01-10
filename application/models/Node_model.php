<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/5
 * Time: 15:57
 */

class node_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "sys_node";
        $this->primary_key = "node_id";
    }

    /**
     * 获取菜单
     */
    public function getMenu()
    {
        // 获取主菜单
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('node_level', 1);
        $this->db->where('node_menu', 1);
        $this->db->order_by('node_sort asc');
        $query = $this->db->get();
        $arr = $query->result_array();
        // 获取二级菜单
        foreach ($arr as $key => $val) {
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('node_level', 2);
            $this->db->where('node_menu', 1);
            $this->db->where('node_parent_id', $val['node_id']);
            $this->db->order_by('node_sort asc');
            $query = $this->db->get();
            $arr2 = $query->result_array();
            $arr[$key]['child'] = $arr2;
        }
        return $arr;
    }

    /**
     * 获取所有节点
     * @return mixed
     */
    public function getAllNode()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('node_sort asc');
        $query = $this->db->get();
        $rows = $query->result_array();
        return $rows;
    }

    /**
     * 某列是否存在某值
     * @param $column
     * @param $value
     * @return mixed
     */
    public function issetValue($column,$value){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($column,$value);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }


}