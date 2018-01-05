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
}