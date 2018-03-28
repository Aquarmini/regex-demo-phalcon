<?php
// +----------------------------------------------------------------------
// | 基础测试类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Regex;

use Tests\UnitTestCase;

/**
 * Class UnitTest
 */
class BaseTest extends UnitTestCase
{
    /**
     * @desc   测试以某字母开头
     * @author limx
     */
    public function testStringAtBegin()
    {
        $regex = "/^a/";
        $arr = [
            ['asdfafz', true],
            ['ddddddz', false],
            ['affffffa', true],
        ];

        foreach ($arr as $item) {
            list($str, $expect) = $item;
            $this->assertEquals($expect, preg_match($regex, $str));
        }
    }

    /**
     * @desc   测试以某字母结尾
     * @author limx
     */
    public function testStringAtEnd()
    {
        $regex = "/z$/";
        $arr = [
            ['asdfafz', true],
            ['ddddddz', true],
            ['affffffa', false],
        ];

        foreach ($arr as $item) {
            list($str, $expect) = $item;
            $this->assertEquals($expect, preg_match($regex, $str));
        }
    }

    /**
     * @desc   测试以某两字母结尾
     * @author limx
     */
    public function testStringOrAtEnd()
    {
        $regex = "/(z|y)$/";
        $arr = [
            ['asdfafz', true],
            ['ddddddz', true],
            ['affffffa', false],
            ['affffffay', true],
        ];

        foreach ($arr as $item) {
            list($str, $expect) = $item;
            $this->assertEquals($expect, preg_match($regex, $str));
        }
    }

    /**
     * @desc   测试贪婪匹配 第一次匹配成功就返回
     * @author limx
     */
    public function testUMode()
    {
        $regex = "/(.*):/U";
        $arr = [
            ['asd:fa:fzxx', 'asd'],
            ['ddd:dd:zyy', 'ddd'],
            ['afff:fff:azz', 'afff'],
            ['affff:ffay:yz', 'affff'],
            ['aff:fff:fayxy', 'aff'],
        ];
        foreach ($arr as $item) {
            list($str, $expect) = $item;
            preg_match($regex, $str, $result);
            $this->assertEquals($expect, $result[1]);
        }
    }
}
