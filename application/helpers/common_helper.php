<?php
/**
 * Created by PhpStorm.
 * User: DOU
 * Date: 2018/1/3
 * Time: 22:25
 */

/**
 * 有好打印变量
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