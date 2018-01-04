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
    }

    public function view($view = null, $flag = true)
    {
        if($flag){
            $this->load->view("public/data", $this->data); //用于返回数据
            $this->load->view("public/header");
            $this->load->view("public/top");
            $this->load->view("public/menu");
            empty($view) ? '' : $this->load->view($view);
            $this->load->view("public/footer");
        }else{
            $this->load->view("public/data", $this->data); //用于返回数据
            $this->load->view("public/header");
            empty($view) ? '' : $this->load->view($view);
        }
    }
}