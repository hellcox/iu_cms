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
        $subPath = '/upload/image/' . date("Y/m/d/", time());
        $path = ROOT_PATH . $subPath;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            resJson($error, "上传失败", 100);
        } else {

            $data = array('upload_data' => $this->upload->data());
            $res['file_url'] = base_url() . $subPath . $data['upload_data']['file_name'];
            $res['file_ext'] = $data['upload_data']['file_ext'];
            $res['file_name'] = $data['upload_data']['file_name'];
            resJson($res, "上传成功", 0);
        }
    }

}