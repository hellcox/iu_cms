<?php
/**
 * Created by xLong.
 * User: DOU
 * Date: 2018/1/3
 * Time: 22:25
 */

/**
 * 友好打印变量
 * @param $data
 */
function dump($data, $name = '')
{
    echo '<pre style="background: #dedede;border-radius:5px;padding: 10px;font-size: 12px;font-family: Verdana,Times New Roman;margin: 5px 0;">';
    if (!empty($name)) {
        echo $name . ':';
        echo "<div style='border-bottom: 1px #2b669a solid;margin: 5px 0;'></div>";
    }
    print_r($data);
    echo '</pre>';
}

/**
 * 静态插件地址
 * 使用时必须配置配置文件[common.php]对应插件的版本
 * @param $lib 插件名称 [layui]
 * @param $suffix 文件后缀地址 [css/layui.css]
 */
function lib_url($lib, $suffix)
{
    $version = config_item($lib);
    echo base_url() . 'assets/lib/' . $lib . '/' . $version . '/' . $suffix;
}