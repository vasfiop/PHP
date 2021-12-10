<?php

namespace WeChatsort;

use function Sqli\sqli_get_list;

function GetSortByNum($num)
{
    if ($num != null)
        $sql = "SELECT * FROM sort ORDER BY s_click DESC LIMIT $num";
    else
        $sql = "SELECT * from sort Order by s_click DESC";

    return sqli_get_list($sql);
}