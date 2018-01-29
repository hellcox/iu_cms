<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/11
 * Time: 16:37
 */

class Article extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('node_model');
    }

    /**
     * 列表
     */
    public function index()
    {
        $this->view('content/article/index');
    }

    public function add()
    {
        $this->view('content/article/add');
    }

    public function doAdd()
    {
        resJson();
    }

}