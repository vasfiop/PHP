<?php

namespace WechatSmallsort;

use function Sqli\sqli_get_list;

function GetSmallsort()
{
    $sql = "SELECT * from smallsort";

    return sqli_get_list($sql);
}
function GetSmallsortBySid($sid)
{
    $sql = "SELECT * from smallsort where sid = $sid";

    return sqli_get_list($sql);
}
