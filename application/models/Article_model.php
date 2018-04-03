<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/11
 * Time: 16:38
 */

class Article_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "article";
        $this->primary_key = "art_id";
    }

    public function getArtList($page,$pageSize){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('update_time desc');
        $this->db->limit($pageSize,$pageSize*$page-$pageSize);
        $query = $this->db->get();
        $rows = $query->result_array();
        return $rows;
    }
}