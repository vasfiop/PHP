<?php

namespace WeChatcommodity;

use function Sqli\sqli_get_list;

function GetComm()
{
    $sql = "SELECT * from commodity";
    return sqli_get_list($sql);
}

function GetKill()
{
    $sql = "SELECT * FROM commodity LIMIT 15";

    return sqli_get_list($sql);
}
function GetCommByNum($num)
{
    $sql = "SELECT * from commodity limit $num";

    return sqli_get_list($sql);
}
function GetCommBySort()
{
    $sql = "SELECT * FROM commodity ss,smallsort c WHERE ss.ssid = c.ssid";

    return sqli_get_list($sql);
}
function GetCommByNumSsid($num, $ssid)
{
    if ($ssid == 0)
        return GetCommByNum($num);
    $sql = "SELECT * from commodity where ssid = $ssid limit $num";

    return sqli_get_list($sql);
}
function GetCommBySmallsort($ssid)
{
    $sql = "SELECT * from commodity where ssid = $ssid";

    return sqli_get_list($sql);
}
