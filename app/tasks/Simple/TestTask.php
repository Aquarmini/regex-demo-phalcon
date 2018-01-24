<?php

namespace App\Tasks\Simple;

use App\Tasks\Task;
use Xin\Cli\Color;

class TestTask extends Task
{
    /**
     * @desc   匹配xx开头xx结尾的字符串
     * @author limx
     */
    public function test1Action()
    {
        $regex = "/^a.*z$/";
        $arr = [
            'asdfafz',
            'ddddddz',
            'affffffa',
        ];
        foreach ($arr as $item) {
            $res = preg_match($regex, $item);
            echo Color::colorize("{$item} 字符串是否以a开头z结尾：" . $res, Color::FG_LIGHT_GREEN) . PHP_EOL;
        }
    }

    /**
     * @desc   匹配是否以xx或yy结尾
     * @author limx
     */
    public function test2Action()
    {
        $regex = "/(xx|yy)$/";
        $arr = [
            'asdfafzxx',
            'ddddddzyy',
            'affffffazz',
            'affffffayyz',
            'affffffayxy',
        ];
        foreach ($arr as $item) {
            $res = preg_match($regex, $item);
            echo Color::colorize("{$item} 字符串是否以xx或yy结尾：" . $res, Color::FG_LIGHT_GREEN) . PHP_EOL;
        }
    }

    /**
     * @desc   贪婪算法 【匹配第一个合适的】
     * @author limx
     */
    public function greedyAction()
    {
        $regex = "/(.*):/U";
        $arr = [
            'asd:fa:fzxx',
            'ddd:dd:zyy',
            'afff:fff:azz',
            'affff:ffay:yz',
            'aff:fff:fayxy',
        ];
        echo Color::colorize('匹配到第一个冒号:', Color::FG_LIGHT_RED) . PHP_EOL;
        foreach ($arr as $item) {
            preg_match($regex, $item, $result);
            dump($result[1]);
        }
    }

}

