<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testutil extends Common
{

    public function __construct()
    {
        parent::__construct();
    }

    // 有公共区
    public function index()
    {
        // $class = $this->router->fetch_class();
        // $method = $this->router->fetch_method();
        // $directory = trim($this->router->fetch_directory(),'/');
        // echo $class.'<br>';
        // echo $method.'<br>';
        // echo $directory.'<br>';
        //
        // dump($this->router);
        $this->view('test/index');
    }

}