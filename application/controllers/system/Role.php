<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/5
 * Time: 17:21
 */

class Role extends Common
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->view('test/index3');
    }

}