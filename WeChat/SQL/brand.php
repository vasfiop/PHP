<?php

namespace brand;

use function Sqli\sqli_get_list;

function GetBrandBySid($sid)
{
    $sql = "SELECT * from brand where sid = $sid";
    return sqli_get_list($sql);
}
