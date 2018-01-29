<?php
/**
 * Created by xLong.
 * User: DOU
 * Date: 2018/1/4
 * Time: 20:51
 */

class MY_Controller extends CI_Controller
{

}

class Common extends MY_Controller
{
    public $data = null;

    public function __construct()
    {
        parent::__construct();
        if (!$this->isLogin()) {
            redirect('login');
        }
        $this->getMenu();
    }

    /**
     * 检测是否登录
     * @return bool
     */
    public function isLogin()
    {
        return !empty($_SESSION['sys_user']);
    }

    /**
     * 获取菜单
     */
    public function getMenu()
    {
        $this->load->model('node_model');
        $leftMenu = $this->node_model->getMenu();
        $this->data['menu'] = $this->createMenu($leftMenu);
    }

    /**
     * 构造菜单
     */
    public function createMenu($menu)
    {
        $dir = trim($this->router->fetch_directory(), '/');
        $class = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        $html = "";
        // echo $dir."-".$class.'-'.$method;

        foreach ($menu as $key => $val) {
            if ($dir == $val['node_module']) {
                $oneActive = "layui-nav-itemed";
            }else{
                $oneActive = "";
            }
            $html .= "<li class=\"layui-nav-item line-bot {$oneActive}\">";
            $html .= "<a href=\"javascript:;\">{$val['node_name']}</a>";
            if (!empty($val['child'])) {
                $html .= "<dl class=\"layui-nav-child\">";
                foreach ($val['child'] as $key2 => $val2) {
                    if ($class==$val2['node_controller'] && $method == $val2['node_action']) {
                        $twoActive = "layui-this";
                    }else{
                        $twoActive = "";
                    }
                    $html .= "<dd class=\"{$twoActive}\"><a href=\"" . site_url($val2['node_path']) . "\">{$val2['node_name']}</a></dd>";
                }
                $html .= "</dl>";
            }
            $html .= "</li>";
        }

        return $html;
    }

    /**
     * 返回视图
     * @param null $view 视图
     * @param bool $flag 是否启用复杂头
     */
    public function view($view = null, $flag = true)
    {
        if ($flag) {
            $this->load->view("public/data", $this->data); //用于返回数据
            $this->load->view("public/header");
            $this->load->view("public/top");
            $this->load->view("public/menu");
            empty($view) ? '' : $this->load->view($view);
            $this->load->view("public/footer");
        } else {
            $this->load->view("public/data", $this->data);
            $this->load->view("public/header");
            empty($view) ? '' : $this->load->view($view);
            $this->load->view("public/footer_sm");
        }
    }
}