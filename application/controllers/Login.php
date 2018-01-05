<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/5
 * Time: 13:55
 */

class Login extends CI_Controller
{
    public function index()
    {
        if(!empty($_SESSION['sys_user'])){
            redirect(base_url());
        }
        $this->load->view('login');
    }

    public function doLogin()
    {
        $userName = $this->input->post('user_name');
        $password = $this->input->post('password');
        $arr = [
            'user_name' => $userName,
            'password' => $password
        ];

        if ($userName == 'admin' && $password == '111111') {
            $_SESSION['sys_user'] = $arr;
            resJson($arr,'登录成功');
        }else{
            resJson($arr,'用户名或密码错误',1000);
        }
    }

    public function logout(){
        $_SESSION['sys_user'] = null;
        redirect('login');
    }
}