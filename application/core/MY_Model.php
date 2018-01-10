<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/10
 * Time: 17:55
 */

class MY_Model extends CI_Model
{
    public $table = "";
    public $primary_key = ""; //主键
    public $error = ""; //操作数据库产生的错误信息
    public $redis = null;
    public $PIX = '';

    public function MY_Controller()
    {
        parent::__construct();
    }

    protected function initRedis()
    {
        $this->redis = new Redis();
        if ($this->redis->pconnect(REDIS_HOST, REDIS_PORT, REDIS_TIMEOUT) == false) {
            $this->error('redis服务失败！');
        }
    }

    public function error($msg)
    {
        if (is_ajax()) {
            resJson(['code' => 1, 'msg' => $msg]);
        } else {
            message(['code' => 1, 'msg' => $msg, 'redirect' => '']);
        }
    }

    /**
     * 插入数据
     * @param $data
     * @return mixed
     */
    public function insert($data)
    {
        $insertId = $this->db->insert($this->table, $data);
        return $insertId;
    }

    /**
     * 根据条件查询一条记录
     * @param array $where
     * @param string $select
     * @return mixed
     */
    public function getRow($select = "*", array $where)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    /**
     * 根据条件查询总条数
     * @param $config
     * @return mixed
     */
    public function getCount($config)
    {
        $this->db->from($this->table);

        //需要过滤的
        if (!empty($config["eq-filter"])) {
            //过滤空条件
            $config["eq-filter"] = array_filter($config["eq-filter"]);
            $this->db->where($config["eq-filter"]);
        }
        //不需要过滤的搜索
        if (!empty($config["eq"])) {
            $this->db->where($config["eq"]);
        }
        if (!empty($config["in"])) {
            foreach ($config["in"] as $k => $v) {
                $this->db->where_in($k, $v);
            }
        }
        if (!empty($config["like"])) {
            $config["like"] = array_filter($config["like"]);
            foreach ($config["like"] as $key => $val) {
                $this->db->like($key, "{$val}");
            }
        }
        if (!empty($config["group"])) {
            //多个group by用逗号分割
            $this->db->group_by($config["group"]);
        }
        $count = $this->db->count_all_results();
        return $count;
    }

}