<?php

namespace sort;

use function Sqli\sqli_get_list;

function GetSortByNum($num)
{
    $sql = "SELECT * FROM sort ORDER BY s_click DESC LIMIT $num";

    return sqli_get_list($sql);
}
