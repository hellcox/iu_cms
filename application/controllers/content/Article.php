<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/1/11
 * Time: 16:37
 */

class Article extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('node_model');
        $this->load->model('article_model');
    }

    /**
     * 列表
     */
    public function index()
    {
        $page = $_GET['page'];
        $pageSize = $_GET['page_size'];

        $this->data['articles'] = $this->article_model->getArtList($page,$pageSize);
        $this->view('content/article/index');
    }

    public function add()
    {
        $this->view('content/article/add');
    }

    public function doAdd()
    {
        $now = time();
        $data['art_title'] = $_POST['title'];
        $data['art_desc'] = $_POST['title'];
        $data['art_keywords'] = $_POST['title'];
        $data['art_cover'] = $_POST['title'];
        $data['art_mk_content'] = $_POST['markContent'];
        $data['art_content'] = $_POST['htmlContent'];
        $data['add_time'] = $now;
        $data['update_time'] = $now;
        $id = $this->article_model->insert($data);
        resJson($_POST);
    }

}