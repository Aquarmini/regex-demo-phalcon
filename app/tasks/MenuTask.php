<?php

namespace App\Tasks;

use Xin\Cli\Color;

class MenuTask extends Task
{
    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  正则表达式测试') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run [action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  simple:test@test1      匹配xx开头xx结尾', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  simple:test@test2      匹配是否以xx或yy结尾', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }
}

