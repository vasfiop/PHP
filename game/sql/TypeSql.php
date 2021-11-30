<?php

namespace type;

use function Sqli\sqli_get_list;

include_once("../Util/mysqli.php");
function GetType()
{
    $sql = "SELECT * from type";

    return sqli_get_list($sql);
}
function GetTypeBySearch($search)
{
    $sqli = "SELECT * from type where t_name like '%$search%'";

    return sqli_get_list($sqli);
}
