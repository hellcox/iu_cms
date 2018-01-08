<?php
/**
 * 自定义工具类
 * Created by xLong.
 * User: DOU
 * Date: 2018/1/4
 * Time: 21:22
 */

class Tool
{
    /**
     * 测试工具类
     */
    public static function test()
    {
        echo "<hr>I am test tool function<hr>";
    }

    /**
     * 获取当前时间 - 毫秒
     * @return float
     */
    public static function microtime()
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }

    /**
     * 把返回的数据集转换成Tree
     * @param array $list 要转换的数据集
     * @param string $pk 自增字段（栏目id）
     * @param string $pid parent标记字段
     * @return array
     */
    public static function makeTree($list,$pk='node_id',$pid='node_parent_id',$child='child',$root=0){
        $tree     = array();
        $packData = array();
        foreach ($list as $data) {
            $data[$child] = [];
            $packData[$data[$pk]] = $data;
        }
        foreach ($packData as $key => $val) {
            if ($val[$pid] == $root) {
                //代表跟节点, 重点一
                $tree[] = &$packData[$key];
            } else {
                //找到其父类,重点二
                $packData[$val[$pid]][$child][] = &$packData[$key];
            }
        }
        return $tree;
    }
}