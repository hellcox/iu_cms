<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/11
 * Time: 18:21
 */

class Upload extends Common
{
    public function __construct()
    {
        parent::__construct();
    }

    public function image()
    {
        $config['upload_path'] = ROOT_PATH.'/upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        echo TEST_VAL;
        echo '<pre>';
        print_r($config);
        echo 1;
    }

}