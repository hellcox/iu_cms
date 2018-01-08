<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/5
 * Time: 17:21
 */

class Node extends Common
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 节点列表
     */
    public function index(){
        $this->load->model('node_model');
        $nodes = $this->node_model->getAllNode();
        $this->data['nodes'] = Tool::makeTree($nodes);

        $this->view('node/index');
    }

    public function addModule(){
        $cnName = $this->input->post('cn_name');
        $enName = $this->input->post('en_name');

        if(empty($cnName)){
            resJson("","菜单名称不能为空",20001);
        }
        if(empty($enName)){
            resJson("","模块名称不能为空",20001);
        }

        $data['node_name'] = $cnName;
        $data['node_module'] = $enName;
        $data['node_level'] = 1;
        $data['node_menu'] = 1;
        $data['add_time'] = time();

        $this->load->model('node_model');
        $id = $this->node_model->insert($data);
        resJson($id,"添加模块成功",0);
    }
}