<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Common {

    public function __construct()
    {
        parent::__construct();
    }

    // 有公共区
	public function index()
	{
        $this->data['haha'] = ['val1'=>"value1",'val2'=>'value2'];
        $this->view('test/index');
	}

	// 无公共区
    public function index2()
    {
        $this->data['haha'] = ['val1'=>"value1",'val2'=>'value2'];
        $this->view('test/index2',false);
    }
}