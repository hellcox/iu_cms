<?php
/**
 * User: DOUDOU
 * Date: 2017/10/18
 * Time: 21:57
 */

class MY_Controller extends CI_Controller
{

}

class Common extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkIsLogin()
    {
        if (empty($this->session->userdata('userInfo'))) {
            redirect('account/login');
        }
    }

    public function view($view = null,$data = null)
    {
        echo 111;
        $this->load->view('framework/header');
        $this->load->view('framework/top');
        $this->load->view('framework/footer');
        echo 11111111;
    }
}