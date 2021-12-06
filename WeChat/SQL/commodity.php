<?php

namespace WeChatcommodity;

use function Sqli\sqli_get_list;

function GetKill()
{
    $sql = "SELECT * FROM commodity LIMIT 15";

    return sqli_get_list($sql);
}
function GetCommByNum($num)
{
    if ($num == null)
        $sql = "SELECT * from commodity";
    else
        $sql = "SELECT * from commodity limit 20";

    return sqli_get_list($sql);
}
function GetCommBySort()
{
    $sql = "SELECT * FROM commodity ss,smallsort c WHERE ss.ssid = c.ssid";

    return sqli_get_list($sql);
}
