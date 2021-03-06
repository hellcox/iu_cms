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
    public function index()
    {
        $this->load->model('node_model');
        $nodes = $this->node_model->getAllNode();
        $this->data['nodes'] = Tool::makeTree($nodes);

        $this->view('system/node/index');
    }

    /**
     * 新增模块
     */
    public function addModule()
    {
        $cnName = $this->input->post('cn_name');
        $enName = $this->input->post('en_name');
        $sort = $this->input->post('sort');

        if (empty($cnName)) {
            resJson("", "菜单名称不能为空", 2000);
        }
        if (empty($enName)) {
            resJson("", "模块名称不能为空", 2000);
        }
        if (!empty($sort)) {
            if (!intval($sort)) {
                resJson("", "排序值错误", 2000);
            } else {
                $data['node_sort'] = $sort;
            }
        }

        $data['node_name'] = $cnName;
        $data['node_module'] = $enName;
        $data['node_level'] = 1;
        $data['node_menu'] = 1;
        $data['add_time'] = time();

        $this->load->model('node_model');
        $id = $this->node_model->insert($data);
        resJson($id, "添加模块成功", 0);
    }

    /**
     * 新增菜单
     */
    public function addMenu()
    {
        $cnName = $this->input->post('cn_name');
        $pid = $this->input->post('module_id');
        $sort = $this->input->post('sort');
        $ca = $this->input->post('menu_ca');

        if (empty($cnName)) {
            resJson("", "菜单名称不能为空", 2000);
        }
        if (empty($pid)) {
            resJson("", "模块ID不能为空", 2000);
        }
        if (!empty($sort)) {
            if (!intval($sort)) {
                resJson("", "排序值错误", 2000);
            } else {
                $data['node_sort'] = $sort;
            }
        }
        $caArr = explode('/', trim($ca, '/'));
        if (count($caArr) <= 1) {
            resJson("", "按格式输入控制器/方法", 2000);
        }

        $this->load->model('node_model');
        $module = $this->node_model->getRow(['node_id' => $pid]);

        if (!empty($module)) {
            $data['node_module'] = $module['node_module'];
            $data['node_name'] = $cnName;
            $data['node_level'] = 2;
            $data['node_menu'] = 1;
            $data['node_parent_id'] = $module['node_id'];
            $data['add_time'] = time();
            $data['node_controller'] = $caArr[0];
            $data['node_action'] = $caArr[1];
            $data['node_path'] = $module['node_module'] . '/' . $caArr[0] . '/' . $caArr[1];
            $id = $this->node_model->insert($data);
            if ($id > 0) {
                resJson($id, "添加菜单成功", 0);
            } else {
                resJson('', "添加菜单失败", 3);
            }
        } else {
            resJson('', "模块为空", 2);
        }
    }

    /**
     * 新增操作
     */
    public function addAction()
    {
        $cnName = $this->input->post('cn_name');
        $pid = $this->input->post('module_id');
        $sort = $this->input->post('sort');
        $ca = $this->input->post('menu_ca');

        if (empty($cnName)) {
            resJson("", "操作名称不能为空", 2000);
        }
        if (empty($pid)) {
            resJson("", "菜单ID不能为空", 2000);
        }
        if (!empty($sort)) {
            if (!intval($sort)) {
                resJson("", "排序值错误", 2000);
            } else {
                $data['node_sort'] = $sort;
            }
        }
        $caArr = explode('/', trim($ca, '/'));
        if (count($caArr) <= 1) {
            resJson("", "按格式输入控制器/方法", 2000);
        }

        $this->load->model('node_model');
        $module = $this->node_model->getRow(['node_id' => $pid]);

        if (!empty($module)) {
            $data['node_module'] = $module['node_module'];
            $data['node_name'] = $cnName;
            $data['node_level'] = 3;
            $data['node_menu'] = 0;
            $data['node_parent_id'] = $module['node_id'];
            $data['add_time'] = time();
            $data['node_controller'] = $caArr[0];
            $data['node_action'] = $caArr[1];
            $data['node_path'] = $module['node_module'] . '/' . $caArr[0] . '/' . $caArr[1];
            $id = $this->node_model->insert($data);
            if ($id > 0) {
                resJson($id, "添加操作成功", 0);
            } else {
                resJson('', "添加操作失败", 3);
            }
        } else {
            resJson('', "菜单为空", 2);
        }
    }
}